
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Grand Noeri Hotel</title>
        <link href="<?= base_url();?>assets/dist/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body style="background-image: url('assets/dist/img/login.jpg');background-size: cover;">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container mt-5">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center">Login</h3>
                                    <h4 class="text-center">Admin Hotel Grand Noeri</h4></div>
                                    <div class="card-body">
                                        <form action="<?= site_url('login/proses') ;?>" method="post">
                                            <div class="form-group">
                                                <label class="small mb-1">Username</label>
                                                <input class="form-control py-4" type="text" placeholder="Masukkan Username" name="username" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Masukkan Password" />
                                            </div>
                                            
                                            <div class="form-group d-flex align-items-center mt-4 mb-0">
                                                <button type="submit" name="login" class="btn btn-primary w-100 rounded-pill">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <!-- <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div> -->
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url() ;?>assets/src/js/scripts.js"></script>
    </body>
</html>
