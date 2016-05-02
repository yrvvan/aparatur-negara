<h3 class="page-title">Nota Dinas Keluar</h3>
<div class="row">
    <div class="col-md-12">
        <?php echo $status; ?>
        <div class="portlet box yellow ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Tabel Data Nota Dinas Keluar
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
                                Tujuan
                            </th>
                            <th>
                                No. Surat
                            </th>
                            <th>
                                Tgl. Input
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