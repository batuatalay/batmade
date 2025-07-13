<?php 
$category = $args['category'];
$page = $args['page'];
$sss = $args['sss'];
?>
<main class="main">
    <div class="page-title">
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li>Anasayfa</li>
                    <li class="current" style="font-weight: 600;"><?=$category['title']?></li>
                </ol>
            </div>
        </nav>
    </div>
    <section id="about" class="about section">
        <div class="container">
            <div class="row align-items-xl-center ">
                <h1 class="h1 text-center mb-4"><?=$category['title']?></h1>
                <style>
                  .item {
                    text-align: center;
                }
                .caption {
                    background: rgba(3, 0, 0, 0);
                    color: #333;
                    padding: 10px;
                    font-size: 15px;
                    text-align: center;
                }
                </style>
            </div>
            <div class="row">
                <?php foreach ($sss as  $question) { ?> 
                    <div class="item col-md-3">
                        <a href="page/<?=$question['code']?>" target = "_self">
                            <img src="<?=PANEL . $question['file']?>" alt="<?=$question['code']?>" style="height: 200px; width: 200px;">
                            <div class="caption"><?=$question['title']?></div>
                        </a>
                    </div>
                <? } ?>
            </div>
        </div>
    </section>  
</main>