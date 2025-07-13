<section role="main" class="content-body">
    <header class="page-header">
        <h2>Kategori Ekleme</h2>
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
                        <label>Kategori Başlığı</label>
                        <input type="text" class="form-control" id="title">
                        <div id="parentDiv" style="display: none;">
                            <label>Ana Kategoriyi Seçiniz</label>
                            <select class="form-control" id="parent">
                                <option>Seçiniz.</option>
                                <? foreach ($args as $key => $category) { ?>
                                   <option value="<?=$category['id']?>"><?=$category['title']?></option> 
                                <? } ?>
                            </select>
                        </div>
                        <label>Ana Kategori</label>
                        <div class="switch switch switch-primary">
                            <input type="checkbox" id="isMain" data-plugin-ios-switch checked="checked"/>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <button id="categoryAdd" class="col-md-12 btn btn-primary">Ekle</button>
    <!-- end: page -->
</section>


<script>
    $('#isMain').on('change', function(){
        if (!$('#isMain').is(':checked')) {
           $('#parentDiv').show(); 
        } else {
             $('#parentDiv').hide(); 
        }
    })
    $('#categoryAdd').on('click',function() {
        var parent_id, isMain;

        if (!$('#isMain').is(':checked')) {
           isMain = "0";
           parent_id = $('#parent').val();
        } else {
            isMain = "1";
            parent_id = "0";
        }
        $('#categoryAdd').removeClass('col-md-12 btn btn-danger').addClass('col-md-12 btn btn-primary');
        $('#categoryAdd').text("Ekleme işlemi yapılıyor.");

        var request = {
            parent_id : parent_id,
            title : $('#title').val(),
            isMain : isMain,
        }
        $.ajax({
            url: "/category/add",
            type: "POST",
            data: request,
            success: function(data) {
                var response = JSON.parse(data);
                if(response.status == 200) {
                    $('#categoryAdd').removeClass('col-md-12 btn btn-primary').addClass('col-md-12 btn btn-success');
                    $('#categoryAdd').text(response.message);
                    setTimeout(function() {
                        window.location.href = "category";
                    }, 3000);
                } else if(response.status == 400) {
                    $('#categoryAdd').removeClass('col-md-12 btn btn-primary').addClass('col-md-12 btn btn-danger');
                    $('#categoryAdd').text(response.message);
                }

            },
            error: function(xhr, status, hata) {
               console.log(hata);
            }
        });

        

    });
</script>