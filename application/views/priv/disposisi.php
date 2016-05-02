<h3 class="page-title">Input Disposisi</h3>
<div class="row">
    <div class="col-md-12">
        <?php echo $status; ?>
        <div class="portlet box yellow ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Form Disposisi <?php echo $tipe; ?>
                </div>
            </div>
            <div class="portlet-body form">
                <form class="form-horizontal" role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>c_admin/tambah_disposisi" method="post">
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
                                                    <input type="text" class="form-control" name="no_agenda" value="<?php echo $no_agenda->no_agenda + 1; ?>" autocomplete="off" readonly="TRUE" required />
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control input-medium date-picker" placeholder="Ex: 12-12-2012" autocomplete="off" name="tgl_surat" required autofocus="true" />
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control input-medium date-picker" placeholder="Ex: 12-12-2012" autocomplete="off" name="tgl_diterima" required />
                                                    <input type="text" value="<?php echo $tipe; ?>" name="tipe" required hidden="TRUE"/>
                                                </td>
                                                <td>
                                                    <div class="radio-list">
                                                        <label>
                                                            <input type="radio" name="tingkat1" id="optionsRadios1" value="Segera" checked> Segera
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="tingkat1" id="optionsRadios2" value="Penting"> Penting
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="radio-list">
                                                        <label>
                                                            <input type="radio" name="tingkat2" id="optionsRadios3" value="Biasa" checked> Biasa
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="tingkat2" id="optionsRadios4" value="Rahasia"> Rahasia
                                                        </label>
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
                                                foreach ($all_user as $au) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <div class="checkbox-list">
                                                                <label class="checkbox-inline"><?php echo $no; ?>.</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="checkbox-list">
                                                                <label class="checkbox-inline"><?php echo $au->nm_user; ?></label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="checkbox-list">
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" name="username[]" value="<?php echo $au->username; ?>">
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $no++;
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
                                                <?php
                                                $no = 1;
                                                foreach ($field_disposisi as $fd) {
                                                    ?>
                                                    <tr>
                                                        <td><div class="checkbox-list">
                                                                <label class="checkbox-inline"><?php echo $no; ?>.</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="checkbox-list">
                                                                <label class="checkbox-inline"><?php echo $fd->field; ?></label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="checkbox-list">
                                                                <label class="checkbox-inline">
                                                                    <input type="checkbox" id="inlineCheckbox21" name="<?php echo $fd->alias; ?>" value="1">
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $no++;
                                                }
                                                ?>
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
                                                <textarea id="summernote_1" placeholder="Tulis catatan anda disini..." name="catatan"></textarea>
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
            </div>
        </div>
    </div>
</div>