<h3 class="page-title">Undangan Masuk</h3>
<div class="row">
    <div class="col-md-12">
        <?php echo $status; ?>
        <div class="portlet box yellow ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Form Undangan Masuk
                </div>
            </div>
            <div class="portlet-body form">
                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>c_admin/tambah_srt_masuk" method="post">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label">No. Agenda</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" value="<?php echo $no_surat->no_agenda + 1; ?>" name="no_agenda" readonly="TRUE" required>
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
                            <label class="col-md-2 control-label">Tgl. Surat</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control date-picker" name="tglsurat" placeholder="Pilih tanggal surat" autocomplete="off" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Asal Surat</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="Masukkan asal surat" name="asalsurat" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">No. Surat</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="Masukkan No. Surat" name="nosurat" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Disposisi direktur</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="Tulis disposisi disini..." name="disposisi" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Tipe Surat</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" value="Undangan" name="tipesurat" readonly="TRUE" required>
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
                                Asal Surat
                            </th>
                            <th>
                                No. Surat
                            </th>
                            <th>
                                Tgl. Input
                            </th>
                            <th>
                                Tgl. Surat
                            </th>
                            <th>
                                Disposisi Direktur
                            </th>
                            <th>
                                Tipe Surat
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($srt_masuk as $sm) {
                            ?>
                            <tr class="odd gradeX">
                                <td>
                                    <?php echo $no; ?>
                                </td>
                                <td>
                                    <?php echo $sm->perihal_srt_masuk; ?>
                                </td>
                                <td>
                                    <?php echo $sm->asal_srt_masuk; ?>
                                </td>
                                <td>
                                    <?php echo $sm->no_surat; ?>
                                </td>
                                <td>
                                    <?php echo $sm->tgl_srt_masuk; ?>
                                </td>
                                <td>
                                    <?php echo $sm->tgl_input; ?>
                                </td>
                                <td>
                                    <?php echo $sm->disposisi; ?>
                                </td>
                                <td>
                                    <?php echo $sm->tipe; ?>
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