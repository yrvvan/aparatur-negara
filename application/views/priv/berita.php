<h3 class="page-title">Berita</h3>
<div class="row">
    <div class="col-md-12">
        <?php echo $status; ?>
        <div class="portlet box yellow ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Form Tambah Berita
                </div>
            </div>
            <div class="portlet-body form">
                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>c_admin/tambah_tag" method="post">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-1 control-label">Judul Berita</label>
                            <div class="col-md-11">
                                <input type="text" class="form-control" placeholder="Masukkan judul berita" name="judul" autofocus="true" autocomplete="off" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-1">Isi Berita</label>
                            <div class="col-md-11">
                                <textarea name="isi_berita" id="summernote_1"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile" class="col-md-1 control-label">Gambar Headline</label>
                            <div class="col-md-11">
                                <input type="file" id="exampleInputFile" name="pic_berita">
                                <p class="help-block">
                                    Dianjurkan untuk memilih file dengan nama tanpa spasi atau simbol selain "_", ex: "disposisi1.pdf" atau "disposisi_1.pdf"
                                </p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1 control-label">URL Gambar Headline</label>
                            <div class="col-md-11">
                                <input type="text" class="form-control" placeholder="Masukkan url image berita" name="url" autofocus="true" autocomplete="off" required />
                                <p class="help-block">
                                    Jika sudah memilih untuk mengupload gambar headline di atas, kolom ini tidak perlu diisi. <b>Pilih salah satu</b> ("Upload Headline", "Ambil dari URL", atau "Gunakan URL Video")
                                </p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1 control-label">Sisipkan Video</label>
                            <div class="col-md-11">
                                <input type="text" class="form-control" placeholder="Masukkan url video" name="video" autofocus="true" autocomplete="off" required />
                                <p class="help-block">
                                    Jika sudah memilih untuk mengupload gambar headline di atas, kolom ini tidak perlu diisi. <b>Pilih salah satu</b> ("Upload Headline", "Ambil dari URL", atau "Gunakan URL Video")
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
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_2">
                    <thead>
                        <tr>
                            <th>
                                No.
                            </th>
                            <th>
                                Tag
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_tag as $dt) {
                            ?>
                            <tr class="odd gradeX">
                                <td>
                                    <?php echo $no; ?>
                                </td>
                                <td>
                                    <?php echo $dt->nm_tag; ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() . "c_admin/lihat_agenda/" . $dt->id_tag; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
                                    <a href="<?php echo base_url() . "c_admin/" . $dt->id_tag; ?>" class="btn btn-danger" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?');"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
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