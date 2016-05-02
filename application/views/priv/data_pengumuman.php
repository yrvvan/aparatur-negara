<h3 class="page-title"> Data Pengumuman</h3>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box grey-cascade">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>Tabel data pengumuman
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
                                Perihal
                            </th>
                            <th>
                                Tanggal Pengumuman
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pengumuman as $pg) {
                            ?>
                            <tr class="odd gradeX">
                                <td>
                                    <?php echo $no; ?>
                                </td>
                                <td>
                                    <?php echo $pg->perihal; ?>
                                </td>
                                <td>
                                    <?php echo $pg->tgl_pengumuman; ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() . "c_admin/lihat_pengumuman/" . $pg->id_pengumuman; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
                                    <a href="<?php echo base_url() . "c_admin/" . $pg->id_pengumuman; ?>" class="btn btn-danger" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?');"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
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
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>