<?php
$fruits = [
    'apple' => 220,
    'banana' => 110,
    'strawberry' => 490,
    'grape' => 550,
    'kiwi' => 160
];

echo '<pre>';
var_dump($fruits);
echo '</pre>';

$vegatable = [
    'cabbage' => 130,
    'carrot' => 80,
    'greenpepper' => 120,
    'eggplant' => 160,
    'pumpkin' => 240
];

echo 'foodの内容を表示';
echo '<pre>';
var_dump($fruits, $vegatable);
echo '</pre>';

echo '【第3段階】配列$fruitsの中身をforeachで順番に表示します。<br>';
foreach ($fruits as $name => $price) {
    echo $name . ':' . $price . '円<br>';
}

$food = [
    $fruits = [
        'apple' => 220,
        'banana' => 110,
        'strawberry' => 490,
        'grape' => 550,
        'kiwi' => 160
    ],
    $vegatable = [
        'cabbage' => 130,
        'carrot' => 80,
        'greenpepper' => 120,
        'eggplant' => 160,
        'pumpkin' => 240
    ]
];

echo '<br>【第4段階】配列$foodの中身をforeachで種別ごとに、順番に表示します。<br>';
foreach ($food as $type => $detail) {
    echo '種別:' . $type . '<br>';
    foreach ($detail as $name => $price) {
        echo '商品名:'.$name . "\t/\t価格:" . $price . '円<br>';
    }
    echo'-------------------------------------------<br>';
}
?>