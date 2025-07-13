<?php 
$category = $args['category'];
$page = $args['page'];
$sss = $args['sss'];
?>
  <main class="main">

    <div class="page-title" data-aos="fade">
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li>Anasayfa</li>
            <li class="current" style="font-weight: 600;"><?=$page['title']?></li>
          </ol>
        </div>
      </nav>
    </div>

    <!-- Service Details Section -->
    <section id="service-details" class="service-details section">
      <div class="container">
        <div class="row gy-5" style="padding: 25px;">
          <div class="col-lg-12 ps-lg-5" data-aos="fade-up" data-aos-delay="200">
            <h3><?=$page['title']?></h3>
          <div class="col-lg-12">
            <center><img src="<?=PANEL . $page['file']?>" alt="" class="img-fluid services-img mb-4" style="width: 50%;"></center>
          </div>
           <?=$page['content'];?>
          </div>

        </div>

      </div>

    </section><!-- /Service Details Section -->
      <!-- About Section -->
      <section id="about" class="about section mt-5">

        <div class="container" data-aos="fade-up" data-aos-delay="100">
          <div class="row align-items-xl-center ">
            <h1 class="h1 text-center mb-4">Sıkça Sorulan Sorular</h1>
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
    
        <div class="owl-carousel owl-theme" style="margin-bottom: 4%;">
          <?php foreach ($sss as  $question) { ?> 
            <div class="item">
              <a href="page/<?=$question['code']?>" target = "_self">
                <img src="<?=PANEL . $question['file']?>" alt="<?=$question['code']?>">
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
            </script>
  <section>  
              </div>
            </div>
  
          </div>
        </div>
  
      </section>

  </main>