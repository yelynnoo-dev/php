<?php
// POST形式でなければ
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: sample05_1.php");
    exit;
}

$upFile = $_FILES["upfile"];

// 確認表示
echo "<pre>";
print_r($upFile);
echo "</pre>";

// 結果格納用配列
$result = [
    "status"  => true,
    "message" => null,
    "result"  => null,
];

// 画像チェック
if (!preg_match('/image/', $upFile["type"])) {
    $result["status"] = false;
    $result["message"] = "画像ファイル以外はアップロードできません";
}


//拡張子つきの画像ファイル名を「.」前後で分割。ファイル名と拡張子に分ける
$reFileName = date("YmdHis");           // date関数で日時を取得
$ext = explode(".", $upFile["name"]);   //ファイル名分割
$ext = $ext[count($ext) - 1];   // 連想配列の末尾＝拡張子のみ取得

//確認用に画面に連想配列の値を表示
echo "<pre>";
print_r($reFileName . "." . $ext); //日付のファイル名と拡張子を文字列連結して表示
echo "</pre>";


// 保存先
$moveFilePath = __DIR__ . "/asset/storage/{$upFile["name"]}";

// アップロード処理
if (move_uploaded_file($upFile["tmp_name"], $moveFilePath)) {

    $result["message"] = "ファイルのアップロードに成功しました";

    // 画像表示用URL
    $result["result"] =
        "http://localhost/PHP1/asset/storage/{$upFile["name"]}";
} else {

    $result["status"] = false;
    $result["message"] = "ファイルのアップロードに失敗しました";
}

?>

<!-- ファイル結果表示 -->
<div class="text-center">

    <?php if ($result["status"]) : ?>

        <figure class="d-inline-block me-1 mt-1 mb-5">
            <img class="img-fluid"
                src="<?= $result["result"] ?>">
        </figure>

        <p><?= $result["message"] ?></p>

    <?php else : ?>

        <p class="text-danger">
            <?= $result["message"] ?>
        </p>

    <?php endif ?>

</div>