<?php

require_once __DIR__ . '/functions.php';

$name = isset($_POST['name']) ? htmlspecialchars($_POST['name'], ENT_QUOTES, 'utf-8') : '';
$price = isset($_POST['price']) ? htmlspecialchars($_POST['price'], ENT_QUOTES, 'utf-8') : '';
$count = isset($_POST['count']) ? htmlspecialchars($_POST['count'], ENT_QUOTES, 'utf-8') : '';



session_start();
if (isset($_SESSION['products'])) {
    $products = $_SESSION['products'];
    // カートに件数表示
    $product_count = array_sum(array_column($products, 'count'));
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

$products = isset($_SESSION['products']) ? $_SESSION['products'] : [];

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>最後の楽園 - 群馬県 -</title>
    <link rel="icon" href="img/gunma_icon.png">

    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/ress@3.0.0/dist/ress.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>


<body class="shopping_body">
    <div class="main_img">
        <img src="img/IMG_6100.jpg" alt="キャベツ畑の朝日">
        <h1>群馬県が呼んでいる</h1>
    </div>

    <section class="products">
        <div class="container">
            <h2 id="shop-title">群馬県の名産たち</h2>
            <nav>
                <a href="cart.php">
                    <i class="bi bi-bag-fill"></i>
                    カートを見る
                    <!-- カートからなら表示なし -->
                    <?php if ($product_count > 0):?>
                        <div class="cart-counts"><?= $product_count ?></div>
                    <?php endif; ?>
                </a>
            </nav>
            <ul>
                <li>
                    <a href="https://www.shimonita-negi.com/negi/sale/k_negi.html" target="_blank" rel="norefferrer">
                        <img src="img/negi.jpg" alt="下仁田ネギ">
                    </a>
                    <h3>下仁田ねぎ</h3>
                    <p>1束&emsp;300円</p>
                    <form action="cart.php" method="POST" class="item-form">
                        <input type="hidden" name="name" value="下仁田ネギ">
                        <input type="hidden" name="price" value="300">
                        <select name="count">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <button class="buy-btn" type="submit">カートに入れる</button>
                    </form>
                </li>
                <li>
                    <a href="https://www.town.shimonita.lg.jp/nourin-kensetu/m02/m01/m02/03.html" target="_blank" rel="norefferrer">
                        <img src="img/konnyaku.jpg" alt="下仁田こんにゃく">
                    </a>
                    <h3>下仁田こんにゃく</h3>
                    <p>1個&emsp;200円</p>
                    <form action="cart.php" method="POST" class="item-form">
                        <input type="hidden" name="name" value="下仁田こんにゃく">
                        <input type="hidden" name="price" value="200">
                        <select name="count">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <button class="buy-btn" type="submit">カートに入れる</button>
                    </form>
                </li>
                <li>
                    <a href="https://www.vill.tsumagoi.gunma.jp/kankou/product/" target="_blank" rel="norefferrer">
                        <img src="img/cabbage.jpg" alt="嬬恋キャベツ">
                    </a>
                    <h3>嬬恋キャベツ</h3>
                    <p>1玉&emsp;200円</p>
                    <form action="cart.php" method="POST" class="item-form">
                        <input type="hidden" name="name" value="嬬恋キャベツ">
                        <input type="hidden" name="price" value="200">
                        <select name="count">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <button class="buy-btn" type="submit">カートに入れる</button>
                    </form>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="https://story.nakagawa-masashichi.jp/craft_post/118156" target="_blank" rel="norefferrer">
                        <img src="img/daruma.jpg" alt="高崎だるま">
                    </a>
                    <h3>高崎だるま</h3>
                    <p>1個&emsp;30,000円</p>
                    <form action="cart.php" method="POST" class="item-form">
                        <input type="hidden" name="name" value="高崎だるま">
                        <input type="hidden" name="price" value="30000">
                        <select name="count">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        <button class="buy-btn" type="submit">カートに入れる</button>
                    </form>
                </li>
                <li>
                    <a href="https://gunma-dc.net/feature/yakimanjyu/" target="_blank" rel="norefferrer">
                        <img src="img/yaki.jpg" alt="焼きまんじゅう">
                    </a>
                    <h3>焼きまんじゅう</h3>
                    <p>1本&emsp;300円</p>
                    <form action="cart.php" method="POST" class="item-form">
                        <input type="hidden" name="name" value="焼きまんじゅう">
                        <input type="hidden" name="price" value="300">
                        <select name="count">
                            <option value="100">100</option>
                            <option value="200">200</option>
                            <option value="300">300</option>
                        </select>
                        <button class="buy-btn" type="submit">カートに入れる</button>
                    </form>
                </li>
                <li>
                    <a href="https://icotto.jp/presses/5650" target="_blank" rel="norefferrer">
                        <img src="img/men.jpg" alt="水沢うどん">
                    </a>
                    <h3>水沢うどん</h3>
                    <p>1杯&emsp;1,200円</p>
                    <form action="cart.php" method="POST" class="item-form">
                        <input type="hidden" name="name" value="水沢うどん">
                        <input type="hidden" name="price" value="1200">
                        <select name="count">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <button class="buy-btn" type="submit">カートに入れる</button>
                    </form>
                    </li">
            </ul>
            <ul>
                <li>
                    <a href="http://www.manzaonsen.gr.jp/introduction/index.php" target="_blank" rel="norefferrer">
                        <img src="img/manza.jpg" alt="万座温泉の源泉">
                    </a>
                    <h3>万座温泉の源泉</h3>
                    <p>1L&emsp;10,000円</p>
                    <form action="cart.php" method="POST" class="item-form">
                        <input type="hidden" name="name" value="万座温泉の源泉">
                        <input type="hidden" name="price" value="10000">
                        <select name="count">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <button class="buy-btn" type="submit">カートに入れる</button>
                    </form>
                </li>
                <li>
                    <a href="https://furusato-net.co.jp/bukken/searchResult.php?pref_code=10" target="_blank" rel="norefferrer">
                        <img src="img/yama.jpg" alt="山">
                    </a>
                    <h3>山</h3>
                    <p>1山&emsp;5,000,000円</p>
                    <p class="yama">入荷待ち</p>
                </li>
                <li>
                    <a href="http://www.bungyjapan.com/sarugakyo/" target="_blank" rel="norefferrer">
                        <img src="img/bangy2.jpg" alt="猿ヶ京バンジージャンプ">
                    </a>
                    <h3>猿ヶ京バンジージャンプ</h3>
                    <p>1回&emsp;12,000円</p>
                    <form action="cart.php" method="POST" class="item-form">
                        <input type="hidden" name="name" value="猿ヶ京バンジージャンプ">
                        <input type="hidden" name="price" value="12000">
                        <select name="count">
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                        <button class="buy-btn" type="submit">カートに入れる</button>
                    </form>
                </li>
            </ul>
        </div>
    </section>

    <footer>
        <div class="container">
            <small>(c)&nbsp;Naoto Haga（群馬県民代表）</small>
        </div>
    </footer>
</body>

</html>