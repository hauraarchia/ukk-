<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Hotel Hebat</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/logo/logo.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="template1/css/bootstrap.min.css">
    <link rel="stylesheet" href="template1/css/owl.carousel.min.css">
    <link rel="stylesheet" href="template1/css/magnific-popup.css">
    <link rel="stylesheet" href="template1/css/font-awesome.min.css">
    <link rel="stylesheet" href="template1/css/themify-icons.css">
    <link rel="stylesheet" href="template1/css/nice-select.css">
    <link rel="stylesheet" href="template1/css/flaticon.css">
    <link rel="stylesheet" href="template1/css/gijgo.css">
    <link rel="stylesheet" href="template1/css/animate.css">
    <link rel="stylesheet" href="template1/css/slicknav.css">
    <link rel="stylesheet" href="template1/css/style.css">
    <!-- <link rel="stylesheet" href="template1/css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-5 col-lg-6">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="kamar.php">Kamar</a></li>
                                        <li><a class="active" href="fasilitas.php">Fasilitas</a></li>
                                        <li><a href="login.php">Login</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="index.html">
                                    <img src="img/logo/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-4 d-none d-lg-block">
                            <div class="book_room">

                                <div class="book_btn d-none d-lg-block">
                                    <a class="popup-with-form" href="#test-form">Pesan Kamar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg">
        <h3>HOTEL HEBAT</h3>
        <h3>FASILITAS</h3>
    </div>
    <!-- bradcam_area_end -->

    <!-- about_area_start -->
    <div class="about_area">
        <div class="container">
            <?php (include 'koneksi.php');
            $no = 1;
            $query = mysqli_query($kon, "SELECT * FROM fasilitas");
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <div class="row">
                    <div class="col-xl-5 col-lg-5">
                        <div class="about_info">
                            <div class="section_title mb-20px">
                                <span>Fasilitas Hotel</span>
                                <h3><?php echo $row['nama_fasilitas'] ?></h3>
                            </div>
                            <p><?php echo $row['ket_fasilitas'] ?></p>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7">
                        <div class="about_thumb d-flex">
                            <div class="img_1" >
                                <img src="img/fasilitas/<?php echo $row["gambar_fasilitas"]; ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    <?php } ?>
    </div>
    <!-- about_area_end -->

    <!-- about_info_area_start -->
    <div class="about_info_area">
        <div class="about_active owl-carousel">
            <div class="single_slider about_bg_1"></div>
            <div class="single_slider about_bg_1"></div>
            <div class="single_slider about_bg_1"></div>
            <div class="single_slider about_bg_1"></div>
        </div>
    </div>
    <!-- about_info_area_start -->

    <!-- footer -->
    <footer class="footer">
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-8 col-md-7 col-lg-9">
                        <p class="copy_right">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            SMKN 1 PASURUAN | Rekayasa Perangkat Lunak
                            <i class="fa fa-heart-o" aria-hidden="true"></i> by
                            <a href="https://colorlib.com" target="_blank">Haura Archia | XII RPL 1</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                    <div class="col-xl-4 col-md-5 col-lg-3">

                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer_end -->

    <!-- form itself end-->
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
                            <select class="form-select wide" name="room_tipe" id="default-select" class="">
                                <option data-display="Room type">Room type</option>
                                <option value="1">Laxaries Rooms</option>
                                <option value="2">Deluxe Room</option>
                                <option value="3">Signature Room</option>
                                <option value="4">Couple Room</option>
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
    <!-- form itself end -->


    <!-- JS here -->
    <script src="template1/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="template1/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="template1/js/popper.min.js"></script>
    <script src="template1/js/bootstrap.min.js"></script>
    <script src="template1/js/owl.carousel.min.js"></script>
    <script src="template1/js/isotope.pkgd.min.js"></script>
    <script src="template1/js/ajax-form.js"></script>
    <script src="template1/js/waypoints.min.js"></script>
    <script src="template1/js/jquery.counterup.min.js"></script>
    <script src="template1/js/imagesloaded.pkgd.min.js"></script>
    <script src="template1/js/scrollIt.js"></script>
    <script src="template1/js/jquery.scrollUp.min.js"></script>
    <script src="template1/js/wow.min.js"></script>
    <script src="template1/js/nice-select.min.js"></script>
    <script src="template1/js/jquery.slicknav.min.js"></script>
    <script src="template1/js/jquery.magnific-popup.min.js"></script>
    <script src="template1/js/plugins.js"></script>
    <script src="template1/js/gijgo.min.js"></script>

    <!--contact js-->
    <script src="template1/js/contact.js"></script>
    <script src="template1/js/jquery.ajaxchimp.min.js"></script>
    <script src="template1/js/jquery.form.js"></script>
    <script src="template1/js/jquery.validate.min.js"></script>
    <script src="template1/js/mail-script.js"></script>

    <script src="template1/js/main.js"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }

        });
    </script>


</body>

</html>