<h3 class="page-title"> Data Arsip</h3>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box grey-cascade">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>Tabel data arsip
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
                                Dokumen
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($dokumen as $dk) {
                            ?>
                            <tr class="odd gradeX">
                                <td>
                                    <?php echo $no; ?>
                                </td>
                                <td>
                                    <?php echo $dk->nm_dokumen; ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() . "assets/dokumen/" . $dk->nm_dokumen; ?>" class="btn btn-warning" target="_blank"><span class="glyphicon glyphicon-edit"></span> Baca</a>
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