<?php
$inputs = explode(PHP_EOL, file_get_contents('input.txt'));
$calcChecksum = 0;
foreach ($inputs as $input) {
    preg_match_all('/(\w[^-]*)(?=[^-]*-)/', $input, $name);
    preg_match('/\-(\d+)\[/', $input, $sectorId);
    preg_match('/\[(\w+)\]/', $input, $checksum);
    $freq = array_count_values(str_split(implode($name[0])));
    array_multisort(array_values($freq), SORT_DESC, array_keys($freq), SORT_ASC, $freq);
    $calcChecksum +=  implode(array_slice(array_keys($freq),0,5)) == $checksum[1] ? $sectorId[1] : 0;
}
echo $calcChecksum;