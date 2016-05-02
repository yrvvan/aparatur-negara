<h3 class="page-title">Lihat Data Disposisi</h3>
<div class="row">
    <div class="col-md-12">
        <?php echo $status; ?>
        <div class="portlet box yellow ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Form data disposisi
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
                                                    <input type="text" class="form-control input-medium date-picker" value="<?php echo $data_disposisi->tgl_surat; ?>" name="tgl_surat" required readonly="TRUE" />
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control input-medium date-picker" value="<?php echo $data_disposisi->tgl_diterima; ?>" autocomplete="off" name="tgl_diterima" required readonly="TRUE" />
                                                </td>
                                                <td>
                                                    <div class="radio-list">
                                                        <?php if ($data_disposisi->tingkat1 == "Segera") { ?>
                                                            <label>
                                                                <input type="radio" name="tingkat1" id="optionsRadios1" value="Segera" checked disabled /> Segera
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="tingkat1" id="optionsRadios2" value="Penting" disabled /> Penting
                                                            </label>
                                                        <?php } else { ?>
                                                            <label>
                                                                <input type="radio" name="tingkat1" id="optionsRadios1" value="Segera" disabled /> Segera
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="tingkat1" id="optionsRadios2" value="Penting" checked disabled /> Penting
                                                            </label>
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="radio-list">
                                                        <?php if ($data_disposisi->tingkat2 == "Biasa") { ?>
                                                            <label>
                                                                <input type="radio" name="tingkat2" id="optionsRadios3" value="Biasa" checked disabled /> Biasa
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="tingkat2" id="optionsRadios4" value="Rahasia" disabled /> Rahasia
                                                            </label>
                                                        <?php } else { ?>
                                                            <label>
                                                                <input type="radio" name="tingkat2" id="optionsRadios3" value="Biasa" disabled /> Biasa
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="tingkat2" id="optionsRadios4" value="Rahasia" checked disabled /> Rahasia
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
                                                                <label class="checkbox-inline"><b><?php echo $ud->nm_user; ?></b></label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="checkbox-list">
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="username[]" value="<?php echo $ud->username; ?>" checked disabled />
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $no++;
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
                                                                    <input type="checkbox" name="username[]" value="<?php echo $und->username; ?>" disabled />
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php $no++;
                                                }
                                                ?>                                                    
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
                                                                    <input type="checkbox" name="temui_saya" value="1" checked disabled />
                                                                <?php } else { ?>
                                                                    <input type="checkbox" name="temui_saya" value="1" disabled />
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
                                                                    <input type="checkbox" name="dibahas" value="1" checked disabled />
                                                                <?php } else { ?>
                                                                    <input type="checkbox" name="dibahas" value="1" disabled />
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
                                                                    <input type="checkbox" name="diteliti" value="1" checked disabled />
                                                                <?php } else { ?>
                                                                    <input type="checkbox" name="diteliti" value="1" disabled />
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
                                                                    <input type="checkbox" name="tanggapan" value="1" checked disabled />
                                                                <?php } else { ?>
                                                                    <input type="checkbox" name="tanggapan" value="1" disabled />
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
                                                                    <input type="checkbox" name="draft" value="1" checked disabled />
                                                                <?php } else { ?>
                                                                    <input type="checkbox" name="draft" value="1" disabled />
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
                                                                    <input type="checkbox" name="siapkan_jawaban" value="1" checked disabled />
                                                                <?php } else { ?>
                                                                    <input type="checkbox" name="siapkan_jawaban" value="1" disabled />
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
                                                                    <input type="checkbox" name="wakili" value="1" checked disabled />
                                                                <?php } else { ?>
                                                                    <input type="checkbox" name="wakili" value="1" disabled />
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
                                                                    <input type="checkbox" name="catat" value="1" checked disabled />
                                                                <?php } else { ?>
                                                                    <input type="checkbox" name="catat" value="1" disabled />
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
                                                                    <input type="checkbox" name="laporkan" value="1" checked disabled />
                                                                <?php } else { ?>
                                                                    <input type="checkbox" name="laporkan" value="1" disabled />
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
                                                                    <input type="checkbox" name="disetujui" value="1" checked disabled />
                                                                <?php } else { ?>
                                                                    <input type="checkbox" name="disetujui" value="1" disabled />
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
                                                                    <input type="checkbox" name="dipenuhi" value="1" checked disabled />
                                                                <?php } else { ?>
                                                                    <input type="checkbox" name="dipenuhi" value="1" disabled />
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
                                                                    <input type="checkbox" name="koordinasikan" value="1" checked disabled />
                                                                <?php } else { ?>
                                                                    <input type="checkbox" name="koordinasikan" value="1" disabled />
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
                                                                    <input type="checkbox" name="diketahui" value="1" checked disabled />
                                                                <?php } else { ?>
                                                                    <input type="checkbox" name="diketahui" value="1" disabled />
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
                                                                    <input type="checkbox" name="dipergunakan" value="1" checked disabled />
                                                                <?php } else { ?>
                                                                    <input type="checkbox" name="dipergunakan" value="1" disabled />
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
                                                                    <input type="checkbox" name="bahan_perhatian" value="1" checked disabled />
                                                                <?php } else { ?>
                                                                    <input type="checkbox" name="bahan_perhatian" value="1" disabled />
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
                                                                    <input type="checkbox" name="dimonitor" value="1" checked disabled />
                                                                <?php } else { ?>
                                                                    <input type="checkbox" name="dimonitor" value="1" disabled />
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
                                                                    <input type="checkbox" name="file" value="1" checked disabled />
                                                                <?php } else { ?>
                                                                    <input type="checkbox" name="file" value="1" disabled />
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
                                                                    <input type="checkbox" name="lainnya" value="1" checked disabled />
                                                                <?php } else { ?>
                                                                    <input type="checkbox" name="lainnya" value="1" disabled />
<?php } ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputFile" class="col-md-2 control-label">Catatan/Arahan</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" rows="10" readonly="TRUE"><?php echo $data_disposisi->catatan; ?></textarea>
                                            </div>
                                        </div>
                                        <iframe src="<?php echo base_url() . "assets/dokumen/" . $data_disposisi->nm_dokumen; ?>" width="100%" height="1000px"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>