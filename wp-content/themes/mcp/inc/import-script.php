<?php
add_action('admin_menu', 'my_admin_menu');

function my_admin_menu()
{
    add_menu_page('Import CSV', 'Import CSV', 'manage_options', 'import-csv-lf', 'LF_Import::form', 'dashicons-welcome-add-page', 6);
}
add_action('admin_post_update_products', 'LF_Import::update_products');
add_action('admin_post_nopriv_update_products', 'LF_Import::update_products');

class LF_Import
{
    public $JOB_DONE;
    public $IMPORT;
    public $ROLE;
    public $DELIMITER;
    public $ENCLOSURE;
    public $HEADER;

    public function __construct()
    {
        $this->JOB_DONE = false;
        $this->DELIMITER = '*';
        $this->ENCLOSURE = '"';
        $this->HEADER = array();
    }

    public function update_products(){

        $import = new LF_Import();

        $type = trim($_POST['type']);

        if( $type == 'outfit' ){
            $import->update_outfits( $_FILES );
        } else if( $type == 'product' ){
            $import->update_products_csv( $_FILES );
        } else{
            $import->update_categories_csv( $_FILES, $type );

        }
    }

    public function add_product_terms( $product_id, $terms, $taxonomy, $by = 'name' )
    {
        $insert_terms = [];

        foreach ($terms as $term) {

            $existent_term = get_term_by($by, $term, $taxonomy, ARRAY_A);

            if ($existent_term && isset($existent_term['term_id'])) {

                $term_id = $existent_term['term_id'];

            }
//            else {
//
//                //intert the term if it doesn't exsit
//                $term = wp_insert_term(
//                    $term, // the term
//                    $taxonomy // the taxonomy
//                );
//                if ( !is_wp_error($term) && isset($term['term_id']) ) {
//                    $term_id = $term['term_id'];
//                }
//
//            }

            //Fill the array of terms for later use on wp_set_object_terms
            $insert_terms[] = (int)$term_id;

        }

        wp_set_object_terms($product_id, $insert_terms, $taxonomy);
    }

