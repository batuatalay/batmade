<?php 
?>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Sayfa Ekleme</h2>
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

                        <h2 class="card-title">Sayfa</h2>
                    </header>
                    <div class="card-body">
                            <label>Başlık</label>
                            <input type="text" class="form-control" id="title">
                            <label>Kategori</label>
                            <select class="form-control" id="category">
                                <? foreach ($args as $key => $category) { ?>
                                    <option value="<?=$category['id']?>"><?=$category['title']?></option>
                                <? } ?>
                            </select>
                            <label>İçerik</label>
                            <div class="summernote" data-plugin-summernote data-plugin-options='{ "height": 180 }'></div>
                            <label>Dosya Yükleme</label>
                            <input type="file" class="form-control" id="file">
                    </div>
                </section>
            </div>
        </div>
        <button id="pageAdd" class="col-md-12 btn btn-primary">Ekle</button>
    <!-- end: page -->
</section>


<script>
    $('#pageAdd').on('click',function() {
        $('#pageAdd').removeClass('col-md-12 btn btn-danger').addClass('col-md-12 btn btn-primary');
        $('#pageAdd').text("İşlem Yapılıyor");
        var plainText =$(".summernote").summernote('code');

        var fileInput = document.getElementById("file");
        var file = fileInput.files[0];
        var reader = new FileReader();
        if(!file) {
            var request = {
                title : $('#title').val(),
                category_id : $('#category').val(),
                content : plainText,
                file : ""
            }
            $.ajax({
                url: "/page/add",
                type: "POST",
                data: request,
                success: function(data) {
                    var response = JSON.parse(data);
                    if(response.status == 200) {
                        $('#pageAdd').removeClass('col-md-12 btn btn-primary').addClass('col-md-12 btn btn-success');
                        $('#pageAdd').text(response.message);
                        setTimeout(function() {
                            window.location.href = "page";
                        }, 3000);
                    } else if(response.status == 400) {
                        $('#pageAdd').removeClass('col-md-12 btn btn-primary').addClass('col-md-12 btn btn-danger');
                        $('#pageAdd').text(response.message);
                    }

                },
                error: function(xhr, status, hata) {
                   console.log(hata);
                }
            });
        } else {
            reader.onload = function(event) {
                var base64String = event.target.result;
                var request = {
                    title : $('#title').val(),
                    category_id : $('#category').val(),
                    content : plainText,
                    file : base64String
                }
                $.ajax({
                    url: "/page/add",
                    type: "POST",
                    data: request,
                    success: function(data) {
                        var response = JSON.parse(data);
                        if(response.status == 200) {
                            $('#pageAdd').removeClass('col-md-12 btn btn-primary').addClass('col-md-12 btn btn-success');
                            $('#pageAdd').text(response.message);
                            setTimeout(function() {
                                window.location.href = "page";
                            }, 3000);
                        } else if(response.status == 400) {
                            $('#pageAdd').removeClass('col-md-12 btn btn-primary').addClass('col-md-12 btn btn-danger');
                            $('#pageAdd').text(response.message);
                        }

                    },
                    error: function(xhr, status, hata) {
                       console.log(hata);
                    }
                });
            };
            reader.readAsDataURL(file);
        }
    })
</script>