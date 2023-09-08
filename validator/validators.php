<?php

/**
 * @param $value
 * @return bool retourne true si la valeur n'est pas vide, sinon false
 */
function notBlank($value): bool
{
    return trim($value) != null; // test aussi "", false, 0, [], null
}

/**
 * @param $value
 * @return bool retourne true si la valeur est valide, sinon false
 */
function validName($name): bool
{
    if(preg_match('/^[a-zA-Z\-éèê]*$/', $name) === 1) {
        return true;
    }

    return false;
}

function validEmail($email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function fileNotBlank(array $file): bool
{
    if(!isset($file['error'])) {
        trigger_error('La clé "error" n\'a pas été trouvé dans le tableau $file' , E_USER_ERROR);
    }

    return $file['error'] !== UPLOAD_ERR_NO_FILE;
}

function validFileSize(array $file): bool
{
    if(!isset($file['error'])) {
        trigger_error('La clé "error" n\'a pas été trouvé dans le tableau $file' , E_USER_ERROR);
    }

    return $file['error'] !== UPLOAD_ERR_INI_SIZE && $file['error'] !== UPLOAD_ERR_FORM_SIZE;
}

function validFileType(array $file, array $mimes): bool
{
    if(!isset($file['type'])) {
        trigger_error('La clé "type" n\'a pas été trouvé dans le tableau $file' , E_USER_ERROR);
    }

    return in_array($file['type'], $mimes);
}






















