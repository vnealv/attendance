<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>PBB.ORG.MY</title>


        <link href="<?php echo base_url("asset/css/bootstrap.min.css"); ?>" rel="stylesheet">


        <link href="<?php echo base_url("asset/css/jasny-bootstrap.min.css"); ?>" rel="stylesheet" type="text/css"/>



        <style>
            .custom{
                font-size: larger
            }
        </style>

    </head>
    <body>
        <div class="container">
            <?php
            $this->load->helper('form');
            $attributes = array('class' => 'form-horizontal', 'id' => 'form1', 'role' => "form");

            echo form_open_multipart('submit', $attributes);
            ?>
            <!--<form class="form-horizontal" role="form" name="myForm" enctype="multipart/form-data" action="<?php echo base_url("submit"); ?>" method="post" onsubmit="return validate()" id="form">-->

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
                if (!empty($picture)) {

                    echo '<div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="well">
                            <div class="form-group">
                                <label for="inputName" class="col-lg-2 col-md-2 col-sm-2 control-label text-left"><p class="text-left">Nama: </p></label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <p class="custom">' . $nama . '</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputCawangan" class="col-lg-2 col-md-2 col-sm-2 control-label text-left"><p class="text-left">Cawangan: </p></label>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">N </span>
                                        <p class="custom">' . $cawangan_dunid .' '. $cawangan_dun.'</p>
                                    </div>
                                </div>

                                <label for="inputRanting" class="col-lg-2 col-md-2 col-sm-2 control-label text-left"><p class="text-left">Ranting: </p></label>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="custom">' . $ranting . '</p>
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
                                    <p class="custom">' . $nama . '</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputCawangan" class="col-lg-2 col-md-2 col-sm-2 control-label text-left"><p class="text-left">Cawangan: </p></label>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">N </span>
                                        <p class="custom">' . $cawangan_dunid .' '. $cawangan_dun.'</p>
                                    </div>
                                </div>

                                <label for="inputRanting" class="col-lg-2 col-md-2 col-sm-2 control-label text-left"><p class="text-left">Ranting: </p></label>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <p class="custom">' . $ranting . '</p>
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
                                <p class="custom"><?php echo $tarikh; ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTempatLahir" class="col-lg-2 col-md-2 col-sm-2 control-label text-left"><p class="text-left">Tempat Lahir: </p></label>
                            <div class="col-lg-10 col-md-10 col-sm-10">
                                <p class="custom"><?php echo $tempat_lahir; ?></p>
                            </div>
                        </div>

                    </div>



                    <div class="well">
                        <div class="form-group">
                            <label class="col-lg-2 col-md-2 col-sm-2 control-label">Jantina: </label>
                            <div class="col-lg-10 col-md-10 col-sm-10">
                                <p class="custom"><?php echo $jantina; ?></p>
                            </div>
                        </div>
                    </div>


                    <div class="well">
                        <div class="form-group">
                            <label for="inputBaruLama" class="col-lg-3 col-md-2 col-sm-2 control-label text-left"><p class="text-left">No. Kad Pengenalan: </p></label>
                            <div class="col-lg-9 col-md-10 col-sm-10">
                                <p class="custom"><?php echo $ic_baru; ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputBaruLama" class="col-lg-3 col-md-2 col-sm-2 control-label text-left"><p class="text-left"></p></label>
                            <div class="col-lg-9 col-md-10 col-sm-10">
                                <p class="custom"><?php echo $ic_lama; ?></p>
                            </div>
                        </div>
                    </div>


                    <div class="well">
                        <div class="form-group">
                            <label class="col-lg-2 col-md-2 col-sm-2 control-label">Alamat Rumah: </label>
                            <div class="col-lg-10 col-md-10 col-sm-10">
                                <p class="custom"><?php echo $alamat_rumah; ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-md-2 col-sm-2 control-label">Alamat Pejabat: </label>
                            <div class="col-lg-10 col-md-10 col-sm-10">
                                <p class="custom"><?php echo $alamat_pejabat; ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-md-2 col-sm-2 control-label">Alamat Surat: </label>
                            <div class="col-lg-10 col-md-10 col-sm-10">
                                <p class="custom"><?php echo $alamat_surat; ?></p>
                            </div>
                        </div>

                    </div>


                </div>

                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="well">
                        <div class="form-group">
                            <label class="col-lg-2 col-md-2 col-sm-2 control-label">Agama: </label>
                            <div class="col-lg-10 col-md-10 col-sm-10">
                                <p class="custom"><?php echo $agama; ?></p>
                            </div>
                        </div>
                    </div>


                    <div class="well">
                        <div class="form-group">
                            <label class="col-lg-2 col-md-2 col-sm-2 control-label">Bangsa: </label>
                            <div class="col-lg-10 col-md-10 col-sm-10">
                                <p class="custom"><?php echo $bangsa; ?></p>
                            </div>
                        </div>
                    </div>


                    <div class="well">
                        <div class="form-group">
                            <label class="col-lg-2 col-md-2 col-sm-2 control-label">Pekerjaan: </label>
                            <div class="col-lg-10 col-md-10 col-sm-10">
                                <p class="custom"><?php echo $pekerjaan; ?></p>
                                <p class="custom"><?php echo $pekerjaan_more; ?></p>
                            </div>
                        </div>
                    </div>



                    <div class="well">
                        <div class="form-group">
                            <label class="col-lg-2 col-md-2 col-sm-2 control-label">Telefon Rumah: </label>
                            <div class="col-lg-10 col-md-10 col-sm-10">
                                <p class="custom"><?php echo $telefon_rumah; ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-md-2 col-sm-2 control-label">Telefon Pejabat: </label>
                            <div class="col-lg-10 col-md-10 col-sm-10">
                                <p class="custom"><?php echo $telefon_pejabat; ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-md-2 col-sm-2 control-label">Telefon Bimbit: </label>
                            <div class="col-lg-10 col-md-10 col-sm-10">
                                <p class="custom"><?php echo $telefon_bimbit; ?></p>
                            </div>
                        </div>

                    </div>


                    <div class="well">
                        <div class="form-group">
                            <label class="col-lg-2 col-md-2 col-sm-2 control-label">Email: </label>
                            <div class="col-lg-10 col-md-10 col-sm-10">
                                <p class="custom"><?php echo $email; ?></p>
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
                                <label class="col-lg-4 col-md-2 col-sm-2 control-label">Kawasan Mengundi: </label>
                                <div class="col-lg-4 col-md-10 col-sm-10">
                                    <p class="custom"><?php echo $par; ?></p>
                                </div>
                                <div class="col-lg-4 col-md-10 col-sm-10">
                                    <p class="custom"><?php echo $dun; ?></p>
                                </div>
                            </div>
                        </div>
                    </div><!-- /col1 -->
                    <!-- col2 -->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="well">
                            <div class="form-group">
                                <label class="col-lg-4 col-md-2 col-sm-2 control-label">Kategori Ahli: </label>
                                <div class="col-lg-8 col-md-10 col-sm-10">
                                    <p class="custom"><?php echo $kategori_ahli; ?></p>
                                </div>
                            </div>
                        </div>
                    </div><!-- /col2 -->
                    <!-- print view -->
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="well">
                            <legend><center><p>PENGAKUAN PERMOHONAN</p></center></legend>
                            <div class="form-group">
                                <p class="col-lg-12 col-md-12 col-sm-12"><p>Adalah saya yang bertandatangan di bawah ini memohon untuk menjadi AHLI PESAKA BUMIPUTERA BERSATU SARAWAK.</p><p>Sekiranya permohonan saya ini di terima, saya mengaku dan sanggup mematuhi Undang-Undang Pertubuhan PESAKA BUMIPUTERA BERSATU SARAWAK, seperti yang termaktub di dalam Perlembagaan. Saya mengaku bahawa saya bukan ahli sebarang parti yang lain.</p><p>Dengan ini saya mengaku bahawa semua keterangan yang di berikan di atas adalah benar. </p>
                            </div>
                            <div class="form-group">
                                <p class="col-lg-6 col-md-12 col-sm-12">Kawasan Parlimen / Cap Jari Pemohon: ___________________</p>
                                <p class="col-lg-6 col-md-12 col-sm-12">Tarikh : _____/______/______</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <br />
                        <br />
                        <p></p>
                        <br />
                        <br />
                        <p></p>
                        <br />
                        <p></p>
                        <p></p>
                        <legend></legend>
                        <br />
                        <p class="pull-right"> Muka 1/2 </p>
                        <br />
                        <p></p>
                        <br />
                        <p></p>
                        <br />
                        <br />
                        <p></p>
                        <p></p>
                        <br />
                        <p></p>
                        <br />
                        <p></p>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="well">
                            <legend><center><p>PENCADANG</p></center></legend>
                            <div class="form-group">
                                <label class="col-lg-4 col-md-2 col-sm-2 control-label text-left" style="text-align: left">Nama: </label>
                                <p class="col-lg-8 col-md-10 col-sm-10 inline">______________________________________</p>
                                <label class="col-lg-4 col-md-2 col-sm-2 control-label text-left" style="text-align: left">No Kad Pengenalan: </label>
                                <p class="col-lg-8 col-md-10 col-sm-10 inline">______________________________________</p>
                                <label class="col-lg-4 col-md-2 col-sm-2 control-label text-left" style="text-align: left">Jawatan: </label>
                                <p class="col-lg-8 col-md-10 col-sm-10 inline">______________________________________</p>
                                <label class="col-lg-4 col-md-2 col-sm-2 control-label text-left" style="text-align: left">Tandatangan: </label>
                                <p class="col-lg-8 col-md-10 col-sm-10 inline">______________________________________</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="well">
                            <legend><center><p>PENYOKONG</p></center></legend>
                            <div class="form-group">
                                <label class="col-lg-4 col-md-2 col-sm-2 control-label text-left" style="text-align: left">Nama: </label>
                                <p class="col-lg-8 col-md-10 col-sm-10 inline">______________________________________</p>
                                <label class="col-lg-4 col-md-2 col-sm-2 control-label text-left" style="text-align: left">No Kad Pengenalan: </label>
                                <p class="col-lg-8 col-md-10 col-sm-10 inline">______________________________________</p>
                                <label class="col-lg-4 col-md-2 col-sm-2 control-label text-left" style="text-align: left">Jawatan: </label>
                                <p class="col-lg-8 col-md-10 col-sm-10 inline">______________________________________</p>
                                <label class="col-lg-4 col-md-2 col-sm-2 control-label text-left" style="text-align: left">Tandatangan: </label>
                                <p class="col-lg-8 col-md-10 col-sm-10 inline">______________________________________</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="well">
                            <p>Di luluskan dalam mesyuarat Jawatankuasa Ranting/Cawangan pada _________________________</p>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="well">
                            <legend><center><p>UNTUK KEGUNAAN CAWANGAN SAHAJA</p></center></legend>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-2 col-sm-2 control-label text-left" style="text-align: left">Disahkan oleh: </label>
                                <p class="col-lg-5 col-md-10 col-sm-10 inline">______________________________________</p>
                                <label class="col-lg-2 col-md-2 col-sm-2 control-label text-left" style="text-align: left">Cop Cawangan: </label>
                                <p class="col-lg-3 col-md-10 col-sm-10 inline">____________________________________</p>
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

                    </div>
                </div>



                <legend></legend>
                <br />
                <p class="pull-right"> Muka 2/2 </p>
                <!--    <div class="row">
                        <div class="col-lg-4 pull-right">
                            <button type="button" class="btn btn-primary pull-right"  name="submit_form1" id="submit_form1" onclick="form1_submit()">Edit & Save</button>
                        </div>
                    </div>-->

            </fieldset>
            <!--</form>-->
            <?php echo form_close(); ?>
            <div class="row">
                <p class="pull-left">Created On: <?php echo $date_entered; ?></p>
            </div>
        </div>
    </body>


<!--    <script src="<?php echo base_url("asset/js/jquery.js"); ?>"></script>
<script src="<?php echo base_url("asset/js/moment.js"); ?>"></script>
<script src="<?php echo base_url("asset/js/bootstrap.min.js"); ?>"></script>










<script src="<?php echo base_url("asset/js/myFunctions.js"); ?>" type="text/javascript"></script>-->



</html>