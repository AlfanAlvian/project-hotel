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
                                <img src="<?= empty($fasilitas->image) ? base_url('assets/img/no_image.png')  : base_url('upload/facilities/' . $fasilitas->image) ?>" height="300px" width="500px">
                                
                            </div>
                            <div class="col">
                                <h3><?= html_escape($fasilitas->nama_fasilitas) ?></h3>
                                <div id="fasilitas" class="small"><?= $fasilitas->keterangan ?></div>
                            </div>
                        </div>
                    </div>
                </body>
                <?php $this->load->view('_template/footer.php'); ?>
            </html>
    
