МырY<?php exit; ?>a:6:{s:10:"last_error";s:0:"";s:10:"last_query";s:734:"
									 SELECT post_type, post_name
									 FROM wp_posts p
									 LEFT JOIN wp_icl_translations t
										ON t.element_id = p.ID
										 	AND CONCAT('post_', p.post_type) = t.element_type
									 		AND p.post_type  IN ('post','page','mc4wp-form','faq' ) 
									 WHERE post_name = 'be'  AND post_type IN ('post', 'page', 'attachment', 'frm_display', 'product', 'faq')
									 	AND ( post_status = 'publish'
									 	    OR ( post_type = 'attachment'
									 	         AND post_status = 'inherit' ) )
									 	ORDER BY CASE t.language_code WHEN 'nl' THEN 4  WHEN 'en' THEN 2  WHEN 'fr' THEN 1  ELSE 0 END DESC  ,  CASE p.post_type  WHEN 'page' THEN 2  WHEN 'post' THEN 1  ELSE 0 END DESC 
								     LIMIT 1";s:11:"last_result";a:0:{}s:8:"col_info";a:2:{i:0;O:8:"stdClass":13:{s:4:"name";s:9:"post_type";s:7:"orgname";s:9:"post_type";s:5:"table";s:1:"p";s:8:"orgtable";s:8:"wp_posts";s:3:"def";s:0:"";s:2:"db";s:27:"colorpassport_colorpassport";s:7:"catalog";s:3:"def";s:10:"max_length";i:0;s:6:"length";i:80;s:9:"charsetnr";i:224;s:5:"flags";i:1;s:4:"type";i:253;s:8:"decimals";i:0;}i:1;O:8:"stdClass":13:{s:4:"name";s:9:"post_name";s:7:"orgname";s:9:"post_name";s:5:"table";s:1:"p";s:8:"orgtable";s:8:"wp_posts";s:3:"def";s:0:"";s:2:"db";s:27:"colorpassport_colorpassport";s:7:"catalog";s:3:"def";s:10:"max_length";i:0;s:6:"length";i:800;s:9:"charsetnr";i:224;s:5:"flags";i:1;s:4:"type";i:253;s:8:"decimals";i:0;}}s:8:"num_rows";i:0;s:10:"return_val";i:0;}