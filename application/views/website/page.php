<?php include('include/header.php'); ?>

<main id="content" role="main">
	<div id="banner-tops" class="bg-gray-13 bg-md-transparent" style="background-image: url(<?= !empty($page->banner_image) ? site_url($page->banner_image) : ""; ?>);">
		<div class="container">
			<div class="my-md-0 breadcrumb20">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
						<li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="<?= site_url(); ?>">Home</a>
						</li>
						<li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active"
							aria-current="page"><?= !empty($page->title) ? $page->title : ""; ?></li>
					</ol>
				</nav>
			</div>
		</div>
	</div>

	<section class="result">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-7">
					<div class="result1">
						<div class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-4">
							<h3 class="section-title section-title__full mb-0 pb-2 font-size-22"><?= !empty($page->title) ? $page->title : ""; ?></h3>
						</div>

						<p>
							<?= !empty($page->content) ? $page->content : ""; ?>
						</p>

						<div class="cta-highlight"> <span>Get A Detailed Consultation On Our Services By Calling Us
								Today!</span>
						</div>
						<p class="pt-4">
							<a href="contact.html" class="btn-cont btn  btn-primary">Contact Us
								Now</a>
						</p>
					</div>
				</div>
				<div class="col-md-5">
					<div class="result2">
						<?php
						if (!empty($page->side_image)) {
							?>
							<img src="<?= site_url($page->side_image); ?>">
							<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="want">
		<div class="overflow_bg blur_1"></div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<div class="want1">
						<h4>Education For Poor Child</h4>
					</div>
				</div>
				<div class="col-md-4"></div>
				<div class="col-md-2">
					<div class="want2">
						<p class="pt-4" style="padding-top: 12px!important;">
							<a href="contact.html" class="btn-cont btn  btn-primary">Contact Us
								Now</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="our-preferred">
		<div class="container-fluid">
			<div class="row">

				<div class="col-md-12">
					<div class="row">
						<?php
						if (!empty($pageInfo)) {
							foreach ($pageInfo as $valPageInfo) {
								?>
								<div class="col-md-4" style="margin-top: 15px;">
									<div class="our-preferred2">
										<div class="card-item">
											<div class="ci-inside"></div>
											<div class="ci-icon">
												<div class="item-image"><img
															src="<?= base_url("assets/frontend/img/logos.png"); ?>"
															alt=" Company" typeof="Image"></div>
											</div>
											<h3><?= $valPageInfo->title; ?></h3>
											<p>
												<?= $valPageInfo->content; ?>
											</p>
										</div>
									</div>

								</div>
								<?php
							}
						}
						?>
					</div>
				</div>

			</div>
		</div>
	</section>


	<section class="our-master">
		<div class="container-fluid">
			<div class="gallery" style="padding:0px;">
				<div class="row">
					<div class="col-md-12 mb-4 mb-xl-0 col-xl-12">
						<div class=" position-relative" style="    padding-top: 0px;">
							<div class="d-flex justify-content-between border-bottom border-color-1 flex-md-nowrap flex-wrap border-sm-bottom-0 best">
								<h3 class="section-title section-title__full mb-0 pb-2 font-size-22"
									style="text-align: center; display: block; width: 100%;">Services</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row text-center">
				<div class="col-md-12">
					<p>When it comes to ensuring the success of an e-commerce website developed by our team of
						professionals, we follow an objective approach that is fully result-oriented and carefully
						fine-tuned based on individual client requirements.</p>

				</div>
			</div>
			<div class="row our-master20">
				<?php
				if (!empty($service)) {
					foreach ($service as $valService) {
						?>
						<div class="col-md-4" style="margin-top: 15px;">
							<div class="row">
								<div class="col-md-2">
									<div class="our-master-icon">
										<img src="<?= base_url("assets/frontend/img/Seamless-Security.png"); ?>">
									</div>
								</div>
								<div class="col-md-10">
									<div class="our-master-content">
										<h4><?= $valService->title; ?></h4>
										<p><?= $valService->content; ?></p>
									</div>
								</div>
							</div>
						</div>
						<?php
					}
				}
				?>
			</div>
		</div>
	</section>


</main>

<?php include('include/footer.php'); ?>
