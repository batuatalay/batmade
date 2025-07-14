<!doctype html>
<html class="fixed">
    <head>

        <!-- Basic -->
        <meta charset="UTF-8">
        <base href="<?=ENV?>" target="_blank">
        <meta name="keywords" content="HTML5 Admin Template" />
        <meta name="description" content="Porto Admin - Responsive HTML5 Template">
        <meta name="author" content="okler.net">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="assets/vendor/animate/animate.compat.css">
        <link rel="stylesheet" href="assets/vendor/font-awesome/css/all.min.css" />
        <link rel="stylesheet" href="assets/vendor/boxicons/css/boxicons.min.css" />
        <link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
        <link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

        <!-- Theme CSS -->
        <link rel="stylesheet" href="assets/css/theme.css" />

        <!-- Skin CSS -->
        <link rel="stylesheet" href="assets/css/skins/default.css" />

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="assets/css/custom.css">

        <!-- Head Libs -->
        <script src="assets/vendor/modernizr/modernizr.js"></script>

    </head>
    <body>
        <!-- start: page -->
        <section class="body-sign">
            <div class="center-sign">
                <a href="/" class="logo float-start" style="position:absolute; margin-top: 11px;" >
                    <img src="assets/img/adminZone.png" height="70" alt="Porto Admin"/>
                </a>

                <div class="panel card-sign">
                    <div class="card-title-sign mt-3 text-end">
                        <h2 class="title text-uppercase font-weight-bold m-0"><i class="bx bx-user-circle me-1 text-6 position-relative top-5"></i> Yönetim Paneli</h2>
                    </div>
                    <div class="card-body">
                        <form action="/login/signIn" method="POST">
                            <div class="form-group mb-3">
                                <label>Kullanıcı Adı</label>
                                <div class="input-group">
                                    <input id="username" type="text" class="form-control form-control-lg" />
                                    <span class="input-group-text">
                                        <i class="bx bx-user text-4"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="clearfix">
                                    <label class="float-start">Şifre</label>
                                </div>
                                <div class="input-group">
                                    <input id="password" type="password" class="form-control form-control-lg" />
                                    <span class="input-group-text">
                                        <i class="bx bx-lock text-4"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 text-end">
                                    <span style="color : red"><?= isset($args) ? $args: "başarısız"; ?> </span><br/>
                                    <span id="login" class="btn btn-primary col-lg-12">Giriş Yap</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- end: page -->

        <!-- Vendor -->
        <script src="assets/vendor/jquery/jquery.js"></script>
        <script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
        <script src="assets/vendor/popper/umd/popper.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="assets/vendor/common/common.js"></script>
        <script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
        <script src="assets/vendor/magnific-popup/jquery.magnific-popup.js"></script>
        <script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

        <!-- Specific Page Vendor -->

        <!-- Theme Base, Components and Settings -->
        <script src="assets/js/theme.js"></script>

        <!-- Theme Custom -->
        <script src="assets/js/custom.js"></script>

        <!-- Theme Initialization Files -->
        <script src="assets/js/theme.init.js"></script>
        <script>
            $('#login').on('click', function(){
                $('#login').removeClass('btn btn-danger').addClass('btn btn-primary');
                $('#login').text("Giriş Yapılıyor");
                var request = {
                  username : $('#username').val(),
                  password : $('#password').val()
                };
                $.ajax({
                    url: "login/signIn",
                    type: "POST",
                    data: request,
                    success: function(data) {
                        response = JSON.parse(data);
                        if(response.code == 200) {
                            window.location.href = response.link;
                        } else {
                            console.log(response);
                            $('#login').removeClass('btn btn-primary mt-2').addClass('btn btn-danger');
                            $('#login').text(response.message);
                        }
                    },
                    error: function(xhr, status, hata) {
                       console.log(hata);
                    }
                });
            })

        </script>
    </body>
</html>