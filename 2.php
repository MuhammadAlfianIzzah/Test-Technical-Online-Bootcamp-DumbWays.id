<?php
function potong($tgl_lahir, $bulan)
{
    $cokelat = [2, 1, 3, 2, 2];
    $result = $tgl_lahir + $bulan;
    $ck = [];
    foreach ($cokelat as $key => $v) {
        $ck[] = $v;
    }
    return $ck[$result - 1];
}
echo potong(2, 3);
