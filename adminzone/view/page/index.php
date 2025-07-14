<?php 
$pages = $args[0];
$categories = $args[1];
?>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Sayfalar</h2>
        <div class="right-wrapper text-end">
            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>
    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>
                </header>

                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sayfa Başlığı</th>
                                <th>Sayfa Kodu </th>
                                <th>Sayfa Kategorisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($pages as $value) {
                            ?>
                                <tr>
                                    <td><?=$value['id']?></td>
                                    <td><a href= "page/<?=$value['id']?>" target = "_self"><?=$value['title']?></a></td>
                                    <td><?=$value['code']?></td>
                                    <td><?=$categories[$value['category_id']]['title']?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</section>
</div>