<div class="faq-wrapper">
    <?php
    $terms = get_terms('faqs', array( 'hide_empty' => false ));

    foreach ($terms as $term) { ?>
        <div class="wifaqki-title-list-wrapper">
            <div class="term-main-title">
                <?php echo $term->name; ?>
            </div>
            <div class="term-list accordion-wrapper">
                <?php
                $args = array(
                    'post_type' => 'faq',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'faqs',
                            'field' => 'slug',
                            'terms' => $term->slug,
                        ),
                    ),
                );
                $query = new WP_Query($args);

                while ($query->have_posts()) {
                    $query->the_post();
                    ?>
                    <div class="single-accordion-wrapper">
                        <div itemtype="http://schema.org/ScholarlyArticle" class="accordion-opener">
                            <div class="opener-link-wrapper">
                                <a href="<?php the_permalink(); ?>" itemprop="name"><?php the_title(); ?></a>
                            </div>
                            <div class="opener-image">
                                <i class="fa fa-chevron-down"></i>
                            </div>
                        </div>
                        <div class="accordion-content"  style="display: none;">
                            <div class="accordion-content-inner">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div> <!-- /.wiki-title-list-wrapper -->
        <?php
    }
    wp_reset_query();
    ?>

</div>