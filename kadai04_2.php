<?php

require_once("kadai03_resource.php");

require_once("kadai04_utils.php");

$postData = [];
$viewData = [];

$postData["department"] = filter_input(INPUT_POST, "department", FILTER_VALIDATE_INT);
$postData["course"] = filter_input(INPUT_POST, "course", FILTER_VALIDATE_INT);

$postData["name"] = filter_input(INPUT_POST, "name");
$postData["kana"] = filter_input(INPUT_POST, "kana");
$postData["note"] = filter_input(INPUT_POST, "note");

$postData["name"] = trim($postData["name"]);
$postData["kana"] = trim($postData["kana"]);
$postData["note"] = trim($postData["note"]);

$postData["name"] = mb_convert_kana($postData["name"], "sKV", "UTF-8");
$postData["kana"] = mb_convert_kana($postData["kana"], "sKV", "UTF-8");


if ($postData["name"] !== "") {
    $viewData["name"] = $postData["name"];
} else {
    $viewData["name"] = "名前が入力されていません";
}


if ($postData["kana"] !== "") {
    $viewData["kana"] = $postData["kana"];
} else {
    $viewData["kana"] = "フリガナが入力されていません";
}

$viewData["note"] = $postData["note"];

$department = $postData["department"] - 1;
$viewData["department"] =
    $departments[$department]["d_name"] .
    "(" .
    $departments[$department]["d_years"] .
    "年制）";


$course = $postData["course"] - 1;
$viewData["course"] =
    $courses[$course]["c_name"];

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>php1 - kadai04_2</title>

    <link href="PHP1_Front（デスクトップに配置）/css/bootstrap.min.css" rel="stylesheet">

    <style>
        p.note-height {
            height: 85%;
        }
    </style>
</head>

<body>

<div class="w-100">

    <header class="bg-info">
        <div class="text-light ms-5 pt-5 pb-3">
            <h1 class="h6">サーバーサイドスクリプト演習１</h1>
            <h2 class="pt-3">form送信（POST）の結果画面</h2>
        </div>
    </header>

    <main>

        <div class="form-control">

            <div class="p-5 row">

                <div class="col-md-7">

                    <div class="row">

                        <!-- 学科 -->
                        <div class="col">
                            <label class="form-label">学科</label>
                            <p class="form-control form-control-lg border-info">
                                <?= h($viewData["department"]) ?>
                            </p>
                        </div>

                        <!-- コース -->
                        <div class="col">
                            <label class="form-label">コース</label>
                            <p class="form-control form-control-lg border-info">
                                <?= h($viewData["course"]) ?>
                            </p>
                        </div>

                    </div>

                    <!-- 名前 -->
                    <div class="col">
                        <label class="form-label">名前</label>
                        <p class="form-control form-control-lg border-info">
                            <?= h($viewData["name"]) ?>
                        </p>
                    </div>

                    <!-- フリガナ -->
                    <div class="col">
                        <label class="form-label">フリガナ</label>
                        <p class="form-control form-control-lg border-info">
                            <?= h($viewData["kana"]) ?>
                        </p>
                    </div>

                </div>

                <!-- 備考 -->
                <div class="col mh-100">
                    <label class="form-label">備考</label>
                    <p class="form-control form-control-lg border-info note-height">
                        <?= nl2br(h($viewData["note"])) ?>
                    </p>
                </div>

            </div>

            <div class="p-5 d-grid gap-2 d-md-flex justify-content-md-end">

                <!-- 戻る -->
                <a class="btn btn-secondary btn-lg me-md-5" href="kadai04_1.php">
                    戻る
                </a>

                <a class="btn btn-danger btn-lg" href="#">
                    送信
                </a>

            </div>

        </div>

    </main>

</div>

</body>
</html>