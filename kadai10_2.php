<?php

require_once __DIR__ . "/def.php";

// TODO:各入力値チェック用配列-------------------
$result = [
  "status"  => true,
  "message" => null,
  "result"  => null,
];


//商品名の空白文字を置き換え


//商品名が空かどうかのチェック


//価格が空かどうかのチェック


//エラーがなかったとき（条件つける）


//カテゴリのコードからカテゴリ名に置き換え


//DB登録処理ここから開始


// トランザクション開始


//executeの結果は$result配列に格納


// トランザクション確定


//登録完了の場合、完了メッセージを格納。


//DB切断


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>php1 - kadai10_2</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="w-100">

    <!-- ▼▼ヘッダー▼▼--------------------------------- -->
    <header class="bg-info">
      <div class="text-light ms-3 pt-4 pb-3">
        <h1 class="h6">サーバーサイドスクリプト演習１</h1>
        <h2 class="pt-3">データベース登録結果</h2>
      </div><!--/.container-->
    </header>
    <!-- ▲▲ヘッダー▲▲--------------------------------- -->

    <!-- ▼▼メイン▼▼----------------------------------- -->
    <main>

      <div class="form-control">

        <h3 class="border-bottom border-3 border-info mb-4 mt-2 pb-2">データベース登録結果</h3>

        <div id="frame" class="p-5 border-info rounded" style="border:1px dashed;">

          <!-- 処理結果表示 -->
          <div class="text-center">


            <p class="text-danger"></p>
          </div>
        </div>

        <div class="p-5 d-grid gap-2 d-md-flex justify-content-md-end">
          <a class="btn btn-secondary btn-lg" href="kadai10_1.php">戻る</a>
        </div>

      </div>
    </main>

  </div><!--/.w100-->

</body>

</html>