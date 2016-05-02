<h3 class="page-title">Tambah Pengumuman</h3>
<div class="row">
    <div class="col-md-12">
        <?php echo $status; ?>
        <div class="portlet box yellow ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Form Tambah Pengumuman
                </div>
            </div>
            <div class="portlet-body form">
                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>c_admin/tambah_pengumuman" method="post">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Perihal</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Masukkan perihal pengumuman" name="perihal" autofocus="true" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Pengumuman untuk tanggal</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control input-medium date-picker" placeholder="Ex: 12-12-2012" autocomplete="off" name="tgl_pengumuman" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Isi Pengumuman</label>
                            <div class="col-md-9">
                                <textarea class="form-control" rows="10" placeholder="Tulis catatan anda disini..." name="isi"></textarea>
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
        </div>
    </div>
</div>