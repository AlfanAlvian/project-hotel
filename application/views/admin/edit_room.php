<!DOCTYPE html>
<html>
<head>

    <?php $this->load->view('_template/header.php'); ?>
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <title></title>
</head>
<body>
    <?php $this->load->view('_template/menubar.php'); ?>
</body>
</html>
<div class="container">
        <div class="card">
            <div class="card-header">
                <h5>Input Kamar</h5>
                <?php if (isset($error)) : ?>
                    <div class="invalid-feedback"><?= $error ?></div>
                <?php endif; ?>
            </div>
            <div class="card-body m-2">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="tipe_kamar">Tipe Kamar</label>
                        <input type="text" class="form-control" value="<?= $room->tipe_kamar ?>" name="tipe_kamar" required maxlength="50"/>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_kamar">Jumlah Kamar</label>
                        <input type="number" min="1" max="900" class="form-control" value="<?= $room->jumlah_kamar ?>" name="jumlah_kamar"  placeholder="Jumlah kamar" required>


                    </div>
                    
                        <div class="form-group">
                            <label for="fasilitas_kamar">Fasilitas Kamar</label>
                            <input type="hidden" class="form-control" name="fasilitas_kamar" value="<?= html_escape($room->fasilitas_kamar) ?>" />
                         <div id="editor" class="form-control" style="min-height: 160px;"><?= $room->fasilitas_kamar ?></div>
                        
                    </div>
                    <div class="form-group">
                    <label for="harga_sewa">Harga_Sewa</label>
                    <input type="number" class="form-control" value="<?= $room->harga_sewa ?>" name="harga_sewa" />
                    </div>
                    <div class="form-group">
                        <img src="<?= base_url('upload/rooms/'. $room->image)?>" class="img-thumbnail my-1" style="width: 120px;" >
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image" accept="image/png, image/jpeg, image/jpg">
                    </div>
                    <div>
                        <button type="submit" id="save" value="save" class="btn btn-primary btn-block">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/quill.js') ?>"></script>
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
        quill.on('text-change', function(delta, oldDelta, source) {
            document.querySelector("input[name='fasilitas_kamar']").value = quill.root.innerHTML;
        });
    </script>

    </body>
        <?php $this->load->view('_template/footer.php'); ?>
    </html>