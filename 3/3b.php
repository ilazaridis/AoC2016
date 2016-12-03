<?php
$inputs = explode(PHP_EOL, file_get_contents('input.txt'));
$inputs = array_map(function($e) {return preg_split('/\s+/', trim($e));}, $inputs);
$columns = array_merge(array_column($inputs, 0), array_column($inputs, 1), array_column($inputs, 2));
foreach ($columns as $key => $sides) {
    if ($key == 0 || $key % 3 == 0) {
        if ($columns[$key] + $columns[$key + 1] > $columns[$key + 2] &&
            $columns[$key] + $columns[$key + 2] > $columns[$key + 1] &&
            $columns[$key + 1] + $columns[$key + 2] > $columns[$key]
        ) {
            $countTriangles++;
        }
    }
}
echo $countTriangles;