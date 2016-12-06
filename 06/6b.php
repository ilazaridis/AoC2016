<?php
$inputs = explode(PHP_EOL, file_get_contents('input.txt'));
$inputs = array_map(function($e) {return str_split($e);}, $inputs);
$column = 0; $signal = '';
while (array_filter(array_column($inputs, $column))) {
    $frequency = array_count_values(array_column($inputs, $column));
    asort($frequency);
    $signal .= array_keys($frequency)[0];
    $column++;
}
echo $signal;