<?php 
$badge = [
"1" => ["badge badge-success", "Aktif"],
"0" => ["badge badge-warning", "Pasif"]
]
?>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Kategoriler</h2>
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
                                <th>Kategori Adı</th>
                                <th>Code</th>
                                <th>Ana Kategori </th>
                                <th>Durum </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($args as $value) {
                            ?>
                                <tr>
                                    <td><?=$value['id']?></td>
                                    <td><a href= "category/<?=$value['code']?>" target = "_self"><?=$value['title']?></a></td>
                                    <td><?=$value['code']?></td>
                                    <td><?=($value['isMain'] == 0) ? $args[$value['parent_id']]['title'] : "-";?></td>
                                    <td><span class="<?=$badge[$value['active']][0]?>"><?=$badge[$value['active']][1]?></td>
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