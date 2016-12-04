<?php
$inputs = explode(PHP_EOL, file_get_contents('input.txt'));
$countTriangles = 0;
foreach ($inputs as $input) {
    $sides = preg_split('/\s+/', trim($input));
    if ($sides[0] + $sides[1] > $sides[2] &&
        $sides[0] + $sides[2] > $sides[1] &&
        $sides[1] + $sides[2] > $sides[0]) {
        $countTriangles++;
    }
}
echo $countTriangles;