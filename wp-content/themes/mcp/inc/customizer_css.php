<?php
/**
 * Change theme colors
 *
 * @package mcp
 */

$customizer_container_width = intval(get_theme_mod('container_width_customizer'));

// Uncomment this line to achieve boxed size layout
//$customizer_container_width = $customizer_container_width == 0 ? 960 : $customizer_container_width;

if ($customizer_container_width > 0) {
    ?>
    <style type="text/css">

        div.site-content {
            max-width: <?php //echo $customizer_container_width."px"; ?>;
            margin: 0 auto;
        }

        #masthead .container {
            max-width: <?php //echo $customizer_container_width."px"; ?>;
            margin: 0 auto;
        }

    </style>
    <?php
}
?>