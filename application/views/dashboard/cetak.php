<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan Statistik</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/login/images/kabmadiun.png" />
    <link href="<?= base_url() ?>assets/css/report.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="container">
        <!-- Print Body -->
        <div id="body">
            <table>
                <tbody>
                    <tr>
                        <td align="center">
                            <?php if ($aksi != 'unduh') : ?>
                                <img src="<?= base_url(); ?>assets/img/logo-kab-madiun.png" alt="" style="width:100px; height:auto">
                            <?php endif ?>
                            <h1>DINAS PERPUSTAKAAN DAN KEARSIPAN KABUPATEN MADIUN </h1>
                            <h1 style="text-transform: uppercase;"></h1>
                            <h1>LAPORAN DATA STATISTIK PENGUNJUNG WEBSITE MY LITOUR</h1>
                            <h1>LAPORAN DATA STATISTIK PENGUNJUNG WEBSITE <?= strtoupper($main['judul']); ?></h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px 20px;">
                            <table class="border thick data">
                                <thead>
                                    <tr class="thick">
                                        <th class="thick">No</th>
                                        <th class="thick"><?= $main['lblx'] ?></th>
                                        <th class="thick">Pengunjung (Orang)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>

                                    <?php foreach ($main['dashboard'] as $data) : ?>
                                        <tr>
                                            <td class="thick" align="center" width="2"><?= $no++; ?></td>
                                            <td class="thick" align="center">
                                                <?= ($main['lblx'] == 'Bulan') ? getBulan($data['tanggal']) . ' ' . date('Y') : tgl_indo2($data['tanggal']); ?></td>
                                            <td class="thick" align="center"><?= ribuan($data['jumlah']); ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot class="bg-gray disabled color-palette">
                                    <tr>
                                        <th colspan="2" class="text-center">Total</th>
                                        <th class="text-center"><?= ribuan($main['total']); ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>