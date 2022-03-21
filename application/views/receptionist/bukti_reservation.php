<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('_template/header.php'); ?>
</head>
<body>
    <center>
    <table id="tb_pemesanan" class="table table-striped">
        <tr>
            <td class="col-3">nama pemesan</td>
            <td class="col-3">:</td>
            <td class="col-3 text-left border-bottom"><?= $data->nama_pemesan ?></td>
        </tr>
        <tr>
            <td class="col-3">tanggal Pemesan</td>
            <td class="col-3">:</td>
            <td class="col-3 text-left border-bottom"><?= $data->tanggal_pemesan ?></td>
        </tr>
        <tr>
            <td class="col-3">email</td>
            <td class="col-3">:</td>
            <td class="col-3 text-left border-bottom"><?= $data->email ?></td>
        </tr>
        <tr>
            <td class="col-3">no hp</td>
            <td class="col-3">:</td>
            <td class="col-3 text-left border-bottom"><?= $data->no_hp ?></td>
        </tr>
        <tr>
            <td class="col-3">nama tamu</td>
            <td class="col-3">:</td>
            <td class="col-3 text-left border-bottom"><?= $data->nama_tamu ?></td>
        </tr>
        <tr>
            <td class="col-3">tgl_pemesan</td>
            <td class="col-3">:</td>
            <td class="col-3 text-left border-bottom"><?= $data->tgl_pemesan ?></td>
        </tr>
        <tr>
            <td class="col-3">id_kamar</td>
            <td class="col-3">:</td>
            <td class="col-3 text-left border-bottom"><?= $data->id_kamar ?></td>
        </tr>
        <tr>
            <td class="col-3">tgl_check_in</td>
            <td class="col-3">:</td>
            <td class="col-3 text-left border-bottom"><?= $data->tgl_check_in ?></td>
        </tr>
        <tr>
            <td class="col-3">Total hari </td>
            <td class="col-3">:</td>
            <td class="col-3 text-left border-bottom"><?= $data->total_hari ?></td>
        </tr>
        <tr>
            <td class="col-3">tgl_check_out</td>
            <td class="col-3">:</td>
            <td class="col-3 text-left border-bottom"><?= $data->tgl_check_out ?></td>
        </tr>
    </table>
</div>
</body>
</center>
<script type="text/javascript">
    window.print()
    </script>
</html>