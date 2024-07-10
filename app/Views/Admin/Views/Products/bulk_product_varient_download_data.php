<?php
$csv2 = 'product_id,option_name,option_value,option_price,option_stock,order';
foreach ($data as $row) {
    $csv2 = $csv2 . '
' . $row->product_id . ',' . $row->option_name. ',' . $row->option_value. ',' . $row->option_price. ',' . $row->option_stock. ',' . $row->order;
}

header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=product_varient_data" . Date('d-M') . '.csv');
echo $csv2;
exit;
