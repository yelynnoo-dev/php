<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php1 - kadai03_1</title>
    <!-- TODO: -->
    <!-- bootstrapCSS読み込み -->
    <link href="PHP1_Front（デスクトップに配置）/css/bootstrap.min.css" rel="stylesheet">
</head>
<form action="sample01_4.php" method="POST">
    <label for="name" class="form-label">氏名</label>
    <input type="text" id="" class="form-control form-control-lg" name="name">
    <label for="tel" class="form-label">電話番号</label>
    <input type="text" id="" class="form-control form-control-lg" name="tel">
    <label for="address" class="form-label">住所</label>
    <input type="text" id="" class="form-control form-control-lg" name="address">
    <div class="p-5 d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="submit" class="btn btn-danger btn-lg">登録</button>
    </div>
</form>