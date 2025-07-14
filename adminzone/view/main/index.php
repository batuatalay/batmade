<?php 
$pages = $args[0];
$mainCategories = $args[1];
$subCategories = $args[2];
$activeSubCategories = $args[3];
?>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Dashboard</h2>
        <div class="right-wrapper text-end">
            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>
    <div class="row">
        <div class="col">
            <section class="card">
                <div class="row">
                    <div class="col-xl-6">
                        <section class="card card-featured-left card-featured-primary mb-3">
                            <div class="card-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-primary">
                                            <i class="fa-solid fa-table-list"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h3>Ana Kategori</h3>
                                            <div class="info">
                                                <strong> Toplam : <?=count($mainCategories)?></strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-xl-6">
                        <section class="card card-featured-left card-featured-primary">
                            <div class="card-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-primary">
                                            <i class="fa-solid fa-file"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h3>Sayfalar</h3>
                                            <div class="info">
                                                <strong> Toplam : <?=count($pages)?></strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-xl-6">
                        <section class="card card-featured-left card-featured-primary mb-3">
                            <div class="card-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-primary">
                                            <i class="fa-solid fa-layer-group"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h3>Toplam Alt Kategori</h3>
                                            <div class="info">
                                                <strong> Toplam : <?=count($subCategories)?></strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-xl-6">
                        <section class="card card-featured-left card-featured-primary mb-3">
                            <div class="card-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-primary">
                                            <i class="fa-solid fa-list"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h3>Aktif Alt Kategori</h3>
                                            <div class="info">
                                                <strong> Toplam : <?=count($activeSubCategories)?></strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>
                    <h2 class="card-title">Ana Kategoriler</h2>
                </header>

                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0">
                        <thead>
                            <tr>
                                <th>Kategori Adı</th>
                                <th>Kodu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            foreach ($mainCategories as $value) {
                                $i++;
                                if($i > 5) {
                                    break;
                                }
                            ?>
                                <tr>
                                    <td><a href= "category/<?=$value['code']?>" target = "_self"><?=$value['title']?></a></td>
                                    <td><?=$value['code']?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
        <div class="col-xl-6">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>
                    <h2 class="card-title">Sayfalar</h2>
                </header>

                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0">
                        <thead>
                            <tr>
                                <th>Sayfa Adı</th>
                                <th>Kodu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            foreach ($pages as $value) {
                                $i++;
                                if($i > 5) {
                                    break;
                                }
                            ?>
                                <tr>
                                    <td><a href= "page/<?=$value['id']?>" target = "_self"><?=$value['title']?></a></td>
                                    <td><?=$value['code']?></td>
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