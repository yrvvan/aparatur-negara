<h3 class="page-title">Sharing</h3>
<div class="row">
    <div class="col-md-12">
        <?php echo $status; ?>
        <div class="portlet box yellow ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Form Sharing
                </div>
            </div>
            <div class="portlet-body form">
                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>c_admin/tambah_sharing" method="post">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Perihal</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="Masukkan perihal pengumuman" name="perihal" autofocus="true" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Tulis</label>
                            <div class="col-md-10">
                                <textarea name="isi" id="summernote_1"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile" class="col-md-2 control-label">Attachment</label>
                            <div class="col-md-10">
                                <input type="file" id="exampleInputFile" name="file">
                                <p class="help-block">
                                    Dianjurkan untuk memilih file dengan nama tanpa spasi atau simbol selain "_", ex: "disposisi1.pdf" atau "disposisi_1.pdf"
                                </p>
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