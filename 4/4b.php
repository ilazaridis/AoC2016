<?php
$inputs = explode(PHP_EOL, file_get_contents('input.txt'));
$calcChecksum = 0;
foreach ($inputs as $input) {
    preg_match_all('/(\w[^-]*)(?=[^-]*-)/', $input, $name);
    preg_match('/\-(\d+)\[/', $input, $sectorId);
    preg_match('/\[(\w+)\]/', $input, $checksum);
    $freq = array_count_values(str_split(implode($name[0])));
    array_multisort(array_values($freq), SORT_DESC, array_keys($freq), SORT_ASC, $freq);
    $isRealRoom =  implode(array_slice(array_keys($freq),0,5)) == $checksum[1] ? true : false;
    if ($isRealRoom) {
        preg_match_all('/(.*)(?=[^-]*-)/', $input, $realName);
        $sentence = '';
        foreach (str_split($realName[0][0]) as $letter) {
            if ($letter == '-') {
                $sentence .= ' ';
            } else {
                $fc = ($sectorId[1] % 26 + ord($letter) - 97) % 26;
                $sentence .= chr($fc + 97);
            }
        }
        if ($sentence == 'northpole object storage') echo $sectorId[1];
    }
}