<?php 


?>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Yönetici Düzenleme</h2>
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
                        <input type="text" class="form-control" id="name" value="<?=$args['name']?>">
                        <label>Telefonu</label>
                        <input type="text" class="form-control" id="phone" value="<?=$args['phone']?>">
                        <label>Kullanıcı Adı</label>
                        <input type="text" class="form-control" id="username" value="<?=$args['username']?>">
                         <label>Şifre</label>
                        <input type="text" class="form-control" id="password">
                        <label> Aktif </label>
                        <div class="switch switch switch-primary">
                            <input type="checkbox" id="status" data-plugin-ios-switch <?=($args['status'] == "Active") ? 'checked="checked"' : ''?> />
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <button id="managerUpdate" class="col-md-12 btn btn-primary">Güncelle</button>
    <!-- end: page -->
</section>


<script>
    $('#managerUpdate').on('click',function() {
        $('#managerUpdate').removeClass('col-md-12 btn btn-danger').addClass('col-md-12 btn btn-primary');
        $('#managerUpdate').text("Güncelleme işlemi yapılıyor.");
        if($('#status:checked').val() == "on") {
            var status = "Active";
        } else {
            var status = "Passive";
        }
        var request = {
            id : "<?=$args['id']?>",
            name : $('#name').val(),
            phone : $('#phone').val(),
            username : $('#username').val(),
            password : $('#password').val(),
            status : status
        }
        $.ajax({
            url: "/manager/update",
            type: "POST",
            data: request,
            success: function(data) {
                var response = JSON.parse(data);
                if(response.status == 200) {
                    $('#managerUpdate').removeClass('col-md-12 btn btn-primary').addClass('col-md-12 btn btn-success');
                    $('#managerUpdate').text(response.message);
                    setTimeout(function() {
                        window.location.href = "manager";
                    }, 3000);
                } else if(response.status == 400) {
                    $('#managerUpdate').removeClass('col-md-12 btn btn-primary').addClass('col-md-12 btn btn-danger');
                    $('#managerUpdate').text(response.message);
                }

            },
            error: function(xhr, status, hata) {
               console.log(hata);
            }

        });
    })
</script>