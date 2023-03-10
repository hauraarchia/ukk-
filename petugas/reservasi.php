<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Kamar</h3>
        <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
                <!-- <li class="breadcrumb-item"><a href="tambah-kamar.php">Tambah Kamar</a></li> -->
            </ol>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pemesan</th>
                    <th>No. Handphone</th>
                    <th>Email</th>
                    <th>Nama Tamu</th>
                    <th>Tanggal Check In</th>
                    <th>Tanggal Check Out</th>
                    <th>Jumlah Kamar</th>
                    <th>Tipe Kamar</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php (include '../koneksi.php');
                $no = 1;
                $query = mysqli_query($kon, "SELECT * FROM pemesanan");
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['nama_pemesan'] ?></td>
                        <td><?php echo $row['no_hp'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['nama_tamu'] ?></td>
                        <td><?php echo $row['check_in'] ?></td>
                        <td><?php echo $row['check_out'] ?></td>
                        <td><?php echo $row['jumlah'] ?></td>
                        <td><?php echo $row['tipe_kamar'] ?></td>
                        <td>
                            <form action="status.php?id_pemesanan=<?php echo $row['id_pemesanan'] ?>" method="post">
                                <select name="status" class="d-none">
                                    <?php if ($row['status'] == 0) : ?>
                                        <option value="1">check-in</option>
                                    <?php elseif ($row['status'] == 1) : ?>
                                        <option value="2">check-out</option>
                                    <?php endif ?>

                                </select>
                                <?php if ($row['status'] == 0) : ?>
                                    <button type="submit" class="badge badge-warning border-0">Check-in</button>
                                <?php elseif ($row['status'] == 1) : ?>
                                    <button type="submit" class="badge badge-danger border-0">Check-out</button>
                                <?php elseif ($row['status'] == 2) : ?>
                                    <button type="button" class="badge badge-info border-0">Done</button>
                                <?php endif ?>

                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>