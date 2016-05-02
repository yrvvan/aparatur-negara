<h3 class="page-title">Edit Data Disposisi</h3>
<div class="row">
    <div class="col-md-12">
        <?php echo $status; ?>
        <div class="portlet box yellow ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Form edit data disposisi
                </div>
            </div>
            <div class="portlet-body form">
                <form class="form-horizontal" role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>c_admin/update_disposisi" method="post">
                    <div class="form-body">
                        <div class="portlet box red">
                            <div class="portlet-title">
                                <div class="caption">
                                    Lembar Edaran
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-scrollable">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <td style="text-align: center; padding: 5px;">No. Agenda</td>
                                                <td style="text-align: center; padding: 5px;">Tanggal Surat</td>
                                                <td style="text-align: center; padding: 5px;">Tanggal Diterima</td>
                                                <td colspan="2" style="text-align: center; padding: 5px;">Tingkat Surat</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" placeholder="Masukkan nomor agenda" name="no_agenda" readonly="TRUE" required value="<?php echo $data_disposisi->no_agenda; ?>"/>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control input-medium date-picker" value="<?php echo $data_disposisi->tgl_surat; ?>" autofocus="true" autocomplete="off" name="tgl_surat" required/>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control input-medium date-picker" value="<?php echo $data_disposisi->tgl_diterima; ?>" autocomplete="off" name="tgl_diterima" required/>
                                                </td>
                                                <td>
                                                    <div class="radio-list">
                                                        <?php if ($data_disposisi->tingkat1 == "Segera") { ?>
                                                            <label>
                                                                <input type="radio" name="tingkat1" id="optionsRadios1" value="Segera" checked> Segera
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="tingkat1" id="optionsRadios2" value="Penting"> Penting
                                                            </label>
                                                        <?php } else { ?>
                                                            <label>
                                                                <input type="radio" name="tingkat1" id="optionsRadios1" value="Segera"> Segera
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="tingkat1" id="optionsRadios2" value="Penting" checked> Penting
                                                            </label>
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="radio-list">
                                                        <?php if ($data_disposisi->tingkat2 == "Biasa") { ?>
                                                            <label>
                                                                <input type="radio" name="tingkat2" id="optionsRadios3" value="Biasa" checked> Biasa
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="tingkat2" id="optionsRadios4" value="Rahasia"> Rahasia
                                                            </label>
                                                        <?php } else { ?>
                                                            <label>
                                                                <input type="radio" name="tingkat2" id="optionsRadios3" value="Biasa"> Biasa
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="tingkat2" id="optionsRadios4" value="Rahasia" checked> Rahasia
                                                            </label>
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                            </tr>
                                    </table>
                                    <div class="col-md-6">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <td style="text-align: center; padding: 5px;" colspan="3">DITERUSKAN KEPADA</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($user_disposisi as $ud) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <div class="checkbox-list">
                                                                <label class="checkbox-inline"><?php echo $no; ?>.</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="checkbox-list">
                                                                <label class="checkbox-inline"><?php echo $ud->nm_user; ?></label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="checkbox-list">
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="username[]" value="<?php echo $ud->username; ?>" checked>
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php $no++;
                                                }
                                                ?>
<?php foreach ($user_no_disposisi as $und) { ?>
                                                    <tr>
                                                        <td>
                                                            <div class="checkbox-list">
                                                                <label class="checkbox-inline"><?php echo $no; ?>.</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="checkbox-list">
                                                                <label class="checkbox-inline"><?php echo $und->nm_user; ?></label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="checkbox-list">
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="username[]" value="<?php echo $und->username; ?>">
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
    <?php $no++;
}
?>
                                                <!--
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">2.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Dr. Bustang, Msi</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                <?php
                                                foreach ($user_disposisi as $ud) {
                                                    if ($ud->username == "bustang") {
                                                        ?>
                                                                                                                <input type="checkbox" name="username[]" value="bustang" checked>
                                                    <?php } else { ?>
                                                                                                                <input type="checkbox" name="username[]" value="bustang">
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">3.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Dr. Guspika, MBA</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                <?php
                                                foreach ($user_disposisi as $ud) {
                                                    if ($ud->username == "guspika") {
                                                        ?>
                                                                                                                <input type="checkbox" name="username[]" value="guspika" checked>
                                                    <?php } else { ?>
                                                                                                                <input type="checkbox" name="username[]" value="guspika">
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">4.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Dra. Ridha Hasmah, MPM</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                <?php
                                                foreach ($user_disposisi as $ud) {
                                                    if ($ud->username == "ridha") {
                                                        ?>
                                                                                                                <input type="checkbox" name="username[]" value="ridha" checked>
                                                    <?php } else { ?>
                                                                                                                <input type="checkbox" name="username[]" value="ridha">
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">5.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Dia Firdaus, SE, ME</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                <?php
                                                foreach ($user_disposisi as $ud) {
                                                    if ($ud->username == "firdaus") {
                                                        ?>
                                                                                                                <input type="checkbox" name="username[]" value="firdaus" checked>
                                                    <?php } else { ?>
                                                                                                                <input type="checkbox" name="username[]" value="firdaus">
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">6.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Irfan, SH, MH</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                <?php
                                                foreach ($user_disposisi as $ud) {
                                                    if ($ud->username == "irfan") {
                                                        ?>
                                                                                                                <input type="checkbox" name="username[]" value="irfan" checked>
                                                    <?php } else { ?>
                                                                                                                <input type="checkbox" name="username[]" value="irfan">
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">7.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Kiki Meiriska R, S.IP</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                <?php
                                                foreach ($user_disposisi as $ud) {
                                                    if ($ud->username == "meiriska") {
                                                        ?>
                                                                                                                <input type="checkbox" name="username[]" value="meiriska" checked>
                                                    <?php } else { ?>
                                                                                                                <input type="checkbox" name="username[]" value="meiriska">
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">8.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Husni Rohman, S.IP</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                <?php
                                                foreach ($user_disposisi as $ud) {
                                                    if ($ud->username == "husni") {
                                                        ?>
                                                                                                                <input type="checkbox" name="username[]" value="husni" checked>
                                                    <?php } else { ?>
                                                                                                                <input type="checkbox" name="username[]" value="husni">
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">9.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Astuti Budiati, SE</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                <?php
                                                foreach ($user_disposisi as $ud) {
                                                    if ($ud->username == "astuti") {
                                                        ?>
                                                                                                                <input type="checkbox" name="username[]" value="astuti" checked>
                                                        <?php
                                                        break;
                                                    } else {
                                                        ?>
                                                                                                                <input type="checkbox" name="username[]" value="astuti">
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">10.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">M. Kamin Firdaus</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                <?php
                                                foreach ($user_disposisi as $ud) {
                                                    if ($ud->username == "kamin") {
                                                        ?>
                                                                                                                <input type="checkbox" name="username[]" value="kamin" checked>
                                                    <?php } else { ?>
                                                                                                                <input type="checkbox" name="username[]" value="kamin">
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">11.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Lian Ifandri, S.IP</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                <?php
                                                foreach ($user_disposisi as $ud) {
                                                    if ($ud->username == "lian") {
                                                        ?>
                                                                                                                <input type="checkbox" name="username[]" value="lian" checked>
                                                    <?php } else { ?>
                                                                                                                <input type="checkbox" name="username[]" value="lian">
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">12.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Yusuf Hakim Gumilang, S.IP</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                <?php
                                                foreach ($user_disposisi as $ud) {
                                                    if ($ud->username == "yusuf") {
                                                        ?>
                                                                                                                <input type="checkbox" name="username[]" value="yusuf" checked>
                                                    <?php } else { ?>
                                                                                                                <input type="checkbox" name="username[]" value="yusuf">
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">13.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Dini Dwi Kusumaningrum, S.Sos</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                <?php
                                                foreach ($user_disposisi as $ud) {
                                                    if ($ud->username == "dinidwi") {
                                                        ?>
                                                                                                                <input type="checkbox" name="username[]" value="dinidwi" checked>
                                                    <?php } else { ?>
                                                                                                                <input type="checkbox" name="username[]" value="dinidwi">
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">14.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Pandu Wibowo, S.IP</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                <?php
                                                foreach ($user_disposisi as $ud) {
                                                    if ($ud->username == "pandu") {
                                                        ?>
                                                                                                                <input type="checkbox" name="username[]" value="pandu" checked>
                                                    <?php } else { ?>
                                                                                                                <input type="checkbox" name="username[]" value="pandu">
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">15.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Amalina Niara Putri, S.Sos</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                <?php
                                                foreach ($user_disposisi as $ud) {
                                                    if ($ud->username == "amalina") {
                                                        ?>
                                                                                                                <input type="checkbox" name="username[]" value="amalina" checked>
                                                    <?php } else { ?>
                                                                                                                <input type="checkbox" name="username[]" value="amalina">
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">16.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Agung Setiyadhi, S.Kom</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                <?php
                                                foreach ($user_disposisi as $ud) {
                                                    if ($ud->username == "agung") {
                                                        ?>
                                                                                                                <input type="checkbox" name="username[]" value="agung" checked>
                                                    <?php } else { ?>
                                                                                                                <input type="checkbox" name="username[]" value="agung">
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">17.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Nur Hidayat</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                <?php
                                                foreach ($user_disposisi as $ud) {
                                                    if ($ud->username == "hidayat") {
                                                        ?>
                                                                                                                <input type="checkbox" name="username[]" value="hidayat" checked>
                                                    <?php } else { ?>
                                                                                                                <input type="checkbox" name="username[]" value="hidayat">
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">18.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Eman S</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                <?php
                                                foreach ($user_disposisi as $ud) {
                                                    if ($ud->username == "eman") {
                                                        ?>
                                                                                                                <input type="checkbox" name="username[]" value="eman" checked>
                                                    <?php } else { ?>
                                                                                                                <input type="checkbox" name="username[]" value="eman">
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                -->
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <td style="text-align: center; padding: 5px;" colspan="2">DISPOSISI</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">1.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Temui saya</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                                <?php if ($data_disposisi->temui_saya == 1) { ?>
                                                                    <input type="checkbox" name="temui_saya" value="1" checked>
<?php } else { ?>
                                                                    <input type="checkbox" name="temui_saya" value="1">
<?php } ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">2.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Dibahas bersama</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                                <?php if ($data_disposisi->dibahas == 1) { ?>
                                                                    <input type="checkbox" name="dibahas" value="1" checked>
<?php } else { ?>
                                                                    <input type="checkbox" name="dibahas" value="1">
<?php } ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">3.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Diteliti/ Check/ Dipelajari</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                                <?php if ($data_disposisi->diteliti == 1) { ?>
                                                                    <input type="checkbox" name="diteliti" value="1" checked>
<?php } else { ?>
                                                                    <input type="checkbox" name="diteliti" value="1">
<?php } ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">4.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Tanggapan</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                                <?php if ($data_disposisi->tanggapan == 1) { ?>
                                                                    <input type="checkbox" name="tanggapan" value="1" checked>
<?php } else { ?>
                                                                    <input type="checkbox" name="tanggapan" value="1">
<?php } ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">5.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Siapkan draft</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                                <?php if ($data_disposisi->draft == 1) { ?>
                                                                    <input type="checkbox" name="draft" value="1" checked>
<?php } else { ?>
                                                                    <input type="checkbox" name="draft" value="1">
<?php } ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">6.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Siapkan jawaban sesuai ketentuan</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                                <?php if ($data_disposisi->siapkan_jawaban == 1) { ?>
                                                                    <input type="checkbox" name="siapkan_jawaban" value="1" checked>
<?php } else { ?>
                                                                    <input type="checkbox" name="siapkan_jawaban" value="1">
<?php } ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">7.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Harap Wakili Saya</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                                <?php if ($data_disposisi->wakili == 1) { ?>
                                                                    <input type="checkbox" name="wakili" value="1" checked>
<?php } else { ?>
                                                                    <input type="checkbox" name="wakili" value="1">
<?php } ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">8.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Catat dan kembalikan</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                                <?php if ($data_disposisi->catat == 1) { ?>
                                                                    <input type="checkbox" name="catat" value="1" checked>
<?php } else { ?>
                                                                    <input type="checkbox" name="catat" value="1">
<?php } ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">9.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Laporan/ Laporkan</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                                <?php if ($data_disposisi->laporkan == 1) { ?>
                                                                    <input type="checkbox" name="laporkan" value="1" checked>
<?php } else { ?>
                                                                    <input type="checkbox" name="laporkan" value="1">
<?php } ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">10.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Dapat disetujui</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                                <?php if ($data_disposisi->disetujui == 1) { ?>
                                                                    <input type="checkbox" name="disetujui" value="1" checked>
<?php } else { ?>
                                                                    <input type="checkbox" name="disetujui" value="1">
<?php } ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">11.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Harap dipenuhi</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                                <?php if ($data_disposisi->dipenuhi == 1) { ?>
                                                                    <input type="checkbox" name="dipenuhi" value="1" checked>
<?php } else { ?>
                                                                    <input type="checkbox" name="dipenuhi" value="1">
<?php } ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">12.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Koordinasikan</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                                <?php if ($data_disposisi->koordinasikan == 1) { ?>
                                                                    <input type="checkbox" name="koordinasikan" value="1" checked>
<?php } else { ?>
                                                                    <input type="checkbox" name="koordinasikan" value="1">
<?php } ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">13.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Untuk diketahui</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                                <?php if ($data_disposisi->diketahui == 1) { ?>
                                                                    <input type="checkbox" name="diketahui" value="1" checked>
<?php } else { ?>
                                                                    <input type="checkbox" name="diketahui" value="1">
<?php } ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">14.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Untuk dipergunakan</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                                <?php if ($data_disposisi->dipergunakan == 1) { ?>
                                                                    <input type="checkbox" name="dipergunakan" value="1" checked>
<?php } else { ?>
                                                                    <input type="checkbox" name="dipergunakan" value="1">
<?php } ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">15.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Untuk menjadi bahan perhatian</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                                <?php if ($data_disposisi->bahan_perhatian == 1) { ?>
                                                                    <input type="checkbox" name="bahan_perhatian" value="1" checked>
<?php } else { ?>
                                                                    <input type="checkbox" name="bahan_perhatian" value="1">
<?php } ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">16.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Untuk dimonitor</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                                <?php if ($data_disposisi->dimonitor == 1) { ?>
                                                                    <input type="checkbox" name="dimonitor" value="1" checked>
<?php } else { ?>
                                                                    <input type="checkbox" name="dimonitor" value="1">
<?php } ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">17.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">File</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                                <?php if ($data_disposisi->file == 1) { ?>
                                                                    <input type="checkbox" name="file" value="1" checked>
<?php } else { ?>
                                                                    <input type="checkbox" name="file" value="1">
<?php } ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">18.</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">Lainnya</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox-inline">
                                                                <?php if ($data_disposisi->lainnya == 1) { ?>
                                                                    <input type="checkbox" name="lainnya" value="1" checked>
<?php } else { ?>
                                                                    <input type="checkbox" name="lainnya" value="1">
<?php } ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputFile" class="col-md-2 control-label">File Lampiran</label>
                                            <div class="col-md-10">
                                                <input type="file" id="exampleInputFile" name="file">
                                                <p class="help-block">
                                                    Dianjurkan untuk memilih file dengan nama tanpa spasi atau simbol selain "_", ex: "disposisi1.pdf" atau "disposisi_1.pdf"
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile" class="col-md-2 control-label">Catatan/Arahan</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" rows="10"><?php echo $data_disposisi->catatan; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn green form-control">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
                <iframe src="<?php echo base_url() . "assets/dokumen/" . $data_disposisi->nm_dokumen; ?>" width="100%" height="1000px"></iframe>
            </div>
        </div>
    </div>
</div>