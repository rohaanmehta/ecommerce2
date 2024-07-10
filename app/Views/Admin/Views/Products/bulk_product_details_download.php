<?php
$csv2 = 'product_id,title,desc,category,discount,price,stock,sku,promote,visibility';
foreach ($data as $row) {
    $csv2 = $csv2 . '
' . $row->id . ',' . $row->title. ',' . $row->desc. ',' . $row->category. ',' . $row->discount. ',' . $row->price. ',' . $row->stock. ',' . $row->sku. ',' . $row->promote. ',' . $row->visibility;
}

header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=product_badge_data" . Date('d-M') . '.csv');
echo $csv2;
exit;
