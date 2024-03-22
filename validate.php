<?php

require "helper.php";


$fieldsValidate = validate([
    "name"  => 's',
    "age"   => 'i',
    "kg"    => 'f',
    "email" => 'e',
    "url"   => 'u',
]);

echo '<pre>';
print_r($fieldsValidate);
exit;
echo '</pre>';
