<?php
$input = 'cxdnnyjw'; $counter = 0; $password = '';
for ($i=0; $i < strlen($input); $i++) {
    while (substr(md5($input.$counter), 0, 5) !== '00000') {
        $counter++;
    }
    $password .= substr(md5($input.$counter), 5, 1);
    $counter++;
}
echo $password;