<?php
$input = 'cxdnnyjw';
$counter = 0; $password = []; $requiredKeys = [0,1,2,3,4,5,6,7];
while(count(array_keys($password)) != 8) {
    while (substr(md5($input.$counter), 0, 5) !== '00000') {
        $counter++;
    }
    $position = substr(md5($input.$counter), 5, 1);
    if (in_array($position, $requiredKeys) && is_numeric($position) && !isset($password[$position])) {
        $password[substr(md5($input.$counter), 5, 1)] = substr(md5($input . $counter), 6, 1);
    }
    $counter++;
}
ksort($password, SORT_NUMERIC);
echo implode($password);