<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Kamar</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../template2/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../template2/dist/css/adminlte.min.css">
</head>

<body>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Kamar</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="simpan_edit_fas.php" method="post" autocomplete="off" enctype="multipart/form-data">
                            <?php
                            $id_fasilitas = $_GET['id'];
                            include "../koneksi.php";
                            $query = mysqli_query($kon, "SELECT * FROM fasilitas where id_fasilitas = $id_fasilitas");
                            $data = mysqli_fetch_array($query);
                            ?>
                            <input type="hidden" name="id_fas" value="<?php echo $data['id_fasilitas']; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Fasilitas</label>
                                    <input type="text" name="nama_fas" class="form-control" id="exampleInputEmail1" value="<?php echo $data['nama_fasilitas']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Keterangan Fasilitas</label>
                                    <textarea type="text" name="ket_fas" class="form-control" id="exampleInputPassword1" value="<?php echo $data['ket_fasilitas']; ?>"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Upload Gambar</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="gambar" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <img src="../img/fasilitas/<?php echo $data["gambar_fasilitas"]; ?>" height="50" width="60" title="<?php echo $data["gambar_fasilitas"]; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" name="proses" value="proses" class="btn btn-primary">UBAH</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.row -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- jQuery -->
    <script src="../template2/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../template2/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="../template2/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../template2/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../template2/dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
</body>

</html>