<?php
$inputs = explode(PHP_EOL, file_get_contents('input.txt')); $counter = 0;
foreach ($inputs as $input) {
    preg_match_all('/\[[a-z]*((.)(.)(?!\2)\3\2)+[a-z]*\]/', $input, $inBrackets);
    if (array_filter($inBrackets[1])) continue;
    preg_match_all('/[a-z]*((.)(.)(?!\2)\3\2)+[a-z]*(?:\[[^]]*\])?/', $input, $outOfBrackets);
    if (array_filter($outOfBrackets[1])) $counter++;
}
echo $counter;