<h3 class="page-title"> Data Disposisi</h3>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box grey-cascade">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>Tabel data disposisi
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
                                No. Agenda
                            </th>
                            <th>
                                Tanggal Surat
                            </th>
                            <th>
                                Tgl. Diterima
                            </th>
                            <th>
                                Tingkat Surat
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
                        foreach ($u_disposisi as $ud) {
                            ?>
                            <tr class="odd gradeX">
                                <td>
                                    <?php echo $no; ?>
                                </td>
                                <td>
                                    <?php echo $ud->no_agenda; ?>
                                </td>
                                <td>
                                    <?php echo $ud->tgl_surat; ?>
                                </td>
                                <td>
                                    <?php echo $ud->tgl_diterima; ?>
                                </td>
                                <td>
                                    <?php echo $ud->tingkat1; ?> & <?php echo $ud->tingkat2; ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() . "assets/dokumen/" . $ud->nm_dokumen; ?>"><?php echo $ud->nm_dokumen; ?></a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() . "c_admin/lihat_disposisi/" . $ud->id_disposisi; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Baca</a>
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