oÎ‡Y<?php exit; ?>a:6:{s:10:"last_error";s:0:"";s:10:"last_query";s:361:"
										            SELECT p.ID
										            FROM wp_posts p
										            LEFT JOIN wp_icl_translations i
										              ON CONCAT('post_', p.post_type )  = i.element_type
										                AND i.element_id = p.ID
										            WHERE p.post_type = 'nav_menu_item'
										              AND i.language_code IS NULL";s:11:"last_result";a:0:{}s:8:"col_info";a:1:{i:0;O:8:"stdClass":13:{s:4:"name";s:2:"ID";s:7:"orgname";s:2:"ID";s:5:"table";s:1:"p";s:8:"orgtable";s:8:"wp_posts";s:3:"def";s:0:"";s:2:"db";s:27:"colorpassport_colorpassport";s:7:"catalog";s:3:"def";s:10:"max_length";i:0;s:6:"length";i:20;s:9:"charsetnr";i:63;s:5:"flags";i:49699;s:4:"type";i:8;s:8:"decimals";i:0;}}s:8:"num_rows";i:0;s:10:"return_val";i:0;}