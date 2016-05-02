<h3 class="page-title">Surat Masuk</h3>
<div class="row">
    <div class="col-md-12">
        <?php echo $status; ?>
        <div class="portlet box yellow ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Tabel Data Surat Masuk
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