    public function update_products_csv($file)
    {

        $new = 0;
        $tmpName = $file['csv']['tmp_name'];
        $csvAsArray = $this->csv2array($tmpName, $this->DELIMITER);

        if ($this->JOB_DONE) return;
        set_time_limit(0);


        $array = $csvAsArray;
        $this->HEADER = array_shift($array);

        foreach ($array as $key => $fields) {
            $fields = $this->array_combine2($this->HEADER, $fields);

            /* Product data */
            $product = [
                'name'          => ($fields['name']),
                'price'         => trim($fields['price']),
                'description'   => trim($fields['description']),
                'url'           => trim($fields['url']),
                'images'        => explode(";", $fields['images']),
                'categories'    => explode(";", $fields['categories']),
                'brand'         => explode(";", $fields['brand']),
                'color'         => explode(";", $fields['color']),
                'profiles'      => explode(";", $fields['profiles']),
                'occasions'     => explode(";", $fields['occasions']),
                'sex'           => explode(";", $fields['gender']),
                'attachments'   => array()
            ];

            if( $product['name'] == '' ) continue;

            $product_object = get_page_by_title($product['name'], OBJECT, 'product');

            /* No products with the same name */
            if ( is_null($product_object) || ( ($key != get_field('xls_index', $product_object->ID)) && !is_null($product_object)) ) {
                $new++;

                if( is_array( $product['images'] ) && trim($fields['images']) != '' ){
                    foreach ($product['images'] as $image) {
                        if( trim($image) != '' ){
                            array_push( $product['attachments'], $this->download_image( $image ) );
                        }
                    }
                }

                $product_create_args = [
                    'post_type' => 'product',
                    'post_title' => ($product['name']),
                    'post_content' => ($product['description']),
                ];

                if( trim($fields['images']) != '' ){
                    $product_create_args['post_status'] = 'publish';
                }

                $product_id = wp_insert_post(
                    $product_create_args
                );

                if( $product_id == 0 ){
                    echo "<pre>taj"; print_r( array(
                        'post_type' => 'product',
                        'post_title' => (string)$product['name'],
                        'post_content' => $product['description'],
                        'post_status' => trim($fields['images']) != '' ? 'publish' : 'draft',
                    ) ); echo "</pre>" ; exit();
                }


                $this->add_product_terms( $product_id, $product['categories'], 'product-category');
                $this->add_product_terms( $product_id, $product['brand'], 'product-brands');
                $this->add_product_terms( $product_id, $product['color'], 'product-color', 'slug');
                $this->add_product_terms( $product_id, $product['occasions'], 'product-gelegenheden');
                $this->add_product_terms( $product_id, $product['profiles'], 'product-profile');
                $this->add_product_terms( $product_id, $product['sex'], 'product-sex');


                update_field( 'price', $product['price'], $product_id);
                update_field( 'product_link', $product['url'], $product_id);
                update_field( 'featured_image', $product['attachments'][0], $product_id);
                update_field( 'images', $product['attachments'], $product_id);
                update_field( 'xls_index', $key, $product_id);

            }

        }

        $this->JOB_DONE = true;
        wp_redirect( $_SERVER['HTTP_REFERER'] . "&imported&added={$new}" );

    }
    public function update_outfits($file)
    {

        $new = 0;
        $tmpName = $file['csv']['tmp_name'];
        $csvAsArray = $this->csv2array($tmpName, $this->DELIMITER);

        if ($this->JOB_DONE) return;
        set_time_limit(0);


        $array = $csvAsArray;
        $this->HEADER = array_shift($array);

        $taxonomy = 'product-profile';
        $profiles_total = [];

        foreach ($array as $key => $fields) {
            $fields = $this->array_combine2($this->HEADER, $fields);

            $data = [
                'name'  => $fields['name'],
                'image'  => $fields['image'],
                'products'  => explode(";", $fields['products']),
                'profiles'  => explode(";", $fields['profiles']),
                'actual_products'   => array()
            ];

            $args = array(
                'post_type' => 'product',
                'fields'    => 'ids',
                'meta_query' => array(
                    array(
                        'key' => 'xls_index',
                        'value' => $data['products'],
                        'compare' => 'IN'
                    )
                )
            );

            $q = new WP_Query($args);

            if ( $q->have_posts() ) :

                while( $q->have_posts() ) :
                    $q->the_post();
                    $data['actual_products'][] = get_the_ID();

                endwhile;

            endif;

            foreach ($data['profiles'] as $profile_single) {
                $profiles = term_exists($profile_single, $taxonomy);
                $repeater_value = array(
                    // an element for each field
                    'field_599c617a0aee3' => $this->download_image( $data['image'] ),
                    'field_599c61950aee4' => $data['actual_products']
                );

                $profiles_total["{$taxonomy}_{$profiles['term_id']}"][] = $repeater_value;
                
/* TODO   */
//                update_field('field_599c61630aee2', $repeater_value, "{$taxonomy}_{$profiles['term_id']}");
            }

        }

        foreach ($profiles_total as $key => $item) {
            update_field('field_599c61630aee2', $item, $key);
        }

        $this->JOB_DONE = true;
        wp_redirect( $_SERVER['HTTP_REFERER'] . "&imported&added={$new}" );

    }

