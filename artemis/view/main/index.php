<?php 
$settings = $args['settings'];
$sss = $args['sss'];


?>
<main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <video autoplay muted loop src="assets/img/video-özge-kuruserci_1.mp4" alt="" data-aos="fade-in"></video>
      <div class="container">
        <div class="row">
          <div class="col-lg-10">
            <h2 data-aos="fade-up" data-aos-delay="100">Kadın Hastalıkları<br> Doğum & Genital Estetik Uzmanı</h2>
            <p data-aos="fade-up" data-aos-delay="200">"Güvenle adım atın, uzmanlığımızla buradayız."</p>
          </div>
        </div>
      </div>
    </section><!-- /Hero Section -->
    
   
    
    <!-- Clients Section -->
      <section id="features" class="features section">

        <!-- <div class="container section-title" data-aos="fade-up">
          <h2>Doç. Dr. Özge Kömürcü Kurueserci </h2>
          <p>Sizin İçin Özenle Çalışıyoruz. Kadın Doğum Uzmanınızla Sağlıkta Ayrıcalığı Keşfedin!</p>
        </div> -->
    
        <div class="container">
    
          <div class="row gy-4 align-items-center features-item">
            <div class="col-lg-5 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
              <div class="txt">
              <h1 class="h1">Doç. Dr. Özge Kömürcü Karuserci </h1>
              <p>
           Sağlığınızı önemseyen ve size özel bir hizmet sunan kliniğimize hoş geldiniz.
           Kliniğimiz, modern tıbbın sunduğu en yeni teknolojilerle donatılmıştır. Amacımız, size en iyi sağlık hizmetini sunarken, güvenli ve konforlu bir ortam sağlamaktır.
             Temizlik ve hijyen konusunda kliniğimiz son derece titizdir. Her hasta öncesinde ve sonrasında, tüm ekipmanlar sterilize edilir ve dezenfekte edilir. Bu, size ve sevdiklerinize güvenle hizmet vermemizi sağlar.
              </p>
              <a href="/category/doc-dr-ozge-komurcu-karuserci" class="more-link">Daha Fazla</a>
            </div>
          </div>
            
            <div class="col-lg-7 order-1 order-lg-2 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
              <div class="image-stack">
                <img src="assets/img/foto.webp" alt="" class="stack-front">
                <img src="assets/img/klin1.webp" alt="" class="stack-back">
              </div>
            </div>
          </div><!-- Features Item -->
    
          <div class="row gy-4 align-items-stretch justify-content-between features-item ">
            <div class="col-lg-6 d-flex order-1 align-items-center features-img-bg" data-aos="zoom-out">
              <img src="assets/img/klinik3.webp" class="img-fluid" alt="">
            </div>
            <div class="col-lg-5 d-flex order-2 justify-content-center flex-column" data-aos="fade-up">
              <div class="txt">
              <h1 class="h1">Güçlü Kadınlar, Mutlu Doğumlar.</h1>
              <p>Kadın Hastalıkları ve Doğum Kliniğimizde; detaylı jinekolojik muayene, kadın hastalıkları tanı-tedavi, hamilelik, doğum öncesi ve doğumla ilgili hizmetler verilmektedir.</p>
              <ul>
                <li><i class="bi bi-check"></i> <span>Güvenilir Sağlık Hizmeti</span></li>
                <li><i class="bi bi-check"></i><span> Temiz Ve Hijyenik Ortam</span></li>
                <li><i class="bi bi-check"></i> <span>Mutlu Kadınlar</span></li>
              </ul>
              <a href="/category/basinda-biz" class="more-link">Daha Fazla</a>
            </div>
            </div>
          </div><!-- Features Item -->
    
        </div>
    
      </section>
     
  </div>
    <!-- /Clients Section -->

    <style>
    
    </style>

<!---------3 RESİM---------->
<section>
<div class="container">
  <h1 class="h1 text-center" style="margin-bottom: 6%;" data-aos="fade-up" data-aos-delay="100" >Her Yaşta, Her Dönemde Yanınızdayız!<br /> Kadın Sağlığını Önemsiyoruz!</h1>


     <div class="image-container" >
        <div class="image-item" data-aos="fade-up" data-aos-delay="300" >
            <a href="/category/polikistik-yumurtalik">
<img src="assets/img/Get An Upset Stomach After Eating Rich Foods_ How To Enjoy Delicious Meals Without The Ache  -.jfif" alt="Image 1"> </a>

            <p>Polikistik Yumurtalık</p>
            
        </div>
        <div class="image-item" data-aos="fade-up" data-aos-delay="400" >
            <a href="/category/menopoz">
            <img src="assets/img/50 Beautiful Hairstyles For 50-Year-Old Women.jfif" alt="Image 2"></a>
            <p>Menopoz Tedavisi</p>
        </div>
        <div class="image-item" data-aos="fade-up" data-aos-delay="500" >
            <a href="/category/gebelik-takibi">
            <img src="assets/img/121969619_1296607924015226_1743034373902593695_n.jpg" alt="Image 3"> </a>
            <span>
            <p>Gebelik Takibi</p></span>
        </div>
    </div>
  </div>
</section>
<!---------3 RESİM END---------->


    <!-- About Section -->
    <section id="about" class="about section " style="background-color: #f4f4f4;">

      <div class="container" data-aos="fade-up" data-aos-delay="100" >
        <div class="row align-items-xl-center" >
          <h1 class="h1 text-center" style="margin-bottom: 6%;">Sıkça Sorulan Sorular</h1>

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
        <img src="https://adminzone.newmore.com.tr/<?=$question['file']?>" alt="<?=$question['code']?>">
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
</section>


 

        
     

<section style="background-color: #F7F7F7; ">
   <main class="main" > 
    <div class="container ">
      <h1 class= "h1 text-center">Hizmetlerimiz ve teknolojilerimizle ilgili <br> güncellemeler için abone olun</h1>
      <div class="email-form">
        <input type="email" class="email-input" placeholder="Mail listemize katılın" style="font-style: italic;">
        <button class="send-btn"><i class="fas fa-arrow-right"></i></button>
      </div>
    </div>
   
      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
        <h1 class="h1" style="color: black; text-align: center; justify-content:center; align-items:center; margin-bottom: 4%; margin-top: 10%;">Klinik Ağımızı Keşfedin!</h1>
        <div class="row d-flex justify-content-center">
          <div class="col-md-5">
            <div class="clinic-box" data-aos="fade-up" data-aos-delay="100" style="background-color: #fff;">
              <h6 class="h6"><?=$settings['name']?></h6>
              <br>
              <strong>Adres:</strong><?=$settings['address']?><br> 
              <strong>Telefon:</strong><?=$settings['phone']?><br /><strong>E-Mail:</strong> <a href="<?=$settings['email']?>"><?=$settings['email']?></a>
            </div>
          </div>
          <div class="col-md-5" data-aos="fade-up" data-aos-delay="400">
          <iframe src="<?=$settings['map']?>" width="600" height="260" class="map" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        </div>
      </div>
    </section>
    </main>
  