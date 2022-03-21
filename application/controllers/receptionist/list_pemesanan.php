<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('_template/header.php'); ?>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.5/datatables.min.css">

	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.5/datatables.min.js"></script>
</head>
<body class="lead">
	<div>
		<?php $this->load->view('_template/list_room.php'); ?>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="hotel zzz"></h3>
				<div class="card">
					<div card>
						<div class="card-body">
						<table class="table">
							<thead class="thread-inverse">
								<tr>
									<th>#</th>
									<th>Nama Tamu</th>
									<th>Jumlah kamar</th>
									<th>Check in</th>
									<th>Total hari</th>
									<th>Check out</th>
                                    <th>Estimasi biaya</th>
                                    <th>Status</a>
									<th>Action</th>
								</tr>
								<div class=""></div>
							</thead>
							<tbody>
                            <?php foreach ($reservations as $data) : ?>
                                <tr>
                                    <td><?= $data->nama_tamu ?></td>
                                    <td><?= $data->jumlah_kamar ?></td>
                                    <td><?= $data->tipe_kamar ?></td>
                                    <td><?= $data->tgl_check_in ?></td>
                                    <td><?= $data->total_hari ?></td>
                                    <td><?= $data->tgl_check_out ?></td>
                                    <td><?= $data->estimasi_biaya ?></td>
                                    <td><?= $data->keterangan ?></td>

                                    <td style= "width: 50px;">
                                    <div class ="action">
                                        <a href="<?= site_url('receptionist/reservation/view/' , $data->id_pemesanan) ?>" onclick="update(this)"> <?= $action></a>

                                        <?php 
                                            $status = 1;
                                            $action = "";
                                            switch ($data->keterangan)
                                                {
                                                    case 'Booked';
                                                    $status = 2;
                                                    $action = "Check In";
                                                    break;
                                                    case 'Check in';
                                                    $status = 3;
                                                    $action = "Check Out";
                                                    break;
                                                    case 'Must Cancel'; 
                                                    $status = 4;
                                                    $action = "Cancel";
                                                    break;
    
                                                }?> 
                                                <?php if(!empty($action)){ ?>
                                                <a href="#" data-update-url="<?= site_url('receptionist/reservation/update/' . $data->id_pemesanan.'/'.$status) ?>" onclick="updateConfirm(this)" >
                                                <button type="button" class="btn btn-outline-warning"><?= $action ?></button></a>
                                                <?php } ?>

                                </tr>
                                <?php endforeach ?>
								<?php  $no = 1;
								 foreach ($rooms as $room) : ?>
								 	<tr>
								 		<td><?= $no++ ?></td>
								 		<td><?= $room->tipe_Pemesanan ?></td>
								 		<td><?= $room->jumlah_Pemesanan ?></td>
								 		<td><?= $room->fasilitas_Pemesanan ?></td>
								 		<td><?= $room->harga_sewa ?></td>
								 		<td><?= $room->gambar ?></td>
								 		<td>
								 			<a href="site_url('admin/admin_room/edit/' . $room->id_Pemesanan)"></a>
								 		</td>
								 		<td>
								 			<button class="btn btn-succes">Tambah</button>
								 			<button class="btn btn-primary">Edit</button>
								 			<button class="btn btn-danger">Hapus</button>
								 		</td>
								 		<?php if ($room->total_pemesanan == 0) : ?>

								 			<script>
								 				function deleteCOnfirm(event) {
								 					swal.fire({
								 						title: 'delete COnfirmation!',
								 						text: 'are you sure to delete this room?',
								 						icon: 'warning',
								 						showCancelButton: true,
								 						cancelButtonText: 'No',
								 						confirmButtonText: 'Yes,Delete',
								 						confirmButtonColor: 'red'
								 					}).then(dialog => {
								 						if (dialog.isConfirmed) {
								 							window.location
								 						}
								 					})
								 				}
								 			</script>
								 			<<?php if ($this->session->flashdata('message')) : ?>
								 			<script>
								 				const Toast = swal.mixin({
								 					toast: true,
								 					position: 'top-end',
								 					showConfirmButton: false,
								 					timer: 2000,
								 					timerProgresBar: true,
								 					didOpen: (toast) => {
								 						toast.addEventListener('mouseenter', Swal.stopTimer)
								 						toast.addEventListener('mouseleave', Swal.resumeTimer)
								 					}
								 				})

								 				Toast.fire({
								 					icon: 'success',
								 					title: '<?= $this->session->flashdata('message')?>'
								 				})
								 			</script>
								 		<?php endif ?>
								 	</tr>
							</tbody>
						<?php endforeach ?>
						</table>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html><?php $this->load->view('_template/footer.php'); ?>