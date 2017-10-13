oÎ‡Y<?php exit; ?>a:6:{s:10:"last_error";s:0:"";s:10:"last_query";s:381:"
									            SELECT term_taxonomy_id
									            FROM wp_term_taxonomy tt
									            LEFT JOIN wp_icl_translations i
									              ON CONCAT('tax_', tt.taxonomy ) = i.element_type
									                AND i.element_id = tt.term_taxonomy_id
									            WHERE tt.taxonomy='nav_menu'
									              AND i.language_code IS NULL";s:11:"last_result";a:0:{}s:8:"col_info";a:1:{i:0;O:8:"stdClass":13:{s:4:"name";s:16:"term_taxonomy_id";s:7:"orgname";s:16:"term_taxonomy_id";s:5:"table";s:2:"tt";s:8:"orgtable";s:16:"wp_term_taxonomy";s:3:"def";s:0:"";s:2:"db";s:27:"colorpassport_colorpassport";s:7:"catalog";s:3:"def";s:10:"max_length";i:0;s:6:"length";i:20;s:9:"charsetnr";i:63;s:5:"flags";i:49699;s:4:"type";i:8;s:8:"decimals";i:0;}}s:8:"num_rows";i:0;s:10:"return_val";i:0;}