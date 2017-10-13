Ï‡Y<?php exit; ?>a:6:{s:10:"last_error";s:0:"";s:10:"last_query";s:332:"	SELECT element_id, language_code
						FROM wp_icl_translations
						WHERE trid =
							(SELECT trid
							 FROM wp_icl_translations
							 WHERE element_type = 'post_page'
							 AND element_id = (SELECT option_value
											   FROM wp_options
											   WHERE option_name='page_on_front'
											   LIMIT 1))
						";s:11:"last_result";a:3:{i:0;O:8:"stdClass":2:{s:10:"element_id";s:2:"44";s:13:"language_code";s:2:"en";}i:1;O:8:"stdClass":2:{s:10:"element_id";s:2:"47";s:13:"language_code";s:2:"fr";}i:2;O:8:"stdClass":2:{s:10:"element_id";s:1:"7";s:13:"language_code";s:2:"nl";}}s:8:"col_info";a:2:{i:0;O:8:"stdClass":13:{s:4:"name";s:10:"element_id";s:7:"orgname";s:10:"element_id";s:5:"table";s:19:"wp_icl_translations";s:8:"orgtable";s:19:"wp_icl_translations";s:3:"def";s:0:"";s:2:"db";s:27:"colorpassport_colorpassport";s:7:"catalog";s:3:"def";s:10:"max_length";i:2;s:6:"length";i:20;s:9:"charsetnr";i:63;s:5:"flags";i:49160;s:4:"type";i:8;s:8:"decimals";i:0;}i:1;O:8:"stdClass":13:{s:4:"name";s:13:"language_code";s:7:"orgname";s:13:"language_code";s:5:"table";s:19:"wp_icl_translations";s:8:"orgtable";s:19:"wp_icl_translations";s:3:"def";s:0:"";s:2:"db";s:27:"colorpassport_colorpassport";s:7:"catalog";s:3:"def";s:10:"max_length";i:2;s:6:"length";i:28;s:9:"charsetnr";i:224;s:5:"flags";i:20481;s:4:"type";i:253;s:8:"decimals";i:0;}}s:8:"num_rows";i:3;s:10:"return_val";i:3;}