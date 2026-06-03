<?php
require_once 'kadai06_resource.php';

// ① No product_id in GET → redirect
if (!isset($_GET['product_id'])) {
    header('Location: kadai06_1.php');
    exit;
}

$product_id = $_GET['product_id'];

// ② Find matching product
$product = null;
foreach ($products as $p) {
    if ($p['id'] == $product_id) {
        $product = $p;
        break;
    }
}

// No matching product → redirect
if ($product === null) {
    header('Location: kadai06_1.php');
    exit;
}

// ③ Save browsing history to cookie
$cookie_name = 'php1_kadai06';
$viewed_ids = [];

if (isset($_COOKIE[$cookie_name]) && $_COOKIE[$cookie_name] !== '') {
    $viewed_ids = explode(',', $_COOKIE[$cookie_name]);
}

// Add only if not already in history (no duplicates)
if (!in_array($product_id, $viewed_ids)) {
    $viewed_ids[] = $product_id;
}

setcookie($cookie_name, implode(',', $viewed_ids), time() + 60, '/');
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>php1 - kadai06_2</title>
</head>

<body>

  <!-- Header -->
  <header class="bg-info">
    <div class="text-light ms-5 pt-5 pb-3">
      <h1 class="h6">サーバーサイドスクリプト演習１</h1>
      <h2 class="pt-3">クッキー</h2>
    </div>
  </header>

  <!-- Main -->
  <main>
    <div class="container-field">

      <h2 class="p-5 d-grid gap-2 d-md-flex border-bottom" style="border-color:deeppink;">
        取り扱い商品の詳細
      </h2>

      <div class="p-5 row">

        <!-- Product image -->
        <div class="col-md-7">
          <figure class="img-fluid">
            <img style="width:100%;"
              src="./asset/images/<?= $product['thumbnail']['small'] ?>"
              alt="<?= htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8') ?>">
          </figure>
        </div>

        <!-- Product details -->
        <div class="col-md-3">
          <div class="row">

            <!-- Product name -->
            <h3><?= htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8') ?></h3>

            <!-- Description (null-safe to avoid deprecated warning) -->
            <p><?= htmlspecialchars($product['description'] ?? '', ENT_QUOTES, 'UTF-8') ?></p>

            <!-- Price -->
            <p style="color:deeppink;">
              ¥<?= number_format($product['price']) ?>
            </p>

            <!-- Back button -->
            <a class="mt-5 btn btn-secondary" href="kadai06_1.php">一覧に戻る</a>

          </div>
        </div>

      </div>
    </div>
  </main>

</body>
</html>