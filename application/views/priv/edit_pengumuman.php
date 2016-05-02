<h3 class="page-title">Edit Pengumuman</h3>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box yellow ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Pengumuman
                </div>
            </div>
            <div class="portlet-body form">
                <form class="form-horizontal" role="form" action="#">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Perihal</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo $pengumuman->perihal; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Pengumuman untuk tanggal</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control input-medium date-picker" value="<?php echo $pengumuman->tgl_pengumuman; ?>" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Isi Pengumuman</label>
                            <div class="col-md-9">
                                <textarea class="form-control" rows="10" ><?php echo $pengumuman->isi_pengumuman; ?></textarea>
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