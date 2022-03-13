<?php

require_once __DIR__ . '/functions.php';

$name = isset($_POST['name']) ? htmlspecialchars($_POST['name'], ENT_QUOTES, 'utf-8') : '';
$price = isset($_POST['price']) ? htmlspecialchars($_POST['price'], ENT_QUOTES, 'utf-8') : '';
$count = isset($_POST['count']) ? htmlspecialchars($_POST['count'], ENT_QUOTES, 'utf-8') : '';

$delete_name = isset($_POST['delete_name']) ? htmlspecialchars($_POST['delete_name'], ENT_QUOTES, 'utf-8') : '';

session_start();

if (isset($_SESSION['products'])) {
    $products = $_SESSION['products'];
    foreach ($products as $key => $product) {
        if ($key == $name) {
            $count = (int)$count + (int)$product['count'];
        }
    }
}

if ($name != '' && $count != '' && $price != '') {
    $_SESSION['products'][$name] = [
        'count' => $count,
        'price' => $price
    ];
}

$total = 0;

if ($delete_name != '') unset($_SESSION['products'][$delete_name]);


$products = isset($_SESSION['products']) ? $_SESSION['products'] : [];

foreach ($products as $name => $product) {
    //各商品の小計を取得
    $subtotal = (int)$product['price'] * (int)$product['count'];
    //各商品の小計を$totalに足す
    $total += $subtotal;
}

// バリデーション
$total_num = '';

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     if (empty($_POST['message'])) {
//         $err_msg = '';
//     }
// }

?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>カート</title>
    <link rel="icon" href="img/gunma_icon.png">

    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/ress@3.0.0/dist/ress.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="cart-title">
        <h2>カート内</h2>
    </div>
    <main>
        <div class="cart-container">
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>商品名</th>
                        <th>価格</th>
                        <th>個数</th>
                        <th>小計</th>
                        <!-- ネタのため、あとでコメントアウト -->
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $name => $product) : ?>
                        <tr>
                            <!-- ラベルの商品名消してある -->
                            <td label=""><?php echo $name; ?></td>
                            <td label="" class="text-right">¥<?php echo number_format($product['price']); ?></td>
                            <td label="" class="text-right"><?php echo $product['count']; ?></td>
                            <td label="" class="text-right">¥<?php echo number_format($product['price'] * $product['count']); ?></td>

                            <!-- ネタのため、あとでコメントアウト -->
                            <td>
                                <form action="cart.php" method="post">
                                    <input type="hidden" name="delete_name" value="<?php echo $name; ?>">
                                    <button type="submit" class="btn btn-red">削除</button>
                                </form>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                    <tr class="total">
                        <th colspan="3">合計</th>
                        <td colspan="2">¥<?php echo number_format($total); ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="cart-btn">
                <!-- <table>
                    <a href="message.php" type="submit" class="btn btn-buy">ご注文手続きへ</a>
                </table> -->
                <a href="shopping.php#shop-title" type="submit" class="btn btn-push">もっと買う</a>
            </div>
        </div>
    </main>
    <div class="scroll">
        <div class="scroll-container">
            <div class="chevron"></div>
            <div class="chevron"></div>
            <div class="chevron"></div>
            <span class="scroll-text">Scroll down</span>
        </div>
    </div>
    <div class="cart-btn-up">今がチャンス！</div>
    <div class="cart-btn">
        <table>
            <a href="shopping.php#shop-title" type="submit" class="btn btn-push-2">もっと買う</a>
            <a href="message.php" type="submit" class="btn btn-buy">ご注文手続きへ</a>
        </table>
    </div>
</body>

</html>