<h3 class="page-title">Tag</h3>
<div class="row">
    <div class="col-md-12">
        <?php echo $status; ?>
        <div class="portlet box yellow ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Form Tambah Tag
                </div>
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
            <div class="portlet-body form">
                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>c_admin/tambah_tag" method="post">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tag Berita</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Masukkan tag berita" name="tag" autofocus="true" autocomplete="off" required />
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