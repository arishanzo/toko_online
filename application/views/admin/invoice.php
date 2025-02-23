<div class="container-fluid">
    <h4>Invoice Pemesanan Produk</h4>
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>No</th>
            <th>ID Invoice</th>
            <th>Nama Pemesan</th>
            <th>Alamat Pengiriman</th>
            <th>Tanggal Pemesanan</th>

            <th>Aksi</th>
        </tr>
        <?php
        foreach ($invoice as $inv) : ?>
            <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $inv->id_invoice ?></td>
                <td><?php echo $inv->nama ?></td>
                <td><?php echo $inv->alamat ?></td>
                <td><?php echo $inv->tgl_pesan ?></td>

                <td>
                    <?php echo anchor('admin/invoice/detail/' . $inv->id_invoice, '<div class="btn btn-sm btn-primary">Detail</div>') ?>

                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <?= $this->pagination->create_links(); ?>
</div>