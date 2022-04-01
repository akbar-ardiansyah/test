<?php

$numbers = [1, 3, 5, 6, 3, 2, 3, 8, 9, 10, 15, 13];

// Cari angka yang tidak ada didalam range, batas bawah angka terkecil, batas atas angka terbesar.
// Sehingga hasil output array yang didapat adalah seperti ini:

// Array
// (
//     [0] => 4
//     [1] => 7
//     [2] => 11
//     [3] => 12
//     [4] => 14
// )

// pada output array diatas bisa dilihat bahwa deretan angka 4,7,11,12,14 tidak terdapat didalam array $numbers


for ($i = 1; $i <= 15; $i++) {
    if (($key = array_search($i, $numbers)) !== FALSE) {
    } else {
        echo $i . "<br>";
    }
}
