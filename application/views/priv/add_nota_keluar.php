<h3 class="page-title">Nota Dinas Keluar</h3>
<div class="row">
    <div class="col-md-12">
        <?php echo $status; ?>
        <div class="portlet box yellow ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Form Nota Dinas Keluar
                </div>
            </div>
            <div class="portlet-body form">
                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>c_admin/tambah_nota_keluar" method="post">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label">No. Nota Dinas</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" value="<?php echo $no_nota->no_nota + 1; ?>" name="no_nota" readonly="TRUE" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Perihal Surat</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="Masukkan perihal surat disini" name="perihal" autocomplete="off" autofocus="TRUE" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Tgl. Input</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control date-picker" name="tglinput" placeholder="Pilih tanggal input" autocomplete="off" autofocus="TRUE" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Tujuan</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="Masukkan tujuan surat" name="tujuansurat" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
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
                                Tujuan
                            </th>
                            <th>
                                No. Surat
                            </th>
                            <th>
                                Tgl. Input
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($nota_keluar as $nk) {
                            ?>
                            <tr class="odd gradeX">
                                <td>
                                    <?php echo $no; ?>
                                </td>
                                <td>
                                    <?php echo $nk->perihal; ?>
                                </td>
                                <td>
                                    <?php echo $nk->tujuan; ?>
                                </td>
                                <td>
                                    <?php echo $nk->no_nota; ?>
                                </td>
                                <td>
                                    <?php echo $nk->tgl_input; ?>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
                                    <a href="#" class="btn btn-danger" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?');"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
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