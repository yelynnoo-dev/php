<?php
require_once __DIR__ . "/def.php";
require_once __DIR__ . "/utils.php";

// POSTじゃなければトップに戻す
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: kadai05_1.php");
    exit;
}

// 結果を入れる箱
$result = [
    "status"  => true,
    "message" => null,
    "result"  => null,
];

// アップロードされたファイル情報
$upFile = $_FILES["upfile"];

// エラーチェック
if ($upFile["error"] !== UPLOAD_ERR_OK) {

    $result["status"] = false;

    if ($upFile["error"] === UPLOAD_ERR_INI_SIZE || $upFile["error"] === UPLOAD_ERR_FORM_SIZE) {
        $result["message"] = "ファイルのサイズが大きすぎます";

    } else if ($upFile["error"] === UPLOAD_ERR_NO_FILE) {
        $result["message"] = "ファイルがありません";

    } else {
        $result["message"] = "ファイルのアップロードに失敗しました";
    }

// 画像ファイルかチェック
} else if (!preg_match('/image/', $upFile["type"])) {

    $result["status"] = false;
    $result["message"] = "画像ファイル以外はアップロードできません";

// 問題なければアップロード処理
} else {

    // 拡張子を取得 
    $nameParts = explode(".", $upFile["name"]);
    $ext = $nameParts[count($nameParts) - 1];

    // 新しいファイル名 
    $newFileName = date("YmdHis") . "." . $ext;

    // 保存先のパス
    $savePath = __DIR__ . "/asset/storage/" . $newFileName;

    // ファイルを保存
    if (move_uploaded_file($upFile["tmp_name"], $savePath)) {
        $result["message"] = "ファイルのアップロードに成功しました";
        $result["result"]  = "./asset/storage/" . $newFileName;

    } else {
        $result["status"]  = false;
        $result["message"] = "ファイルのアップロードに失敗しました";
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>php1 - kadai05_2</title>
  <link href="PHP1_Front（デスクトップに配置）/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="w-100">

    <header class="bg-info">
      <div class="text-light ms-3 pt-4 pb-3">
        <h1 class="h6">サーバーサイドスクリプト演習１</h1>
        <h2 class="pt-3">画像のアップロード結果</h2>
      </div>
    </header>

    <main>
      <div class="form-control">

        <h3 class="border-bottom border-3 border-info mb-4 mt-2 pb-2">
          アップロード結果
        </h3>

        <div id="frame" class="p-5 border-info rounded" style="border:1px dashed;">
          <div class="text-center">

            <?php if ($result["status"]) : ?>
              <figure class="d-inline-block me-1 mt-1 mb-5">
                <img class="img-fluid" src="<?= $result["result"] ?>">
              </figure>
              <p><?= $result["message"] ?></p>

            <?php else : ?>
              <p class="text-danger"><?= $result["message"] ?></p>

            <?php endif ?>

          </div>
        </div>

        <div class="p-5 d-grid gap-2 d-md-flex justify-content-md-end">
          <a class="btn btn-secondary btn-lg" href="kadai05_1.php">戻る</a>
        </div>

      </div>
    </main>

  </div>
</body>
</html>