    public function update_categories_csv( $file, $type ){
        $tmpName = $file['csv']['tmp_name'];
        $csvAsArray = $this->csv2array($tmpName, "*");

        if ($this->JOB_DONE) return;
        set_time_limit(0);


        $array = $csvAsArray;
        $this->HEADER = array_shift($array);

        foreach ($array as $key => $fields) {
            $fields = $this->array_combine2($this->HEADER, $fields);
            $name = explode(";", $fields['name'])[0];
            $children = $fields['children'];
            $logo = $fields['logo'];
            $slug = $fields['slug'];
            $subchildren = explode(";", $fields['subchildren']);

            $new_term = term_exists($name, $type);

            if ( !$new_term ) {
                $new_term = wp_insert_term(
                    $name,
                    $type,
                    array(
                        'slug' => $slug,
                    )
                );
            }


            if( trim($logo) != '' ){
                $image_attachment_id = $this->download_image( $logo );
                update_field('logo', $image_attachment_id, "{$type}_{$new_term['term_id']}");
            }

            if( trim($children) != '' ){
                $children_array = explode(";", $children);

                foreach ($children_array as $child_key => $child_subcat_name) {

                    $new_term_child = term_exists($child_subcat_name, $type);

                    if ( !$new_term_child ) {
                        $new_term_child = wp_insert_term($child_subcat_name, $type, array( 'parent' => $new_term['term_id'] ) );
                    }

                    if( trim($subchildren[ $child_key ]) != '' ){
                        $sub_sub_children = $subchildren[ $child_key ];

                        $sub_sub_children_array = explode(",", $sub_sub_children);

                        foreach ($sub_sub_children_array as $sub_sub_children_array_item) {
                            wp_insert_term($sub_sub_children_array_item, $type, array( 'parent' => $new_term_child['term_id'] ) );
                        }

                    }

                }
            }
        }

        $get_terms_args = array(
            'taxonomy' => $type,
            'fields' => 'ids',
            'hide_empty' => false,
        );

        $update_terms = get_terms($get_terms_args);
        wp_update_term_count_now($update_terms, $type);

        $this->JOB_DONE = true;
        wp_redirect( $_SERVER['HTTP_REFERER'] . "&imported" );

    }

    function MediaFileAlreadyExists($filename){
        global $wpdb;
        $query = "SELECT COUNT(*) as COUNT FROM {$wpdb->postmeta} WHERE meta_value LIKE '%/$filename'";

        $results = $wpdb->get_results($query, ARRAY_A)[0];

        if( $results['COUNT'] == 0 ){
            return false;
        } else{
            return true;
        }
    }

    function get_attachment_url_by_slug( $slug ) {

        $slug = explode(".", $slug)[0];

        $args = array(
            'post_type' => 'attachment',
            'name' => sanitize_title($slug),
            'posts_per_page' => 1,
            'post_status' => 'inherit',
        );
        $_header = get_posts( $args );

        $header = $_header ? array_pop($_header) : false;
        return $header ? $header->ID : $header;
    }

    public function download_image( $url )
    {

        $filename = basename($url);
//        get_attachment_url_by_slug

        $slug = explode(".", $filename)[0];
        $attachment_existing = $this->get_attachment_url_by_slug($slug);

        if( !$attachment_existing ){
            $upload_file = wp_upload_bits($filename, null, $this->get_fcontent($url)[0]);
            if (!$upload_file['error']) {
                $wp_filetype = wp_check_filetype($filename, null );
                $attachment = array(
                    'post_mime_type' => $wp_filetype['type'],
                    'post_title' => preg_replace('/\.[^.]+$/', '', $filename),
                    'post_content' => '',
                    'post_status' => 'inherit'
                );
                $attachment_id = wp_insert_attachment( $attachment, $upload_file['file'] );
                if (!is_wp_error($attachment_id)) {
                    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
                    $attachment_data = wp_generate_attachment_metadata( $attachment_id, $upload_file['file'] );
                    wp_update_attachment_metadata( $attachment_id,  $attachment_data );

                    return $attachment_id;
                }
            }

        } else{
            $attachment_id = $attachment_existing;
            return $attachment_id;
        }

    }

