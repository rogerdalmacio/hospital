<?php

    session_start();

    if(isset($_SESSION['status'])) {
        echo "<script>
        window.history.back();
        </script>";
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/alegario_logo.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;600&family=Bebas+Neue&family=Comfortaa:wght@500&family=Heebo:wght@100;200;300;400;500;600;700;800;900&family=Hind&family=Inter:wght@300;400;600;800&family=Poiret+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:wght@500;600&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Sans+3&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css">
    <title>Login - Alegario Cure Hospital</title>

</head>

<body>


    <div class="body"></div>

    <main>
        <div class="row justify-content-left" style="width: 100vh;"></div>
        <img src="assets/img/Hospital wheelchair-bro.svg" width="50%" class="rounded" alt="..." id="bg">
        </div>

        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center" id="card">

                            <div class="d-flex justify-content-center py-4" id="logo">
                                <a href="index.php" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/alegario_logo.png" alt="HR Logo" width="30%">
                                    <span class="d-lg-block small mb-0" style="font-family: 'Poiret One', cursive !important; color: #000000; font-weight: 600;">ALEGARIO CURE HOSPITAL</span>
                                </a>
                            </div>
                            <!-- End Logo -->
                            <div class="card mb-3" style="border: none;">

                                <div class="card-body" id="card-body" style="background: #fff; color: #000000;">

                                    <div class="pt-4 pb-2">
                                        <h2 class="card-title text-center " style="color: #06bbac; font-family: 'Inter', sans-serif; font-weight: 800;">LOGIN YOUR ACCOUNT</h2>
                                        <br>
                                    </div>
																											
                                   <form action="controllers/LoginController.php" method="post">

                                               <input type="text" name="email" placeholder="email" class="form-control" id="floatingInput" style="border-top: none; border-left: none; border-right: none; border-bottom: 1px solid #000 !important; box-shadow: none !important;" required><br>
                                               <input type="password" name="password" placeholder="password" class="form-control" id="floatingInput" style="border-top: none; border-left: none; border-right: none; border-bottom: 1px solid #000 !important; box-shadow: none !important;" required>
                                        <div class="col-12">
                                            <br>
											
                                            <button class="btn w-100" type="submit" name="submit" style="box-shadow: none;">Login</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0" style="text-align: center !important; color: #000000;"><a href="javascript:void(0)" class="first" style="color: #000;">Forgot Password?</a></p>
                                        </div>
                                        <br><br><br><br>
                                        <div class="col-12">
                                            <p class="small mb-0" style="text-align: center !important; color: #393939;">Copyright &copy; All Rights Reserved. Alegario Cure Hospital</p>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </section>
        </div>


    </main><!-- End #main -->

<script>
    document.querySelector(".first").addEventListener('click', function(){
        Swal.fire("Makakalimutin yarn? Tawagan mo 'yung super admin niyo para mareset 'yung password mo.");
});
</script>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/chart.js/chart.min.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/quill/quill.min.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
</body>

</html>