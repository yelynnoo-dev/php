<?php
$total;
$price = 1200;
$tax = '1.1';

$total = $price * $tax;
echo gettype($tax) . "<br>";
echo $total;
