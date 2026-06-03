<?php
session_start();
 
require_once "kadai06_resource.php";
?>
 
<!DOCTYPE html>
<html lang="ja">
 
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <!-- Bootstrap -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet">
 
  <title>php1 - kadai06_1</title>
</head>
 
<body>
 
  <!-- ▼▼ヘッダー▼▼ -->
  <header class="bg-info">
    <div class="text-light ms-5 pt-5 pb-3">
      <h1 class="h6">サーバーサイドスクリプト演習１</h1>
      <h2 class="pt-3">クッキー</h2>
    </div>
  </header>
 
  <!-- ▼▼メイン▼▼ -->
  <main>
    <div class="container-field">
 
      <h2 class="p-5 d-grid gap-2 d-md-flex">
        取り扱いクッキー
      </h2>
 
      <div class="row" style="border-top: 2px solid hotpink;">
 
        <?php foreach ($products as $product) { ?>
 
          <div class="col-sm-3 p-3">
 
            <div class="card h-100 shadow-sm" style="max-width:25rem;">
 
              <a
                class="link-secondary"
                style="text-decoration:none;"
                href="kadai06_2.php?product_id=<?= $product["id"] ?>">
 
                <img
                  class="img-fluid img-thumbnail h-50"
                  style="width:100%;"
                  src="./asset/images/<?= $product["thumbnail"]["small"] ?>">
 
                <div class="card-body">
 
                  <p class="card-text">
                    <?= $product["name"] ?>
                  </p>
 
                  <p
                    class="card-text"
                    style="color:hotpink;">
 
                    ¥<?= $product["price"] ?>
                  </p>
 
                </div>
 
              </a>
 
            </div>
 
          </div>
 
        <?php } ?>
 
      </div>
 
      <!-- 閲覧履歴 -->
      <div class="row">
 
        <h2
          class="p-5 d-grid gap-2 d-md-flex"
          style="border-bottom: 2px solid hotpink;">
 
          閲覧したクッキー
        </h2>
 
        <div
          class="col m-3"
          style="display: flex; overflow:auto;">
 
          <?php
 
          if (isset($_COOKIE["kadai06_2"])) {
 
            $cookie_ids = explode(",", $_COOKIE["kadai06_2"]);
 
            // 重複削除
            $cookie_ids = array_unique($cookie_ids);
 
            foreach ($cookie_ids as $id) {
 
              foreach ($products as $product) {
 
                if ($product["id"] == $id) {
          ?>
 
                  <div
                    class="card m-3"
                    style="max-width:10rem; min-width:10rem;">
 
                    <a
                      class="link-secondary"
                      style="text-decoration:none;"
                      href="kadai06_2.php?product_id=<?= $product["id"] ?>">
 
                      <img
                        class="img-fluid img-thumbnail h-50"
                        style="width:100%;"
                        src="./asset/images/<?= $product["thumbnail"]["small"] ?>">
 
                      <div class="card-body">
 
                        <p class="card-text">
                          <?= $product["name"] ?>
                        </p>
 
                        <p
                          class="card-text"
                          style="color:hotpink;">
 
                          ¥<?= $product["price"] ?>
                        </p>
 
                      </div>
 
                    </a>
 
                  </div>
 
          <?php
                }
              }
            }
          }
          ?>
 
        </div>
 
      </div>
 
    </div>
  </main>
 
</body>
 
</html>
 