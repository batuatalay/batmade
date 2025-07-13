<?php 
?>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Yönetici Ekleme</h2>
    </header>

    <!-- start: page -->
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <div class="card-actions">
                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                            <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                        </div>

                        <h2 class="card-title">Yönetici Bilgileri</h2>
                    </header>
                    <div class="card-body">
                        <label>Adı</label>
                        <input type="text" class="form-control" id="name">
                        <label>Telefonu</label>
                        <input type="text" class="form-control" id="phone">
                        <label>Kullanıcı Adı</label>
                        <input type="text" class="form-control" id="username">
                         <label>Şifre</label>
                        <input type="text" class="form-control" id="password">
                    </div>
                </section>
            </div>
        </div>
        <button id="managerAdd" class="col-md-12 btn btn-primary">Ekle</button>
    <!-- end: page -->
</section>


<script>
    $('#managerAdd').on('click',function() {
        $('#managerAdd').removeClass('col-md-12 btn btn-danger').addClass('col-md-12 btn btn-primary');
        $('#managerAdd').text("Ekleme işlemi yapılıyor.");

        var request = {
            name : $('#name').val(),
            phone : $('#phone').val(),
            username : $('#username').val(),
            password : $('#password').val(),
            process : "New"
        }
        $.ajax({
            url: "/manager/add",
            type: "POST",
            data: request,
            success: function(data) {
                var response = JSON.parse(data);
                if(response.status == 200) {
                    $('#managerAdd').removeClass('col-md-12 btn btn-primary').addClass('col-md-12 btn btn-success');
                    $('#managerAdd').text(response.message);
                    setTimeout(function() {
                        location.reload();
                    }, 3000);
                } else if(response.status == 400) {
                    $('#managerAdd').removeClass('col-md-12 btn btn-primary').addClass('col-md-12 btn btn-danger');
                    $('#managerAdd').text(response.message);
                }

            },
            error: function(xhr, status, hata) {
               console.log(hata);
            }
        });

        

    })
</script>