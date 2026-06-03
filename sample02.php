<?php
$list = [
    'name' => 'ECC 太郎',
    'class' => '1A'
];

foreach ($list as $index) {
    echo $index . '<br>';
}

$id = 12345678;
$name = 'ECC 太郎';
$homeClass = 'SE2B';
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTMLによる画面表示</title>
</head>

<body>
    <h1>HTMLでの表示</h1>

    <!-- 第1段階 -->
    <h2>php echoでの表示</h2>
    <?php echo "<p>ID:{$id}</p><p>名前：{$name}</p><p>クラス：{$homeClass}</p>"; ?>

    <!-- 第2段階 -->
    <h2>タグにPHP変数埋め込み</h2>
    <p>ID:<?= $id ?></p>
    <p>名前:<?= $name ?></p>
    <p>クラス:<?= $homeClass ?></p>
</body>

</html>