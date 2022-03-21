<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('_template/header.php'); ?>
    <title></title>
</head>
<body>
      
</body>
</html>
<div>
    <?php $this->load->view('_template/menubar.php'); ?>  
<div class="container border show">
                        <div class="p-2 m-4">
                            <div class="col  text-center">
                                <img src="<?= empty($room->image) ? base_url('assets/img/no_image.png')  : base_url('upload/rooms/' . $room->image) ?>" height="300px" width="500px">
                                <hr />
                                <small>starting from</small>
                                <h5>
                                    <label class="text-warning">Rp <?= html_escape($room->harga_sewa) ?> </label>
                                    <small>/ room / night</small>
                                </h5>
                            </div>
                            <div class="col">
                                <h3><?= html_escape($room->tipe_kamar) ?></h3>
                                <div id="fasilitas" class="small"><?= $room->fasilitas_kamar ?></div>
                            </div>
                        </div>
                    </div>
                </body>
            <html>
        </div>