<?php 
$category = $args[0];
$mainCategories = $args[1];
?>
<section role="main" class="content-body">
    <header class="page-header">
        <h2><?=$category['title']?></h2>
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

                        <h2 class="card-title">Kategori Bilgileri</h2>
                    </header>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-9">
                                <label>Kategori Başlığı</label>
                                <input type="text" class="form-control" id="title" value="<?=$category['title']?>">
                                <div id="parentDiv" style="display: none;">
                                    <label>Ana Kategoriyi Seçiniz</label>
                                    <select class="form-control" id="parent">
                                        <option>Seçiniz.</option>
                                        <? foreach ($mainCategories as $key => $mainCategory) { ?>
                                           <option value="<?=$mainCategory['id']?>" <?=($category['parent_id'] == $mainCategory['id']) ? "selected":"";?>><?=$mainCategory['title']?></option> 
                                        <? } ?>
                                    </select>
                                </div>
                                <label>Ana Kategori</label>
                                <div class="switch switch switch-primary">
                                    <input type="checkbox" id="isMain" data-plugin-ios-switch <?=($category['isMain'] == "1" ) ? 'checked="checked"': "";?> />
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <label> Aktiflik Durumu </label>
                                <div class="switch switch switch-primary">
                                    <input type="checkbox" id="active" data-plugin-ios-switch <?=($category['active'] == "1" ) ? 'checked="checked"': "";?> />
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <button id="categoryUpdate" class="col-md-12 btn btn-primary">Güncelle</button>
    <!-- end: page -->
</section>

<script>
    $(document).ready(function() {
        if (!$('#isMain').is(':checked')) {
           $('#parentDiv').show(); 
        } else {
             $('#parentDiv').hide(); 
        }
    })
    $('#isMain').on('change', function(){
        if (!$('#isMain').is(':checked')) {
           $('#parentDiv').show(); 
        } else {
             $('#parentDiv').hide(); 
        }
    })
    $('#categoryUpdate').on('click',function() {
        var parent_id, isMain, active;

        if (!$('#isMain').is(':checked')) {
           isMain = "0";
           parent_id = $('#parent').val();
        } else {
            isMain = "1";
            parent_id = "0";
        }
        if ($('#active').is(':checked')) {
           active = "1";
        } else {
            active = "0";
        }
        $('#categoryUpdate').removeClass('col-md-12 btn btn-danger').addClass('col-md-12 btn btn-primary');
        $('#categoryUpdate').text("İşlem yapılıyor.");

        var request = {
            id : "<?=$category['id']?>",
            parent_id : parent_id,
            title : $('#title').val(),
            isMain : isMain,
            active : active
        }
        $.ajax({
            url: "/category/update",
            type: "POST",
            data: request,
            success: function(data) {
                var response = JSON.parse(data);
                if(response.status == 200) {
                    $('#categoryUpdate').removeClass('col-md-12 btn btn-primary').addClass('col-md-12 btn btn-success');
                    $('#categoryUpdate').text(response.message);
                    setTimeout(function() {
                        location.reload();
                    }, 3000);
                } else if(response.status == 400) {
                    $('#categoryUpdate').removeClass('col-md-12 btn btn-primary').addClass('col-md-12 btn btn-danger');
                    $('#categoryUpdate').text(response.message);
                }

            },
            error: function(xhr, status, hata) {
               console.log(hata);
            }
        });
    })

    $('#categoryDelete').on('click', function(){
        var request = {
            id : "<?=$category['id']?>",
        }
        $.ajax({
            url: "/category/delete",
            type: "POST",
            data: request,
            success: function(data) {
                var response = JSON.parse(data);
                if(response.status == 200) {
                    $('#categoryDelete').removeClass('col-md-12 btn btn-danger').addClass('col-md-12 btn btn-success');
                    $('#categoryDelete').text(response.message);
                    setTimeout(function() {
                        window.location.href = "category";
                    }, 3000);
                } else if(response.status == 400) {
                    $('#categoryDelete').removeClass('col-md-12 btn btn-danger').addClass('col-md-12 btn btn-danger');
                    $('#categoryDelete').text(response.message);
                }

            },
            error: function(xhr, status, hata) {
               console.log(hata);
            }
        });
    })
</script>