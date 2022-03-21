<!DOCTYPE html>
<html>
<head>

    <?php $this->load->view('_template/header.php'); ?>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>

<div>
    <?php $this->load->view('_template/menubar.php'); ?>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>edit</h5>
                <?php if (isset($error)) : ?>
                    <div class="invalid-feedback"><?= $error ?></div>
                <?php endif; ?>
            </div>
            <div class="card-body m-2">
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="nama_fasilitas">Nama Fasilitas</label>
                        <input type="text" class="form-control" value="<?= $fasilitas->nama_fasilitas?>" name="nama_fasilitas" required maxlength="50"/>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="hidden" class="form-control" name="keterangan" value="<?= html_escape($fasilitas->keterangan) ?>" />
                        <div id="editor" class="form-control" style="min-heigth: 160px;"><?= $fasilitas->keterangan; ?></div>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>    
                        <img src="<?= base_url('upload/facilities/'.$fasilitas->image) ?>" class="img-thumbnail my-1" style="width: 120px;">
                        <input type="file" class="form-control" name="image" id="image" accept="image/png, image/jpeg, image/jpg" >
                    </div>
                    <div>
                        <button type="submit" id="save" value="save" class="btn btn-primary btn-block">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <script src="<?= base_url('assets/js/quill.js') ?>"></script>
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
        quill.on('text-change', function(delta, oldDelta, source) {
            document.querySelector("input[name='keterangan']").value = quill.root.innerHTML;
        });
    </script>
</body>
<?php $this->load->view('_template/footer.php'); ?>
</html>