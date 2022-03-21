<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('_template/header.php'); ?>
</head>

<body class="lead">
    <div>
        <?php $this->load->view('_template/menubar.php'); ?>
<div class="container m-4 mx-auto">
    <div class="card">
        <div class="card-header">
            <h5>Kelola Reservasi</h5>
        </div>
    </div>
    <div class="table-responsive">
        <table id="tbl_pemesanan" class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <td scope="col">Nama Tamu</td>
                    <td scope="col">Jumlah Kamar</td>
                    <td scope="col">Tipe kamar</td>
                    <td scope="col">tanggal check in</td>
                    <td scope="col">Total Hari</td>
                    <td scope="col">Tanggal check out</td>
                    <td scope="col">Estimasi biaya</td>
                    <td scope="col">Status</td>
                    <td scope="col">Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservation as $data) : ?>
                <tr>
                    <td><?= $data->nama_tamu ?></td>
                    <td><?= $data->jumlah_kamar ?></td>
                    <td><?= $data->tipe_kamar ?></td>
                    <td><?= $data->tgl_check_in ?></td>
                    <td><?= $data->total_hari ?></td>
                    <td><?= $data->tgl_check_out ?></td>
                    <td><?= $data->estimasi_biaya ?></td>
                    <td><?= $data->keterangan ?></td>

                    <td style="width:150px;">
                        <div class="action">
                        <a href="<?= site_url('receptionist/reservation/view/' . $data->id_pemesanan) ?>">Lihat</a>

                        <?php 
                        $status=1;
                        $action="";

                        switch ($data->keterangan){
                            case 'booked':
                                $status=2;
                                $action="Check In";
                                break;

                            case 'Check In':
                                $status=3;
                                $action="Check Out";
                                break;

                            case 'Must Cancel':
                                $status=4;
                                $action="Cancel";
                                break;
                        } ?>

                        <a href="#" data-update-url="<?= site_url('receptionist/reservation/update/' . $data->id_pemesanan.'/'.$status) ?>" onclick="updateConfirm(this)"><button type="button" class="btn btn-outline-danger"><?= $action?></button></a>

                        </div>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div> 
</div>
    <?php if ($this->session->flashdata('message')) : ?>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '<?= $this->session->flashdata('message') ?>'
            })
        </script>
    <?php endif ?>

<script>
    $(document).ready(() => {
            $('#tbl_pemesanan').DataTable({
                "dom": 'frtip',
                "order": []
            });
        });

    function updateConfirm(event) {
        Swal.fire ({
            title: 'Delete Confirmation!',
            icon: 'question',
            showCancelButton: true,
            cancelButtonText: 'No',
            confirmButtonText: 'Yes Delete',
            confirmButtomColor: 'red' 
        }).then(dialog => {
            if (dialog.isConfirmed) {
                window.location.assign(event.dataset.updateUrl);
            }
        });
    }
</script>

</body>
    
    <?php $this->load->view('_template/footer.php'); ?>

</html>