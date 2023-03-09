<form id="test-form" class="white-popup-block mfp-hide" action="simpan.php" method="POST">
    <div class="popup_box">
        <div class="popup_inner">
            <h3>Pesan Kamar</h3>

            <form>
                <div class="row">
                    <div class="input-group col-xl-12 mb-3">
                        <input type="text" name="nama_pemesan" placeholder="Nama Pemesan" class="form-control">
                    </div>
                    <div class="input-group col-xl-12 mb-3">
                        <input type="email" name="email" placeholder="Email" class="form-control">
                    </div>
                    <div class="input-group col-xl-12 mb-3">
                        <input type="number" name="no_hp" placeholder="Nomor Handphone" class="form-control">
                    </div>
                    <div class="input-group col-xl-12 mb-3">
                        <input type="text" name="nama_tamu" placeholder="Nama Tamu" class="form-control">
                    </div>
                    <div class="col-xl-6">
                        <input id="datepicker" name="cekin" placeholder="Check in date" />
                    </div>
                    <div class="col-xl-6">
                        <input id="datepicker2" name="cekout" placeholder="Check out date" />
                    </div>
                    <div class="input-group col-xl-12 mb-3">
                        <input type="number" name="jumlah" placeholder="Jumlah Kamar" class="form-control">
                    </div>
                    <div class="col-xl-12">
                        <select class="form-select wide" name="id_kamar" id="default-select" class="">

                            <option data-display="Room type">Room type</option>
                            <?php
                            $query = mysqli_query($kon, "SELECT * FROM kamar");
                            while ($row = mysqli_fetch_array($query)) :
                            ?>
                                <option value="<?php echo $row['id_kamar'] ?>"><?php echo $row['nama_kamar']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="col-xl-12">
                        <button type="submit" class="boxed-btn3">
                            PESAN KAMAR
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</form>