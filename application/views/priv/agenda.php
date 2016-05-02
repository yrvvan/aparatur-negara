<h3 class="page-title">Agenda</h3>
<div class="row">
    <div class="col-md-12">
        <?php echo $status; ?>
        <div class="portlet box yellow ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Form Tambah Agenda
                </div>
            </div>
            <div class="portlet-body form">
                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>c_admin/tambah_agenda" method="post">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Perihal</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Masukkan perihal agenda" name="perihal" autofocus="true" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Agenda untuk tanggal</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control input-medium date-picker" placeholder="Ex: 12/12/2012" maxlength="10" autocomplete="off" name="tgl_agenda" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Jam Mulai Acara</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control input-medium" placeholder="Ex: 09.00" autocomplete="off" name="jam" maxlength="5" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tempat</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Ex: LAN Gd. BU.2" autocomplete="off" name="tempat" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Peserta</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Ex: Husni Rohman, Dini Dwi" autocomplete="off" name="peserta" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Penyelenggara</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Ex: LAN / KSI / Dit. Apneg" autocomplete="off" name="penyelenggara" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_2">
                    <thead>
                        <tr>
                            <th>
                                No.
                            </th>
                            <th>
                                Perihal
                            </th>
                            <th>
                                Tanggal Agenda
                            </th>
                            <th>
                                Jam
                            </th>
                            <th>
                                Tempat
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_agenda as $da) {
                            ?>
                            <tr class="odd gradeX">
                                <td>
                                    <?php echo $no; ?>
                                </td>
                                <td>
                                    <?php echo $da->perihal; ?>
                                </td>
                                <td>
                                    <?php echo $da->tgl_agenda; ?>
                                </td>
                                <td>
                                    <?php echo $da->jam; ?>
                                </td>
                                <td>
                                    <?php echo $da->tempat; ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() . "c_admin/lihat_agenda/" . $da->id_agenda; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
                                    <a href="<?php echo base_url() . "c_admin/" . $da->id_agenda; ?>" class="btn btn-danger" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?');"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
                                </td>
                                <?php
                                $no++;
                            }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>