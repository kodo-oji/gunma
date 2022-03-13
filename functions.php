<?php

require_once __DIR__ . '/config.php';

function connect_db()
{
    try {
        return new PDO(
            DSN,
            USER,
            PASSWORD,
            [PDO::ATTR_ERRMODE =>
            PDO::ERRMODE_EXCEPTION]
        );
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function msg_validate($name, $address, $tel, $email, $like)
{
    $errors = [];

    // バリデーション
    if (empty($name)) {
        $errors[] = NAME_REQUIRED;
    }

    if (empty($address)) {
        $errors[] = ADDRESS_REQUIRED;
    }

    if (empty($tel)) {
        $errors[] = TEL_REQUIRED;
    }

    if (empty($email)) {
        $errors[] = EMAIL_REQUIRED;
    }

    if (empty($like)) {
        $errors[] = LIKE_REQUIRED;
    }

    return $errors;
}
