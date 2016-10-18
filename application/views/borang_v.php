<?php
$this->load->helper('form');
$attributes = array('class' => 'form-horizontal', 'id' => 'form1', 'role' => "form");

echo form_open_multipart('submit', $attributes);
?>
<!--<form class="form-horizontal" role="form" name="myForm" enctype="multipart/form-data" action="<?php echo base_url("submit"); ?>" method="post" onsubmit="return validate()" id="form">-->
<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id ?>">
<fieldset>
    <legend>
        <div class="row">
            <div class="col-lg-2 col-md-12 col-sm-12">
                <p></p>
                <img src="<?php echo base_url("asset/img/pbb-logo.png"); ?>" alt="PBB" style="width: 120px;">
            </div>
            <div class="col-lg-10 col-md-12 col-sm-12">
                <p class="pull-left"><h2><b> PENDAFTARAN ONLINE </b></h2></p>
                <p class="pull-left"><h3><b> PARTI PESAKA BUMIPUTERA BERSATU </b></h3></p>
                <p class="pull-left"><h4> SARAWAK, MALAYSIA </h4></p>
                <p class="pull-left"><h3><b> BORANG PERMOHONAN KEAHLIAN PBB </b></h3></p>
                <p class="pull-left"><h4>Sila isi Borang Menggunakan Huruf Besar dan Tandakan yang Berkenaan Sahaja </h4></p>


            </div>

        </div>
    </legend>

    <!--<div class="form-group well">-->
    <?php
    $cawan_text = '<select class="form-control sel" id="inputCawangan" name="inputCawangan"> 
                        <option value="0">--Pilih Cawangan--</option>';

    foreach ($cawangan_selectlist as $row) {

        if ($row["dunid"] == $cawangan_dunid) {
            $cawan_text .= '<option value="' . $row["dunid"] . '" selected>' . $row["dunid"] . ' '. $row["dun"]. '</option>';
        } else {
            $cawan_text .= '<option value="' . $row["dunid"] . '">' . $row["dunid"] . ' '. $row["dun"]. '</option>';
        }
    }


    $cawan_text .= ' </select>';


    if (!empty($picture)) {

        echo '<div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="well">
                            <div class="form-group">
                                <label for="inputName" class="col-lg-2 col-md-2 col-sm-2 control-label text-left"><p class="text-left">Nama: </p></label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <input type="text" class="form-control upper" id="inputNama" name="inputNama" placeholder="Nama" value="' . $nama . '">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputCawangan" class="col-lg-2 col-md-2 col-sm-2 control-label text-left"><p class="text-left">Cawangan: </p></label>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">N </span>
                                        '.$cawan_text.'
                                    </div>
                                </div>

                                <label for="inputRanting" class="col-lg-2 col-md-2 col-sm-2 control-label text-left"><p class="text-left">Ranting: </p></label>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <input type="text" class="form-control upper" id="inputRanting" name="inputRanting" placeholder="" value="' . $ranting . '">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        
                                <img src="' . 'http://registration.pbb.org.my/uploads/' . $picture . '" alt="Image" style="max-width: 200px; max-height: 160px;">
                            
                    </div>';
    } else {
        echo '<div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="well">
                            <div class="form-group">
                                <label for="inputName" class="col-lg-2 col-md-2 col-sm-2 control-label text-left"><p class="text-left">Nama: </p></label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <input type="text" class="form-control upper" id="inputNama" name="inputNama" placeholder="Nama" value="' . $nama . '">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputCawangan" class="col-lg-2 col-md-2 col-sm-2 control-label text-left"><p class="text-left">Cawangan: </p></label>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">N </span>
                                        '.$cawan_text.'
                                    </div>
                                </div>

                                <label for="inputRanting" class="col-lg-2 col-md-2 col-sm-2 control-label text-left"><p class="text-left">Ranting: </p></label>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <input type="text" class="form-control upper" id="inputRanting" name="inputRanting" placeholder="" value="' . $ranting . '">
                                </div>
                            </div>
                        </div>
                    </div>
                    ';
    }
    ?>



    <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="well">
            <div class="form-group">
                <label class="col-lg-2 col-md-2 col-sm-2 control-label text-left"><p class="text-left">Tarikh Lahir: </p></label>
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <input type="text" class="form-control upper" id="inputtarikh" name="inputtarikh" placeholder="" value="<?php echo $tarikh; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputTempatLahir" class="col-lg-2 col-md-2 col-sm-2 control-label text-left"><p class="text-left">Tempat Lahir: </p></label>
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <input type="text" class="form-control upper" id="inputTempatLahir" name="inputTempatLahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>">
                </div>
            </div>

        </div>



        <div class="well">
            <div class="form-group">
                <label class="col-lg-2 col-md-2 col-sm-2 control-label">Jantina: </label>
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <?php
                    $lelaki = "";
                    $perempuan = "";
                    if ($jantina == "Lelaki") {
                        $lelaki = 'checked="checked"';
                        $perempuan = "";
                    } else if ($jantina == "Perempuan") {
                        $lelaki = '';
                        $perempuan = 'checked="checked"';
                    }
                    ?>
                    <label class="radio radio-inline">
                        <input type="radio" name="janitaRadio" id="janitaRadio1" value="Lelaki" <?php echo $lelaki; ?>>
                        Lelaki
                    </label>

                    <label class="radio radio-inline">
                        <input type="radio" name="janitaRadio" id="janitaRadio2" value="Perempuan" <?php echo $perempuan; ?>>
                        Perempuan
                    </label>


                </div>
            </div>
        </div>


        <div class="well">
            <div class="form-group">
                <label for="inputBaruLama" class="col-lg-3 col-md-2 col-sm-2 control-label text-left"><p class="text-left">No. Kad Pengenalan: </p></label>
                <div class="col-lg-9 col-md-10 col-sm-10">
                    <input type="text" class="form-control upper" id="inputBaru" name="inputBaru" value="<?php echo $ic_baru ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputBaruLama" class="col-lg-3 col-md-2 col-sm-2 control-label text-left"><p class="text-left"></p></label>
                <div class="col-lg-9 col-md-10 col-sm-10">
                    <input type="text" class="form-control upper" id="inputLama" name="inputLama" placeholder="Lama" value="<?php echo $ic_lama; ?>">
                </div>
            </div>
        </div>


        <div class="well">
            <div class="form-group">
                <label class="col-lg-2 col-md-2 col-sm-2 control-label">Alamat Rumah: </label>
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <textarea class="form-control" rows="3" id="Kediaman" name="Kediaman" placeholder="*Kediaman/Rumah"><?php echo $alamat_rumah; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 col-md-2 col-sm-2 control-label">Alamat Pejabat: </label>
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <textarea class="form-control" rows="3" id="office" name="office" placeholder="Pejabat"><?php echo $alamat_pejabat; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 col-md-2 col-sm-2 control-label">Alamat Surat: </label>
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <textarea class="form-control" rows="3" id="Surat" name="Surat" placeholder="Surat-Menyurat"><?php echo $alamat_surat; ?></textarea>
                </div>
            </div>

        </div>


    </div>

    <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="well">
            <div class="form-group">
                <label class="col-lg-2 col-md-2 col-sm-2 control-label">Agama: </label>
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <select class="form-control sel" id="agamaSel" name="agamaselect"> 
                        <option value="0">--Pilih Agama--</option>
                        <?php foreach ($agama_selectlist as $row): ?>
                            <?php
                            if ($row["religionid"] == $id_agama) {
                                echo '<option value="' . $row["religionid"] . '" selected>' . $row["religion"] . '</option>';
                            } else {
                                echo '<option value="' . $row["religionid"] . '">' . $row["religion"] . '</option>';
                            }
                            ?>
                        <?php endforeach ?>
                    </select>

                </div>
            </div>
        </div>


        <div class="well">
            <div class="form-group">
                <label class="col-lg-2 col-md-2 col-sm-2 control-label">Bangsa: </label>
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <select class="form-control sel" id="bangsaSel" name="bangsaselect"> 
                        <option value="0">--Pilih Bangsa--</option>
                        <?php foreach ($bangsa_selectlist as $row): ?>
                            <?php
                            if ($row["kaumjpnid"] == $id_bangsa) {
                                echo '<option value="' . $row["kaumjpnid"] . '" selected>' . $row["kaum"] . '</option>';
                            } else {
                                echo '<option value="' . $row["kaumjpnid"] . '">' . $row["kaum"] . '</option>';
                            }
                            ?>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        </div>


        <div class="well">
            <div class="form-group">
                <label class="col-lg-2 col-md-2 col-sm-2 control-label">Pekerjaan: </label>
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <?php
                    $kerajaan_check = "";
                    $kerajaan_text = "";
                    $swasta_check = "";
                    $swasta_text = "";
                    $sendiri_check = "";
                    $sendiri_text = "";
                    $lain_check = "";
                    $lain_text = "";

                    if ($pekerjaan == "Kerajaan") {
                        $kerajaan_check = 'checked="checked"';
                        $kerajaan_text = $pekerjaan_more;
                    } else if ($pekerjaan == "Swasta") {
                        $swasta_check = 'checked="checked"';
                        $swasta_text = $pekerjaan_more;
                    } else if ($pekerjaan == "Sendiri") {
                        $sendiri_check = 'checked="checked"';
                        $sendiri_text = $pekerjaan_more;
                    } else if ($pekerjaan == "Lain-Lain") {
                        $lain_check = 'checked="checked"';
                        $lain_text = $pekerjaan_more;
                    }
                    ?>

                    <div class="radio">
                        <label>
                            <input type="radio"  id="pekerjanRadio1" name="pekerjanRadio" value="Kerajaan" <?php echo $kerajaan_check; ?>>
                            Kerajaan
                            <input type="text" class="form-control upper" id="inputKerajaan" name="inputKerajaan" placeholder="Nyatakan" value="<?php echo $kerajaan_text; ?>">
                        </label>
                    </div>

                    <div class="radio">
                        <label>
                            <input type="radio"  id="pekerjanRadio2" name="pekerjanRadio" value="Swasta" <?php echo $swasta_check; ?>>
                            Swasta
                            <input type="text" class="form-control upper" id="inputSwasta" name="inputSwasta" placeholder="Nyatakan" value="<?php echo $swasta_text; ?>">
                        </label>
                    </div>

                    <div class="radio">
                        <label>
                            <input type="radio"  id="pekerjanRadio3" name="pekerjanRadio" value="Sendiri" <?php echo $sendiri_check; ?>>
                            Sendiri
                            <input type="text" class="form-control upper" id="inputSendiri" name="inputSendiri" placeholder="Nyatakan" value="<?php echo $sendiri_text; ?>">
                        </label>
                    </div>

                    <div class="radio">
                        <label>
                            <input type="radio"  id="pekerjanRadio4" name="pekerjanRadio" value="Lain-Lain" <?php echo $lain_check; ?>>
                            Lain-Lain
                            <input type="text" class="form-control upper" id="inputLain-Lain" name="inputLainLainPekerjan" placeholder="Nyatakan" value="<?php echo $lain_text; ?>">
                        </label>
                    </div>
                </div>
            </div>
        </div>



        <div class="well">
            <div class="form-group">
                <label class="col-lg-2 col-md-2 col-sm-2 control-label">Telefon Rumah: </label>
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <input type="text" class="form-control" id="inputRumah" name="inputRumah" placeholder="Rumah" value="<?php echo $telefon_rumah; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 col-md-2 col-sm-2 control-label">Telefon Pejabat: </label>
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <input type="text" class="form-control" id="inputPejabat" name="inputPejabat" placeholder="Pejabat" value="<?php echo $telefon_pejabat; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 col-md-2 col-sm-2 control-label">Telefon Bimbit: </label>
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <input type="text" class="form-control" id="inputBimbit" name="inputBimbit" placeholder="*Bimbit" value="<?php echo $telefon_bimbit; ?>">
                </div>
            </div>

        </div>


        <div class="well">
            <div class="form-group">
                <label class="col-lg-2 col-md-2 col-sm-2 control-label">Email: </label>
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" value="<?php echo $email; ?>">
                </div>
            </div>
        </div>


    </div>
    <!--</div>-->
    <legend></legend>
    <div class="row">
        <!-- col1 -->
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="well">
                <div class="form-group">
                    <label class="col-lg-3 col-md-2 col-sm-2 control-label">Kawasan Mengundi: </label>
                    <div class="col-lg-4 col-md-10 col-sm-10">
                        <select class="form-control sel" id="parSel" name="parselect" onchange="getDun(this.value);"> 
                            <option value="0">--Pilih Parlimen--</option>
                            <?php foreach ($par_selectlist as $row): ?>
                                <?php
                                if ($row["parid"] == $parid) {
                                    echo '<option value="' . $row["parid"] . '" selected> P' . $row["parid"] . " " . $row["parlimen"] . '</option>';
                                } else {
                                    echo '<option value="' . $row["parid"] . '"> P' . $row["parid"] . " " . $row["parlimen"] . '</option>';
                                }
                                ?>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-10 col-sm-10">
                        <select class="form-control sel" id="dunSel" name="dunselect"> 
                            <option value="0">--Pilih DUN--</option>
                            <?php foreach ($dun_selectlist as $row): ?>
                                <?php
                                if ($row["dunid"] == $dunid) {
                                    echo '<option value="' . $row["dunid"] . '" selected>N' . $row["dunid"] . ' ' . $row['dun'] . '</option>';
                                } else {
                                    echo '<option value="' . $row["dunid"] . '">N' . $row["dunid"] . ' ' . $row['dun'] . '</option>';
                                }
                                ?>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
            </div>
        </div><!-- /col1 -->
        <!-- col2 -->
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="well">
                <div class="form-group">
                    <label class="col-lg-2 col-md-2 col-sm-2 control-label">Kategori Ahli: </label>
                    <div class="col-lg-10 col-md-10 col-sm-10">
                        <?php
                        $induk = "";
                        $wanita = "";
                        $pemuda = "";
                        if ($kategori_ahli == "Induk") {
                            $induk = 'checked="checked"';
                            $wanita = "";
                            $pemuda = "";
                        } else if ($kategori_ahli == "Wanita") {
                            $induk = "";
                            $wanita = 'checked="checked"';
                            $pemuda = "";
                        } else if ($kategori_ahli == "Pemuda") {
                            $induk = "";
                            $wanita = "";
                            $pemuda = 'checked="checked"';
                        }
                        ?>
                        <label class="radio radio-inline">
                            <input type="radio" name="kategoriRadio" id="kategoriRadio1" value="Induk" <?php echo $induk; ?>>
                            Induk
                        </label>

                        <label class="radio radio-inline">
                            <input type="radio" name="kategoriRadio" id="kategoriRadio2" value="Wanita" <?php echo $wanita; ?>>
                            Wanita
                        </label>

                        <label class="radio radio-inline">
                            <input type="radio" name="kategoriRadio" id="kategoriRadio3" value="Pemuda" <?php echo $pemuda; ?>>
                            Pemuda
                        </label>
                    </div>
                </div>
            </div>
        </div><!-- /col2 -->
        <!-- print view -->
        <!--        <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="well">
                        <legend><center><p>PENGAKUAN PERMOHONAN</p></center></legend>
                        <div class="form-group">
                            <p class="col-lg-12 col-md-12 col-sm-12">Your text here.</p>
                        </div>
                        <div class="form-group">
                            <p class="col-lg-6 col-md-12 col-sm-12">Kawasan Parlimen / Cap Jari Pemohon: ___________________</p>
                            <p class="col-lg-6 col-md-12 col-sm-12">Tarikh : _____/______/______</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="well">
                        <legend><center><p>PENGAKUAN PERMOHONAN</p></center></legend>
                        <div class="form-group">
                            <label class="col-lg-3 col-md-2 col-sm-2 control-label text-left" style="text-align: left">Nama: </label>
                            <p class="col-lg-9 col-md-10 col-sm-10 inline">______________________________________</p>
                            <label class="col-lg-3 col-md-2 col-sm-2 control-label text-left" style="text-align: left">No Kad Pengenalan: </label>
                            <p class="col-lg-9 col-md-10 col-sm-10 inline">______________________________________</p>
                            <label class="col-lg-3 col-md-2 col-sm-2 control-label text-left" style="text-align: left">Jawatan: </label>
                            <p class="col-lg-9 col-md-10 col-sm-10 inline">______________________________________</p>
                            <label class="col-lg-3 col-md-2 col-sm-2 control-label text-left" style="text-align: left">Tandatangan: </label>
                            <p class="col-lg-9 col-md-10 col-sm-10 inline">______________________________________</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="well">
                        <legend><center><p>PENGAKUAN PERMOHONAN</p></center></legend>
                        <div class="form-group">
                            <label class="col-lg-3 col-md-2 col-sm-2 control-label text-left" style="text-align: left">Nama: </label>
                            <p class="col-lg-9 col-md-10 col-sm-10 inline">______________________________________</p>
                            <label class="col-lg-3 col-md-2 col-sm-2 control-label text-left" style="text-align: left">No Kad Pengenalan: </label>
                            <p class="col-lg-9 col-md-10 col-sm-10 inline">______________________________________</p>
                            <label class="col-lg-3 col-md-2 col-sm-2 control-label text-left" style="text-align: left">Jawatan: </label>
                            <p class="col-lg-9 col-md-10 col-sm-10 inline">______________________________________</p>
                            <label class="col-lg-3 col-md-2 col-sm-2 control-label text-left" style="text-align: left">Tandatangan: </label>
                            <p class="col-lg-9 col-md-10 col-sm-10 inline">______________________________________</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="well">
                        <p>Text here.</p>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="well">
                        <legend><center><p>UNTUK KEGUNAAN CAWANGAN SAHAJA</p></center></legend>
                        <div class="form-group">
                            <label class="col-lg-2 col-md-2 col-sm-2 control-label text-left" style="text-align: left">Disahkan oleh: </label>
                            <p class="col-lg-5 col-md-10 col-sm-10 inline">______________________________________</p>
                            <label class="col-lg-2 col-md-2 col-sm-2 control-label text-left" style="text-align: left">Cop Cawangan: </label>
                            <p class="col-lg-3 col-md-10 col-sm-10 inline">______________________________________</p>
                            <label class="col-lg-2 col-md-2 col-sm-2 control-label text-left" style="text-align: left">Tarikh: </label>
                            <p class="col-lg-10 col-md-10 col-sm-10 inline">______________________________________</p>
                            <label class="col-lg-2 col-md-2 col-sm-2 control-label text-left" style="text-align: left">Catatan / Komen: </label>
                            <p class="col-lg-10 col-md-10 col-sm-10 inline">______________________________________</p>
                            <label class="col-lg-2 col-md-2 col-sm-2 control-label text-left" style="text-align: left"></label>
                            <p class="col-lg-10 col-md-10 col-sm-10 inline">______________________________________</p>
                            <label class="col-lg-2 col-md-2 col-sm-2 control-label text-left" style="text-align: left"></label>
                            <p class="col-lg-10 col-md-10 col-sm-10 inline">______________________________________</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-lg-offset-8 col-md-12 col-sm-12">
                    <div class="well">
                        <legend><center><p>UNTUK KEGUNAAN IBU PEJABAT SAHAJA</p></center></legend>
                        <div class="form-group">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="col-lg-3">Tindakan</th>
                                        <th class="col-lg-5">Tarikh</th>
                                        <th class="col-lg-4">Tandatangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Disemak & Di"Key-in"</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <p>* Borang hanya akan diproses apabila telah lengkap diisi</p>
        
                </div>-->
    </div>



    <legend></legend>
    <div class="row">
        <div class="col-lg-4 pull-right" id="buttondiv">
            <button type="button" class="btn btn-primary pull-right"  name="submit_form1" id="submit_form1" onclick="form1_submit()">Edit & Save</button>
        </div>
    </div>

</fieldset>
<?php echo form_close(); ?>