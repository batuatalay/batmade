<?php 
$badge = [
"active" => "badge badge-success",
"waiting" => "badge badge-warning",
"passive" => "badge badge-danger"
]
?>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Yöneticiler</h2>
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
                                <th>Adı</th>
                                <th>Kullanıcı Adı</th>
                                <th>Durumu</th>
                                <th>Son Giriş Tarihi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($args as $value) {
                            ?>
                                <tr>
                                    <td><?=$value['id']?></td>
                                    <td><a href= "manager/<?=$value['username']?>" target = "_self"><?=$value['name']?></a></td>
                                    <td><?=$value['username']?></td>
                                    <td><span class="<?=$badge[strtolower($value['status'])]?>"><?=$value['status']?></span></td>
                                    <td><?=$value['lastLogin']?></td>
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