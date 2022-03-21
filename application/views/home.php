<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('_template/header.php'); ?>
</head>

<body class="lead">
    <div>
        <?php $this->load->view('_template/navbar.php'); ?>
        
  
  <div class="container-fluid p-md-0">
		<div id="demo" class="carousel border slide" data-ride="carousel">

			<!-- Indicators -->
			<ul class="carousel-indicators  justify-content-center">
				<li data-target="#demo" data-slide-to="0" class="active"></li>
				<li data-target="#demo" data-slide-to="1"></li>
				<li data-target="#demo" data-slide-to="2"></li>
				<li data-target="#demo" data-slide-to="3"></li>
			</ul>

			<!-- The slideshow -->
			<div class="carousel-inner justify-content-center sticky-top">
				<div class="carousel-item active" data-interval="900">
					<img src="<?= base_url('assets/img/carousel/h1') ?>" alt="Banner 1">
				</div>
				<div class="carousel-item">
					<img src="<?= base_url('assets/img/carousel/h2') ?>" alt="Banner 2">
				</div>
				<div class="carousel-item">
					<img src="<?= base_url('assets/img/carousel/h3') ?>" alt="Banner 3">
				</div>
			</div>

			<!-- Left and right controls -->
			<a class="carousel-control-prev bg-dark" href="#demo" data-slide="prev">
				<span class="carousel-control-prev-icon"></span>
			</a>
			<a class="carousel-control-next bg-dark" href="#demo" data-slide="next">
				<span class="carousel-control-next-icon"></span>
			</a>
    </div>

    <div class="container p-2 my-5 border  text-center">
    	<form method="POST" action="">
    	<div class="row">
    		<div class="col-3">
    			<div class="form-group">
			    	
			    		<label>Check In</label>
			    		<input type="date"  class="form-control" name="tgl_check_in">
			    	
		       </div>
		  	</div>
		  	<div class="col-3">
    			<div class="form-group">
			    	
			    		<label>Check Out</label>
			    		<input type="date" class="form-control" name="tgl_check_out">
			    	
	          	</div>
    	  	</div>
   			<div class="col-3">
    			<div class="form-group">
			    		<label>Jumlah Kamar</label>
			    		<input type="Number" class="form-control" name="jumlah_kamar">
			    	
			    </div>
			</div>
			<div class="col-3">
    			<div class="form-group" style="margin-top: 37px" >
    		           <button type="button" id="show" class="form-control btn btn-secondary ">Submit</button>
    			</div>
	    	</div>
    	</div>
	</div>

                
				<br />
				<div id="pemesanan" class="container border">
					<h1>Form Pemesanan</h1>
					<div class="container ">
						<div class="row">
							<div class="col">
								<div class="form-group">
									<label for="nama_pemesan">nama pemesan</label>
									<input type="text" class="form-control" name="nama_pemesan" placeholder="nama pemesan" required maxlength="50" />
									<div class="invalid-feedback"></div>
								</div>
								<div class="form-group">
									<label for="email">email</label>
									<input type="email" class="form-control" aria-describedby="emailHelp" name="email" placeholder="email" required maxlength="60" />
									<div class="invalid-feedback"></div>
								</div>
								<div class="form-group">
									<label for="contact">no.hp</label>
									<input type="number" class="form-control" name="no_hp" placeholder="Nomor Kontak"  required maxlength="16" />
									<div class="invalid-feedback"></div>
								</div>
							</div>
							<div class="col border-left">
								<div class="form-group">
									<label for="nama_tamu">Nama Tamu</label>
									<input type="text" class="form-control" name="nama_tamu" placeholder="Nama Tamu" required maxlength="50" />
									<div class="invalid-feedback"></div>
								</div>
								<div class="form-group">
									<label for="tipe_kamar">Tipe Kamar</label>
									<select name="id_kamar" id="id_kamar" class="form-control" required>
										<option value="">Tipe Kamar</option>

                                     <?php foreach ($rooms as $row) { ?>
                                     <option value="<?= $row->id_kamar; ?>"> <?=$row->tipe_kamar; ?> </option>
                                     <?php } ?>

									</select>
									<div class="invalid-feedback"></div>
								</div>
								<input type="text" class="d-none"  id="harga_sewa" name="harga_sewa" />
								<input type="text" class="d-none"  id="total_hari" name="total_hari" />
								<div class="form-group">
									<label for="nama_tamu">Estimasi Biaya</label>
									<input type="text" class="form-control" id="estimasi_biaya" name="estimasi_biaya" required readonly />
									<div class="invalid-feedback"></div>
								</div>

							</div>
						</div>
						<div>
							<button type="submit" id="konfirmasi" value="kirim" class="btn btn-secondary btn-block" style="margin: 3.3em auto;">Konfirmasi Pemesanan</button>
						</div>
					</div>
				</div>
			</form>
		</div>




		<div id="tentang" class="container p-2 my-5  border text-center">
			<h1 class="blog-header-logo">Tentang Kami</h1>
			<hr/>
			<p class="font-weight-light p-3 m-3">
			"Hotel Kami Menyediakan Beberapa Fasilitas Yang Menarik Bagi Para Tamu Wistawan"
			</p>
		</div>
  
  
  
    </div>
    <?php $this->load->view('_template/footer.php'); ?>

	<script type="text/javascript">

