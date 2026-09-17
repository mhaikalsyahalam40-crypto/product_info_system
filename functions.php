<?php

function hitungTotalNilaiStok($harga, $stok)
{
    return $harga * $stok;
}

function isStokKritis($stok)
{
    return $stok < 3;
}