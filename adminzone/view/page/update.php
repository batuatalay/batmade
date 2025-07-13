<?php 
$page = $args[0];
$categories = $args[1];
?>
<section role="main" class="content-body">
    <header class="page-header">
        <h2><?=$page['title']?></h2>
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

                        <h2 class="card-title">Sayfa Bilgileri</h2>
                    </header>
                    <div class="card-body">
                            <label>Görsel : </label><br/>
                            <img src="<?=$page['file']?>" style="width: 30%;" ><hr/>

                            <label>Başlık</label>
                            <input type="text" class="form-control" id="title" value = "<?=$page['title']?>">
                            <label>Kategori</label>
                            <select class="form-control" id="category">
                                <? foreach ($categories as $key => $category) { ?>
                                    <option value="<?=$category['id']?>" <?=($category['id'] == $page['category_id']) ? "selected": "";?>><?=$category['title']?></option>
                                <? } ?>
                            </select>
                            <label>İçerik</label>
                            <div class="summernote" data-plugin-summernote data-plugin-options='{ "height": 180 }'><?=$page['content']?></div>
                            <label>Dosya Yükleme</label>
                            <input type="file" class="form-control" id="file">
                    </div>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button id="pageUpdate" class="col-md-12 btn btn-primary">Güncelle</button>
            </div>
            <div class="col">
                <button id="pageDelete" class="col-md-12 btn btn-danger">Sil</button>
            </div>
        </div>
    <!-- end: page -->
</section>


<script>
    function postData(image) {
        var plainText =$(".summernote").summernote('code');
        var request = {
                id : "<?=$page['id']?>",
                title : $('#title').val(),
                category_id : $('#category').val(),
                content : plainText,
                file : image
            }
        $.ajax({
            url: "/page/edit",
            type: "POST",
            data: request,
            success: function(data) {
                var response = JSON.parse(data);
                if(response.status == 200) {
                    $('#pageUpdate').removeClass('col-md-12 btn btn-primary').addClass('col-md-12 btn btn-success');
                    $('#pageUpdate').text(response.message);
                    setTimeout(function() {
                        window.location.href = "page";
                    }, 3000);
                } else if(response.status == 400) {
                    $('#pageUpdate').removeClass('col-md-12 btn btn-primary').addClass('col-md-12 btn btn-danger');
                    $('#pageUpdate').text(response.message);
                }

            },
            error: function(xhr, status, hata) {
               console.log(hata);
            }
        });
    }
    $('#pageUpdate').on('click',function() {
        $('#pageUpdate').removeClass('col-md-12 btn btn-danger').addClass('col-md-12 btn btn-primary');
        $('#pageUpdate').text("Ekleme işlemi yapılıyor.");
        var fileInput = document.getElementById("file");
        var file = fileInput.files[0];
        var reader = new FileReader();
        var base64String;
        if(!file) {
            postData("<?=$page['file']?>")
        } else {
            reader.onload = async function(event) {
                base64String = event.target.result;
                postData(base64String)
            };
        reader.readAsDataURL(file);
        }
    });
    $('#pageDelete').on('click', function(){
        var request = {
            id : "<?=$page['id']?>",
        }
        $.ajax({
            url: "/page/delete",
            type: "POST",
            data: request,
            success: function(data) {
                var response = JSON.parse(data);
                if(response.status == 200) {
                    $('#pageDelete').removeClass('col-md-12 btn btn-danger').addClass('col-md-12 btn btn-success');
                    $('#pageDelete').text(response.message);
                    setTimeout(function() {
                        window.location.href = "page";
                    }, 3000);
                } else if(response.status == 400) {
                    $('#pageDelete').removeClass('col-md-12 btn btn-danger').addClass('col-md-12 btn btn-danger');
                    $('#pageDelete').text(response.message);
                }

            },
            error: function(xhr, status, hata) {
               console.log(hata);
            }
        });
    })
</script>