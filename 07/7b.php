<?php
$inputs = explode(PHP_EOL, file_get_contents('input.txt')); $counter = 0;
foreach ($inputs as $input) {
    preg_match_all('/((\w)(\w)(?!\3)\2(?![^\[\]]*\])).*\3\2\3(?=[^\[\]]*\])/', $input, $outOfBrackets);
    preg_match_all('/((\w)(\w)(?!\3)\2(?=[^\[\]]*\])).*\3\2\3(?![^\[\]]*\])/', $input, $inBrackets);
    if (array_filter($outOfBrackets[1]) || array_filter($inBrackets[1])) $counter++;
}
echo $counter;