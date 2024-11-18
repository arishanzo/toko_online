<div class="container-fluid">
    <div class="row">

        <div class="col-md-2"></div>
        <div class="col-md-8">

            <?php
            $grand_total = 0;
            $berat = 0;
            if ($keranjang = $this->cart->contents()) {
                foreach ($keranjang as $item) {
                    $grand_total = $grand_total + $item['subtotal'];
                    $berat = $berat + $item['berat'];
                }

            ?>


                <h3>Komfirmasi Pembayaran</h3>
                <form id="payment-form" method="get" action="<?= site_url() ?>/snap/finish">

                    <input type="hidden" name="result_type" id="result-type" value="">

                    <input type="hidden" name="result_data" id="result-data" value="">


                    <input type="hidden" name="id" id="id" value="<?= $this->session->userdata('id') ?>">
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" name="nama" placeholder="nama" id="nama" class="form-control" value="<?= $komfirmasi['nama'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Provinsi</label>

                        <input type="text" name="provinsi" id="provinsi" value="<?= $komfirmasi['provinsi'] ?>" readonly class="form-control">

                    </div>
                    <div class="form-group">
                        <label for="">Kota/Kabupaten</label>

                        <input type="text" name="kota" id="kota" value="<?= $komfirmasi['kota'] ?>" readonly class="form-control">


                    </div>
                    <div class="form-group">
                        <label for="">Jasa Pengiriman</label>
                        <input name="expedisi" id="expedisi" value="<?= $komfirmasi['expedisi'] ?>" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Paket</label>
                        <input type="text" name="paket" id="paket" value="<?= $komfirmasi['paket'] ?>" readonly class="form-control">

                    </div>
                    <div class="form-group">
                        <label for="">Ongkir</label>
                        <input type="text" name="ongkir" id="ongkir" class="form-control" value="<?= $komfirmasi['ongkir'] ?>" required readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Alamat Lengkap</label>
                        <input type="text" name="alamat" placeholder="alamat" id="alamat" class="form-control" value="<?= $komfirmasi['alamat'] ?>" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="">No. Telepon</label>
                        <input type="text" name="no_telp" placeholder="noaktif" id="no_telp" class="form-control" required value="<?= $komfirmasi['no_telp'] ?>" readonly>
                    </div>

                    <?php

                    $bayar = $komfirmasi['ongkir'] +  $komfirmasi['belanja'];
                    ?>
                    <div class="form-group">
                        <label for="">Total Belanja</label>
                        <input type="text" name="bayar" placeholder="" id="bayar" value="<?= $bayar ?>" class="form-control" readonly>
                    </div>
                    <button id="pay-button" class="btn btn-success">Pilih Metode Pembayaran</button>
                    <a href="<?php echo base_url() ?>dashboard/pembayaran" class=" btn btn-danger">Kembali</a>

                </form>

                <script type="text/javascript">
                    $('#pay-button').click(function(event) {
                        event.preventDefault();
                        $(this).attr("disabled", "disabled");
                        var berat = $("input[name=berat]").val();
                        var nama = $("#nama").val();
                        var provinsi = $("provinsi").val();
                        var kota = $("#kota").val();
                        var expedisi = $("#expedisi").val();
                        var paket = $("#paket").val();
                        var ongkir = $("#ongkir").val();
                        var alamat = $("#alamat").val();
                        var no_telp = $("#no_telp").val();
                        var bayar = $("#bayar").val();

                        $.ajax({
                            type: 'POST',
                            url: '<?= site_url() ?>/snap/token',
                            data: {
                                nama: nama,
                                provinsi: provinsi,
                                kota: kota,
                                expedisi: expedisi,
                                paket: paket,
                                ongkir: ongkir,
                                alamat: alamat,
                                no_telp: no_telp,
                                bayar: bayar,
                            },
                            cache: false,

                            success: function(data) {
                                //location = data;

                                console.log('token = ' + data);

                                var resultType = document.getElementById('result-type');
                                var resultData = document.getElementById('result-data');

                                function changeResult(type, data) {
                                    $("#result-type").val(type);
                                    $("#result-data").val(JSON.stringify(data));
                                    //resultType.innerHTML = type;
                                    //resultData.innerHTML = JSON.stringify(data);
                                }

                                snap.pay(data, {

                                    onSuccess: function(result) {
                                        changeResult('success', result);
                                        console.log(result.status_message);
                                        console.log(result);
                                        $("#payment-form").submit();
                                    },
                                    onPending: function(result) {
                                        changeResult('pending', result);
                                        console.log(result.status_message);
                                        $("#payment-form").submit();
                                    },
                                    onError: function(result) {
                                        changeResult('error', result);
                                        console.log(result.status_message);
                                        $("#payment-form").submit();
                                    }
                                });
                            }
                        });
                    });
                </script>
            <?php

            } else {
                echo "Keranjang Belanja anda Masih Kosong";
            } ?>
        </div><br><br>

        <div class="col-md-2"></div>
    </div>
</div>