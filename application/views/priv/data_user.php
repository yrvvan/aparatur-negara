<h3 class="page-title"> Data Pengguna</h3>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box grey-cascade">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>Tabel data pengguna
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
                                Nama Lengkap
                            </th>
                            <th>
                                Username
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Jenis Kelamin
                            </th>
                            <th>
                                Privillege
                            </th>
                            <th>
                                Foto
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($alluser as $au) {
                            ?>
                            <tr class="odd gradeX">
                                <td>
                                    <?php echo $no; ?>
                                </td>
                                <td>
                                    <?php echo $au->nm_user; ?>
                                </td>
                                <td>
                                    <?php echo $au->username; ?>
                                </td>
                                <td>
                                    <?php echo $au->email; ?>
                                </td>
                                <td>
                                    <?php echo $au->jenkel; ?>
                                </td>
                                <td>
                                    <?php echo $au->privillege; ?>
                                </td>
                                <td>
                                    <?php echo $au->foto; ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() . "c_admin/edit_user/" . $au->username; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></a> 
                                    <a href="<?php echo base_url() . "c_admin/del_user/" . $au->username; ?>" class="btn btn-danger" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?');"><span class="glyphicon glyphicon-trash"></span></a>
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