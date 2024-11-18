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

                <h3>Input Alamat Pengiriman dan Pembayaran</h3>
                <form action="<?php echo base_url() ?>dashboard/komfirmasi_pesanan" method="POST">
                    <div class="form-group">
                        <div class="form-group" hidden>
                            <label for="">berat</label>
                            <input type="text" name="berat" placeholder="totalbelanja" id="berat" hidden value="<?= $berat ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group" hidden>
                            <label for="">Total Belanja</label>
                            <input type="text" name="belanja" placeholder="totalbelanja" id="belanja" hidden value="<?= $grand_total ?>" class="form-control" readonly>
                        </div>
                        <label for="">Nama Lengkap</label>
                        <input type="text" name="nama" placeholder="nama" id="prov" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Provinsi</label>
                        <select name="prov" id="prov" class="form-control" required>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Kota/Kabupaten</label>
                        <select name="kota" id="kota" class="form-control" required>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Jasa Pengiriman</label>
                        <select name="expedisi" id="" class="form-control" required>
                            <option>-- PILIH EXPEDISI -</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">PILIH PAKET</label>
                        <select name="paket" id="" class="form-control" required>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Ongkir</label>
                        <input type="text" name="ongkir" id="" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Alamat Lengkap</label>
                        <input type="text" name="alamat" placeholder="alamat" id="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">No. Telepon</label>
                        <input type="text" name="no_telp" placeholder="noaktif" id="" class="form-control" required>
                    </div>


                    <script>
                        $(document).ready(function() {
                            $.ajax({
                                type: 'post',
                                url: '<?= base_url() ?>ongkir/prov',
                                success: function(hasil) {
                                    $("select[name=prov]").html(hasil);
                                    console.log(hasil);
                                }
                            });
                            $("select[name=prov]").on("change", function() {
                                var provinsiterpilih = $("option:selected", this).attr("idprov");
                                $.ajax({
                                    type: 'post',
                                    url: '<?= base_url() ?>ongkir/kota',
                                    data: 'idprov=' + provinsiterpilih,
                                    success: function(hasilkota) {
                                        $("select[name=kota]").html(hasilkota);
                                        console.log(hasilkota);
                                    }
                                })
                            });
                            $.ajax({
                                type: 'post',
                                url: '<?= base_url() ?>ongkir/kurir',
                                success: function(hasilkurir) {
                                    $("select[name=expedisi]").html(hasilkurir);
                                    console.log(hasilkurir);
                                }
                            });

                            $("select[name=expedisi]").on("change", function() {
                                var expedisiterpilih = $("select[name=expedisi]").val();
                                var kotaterpilih = $("option:selected", "select[name=kota]").attr("idkota");
                                var berat = $("input[name=berat]").val();
                                $.ajax({
                                    type: 'post',
                                    url: '<?= base_url() ?>ongkir/layanan',
                                    data: 'expedisi=' + expedisiterpilih + '&kota=' + kotaterpilih + '&berat=' + berat,
                                    success: function(hasilpaket) {
                                        $("select[name=paket]").html(hasilpaket);

                                        console.log(hasilpaket);
                                    }
                                })
                            });

                        });

                        $("select[name=paket]").on("change", function() {

                            var ongkirtotal = $("option:selected", this).attr("ongkir");


                            $("input[name=ongkir]").val(ongkirtotal);



                        });
                    </script>


                    <a href="<?php echo base_url() ?>dashboard/detail_keranjang" class=" btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-success">Lanjutkan Pemesanan</button>
                </form>
            <?php
            } else {
                echo "Keranjang Belanja anda Masih Kosong";
            } ?>
        </div><br><br>

        <div class="col-md-2"></div>
    </div>
</div>