$(function() {
	$('#pemesanan').hide();
	$('#show').on('click', function() {
		const kamar = $('#jumlah_kamar').val();
		const firstDate = new Date($('#tgl_check_in').val());
		const secondDate = new Date($('#tgl_check_out').val());
		if (firstDate != 'Invalid Date' && secondDate != 'Invalid Date' && kamar != '') {
			$('#show').hide();
			$('#tentang').hide();
			$('#pemesanan').show();
			$('#nama_pemesan').focus();
		} else {
			getToast('Please input number of rooms, check in & check out date!', 'warning');
		}
	});
});

function getToast(msg, type) {
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
		icon: type,
		title: msg
	})
};

<?php if ($this->session->flashdata('success')) : ?>
	getToast('<?= $this->session->flashdata('success') ?>', 'success');
<?php endif ?>

function estimasiBiaya() {
	const harga = $('#harga_sewa').val();
	const hari = $('#total_hari').val();
	const kamar = $('#jumlah_kamar').val();
	if (harga != '' && hari != '' && kamar != '') {
		const total = harga * hari * kamar;
		$('#estimasi_biaya').val(total);
	} else {
		$('#estimasi_biaya').val('');
	}
};

function getTotalHari() {
	const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
	const firstDate = new Date($('#tgl_check_in').val());
	const secondDate = new Date($('#tgl_check_out').val());
	if (firstDate != 'Invalid Date' && secondDate != 'Invalid Date') {
		const diffDays = Math.round(Math.abs((firstDate - secondDate) / oneDay));
		$('#total_hari').val(diffDays);
	}
};


function cekDate() {
	var chkin = new Date($('#tgl_check_in').val()).setHours(0, 0, 0, 0);
	var chkout = new Date($('#tgl_check_out').val()).setHours(0, 0, 0, 0);
	if (chkin == chkout || chkin > chkout) {
		getToast('Invalid date!', 'warning');
		$('#tgl_check_in').val('');
		$('#tgl_check_out').val('');
	} else {
		getTotalHari();
		estimasiBiaya();
	}
}


$(document).ready(function() {

	//validate date picker
	var today = new Date();
	today.setDate(today.getDate() + 1);
	var dd = String(today.getDate()).padStart(2, '0');
	var mm = String(today.getMonth() + 1).padStart(2, '0');
	var yyyy = today.getFullYear();
	var minDate = yyyy + '-' + mm + '-' + dd;
	$('#tgl_check_in').attr('min', minDate);
	$('#tgl_check_out').attr('min', minDate);
	// end validate

	$('#jumlah_kamar').change(function() {
		estimasiBiaya();
	});

	$('#tgl_check_in').change(function() {
		cekDate();
	});

	$('#tgl_check_out').change(function() {
		cekDate();
	});

	$('#id_kamar').change(function() {
		var id_kamar = $(this).val();
		if (id_kamar != '') {
			$.ajax({
				url: "<?= site_url('page/get_room_detail'); ?>",
				method: "POST",
				data: {
					id_kamar: id_kamar
				},
				async: true,
				dataType: 'json',
				success: function(data) {
					$('#harga_sewa').val(data[0].harga_sewa);
					estimasiBiaya();
				}
			})
		} else {
			$('#harga_sewa').val('');
			$('#estimasi_biaya').val('');
		};
		return false;
	});

});
</script>
</body>

</html>