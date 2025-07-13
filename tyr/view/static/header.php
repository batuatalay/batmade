<?php 
$mainCategories = $args['categories'];
$subCategories = $args['subCategories'];
$settings = $args['settings'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <base href="<?=ENV?>" target="_blank">
  <title><?=strtolower($args['header'])?> | Tyr</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/brands.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  <!-- Custom CSS -->

  <!-- Owl Carousel JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/brands.min.css">

  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">


</head>
<style>
  .whatsapp-button img {
    width: 45px;
    height: 45px;
    position: fixed;
    bottom: 16px;
    right: 60px;
    z-index: 1000;
  }
</style>
    <?php
        if($args['headerType'] == "services") { ?>
            <body class="services-details-page">
                <header id="header" class="header d-flex align-items-center sticky-top " style="background-color: #3b2216; max-height: 7em;">
        <? }else { ?>
            <body class="index-page">
                <header id="header" class="header d-flex align-items-center  fixed-top" style="max-height: 7em;">
        <? } ?>
    <div class="container-fluid position-relative d-flex align-items-center">
        <div class="col-md-4 col-6 offset-3 offset-md-0 text-center text-md-star">
            <a href="" class="logo  mx-4" target="_SELF">
                <h2 style="color: white !important; font-family: Dancing Script, cursive;"><?=$settings['name'];?></h2>
            </a>
        </div>
        <div class="col-md-8 col-3 text-end">
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="" style="color: #fff;" target = "_self"><span>ANASAYFA</span></a></li>
                        <?php foreach ($mainCategories as $key => $main) { ?>
                            <li <?=(count($subCategories[$main['code']]) > 0) ? 'class="dropdown"': ''?>>
                                <a style="color: #fff;"><span style="color: #fff;"><?=$main['title']?></span>
                                <?=(count($subCategories[$main['code']]) > 0) ? '<i class="bi bi-chevron-down toggle-dropdown"></i>': ''?>
                            </a>
                            <?php if(count($subCategories[$main['code']] > 0)) { ?>
                                <ul>
                                  <?php foreach($subCategories[$main['code']] as $sub) { ?>
                                    <li><a target="_SELF" href="category/<?=$sub['code']?>"><?=$sub['title']?></a></li>
                                <?php } ?>
                            </ul>
                        <? } ?>
                    </li>
                <?php } ?>
                    <li><a href="category/blog" style="color: #fff;" target="_SELF"><span>YAZILAR</span></a></li>
                    <li><a href="contact" style="color: #fff;" target="_SELF"><span>İLETİŞİM</span></a></li>
                    <li>
                        <div class="gtranslate_wrapper"></div>
                        <script>window.gtranslateSettings = {"default_language":"tr","detect_browser_language":true,"languages":["tr","en","ar"],"wrapper_selector":".gtranslate_wrapper","flag_size":24,"flag_style":"3d"}</script>
                        <script src="https://cdn.gtranslate.net/widgets/latest/flags.js" defer></script>
                    </li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </div>
</header>

<style>
   .gtranslate_wrapper {
        display: flex;
        gap: 0px;
        align-items: left;
        margin-right:200px;   
    }
    .gtranslate_wrapper img {
        cursor: pointer;
    }
</style>