<?php
include('include/head.php');
include('include/left-header.php');
include('include/top-header.php');
$addPage = "add-pages";
$page = "pages";
?>
<div class="page-content">
	<div class="row">
		<div class="col-md-8">
			<h6 class="card-title">MANAGEMENT CATEGORY > Catalog > Categories</h6>
		</div>
		<div class="col-md-4 mb-4" style="text-align: right;">
			<div class="Add-bottom">
				<a href="<?= base_url('admin/'.$page) ?>" class="btn btn-danger"><i class="fa fa-minus"></i> Back</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h6 class="card-title"></h6>
					<div class="table-responsive">
						<div>
							<?= !empty($data['error']) ? $data['error'] : ""; ?>
							<?= !empty($data['success']) ? $data['success'] : ""; ?>
						</div>
						<form class="cmxform" id="socialForm" method="post" action="<?= base_url('admin/'.$addPage); ?><?= !empty($data['param']) ? "/".$data['param'] : ""; ?>" enctype="multipart/form-data" >
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
							<fieldset>
								<div class="mb-3">
									<label for="pages_category_id" class="form-label">Category
									</label>
									<br/>
									<?php
									$cat = !empty($data['category']) ? $data['category'] : [];
									?>
									<?= $controller->login->pageCategoryTree($cat); ?>
								</div>
								<div class="mb-3">
									<label for="title" class="form-label">Title
									</label>
									<input id="title" class="form-control" name="title" type="text" value="<?= !empty($data['title']) ? $data['title'] : "" ?>">
								</div>
								<div class="mb-3">
									<label for="meta_title" class="form-label">Meta Title
									</label>
									<input id="meta_title" class="form-control" name="meta_title" type="text" value="<?= !empty($data['meta_title']) ? $data['meta_title'] : "" ?>">
								</div>
								<div class="mb-3">
									<label for="meta_keyword" class="form-label">Meta Keyword
									</label>
									<input id="meta_keyword" class="form-control" name="meta_keyword" type="text" value="<?= !empty($data['meta_keyword']) ? $data['meta_keyword'] : "" ?>">
								</div>
								<div class="mb-3">
									<label for="meta_description" class="form-label">Meta Description
									</label>
									<input id="meta_description" class="form-control" name="meta_description" type="text" value="<?= !empty($data['meta_description']) ? $data['meta_description'] : "" ?>">
								</div>
								<div class="mb-3">
									<label for="slug" class="form-label">Slug
									</label>
									<input id="slug" class="form-control" name="slug" type="text" value="<?= !empty($data['slug']) ? $data['slug'] : "" ?>">
								</div>
								<div class="mb-3">
									<label for="menu_icon_image" class="form-label">Menu Icon Image</label>
									<input type="file" class="form-control" id="menu_icon_image" name="menu_icon_image" >
									<span class="error" style="font-size: 10px;">Dimension: 64px x 64px</span>
									<?php
									if (!empty($data['menu_icon_image'])) {
										?>
										<br/><img src="<?= base_url($data['menu_icon_image']) ?>" style="width: 40px;height: 40px;object-fit: contain; background-color: #fff;">
										<?php
									}
									?>
								</div>
								<div class="mb-3">
									<label for="banner_image" class="form-label">Banner Image</label>
									<input type="file" class="form-control" id="banner_image" name="banner_image" >
									<span class="error" style="font-size: 10px;">Dimension: 1920px x 600px</span>
									<?php
									if (!empty($data['banner_image'])) {
										?>
										<br/><img src="<?= base_url($data['banner_image']) ?>" style="width: 40px;height: 40px;object-fit: contain; background-color: #fff;">
										<?php
									}
									?>
								</div>
								<div class="mb-3">
									<label for="side_image" class="form-label">Side Image</label>
									<input type="file" class="form-control" id="side_image" name="side_image" >
									<span class="error" style="font-size: 10px;">Dimension: 458px x 444px</span>
									<?php
									if (!empty($data['side_image'])) {
										?>
										<br/><img src="<?= base_url($data['side_image']) ?>" style="width: 40px;height: 40px;object-fit: contain; background-color: #fff;">
										<?php
									}
									?>
								</div>
								<div class="mb-3">
									<label for="content" class="form-label">Content</label>
									<textarea class="form-control" name="content" <?php if(empty($data['is_home'])){ ?>id="content"<?php } ?> rows="15"><?= !empty($data['content']) ? $data['content'] : "" ?></textarea>
								</div>
								<div class="mb-3">
									<label for="status" class="form-label">Status</label>
									<select id="status" class="form-control" name="status">
										<option value="1" <?= !empty($data['status']) ? 'selected="selected"' : ""; ?> >Enabled</option>
										<option value="0" <?= empty($data['status']) ? 'selected="selected"' : ""; ?> >Disabled</option>
									</select>
								</div>

								<input class="btn btn-primary" name="submit" type="submit" value="Submit">
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
	.Add-bottom {
		margin-left: 200px;
	}

	.Add-bottom a i {
		margin-right: 10px;
	}

	.mrr {
		margin-left: 10px;
	}
</style>
<?php
include('include/footer.php');
?>