    public static function form()
    {
        if (current_user_can('administrator')) {
            ?>
            <div class="welcome-panel">
                <?php if (isset($_GET['imported'])) : ?>
                    <div class="notice notice-success is-dismissible"><p><?php _e('Import OK!!'); echo isset($_GET['added']) ? __("New products added: {$_GET['added']}") : ''; ?>.</p></div>
                <?php endif; ?>
                <div class="wrap">
                    <h2>Import (products/taxonomies) CSV</h2>
                </div>
                <form enctype="multipart/form-data" action="<?php echo admin_url('admin-post.php'); ?>" method="post">
                    <table class="wp-list-table widefat fixed">
                        <thead>
                            <th>CSV File</th>
                            <th>Type (product or taxonomy)</th>
                            <th>Action</th>
                        </thead>
                        <tbody>

                                <input type="hidden" name="action" value="update_products">
                                <tr>
                                    <td>
                                        <input accept=".csv" type="file" name="csv">
                                    </td>
                                    <td>
                                        <select name="type" id="">
                                            <option value="product">Products</option>
                                            <?php foreach (get_object_taxonomies( 'product', 'names' ) as $get_object_taxonomy) {
                                                echo "<option value='".$get_object_taxonomy."'>(Categorie) {$get_object_taxonomy}</option>";
                                            }?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="submit" name="import_LF_CSV" value="IMPORT">
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </form>
                <div class="wrap">
                    <h2>Import outfits CSV</h2>
                </div>
                <form enctype="multipart/form-data" action="<?php echo admin_url('admin-post.php'); ?>" method="post">
                    <table class="wp-list-table widefat fixed">
                        <thead>
                        <th>CSV File</th>
                        <th>Action</th>
                        </thead>
                        <tbody>

                        <input type="hidden" name="action" value="update_products">
                        <input type="hidden" name="type" value="outfit">
                        <tr>
                            <td>
                                <input accept=".csv" type="file" name="csv">
                            </td>
                            <td>
                                <input type="submit" name="import_LF_CSV" value="IMPORT">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
<!--                <form enctype="multipart/form-data" action="--><?php //echo admin_url('admin-post.php'); ?><!--" method="post">-->
<!--                    <table class="wp-list-table widefat fixed">-->
<!--                        <thead>-->
<!--                        <th>CSV File</th>-->
<!--                        <th>Type (product or taxonomy)</th>-->
<!--                        <th>Action</th>-->
<!--                        </thead>-->
<!--                        <tbody>-->
<!---->
<!--                        <input type="hidden" name="action" value="update_products">-->
<!--                        <input type="hidden" name="translation" value="update_products_translation">-->
<!--                        <tr>-->
<!--                            <td>-->
<!--                                <input accept=".csv" type="file" name="csv">-->
<!--                            </td>-->
<!--                            <td>-->
<!--                                <select name="type" id="">-->
<!---->
<!--                                </select>-->
<!--                            </td>-->
<!--                            <td>-->
<!--                                <input type="submit" name="import_LF_CSV" value="IMPORT">-->
<!--                            </td>-->
<!--                        </tr>-->
<!--                        </tbody>-->
<!--                    </table>-->
<!--                </form>-->
            </div>
            <?php
        }
    }

    public function array_combine2(&$arr1, &$arr2)
    {
        $count = min(count($arr1), count($arr2));
        return array_combine(array_slice($arr1, 0, $count), array_slice($arr2, 0, $count));
    }

    function csv2array($filename, $delimiter = '*')
    {

        $arr = [];

        $handle = fopen($filename, "r");
        while (($data = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
            $arr[] = $data;
        }
        fclose($handle);

        return $arr;
    }

    function get_fcontent( $url,  $javascript_loop = 0, $timeout = 5 ) {
        $url = str_replace( "&amp;", "&", urldecode(trim($url)) );
        $url = str_replace(" ", "%20", $url);

        $cookie = tempnam ("/tmp", "CURLCOOKIE");
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1" );
        curl_setopt( $ch, CURLOPT_URL, $url );
        curl_setopt( $ch, CURLOPT_COOKIEJAR, $cookie );
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
        curl_setopt( $ch, CURLOPT_ENCODING, "" );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch, CURLOPT_AUTOREFERER, true );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );    # required for https urls
        curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
        curl_setopt( $ch, CURLOPT_TIMEOUT, $timeout );
        curl_setopt( $ch, CURLOPT_MAXREDIRS, 10 );
        $content = curl_exec( $ch );
        $response = curl_getinfo( $ch );
        curl_close ( $ch );

        if ($response['http_code'] == 301 || $response['http_code'] == 302) {
            ini_set("user_agent", "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1");

            if ( $headers = get_headers($response['url']) ) {
                foreach( $headers as $value ) {
                    if ( substr( strtolower($value), 0, 9 ) == "location:" )
                        return get_url( trim( substr( $value, 9, strlen($value) ) ) );
                }
            }
        }

        if (    ( preg_match("/>[[:space:]]+window\.location\.replace\('(.*)'\)/i", $content, $value) || preg_match("/>[[:space:]]+window\.location\=\"(.*)\"/i", $content, $value) ) && $javascript_loop < 5) {
            return get_url( $value[1], $javascript_loop+1 );
        } else {
            return array( $content, $response );
        }
    }



}
?>