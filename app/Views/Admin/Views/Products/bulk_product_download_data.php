<?php
$csv2 = 'product_id,badge_text';
foreach ($data as $row) {
    $csv2 = $csv2 . '
' . $row->product_id . ',' . $row->badge_text;
}

header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=product_badge_data" . Date('d-M') . '.csv');
echo $csv2;
exit;
