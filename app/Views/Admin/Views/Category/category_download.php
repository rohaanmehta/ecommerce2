<?php
 $csv2 = 'id,category_name,category_desc_top,category_desc_top,parent_category,pair_category,show_on_homepage,category_order,category_slug';
 foreach($csv as $row){
     $csv2 = $csv2.'
'.$row->id.','.$row->category_name.','.str_replace(',','comma',$row->category_desc_top).','.str_replace(',','comma',$row->category_desc_bottom).','.$row->parent_category.','.$row->pair_category.','.$row->show_on_homepage.','.$row->category_order.','.$row->category_slug;
 }
 
 header("Content-type: text/x-csv");
 header("Content-Disposition: attachment; filename=Category_Export_".Date('d-M').'.csv');
 echo $csv2;
 exit;
?>