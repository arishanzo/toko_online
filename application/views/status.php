<div class="container-fluid">
    <div class="row">
        <table class="table mt-3 table-bordered">
            <tr class="text-center bg-primary text-light">
                <th>No</th>

                <th>Nama</th>
                <th>Alamat</th>
                <th>No Wa</th>
                <th>Pembayaran</th>
                <th>Total Pesanan</th>
                <th>Tanggal Pesan</th>
                <th>Status Pesan</th>
                <th coolspan="2">Struk</th>
                <th coolspan="2">Detail Produk</th>
            </tr>
            <?php
            $no = 1;
            foreach ($status as $sts) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?php echo $sts->nama ?></td>
                    <td><?php echo $sts->alamat ?></td>
                    <td><?php echo $sts->no_wa ?></td>
                    <td><?php echo $sts->pembayaran ?></td>
                    <td><?php echo "Rp." . number_format($sts->jmlh_pesanan, 0, ',', '.') ?></td>
                    <td><?php echo $sts->tgl_pesan ?></td>
                    <td>
                        <?php
                        if ($sts->status_code == '200') {
                        ?>
                            <span class="badge bg-success"> Berhasil Di Transfer </span>

                        <?php
                        } else {
                        ?>
                            <span class="badge bg-warning"> Pending </span>

                        <?php
                        }
                        ?>
                    </td>
                    <td coolspan="2">
                        <a href="<?= $sts->struk; ?>" target="_blank" class="btn btn-success btn-sm">Download</a>
                    </td>
                    <td>
                        <?php echo anchor('dashboard/detail/' . $sts->id_invoice, '<div  class="btn btn-sm btn-primary ms-2 me-2"  data-toggle="tooltip" title="Update">Lihat</div>') ?>

                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <div class="col-md-2"></div>
    </div>
</div>