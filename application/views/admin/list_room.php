<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('_template/header.php'); ?>
</head>

<body class="lead">
    <div>
        <?php $this->load->view('_template/menubar.php'); ?>

    <div>
    	<div class="container m-4 mx-auto">
    <div class="card">
        <div class="card-header ">
            <h5>Kelola Kamar</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-6">

        	<a href="<?=site_url('admin/admin_room/new')?>" button type="button" class="btn btn-primary">Tambah Data</button></a>    
        </div>
    </div>
    <div class="table-responsive">
        <table id="tbl_kamar" class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <td scope="col">Tipe Kamar</td>
                    <td scope="col">jumlah Kamar</td>
                    <td scope="col">Harga Sewa</td>
                    <td scope="col">Image</td>
                    <td scope="col">Aksi</td>
                </tr>
            </thead>
            <tbody>
            	<?php foreach ($rooms as $room) : ?>
                <tr>
                    <td><?= $room->tipe_kamar?></td>
                    <td><?= $room->jumlah_kamar?></td>
                    <td><?= $room->harga_sewa?></td>
                     <td><?= empty($room->image) ? '' :
                     '<i class="fa fa-check-square-o"></i>'?></td>
                    
                        
                    <td>
                        <a href="<?=site_url('admin/admin_room/view/'.$room->id_kamar) ?>"><button type="button" class="btn btn-primary">Lihat</button></a>
                        <a href="<?=site_url('admin/admin_room/edit/'.$room->id_kamar) ?>" button type="button" class="btn btn-danger">Edit</button>

                        
                        <?php if ($room->total_pemesanan == 0) : ?>
                        <a href="#" data-delete-url="<?= site_url('admin/admin_room/delete/'.$room->id_kamar) ?>" onclick="deleteConfirm(this)" class="btn btn-warning">Delete</a>
                        <?php endif?>
                    </td>
                    
                </tr>
                <?php endforeach?>
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
            $('#tbl_kamar').DataTable({
                "dom": 'frtip',
                "order": []
            });
        });
    	</script>

        <script>


            function deleteConfirm(event){
            Swal.fire({
                title: 'Delete Confirmation',
                text: 'are you sure to delete this room?',
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'No',
                confirmButtonText: 'Yes Delete',
                cancelButtonColor: 'red'
            }).then(dialog => {
                if (dialog.isConfirmed) {
                    window.location.assign(event.dataset.deleteUrl);
                }
            });
        }
        </script>
        
</body>
</html>
