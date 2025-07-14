<?php
$keys = [];
$typeTargets = json_encode($args['type_target']);
?>

<section role="main" class="content-body">
	<header class="page-header">
		<h2>Site Ayarları</h2>

		<div class="right-wrapper text-end">
			<ol class="breadcrumbs">
				<li>
					<a href="index.html">
						<i class="bx bx-home-alt"></i>
					</a>
				</li>
			</ol>

			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
		</div>
	</header>

	<!-- start: page -->
		<div class="row">
			<div class="col">
				<section class="card">
					<header class="card-header">
						<h2 class="card-title">Site Ayarları</h2>
					</header>
					<div class="card-body">
						<?php foreach ($args as $key => $value) {
							if($key == "type_target") { 
								continue;
							} else { $keys[] = $key;?>
								<label><?=$language[$key]?></label>
                       			<input type="text" class="form-control" id="<?=$key?>" value="<?=$value?>">
							<? }
						}?>
						<br>
						<button id="settingSave" class="col-md-12 btn btn-primary">Kaydet</button>
					</div>
				</section>
			</div>
		</div>
</section>
<script>
	
	$('#settingSave').on('click', function(){
		var request = {
			'type_target' : <?=$typeTargets?>,
			<?php foreach ($keys as  $value) { ?>
				<?=$value?> : $('#<?=$value?>').val(),
			<?php } ?>
		};
		$.ajax({
            url: "/setting/update",
            type: "POST",
            data: request,
            success: function(data) {
                var response = JSON.parse(data);
                $('#settingSave').removeClass('col-md-12 btn btn-primary').addClass('col-md-12 btn btn-success');
                $('#settingSave').text(response.message);
                setTimeout(function() {
                    location.reload();
                }, 3000);

            },
            error: function(xhr, status, hata) {
               console.log(hata);
            }
        });
	})
</script>