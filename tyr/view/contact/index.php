<?php 
$settings = $args['settings'];
?>
<style>
  .iletisim .mail-input {
    border: none;
    border-bottom: 2px solid #000;
    padding: 13px;
    margin-right: 10px;
    width: 700px;
    outline: none;
    font-size: 14px;
    background-color: transparent;
  }


  .iletisim {
    margin-top: 5%;
    text-align: center;
    flex-direction: column;

  }
</style>

<main class="main">
  <div class="page-title" data-aos="fade">
    <nav class="breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-xl-10 col-md-4">
            <ol>
              <li><a href="index.html">Anasayfa</a></li>
              <li class="current">Bize Ulaşın</li>
            </ol>
          </div>
        </div>
      </div>
    </nav>
  </div>
  </div><!-- End Page Title -->

  <!-- Starter Section Section -->
  <section id="starter-section" class="starter-section section">


    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <h1 class="h1" style="color: black; text-align: left;margin-bottom: 4%; ">Bize Ulaşın!</h1>
        </div>
      </div>
      <div class="row d-flex justify-content-center">
        <div class="col-md-6">
          <div class="clinic-box" data-aos="fade-up" data-aos-delay="100"
            style="background-color:  color-mix(in srgb, var(--default-color), transparent 95%);">
            <h6 class="h6"><?=$settings['name']?></h6>
            <p>Şahinbey/Gaziantep</p>
            <br>
            <em><strong>Çalışma Saatleri:</strong></em> 09.00-18.00 <br>
            <em><strong>Adres:</strong></em><?=$settings['address']?><br>
            <em><strong>Telefon:</strong></em><?=$settings['phone']?><br /><em><strong>E-Mail:</strong></em> <a
              href="<?=$settings['email']?>"><?=$settings['email']?></a>
          </div>
        </div>
        <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3184.1721751574028!2d37.31902607536198!3d37.053380003387744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1531e1e01e27f591%3A0x6ed38bde83c3afdb!2zRG_Dpy4gRHIuIMOWemdlIEvDtm3DvHJjw7wgS2FydXNlcmNpLCBLYWTEsW4gSGFzdGFsxLFrbGFyxLEgVmUgRG_En3VtIEtsaW5pxJ9p!5e0!3m2!1str!2str!4v1716220790987!5m2!1str!2str"
            width="600" height="200" class="map" style="border:0" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>

    <div class="form method mt-5">
        <div class="container" style="margin-bottom: 6%;">
          <div class="col-lg-12 ">
            <h1 class="h1 text-center" style="margin-top: 10% ;">İletişim Formu<br></h1>
            <div class="iletisim">
              <input type="text" class="mail-input" placeholder="İsim" name="ad" id="name"
                style="font-style: italic;">
              <input type="text" class="mail-input" placeholder="Soyisim" name="soy" id="surname"
                style="font-style: italic;">
              <input type="tel" class="mail-input" placeholder="Telefon" name="tel" id="phone"
                style="font-style: italic;">
              <textarea name="sub" class="mail-input" placeholder="Konu" id="content"
                style="font-style: italic; "></textarea>
            </div>
          </div>

          <span id="response" style="display:none; margin-left:40%; color:green;"></span>
          <div class="col-lg-9 col-xs-4">
            <input id="contact" type="submit" value="Gönder" class="btn">
          </div>
        </div>
    </div>
  </section><!-- /Starter Section Section -->
  <body>
</main>

<script>
  $('#contact').on('click',function() {
        var request = {
            name : $('#name').val(),
            surname : $('#surname').val(),
            phone : $('#phone').val(),
            content : $('#content').val(),
        }
        $.ajax({
            url: "/contact/send",
            type: "POST",
            data: request,
            success: function(data) {
                var response = JSON.parse(data);
                console.log(data);
                if(response.status == 200) {
                    $('#response').show();
                    $('#response').html(response.message);
                    setTimeout(function() {   
                        window.location.href = "contact";
                    }, 3000);
                }

            },
            error: function(xhr, status, hata) {
               console.log(hata);
            }
        });
  });
</script>