<?php
//必要ファイルがあれば、読み込むこと


//-------------

//kadai08_1からのGETデータを取得


//product_noがなければ、kadai08_1に戻って、処理終了


//product_noをキーにDBからレコードを取得


// 該当データが1件以外であれば、kadai08_1に戻って、処理終了



?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>kadai11_1 更新</title>
  <link href="" rel="stylesheet">
</head>

<body>
  <!-- ▼▼ヘッダー▼▼--------------------------------- -->
  <header class="bg-info">
    <div class="text-light ms-5 pt-5 pb-3">
      <h1 class="h6">サーバーサイドスクリプト演習１</h1>
      <h2 class="pt-3">データベース更新</h2>
    </div><!--/.text-light ms-5 pt-5 pb-3-->
  </header>
  <!-- ▲▲ヘッダー▲▲--------------------------------- -->

  <!-- ▼▼メイン▼▼----------------------------------- -->
  <main>
    <div class="form-control">
      <form action="" method="" novalidate>
        <div class="p-5 row">
          <div class="col-md-5">

            <!-- 商品番号 -->
            <div class="col">
              <label class="form-label" for="product_no">商品番号<em class="text-danger">※商品番号は変更不可</em></label>
              <input type="text" name="product_no" id="product_no" class="form-control form-control-lg border-info bg-light" value="" readonly>
            </div>

            <!-- カテゴリ＆価格 -->
            <div class="row">
              <div class="col">
                <!-- カテゴリ -->
                <label class="form-label" for="category">カテゴリ</label>
                <select class="form-select form-select-lg mb-3" name="category">
                  <option value="1">ピザ</option>
                  <option value="2">ドリンク</option>
                </select>
              </div><!-- .col -->
              <!-- 価格 -->
              <div class="col">
                <label class="form-label" for="price">価格</label>
                <input type="text" name="price" id="price" class="form-control form-control-lg border-info" placeholder="" value="">
              </div><!-- .col -->
            </div><!-- .row -->

            <!-- 商品名 -->
            <div class="col">
              <label class="form-label" for="pname">商品名</label>
              <input type="text" name="pname" id="pname" class="form-control form-control-lg border-info" placeholder="" value="">
            </div><!-- .col -->

          </div><!-- .col-md-5 -->

        </div><!-- .p-5 row -->

        <div class="p-5 d-grid gap-2 d-md-flex justify-content-md-start">
          <button type="submit" class="btn btn-danger btn-lg">更新</button>
          <a class="btn btn-secondary btn-lg" href="">戻る</a>
        </div><!-- .p-5 d-grid gap-2 d-md-flex justify-content-md-end -->
      </form>

    </div><!--/.form-control-->
  </main>
  <!-- ▲▲メイン▲▲------------------------------------ -->

</body>

</html>