<?php

//関数ファイルの読み込み
require_once __DIR__ . '/functions.php';

//初期化
$name = '';
$address = '';
$tel = '';
$email = '';
$like = '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = filter_input(INPUT_POST, 'name') ?? '';
    $address = filter_input(INPUT_POST, 'address') ?? '';
    $tel = filter_input(INPUT_POST, 'tel') ?? '';
    $email = filter_input(INPUT_POST, 'email') ?? '';
    $like = filter_input(INPUT_POST, 'like') ?? '';

    //バリデーション
    //ファンクション呼び出し
    $errors = msg_validate($name, $address, $tel, $email, $like);

    // バリデーション突破
    if (empty($errors)) {
        header('Location: thanks.php');
    }
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ご注文手続き</title>
    <link rel="icon" href="img/gunma_icon.png">

    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/ress@3.0.0/dist/ress.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body class="message_body">
    <div class="msg-wrapper">
        <h1 class="title">ご注文手続き</h1>

        <!-- エラーメッセージ -->
        <?php if ($errors) : ?>
            <ul class="errors">
                <?php foreach ($errors as $error) : ?>
                    <li><?= h($error) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <!-- フォーム作成雛形 -->
        <form action="" method="post">
            <label for="name">氏名</label>
            <input type="text" name="name" id="name" value="<?= h($name) ?>">
            <label for="address">住所</label>
            <input type="text" name="address" id="address" value="<?= h($address) ?>">
            <label for="tel">電話番号</label>
            <input type="tel" name="tel" id="tel" value="<?= h($tel) ?>">
            <label for="email">メールアドレス</label>
            <input type="email" name="email" id="email" value="<?= h($email) ?>">

            <div class="gunma-btn">
                <label for="like">群馬県は好きですか？</label>
                <input type="radio" name="like" id="like">好き
                <input type="radio" name="like" id="like" disabled>嫌い
            </div>

            <div class="btn-area">
                <input type="submit" value="購入する" class="btn link-btn">
            </div>
        </form>
    </div>
</body>

</html>