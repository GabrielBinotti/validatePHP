<?php

function validate(array $fields)
{
    $req = typeRequest();

    $arrayValidate = [];

    foreach ($fields as $field => $type) {
        switch ($type) {
            case 'e':
                $arrayValidate[$field] = filter_var($req[$field], FILTER_VALIDATE_EMAIL );
                break;
            case 'f':
                $arrayValidate[$field] = filter_var($req[$field], FILTER_SANITIZE_NUMBER_FLOAT);
                break;
            case 'i':
                $arrayValidate[$field] = filter_var($req[$field], FILTER_SANITIZE_NUMBER_INT);
                break;
            case 'p':
                $arrayValidate[$field] = filter_var($req[$field], FILTER_VALIDATE_IP);
                break;
            case 'u':
                $arrayValidate[$field] = filter_var($req[$field], FILTER_VALIDATE_URL);
                break;
            default:
                $arrayValidate[$field] = filter_var($req[$field], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                break;
        }
    }

    return (object) $arrayValidate;
}


function typeRequest(){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        return $_POST;
    }

    return $_GET;
}
