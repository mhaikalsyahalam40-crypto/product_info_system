<?php

require_once 'products.php';
require_once 'functions.php';

$totalNilaiStok = 0;

foreach ($products as $product) {
    $totalNilaiStok += hitungTotalNilaiStok(
        $product['harga'],
        $product['stok']
    );
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Information System</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #000;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #ddd;
        }

        .stok-kritis {
            background-color: #ffcccc;
        }

        .total {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <h1>Product Information System</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
                <th>Nilai Stok</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($products as $product): ?>

                <?php
                $nilaiStok = hitungTotalNilaiStok(
                    $product['harga'],
                    $product['stok']
                );

                $class = isStokKritis($product['stok'])
                    ? 'stok-kritis'
                    : '';
                ?>

                <tr class="<?= $class ?>">
                    <td><?= $product['id'] ?></td>
                    <td><?= $product['nama'] ?></td>
                    <td><?= $product['kategori'] ?></td>
                    <td>Rp <?= number_format($product['harga'], 0, ',', '.') ?></td>
                    <td><?= $product['stok'] ?></td>
                    <td><?= $product['deskripsi'] ?></td>
                    <td>Rp <?= number_format($nilaiStok, 0, ',', '.') ?></td>
                </tr>

            <?php endforeach; ?>

        </tbody>
    </table>

    <div class="total">
        Total Nilai Seluruh Stok:
        Rp <?= number_format($totalNilaiStok, 0, ',', '.') ?>
    </div>

</body>
</html>