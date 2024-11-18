<?php
class ongkir extends CI_Controller
{
    private $api = "e06f700c48f85b5250aafe8d736e4165";

    public function prov()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: $this->api"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $data = json_decode($response, TRUE);
            $provinsi = $data["rajaongkir"]["results"];
            echo "<option value=''>--PILIH PROVINSI-- </option>";
            foreach ($provinsi as $key => $dataprov) {

                echo "<option value='" . $dataprov['province'] . "' idprov='" . $dataprov['province_id'] . "'>";
                echo $dataprov["province"];
                echo "</option>";
            }
        }
    }

    public function kota()
    {

        $id = $_POST['idprov'];
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$id",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: $this->api"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $data = json_decode($response, TRUE);
            $kota = $data["rajaongkir"]["results"];
            echo "<option value=''>--PILIH KOTA/KABUPATEN-- </option>";
            foreach ($kota as $key => $datakota) {

                echo "<option value='" . $datakota['city_name'] . "'
                idkota ='" . $datakota["city_id"] . "'
                nama_provinsi ='" . $datakota["province"] . "'
                kota ='" . $datakota["city_name"] . "'
                type ='" . $datakota["type"] . "'
                kodepos ='" . $datakota["postal_code"] . "'
                >";
                echo $datakota["city_name"];
                echo "</option>";
            }
        }
    }

    public function ongkir()
    {
        $ongkir = $_POST['ongkir'];
?>
        <input type="text" name="ongkir" id="" value="<?= $ongkir ?>" class="form-control">

    <?php
    }
    public function kurir()
    {
    ?>
        <option>-- PILIH EXPEDISI --</option>
        <option value="pos">POS INDONESIA</option>
        <option value="jne">JNE</option>
        <option value="tiki">TIKI</option>
<?php
    }

    public function layanan()
    {
        $expedisi = $_POST['expedisi'];
        $kota = $_POST['kota'];
        $berat = $_POST['berat'];
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=501&destination=" . $kota . "&weight=" . $berat . "&courier=" . $expedisi,
            CURLOPT_HTTPHEADER => array(
                "key: $this->api"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $data = json_decode($response, TRUE);
            $paket = $data["rajaongkir"]["results"]["0"]["costs"];
            echo "<option value=''>--PILIH KURIR-- </option>";
            foreach ($paket as $key => $datapaket) {

                echo "<option  
                kurir ='" . $datapaket["service"] . "'
                ongkir ='" . $datapaket["cost"]["0"]["value"]  . "'
                ekstimasi ='" . $datapaket["cost"]["0"]["etd"] . "'
               
                >";
                echo $datapaket["service"] . "-";
                echo $datapaket["cost"]["0"]["value"] . "-";
                echo $datapaket["cost"]["0"]["etd"];
                echo "</option>";
            }
        }
    }
}
