<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="#">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Dashboard</a>
        </li>
    </ul>
</div>
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">Dashboard</h3>
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
                        Perihal
                    </th>
                    <th>
                        Tanggal Pengumuman
                    </th>
                    <th>
                        Isi Pengumuman
                    </th>
                    <th>
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($pengumuman as $pg) {
                    ?>
                    <tr class="odd gradeX">
                        <td>
                            <?php echo $pg->perihal; ?>
                        </td>
                        <td>
                            <?php echo $pg->tgl_pengumuman; ?>
                        </td>
                        <td>
                            <?php echo $pg->isi_pengumuman; ?>
                        </td>
                        <td>
                            <?php echo $pg->status; ?>
                        </td>
                        <?php
                    }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="portlet box red ">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-gift"></i> Agenda Terbaru
        </div>
    </div>
    <div class="portlet-body">
        <table class="table table-striped table-bordered table-hover" id="sample_2">
            <thead>
                <tr>
                    <th>
                        Perihal
                    </th>
                    <th>
                        Tanggal Agenda
                    </th>
                    <th>
                        Jam Mulai
                    </th>
                    <th>
                        Tempat
                    </th>
                    <th>
                        Peserta
                    </th>
                    <th>
                        Penyelenggara
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data_agenda as $da) {
                    ?>
                    <tr class="odd gradeX">
                        <td>
                            <?php echo $da->perihal; ?>
                        </td>
                        <td>
                            <?php echo $da->tgl_agenda; ?>
                        </td>
                        <td>
                            <?php echo $da->jam; ?>
                        </td>
                        <td>
                            <?php echo $da->tempat; ?>
                        </td>
                        <td>
                            <?php echo $da->peserta; ?>
                        </td>
                        <td>
                            <?php echo $da->penyelenggara; ?>
                        </td>
                        <?php
                    }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- END PAGE HEADER-->
<!-- END DASHBOARD STATS -->
<div class="clearfix">
</div>