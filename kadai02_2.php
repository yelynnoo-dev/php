<?php
$fruits = ['りんご', 'バナナ', '苺', 'ぶどう', 'キウイ'];
$vegatable = ['キャベツ', '人参', 'ピーマン', '茄子', 'かぼちゃ'];

echo '<pre>';
var_dump($fruits, $vegatable);
echo '</pre>';

$food = [$fruits,$vegatable];
echo '<pre>';
var_dump($food);
echo '</pre>';

echo '$food2行3列目は、'.$food[1][2].'です。';
?>