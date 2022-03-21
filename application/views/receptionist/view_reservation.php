<div class="container">
    <div class="card">
        <div class="card-header">
            <h5><em>Detail Pemesanan</em></h5>
    </div>
</div>
<div class="card-body">
    <from action="" method="post">
        <div class="row">
            <div class="col6">
                <div class="from-group">
                    <label for="nama">Nama Pemesan</label>
                    <input class="from-control" id="nama" value="<?= $reservation->nama_pemesan ?>" readonly>
                </div>
                <div class="col-6">
                    <label for="nama">Email</label>
                    <input class="from-control" id="nama" value="<?= $reservation->email ?>" readonly>
                </div>
                <div class="col-6">
                    <label for="nama">No Hp</label>
                    <input class="from-control" id="nama" value="<?= $reservation->no_hp ?>" readonly>
                </div>
                <div class="col-6">
                    <label for="nama">Nama Tamu</label>
                    <input class="from-control" id="nama" value="<?= $reservation->nama_tamu ?>" readonly>
                </div>
                <div class="col-6">
                    <label for="nama">Jumlah kamar</label>
                    <input class="from-control" id="nama" value="<?= $reservation->jumlah_kamar ?>" readonly>
                </div>
                <div class="col-6">
                    <label for="nama">Id_kamar</label>
                    <input class="from-control" id="nama" value="<?= $reservation->id_kamar ?>" readonly>
                </div>
                <div class="col-6">
                    <label for="nama">Tgl Check In</label>
                    <input class="from-control" id="nama" value="<?= $reservation->tgl_check_in ?>" readonly>
                </div>
                <div class="col-6">
                    <label for="nama">Tgl Check Out</label>
                    <input class="from-control" id="nama" value="<?= $reservation->tgl_check_out ?>" readonly>
                </div>
            </div>
        </div>
    </div>
</div>
