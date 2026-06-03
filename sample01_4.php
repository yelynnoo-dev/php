<?php
//パターン１
//グローバル変数を各変数にそのまま取得
$name = $_POST["name"];
$tel = $_POST["tel"];
$address = $_POST["address"];

//パターン２
//グローバル変数を連想配列にそのまま取得
$result["name"] = $_POST["name"];
$result["tel"] = $_POST["tel"];
$result["address"] = $_POST["address"];


//パターン３
//filter_input関数を用いて、変数に取得
$name = filter_input(INPUT_POST, "name");
$tel = filter_input(INPUT_POST, "tel", FILTER_VALIDATE_INT);
$address = filter_input(INPUT_POST, "address");

//パターン４
//filter_input関数を用いて、連想配列に取得
$result["name"] = filter_input(INPUT_POST, "name");
$result["tel"] = filter_input(INPUT_POST, "tel", FILTER_VALIDATE_INT);
$result["address"] = filter_input(INPUT_POST, "address");

//mb_convert_kanaで「名前」「住所」を変換。
// s→スペース「全角」→「半角」
// K→カタカナ「半角」→「全角」
// V→濁点付きの文字を1文字に変換。

$result["name"] = mb_convert_kana($result["name"], "sKV", "UTF-8");
$result["address"] = mb_convert_kana($result["address"], "sKV", "UTF-8");

//trimで「名前」「住所」の前後空白を除去。
$result["name"] = trim($result["name"]);
$result["address"] = trim($result["address"]);

// echo $name . "<br>";
// echo $tel . "<br>";
// echo $address . "<br>";

// echo "<pre>";
// print_r($result);
// echo "</pre>";
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php1 - kadai03_1</title>
    <!-- TODO: -->
    <!-- bootstrapCSS読み込み -->
    <link href="PHP1_Front（デスクトップに配置）/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- ▼▼コンテンツ全体▼▼---------------------------------- -->
    <div class="w-100">

        <!-- ▼▼ヘッダー▼▼--------------------------------- -->
        <header class="bg-dark">
            <div class="text-light ms-5 pt-5 pb-3">
                <h1 class="h6">サーバーサイドスクリプト演習１</h1>
                <h2 class="pt-3">サンプル</h2>
            </div><!--/.container-->
        </header>
        <!-- ▲▲ヘッダー▲▲--------------------------------- -->

        <!-- ▼▼メイン▼▼----------------------------------- -->
        <main>
            <div class="form-control">
                <h2 class="pt-3">form送信（POST）の結果画面</h2>
                <p>入力画面から受け取った値</p>
                <p class="form-control form-control-lg"><?= $name ?></p>
                <p class="form-control form-control-lg"><?= $tel ?></p>
                <p class="form-control form-control-lg"><?= $address ?></p>


            </div><!--/.container-->
        </main>
        <!-- ▲▲メイン▲▲------------------------------------ -->

    </div>
    <!-- ▲▲コンテンツ全体▲▲---------------------------------- -->
</body>

</html>　