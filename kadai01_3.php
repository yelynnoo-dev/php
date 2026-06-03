<?php
$num = 1;
$word = '1';

echo 'num=', $num, '<br>';
echo 'word=', $word, '<br><br>';

if ($num == $word) {
    echo '==で比較したとき、numとwordは等しいです。<br>';
} else {
    echo '==で比較したとき、numとwordは等しくありません。<br>';
}

if ($num === $word) {
    echo '===で比較したとき、numとwordは等しいです。<br>';
} else {
    echo '===で比較したとき、numとwordは等しくありません。<br>';
}
