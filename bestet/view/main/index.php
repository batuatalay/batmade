<?php 
    $settings = $args['settings'];
    $sss = $args['sss'];
?>
<main class="main">
  <!-- Hero Section -->
    <section id="slide0" class="hero section" style="background-image: url('assets/img/kedi.png');background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <h2>Yumuşacık tüylerinin altında sakladıkları kocaman kalpleriyle bizlere koşulsuz sevgiyi öğretirler.</h2>
                </div>
            </div>
        </div>
    </section><!-- /Hero Section -->

    <section id="slide1" class="hero section" style="background-image: url('assets/img/kopek.png');background-size: cover; background-position: center; background-repeat: no-repeat; display: none;">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <h2>Sadakatleri ve sevgi dolu bakışlarıyla kalplerimizi ısıtan en vefalı dostlarımızdır.</h2>
                </div>
            </div>
        </div>
    </section><!-- /Hero Section -->

    <section id="slide2" class="hero section" style="background-image: url('assets/img/kus.png');background-size: cover; background-position: center; background-repeat: no-repeat; display: none;">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <h2>Gökyüzünde özgürce süzülürken bize umut ve özgürlüğün ne kadar değerli olduğunu hatırlatırlar.</h2>
                </div>
            </div>
        </div>
    </section><!-- /Hero Section -->

<!-- Clients Section -->
    <section id="features" class="features section">
        <div class="container">
            <div class="row gy-4 align-items-center features-item">
                <div class="col-lg-6">
                    <div class="txt">
                        <h1 class="h1">Bestet Veteriner Kliniği</h1>
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec auctor risus a purus vulputate euismod. Phasellus vel erat mi. Cras egestas lacus ex, sed convallis sapien aliquam quis. Aenean iaculis tortor ac lectus imperdiet fringilla. Sed molestie fermentum ligula, sit amet ullamcorper ex rhoncus id. Quisque placerat ante dui, et placerat risus fermentum et. Proin vulputate purus in ipsum viverra tempor. Suspendisse sagittis venenatis sem nec ultricies. Quisque tristique fermentum libero et rhoncus. Nam sapien felis, vehicula in augue luctus, mollis vehicula purus. Suspendisse potenti.</p>
                        <p>Donec dapibus tellus at justo finibus, vitae eleifend velit varius. Etiam convallis nibh velit, ut ornare massa malesuada sit amet. Integer interdum quis quam eget laoreet. Sed elementum quam tellus, nec luctus turpis egestas eget. Praesent nec tincidunt tortor. Praesent et iaculis magna, in tincidunt sem. Etiam lobortis a felis id rhoncus. Aliquam aliquet auctor justo et porttitor. Aenean sit amet lorem libero. Cras aliquet nunc viverra scelerisque interdum. Proin venenatis tristique nunc nec venenatis.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="image-stack">
                        <img src="assets/img/kadın.png" alt="" style="width: 600px;">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="stats">
        <div class="container position-relative">
            <div class="row gy-4">
                <h2 style="color:white !important; text-align: center; font-family: Dancing Script, cursive;">"Bir insanın karakteri, Hayvanlara nasıl davrandığıyla ortaya çıkar."</h2>
            </div>
        </div>
    </section>
    <section id="features" class="features section">
        <div class="container">
            <div class="row gy-4 align-items-center features-item">
                <div class="col-lg-6">
                    <div class="image-stack">
                        <img src="assets/img/erkek.png" alt="" style="width: 500px">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="txt">
                        <h1 class="h1">Sadık Dostlarımız</h1>
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec auctor risus a purus vulputate euismod. Phasellus vel erat mi. Cras egestas lacus ex, sed convallis sapien aliquam quis. Aenean iaculis tortor ac lectus imperdiet fringilla. Sed molestie fermentum ligula, sit amet ullamcorper ex rhoncus id. Quisque placerat ante dui, et placerat risus fermentum et. Proin vulputate purus in ipsum viverra tempor. Suspendisse sagittis venenatis sem nec ultricies. Quisque tristique fermentum libero et rhoncus. Nam sapien felis, vehicula in augue luctus, mollis vehicula purus. Suspendisse potenti.</p>
                        <p>Donec dapibus tellus at justo finibus, vitae eleifend velit varius. Etiam convallis nibh velit, ut ornare massa malesuada sit amet. Integer interdum quis quam eget laoreet. Sed elementum quam tellus, nec luctus turpis egestas eget. Praesent nec tincidunt tortor. Praesent et iaculis magna, in tincidunt sem. Etiam lobortis a felis id rhoncus. Aliquam aliquet auctor justo et porttitor. Aenean sit amet lorem libero. Cras aliquet nunc viverra scelerisque interdum. Proin venenatis tristique nunc nec venenatis.</p>
                    </div>
                </div>
            </div><!-- Features Item -->
        </div>
    </section>
<!-- About Section -->
    <section id="about" class="about section mt-5">
        <div class="container">
            <div class="row align-items-xl-center ">
                <h1 class="h1 text-center mb-4">Yazılar</h1>
                <style>
                    .item {
                        text-align: center;
                    }
                    .caption {
                        background: rgba(3, 0, 0, 0);
                        color: #333;
                        padding: 10px;
                        font-size: 15px;
                        text-align: center;
                    }
                </style>
            </div>
            <div class="owl-carousel owl-theme" style="margin-bottom: 4%;">
                <?php foreach ($sss as  $question) { ?> 
                    <div class="item">
                        <a href="page/<?=$question['code']?>" target = "_self">
                            <img src="<?=PANEL.$question['file']?>" alt="<?=$question['code']?>" style= "height: 200px;">
                            <div class="caption"><?=$question['title']?></div>
                        </a>
                    </div>
                <? } ?>
            </div>
            <!-- Owl Carousel JavaScript -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
            <script>
                $(document).ready(function(){
                    $(".owl-carousel").owlCarousel({
                        loop:true,
                        margin:10,
                        nav:true,
                        autoplay:true,
                        autoplayTimeout:3000,
                        autoplayHoverPause:true,
                        responsive:{
                              0:{
                                items:1
                            },
                            600:{
                                items:3
                            },
                            1000:{
                                items:5
                            }
                        }
                    });
                });
                    var slide = 0;
                    var totalSlides = 3;
                    setInterval(function() {
                        $('#slide' + slide).fadeOut(500, function() {
                          slide = (slide + 1) % totalSlides;
                          $('#slide' + slide).fadeIn(500);
                        });
                    }, 10000);

            </script>
        </div>
    </section>