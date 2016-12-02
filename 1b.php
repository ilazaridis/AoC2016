<?php

$inputs = 'R1, R1, R3, R1, R1, L2, R5, L2, R5, R1, R4, L2, R3, L3, R4, L5, R4, R4, R1, L5, L4, R5, R3, L1, R4, R3, L2, L1, R3, L4, R3, L2, R5, R190, R3, R5, L5, L1, R54, L3, L4, L1, R4, R1, R3, L1, L1, R2, L2, R2, R5, L3, R4, R76, L3, R4, R191, R5, R5, L5, L4, L5, L3, R1, R3, R2, L2, L2, L4, L5, L4, R5, R4, R4, R2, R3, R4, L3, L2, R5, R3, L2, L1, R2, L3, R2, L1, L1, R1, L3, R5, L5, L1, L2, R5, R3, L3, R3, R5, R2, R5, R5, L5, L5, R2, L3, L5, L2, L1, R2, R2, L2, R2, L3, L2, R3, L5, R4, L4, L5, R3, L4, R1, R3, R2, R4, L2, L3, R2, L5, R5, R4, L2, R4, L1, L3, L1, L3, R1, R2, R1, L5, R5, R3, L3, L3, L2, R4, R2, L5, L1, L1, L5, L4, L1, L1, R1';

$inputs = explode(', ', $inputs);
$x = $y = 0;
$previousX = $previousY = -1;
$directionX = $directionY = 0;
$coordinates = [];
foreach ($inputs as $key => $input) {
    $direction = substr($input, 0, 1);
    $step = substr($input, 1);
    if ($key % 2 == 0) {
        $previousX = $x;
        $x += ($direction == 'L') ? (($y > $previousY) ? -$step : $step) : ($y > $previousY ? $step : -$step);
        if ($x > $previousX) {
            for ($i = $previousX; $i < $x; $i++) {
                $coordinates[] = $i . ':' . $y;
            }
        } else {
            for ($i = $previousX; $i > $x; $i--) {
                $coordinates[] = $i . ':' . $y;
            }
        }
    } else {
        $previousY = $y;
        $y += ($direction == 'L') ? (($x > $previousX) ? $step : -$step) : ($x > $previousX ? -$step : $step);
        if ($y > $previousY) {
            for ($i = $previousY; $i < $y; $i++) {
                $coordinates[] = $x . ':' . $i;
            }
        } else {
            for ($i = $previousY; $i > $y; $i--) {
                $coordinates[] = $x . ':' . $i;
            }
        }
    }
}
$dupes = array_diff_assoc($coordinates, array_unique($coordinates));
preg_match('/^(-?\d*)\:(-?\d*)$/', reset($dupes), $matches);
echo 'First point visited twice is: ' . $matches[0] . '. Distance: ' . (abs($matches[1]) + abs($matches[2]));