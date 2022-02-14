<?php
include('include/head.php');
include('include/left-header.php');
include('include/top-header.php');
?>
<div class="page-content">
	<div class="row">
		<div class="col-md-8">
			<h6 class="card-title">MANAGEMENT CATEGORY > Catalog > Categories</h6>
		</div>
		<div class="col-md-4 mb-4" style="text-align: right;">
			<div class="Add-bottom">
				<a href="<?= base_url('admin/category') ?>" class="btn btn-danger"><i class="fa fa-minus"></i> Back</a>
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
							<?= !empty($category['error']) ? $category['error'] : ""; ?>
							<?= !empty($category['success']) ? $category['success'] : ""; ?>
						</div>
						<form class="cmxform" id="socialForm" method="post" action="<?= base_url('admin/add-category'); ?><?= !empty($category['param']) ? "/".$category['param'] : ""; ?>" enctype="multipart/form-data" >
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
							<fieldset>
								<div class="mb-3">
									<label for="parent_id" class="form-label">Parent
									</label>
									<select id="parent_id" class="form-control" name="parent_id" >
										<option value="">------SELECT------</option>
										<?php
										foreach ($category['category'] as $pVal) {
											?>
											<option value="<?= $pVal->id; ?>" <?= !empty($category['parent_id']) ? ($category['parent_id'] == $pVal->id ? 'selected="selected"' : '') : "" ?> >
												<?= $pVal->title; ?>
											</option>
											<?php
										}
										?>
									</select>
								</div>
								<div class="mb-3">
									<label for="title" class="form-label">Title
									</label>
									<input id="title" class="form-control" name="title" type="text" value="<?= !empty($category['title']) ? $category['title'] : "" ?>">
								</div>
								<div class="mb-3">
									<label for="meta_title" class="form-label">Meta Title</label>
									<input id="meta_title" class="form-control" name="meta_title" type="text" value="<?= !empty($category['meta_title']) ? $category['meta_title'] : "" ?>">
								</div>
								<div class="mb-3">
									<label for="meta_keyword" class="form-label">Meta Keyword</label>
									<input id="meta_keyword" class="form-control" name="meta_keyword" type="text" value="<?= !empty($category['meta_keyword']) ? $category['meta_keyword'] : "" ?>">
								</div>
								<div class="mb-3">
									<label for="meta_description" class="form-label">Meta Description</label>
									<input id="meta_description" class="form-control" name="meta_description" type="text" value="<?= !empty($category['meta_description']) ? $category['meta_description'] : "" ?>">
								</div>
								<div class="mb-3">
									<label for="slug" class="form-label">Slug</label>
									<input id="slug" class="form-control" name="slug" type="text" value="<?= !empty($category['slug']) ? $category['slug'] : "" ?>">
								</div>
								<div class="mb-3">
									<label for="content" class="form-label">Content</label>
									<textarea class="form-control" name="content" id="content" rows="10"><?= !empty($category['content']) ? $category['content'] : "" ?></textarea>
								</div>
								<div class="mb-3">
									<label for="tabs_text" class="form-label">Tab's Left Image Text</label>
									<input id="tabs_text" class="form-control" name="tabs_text" type="text" value="<?= !empty($category['tabs_text']) ? $category['tabs_text'] : "" ?>">
								</div>
								<div class="mb-3">
									<label for="is_top_header" class="form-label">Is Top Header</label>
									<select id="is_top_header" class="form-control" name="is_top_header">
										<option value="0" <?= !empty($category['is_top_header']) ? ($category['is_top_header'] == 0 ? 'selected="selected"' : "") : "" ?> >No</option>
										<option value="1" <?= !empty($category['is_top_header']) ? ($category['is_top_header'] == 1 ? 'selected="selected"' : "") : "" ?> >Yes</option>
									</select>
								</div>
								<div class="mb-3">
									<label for="is_top_navigation" class="form-label">Is Top Navigation</label>
									<select id="is_top_navigation" class="form-control" name="is_top_navigation">
										<option value="0" <?= !empty($category['is_top_header']) ? ($category['is_top_header'] == 0 ? 'selected="selected"' : "") : "" ?> >No</option>
										<option value="1" <?= !empty($category['is_top_header']) ? ($category['is_top_header'] == 1 ? 'selected="selected"' : "") : "" ?> >Yes</option>
									</select>
								</div>
								<div class="mb-3">
									<label for="is_banner_part" class="form-label">Is banner Part</label>
									<select id="is_banner_part" class="form-control" name="is_banner_part">
										<option value="0" <?= !empty($category['is_top_header']) ? ($category['is_top_header'] == 0 ? 'selected="selected"' : "") : "" ?> >No</option>
										<option value="1" <?= !empty($category['is_top_header']) ? ($category['is_top_header'] == 1 ? 'selected="selected"' : "") : "" ?> >Yes</option>
									</select>
								</div>
								<div class="mb-3">
									<label for="category_image" class="form-label">Image</label>
									<input type="file" class="form-control" id="category_image" name="category_image" >
									<span class="error" style="font-size: 10px;">Dimension: 325px x 225px</span>
									<?php
									if (!empty($category['category_image'])) {
										?>
										<br/><img src="<?= base_url($category['category_image']) ?>" style="width: 40px;height: 40px;object-fit: contain; background-color: #fff;">
										<?php
									}
									?>
								</div>
								<div class="mb-3">
									<label for="top_header_image" class="form-label">Top Header Image</label>
									<input type="file" class="form-control" id="top_header_image" name="top_header_image" >
									<span class="error" style="font-size: 10px;">Dimension: 100px x 100px</span>
									<?php
									if (!empty($category['top_header_image'])) {
										?>
										<br/><img src="<?= base_url($category['top_header_image']) ?>" style="width: 40px;height: 40px;object-fit: contain; background-color: #fff;">
										<?php
									}
									?>
								</div>
								<div class="mb-3">
									<label for="top_navigation_image" class="form-label">Navigation Image</label>
									<input type="file" class="form-control" id="top_navigation_image" name="top_navigation_image" >
									<span class="error" style="font-size: 10px;">Dimension: 500px x 500px</span>
									<?php
									if (!empty($category['top_navigation_image'])) {
										?>
										<br/><img src="<?= base_url($category['top_navigation_image']) ?>" style="width: 40px;height: 40px;object-fit: contain; background-color: #fff;">
										<?php
									}
									?>
								</div>
								<div class="mb-3">
									<label for="banner_part_image" class="form-label">Banner Tabs Image</label>
									<input type="file" class="form-control" id="banner_part_image" name="banner_part_image" >
									<span class="error" style="font-size: 10px;">Dimension: 64px x 64px</span>
									<?php
									if (!empty($category['banner_part_image'])) {
										?>
										<br/><img src="<?= base_url($category['banner_part_image']) ?>" style="width: 40px;height: 40px;object-fit: contain; background-color: #fff;">
										<?php
									}
									?>
								</div>
								<div class="mb-3">
									<label for="tabs_image" class="form-label">Tabs Image</label>
									<input type="file" class="form-control" id="tabs_image" name="tabs_image" >
									<span class="error" style="font-size: 10px;">Dimension: 200px x 270px</span>
									<?php
									if (!empty($category['tabs_image'])) {
										?>
										<br/><img src="<?= base_url($category['tabs_image']) ?>" style="width: 40px;height: 40px;object-fit: contain; background-color: #fff;">
										<?php
									}
									?>
								</div>
								<div class="mb-3">
									<label for="top_header_order" class="form-label">Top Header Ordering</label>
									<input id="top_header_order" class="form-control" name="top_header_order" type="text" value="<?= !empty($category['top_header_order']) ? $category['top_header_order'] : "" ?>" >
								</div>
								<div class="mb-3">
									<label for="top_navigation_order" class="form-label">Top Navigation Ordering</label>
									<input id="top_navigation_order" class="form-control" name="top_navigation_order" type="text" value="<?= !empty($category['top_navigation_order']) ? $category['top_navigation_order'] : "" ?>" >
								</div>
								<div class="mb-3">
									<label for="banner_part_order" class="form-label">Banner part Ordering</label>
									<input id="banner_part_order" class="form-control" name="banner_part_order" type="text" value="<?= !empty($category['banner_part_order']) ? $category['banner_part_order'] : "" ?>" >
								</div>
								<div class="mb-3">
									<label for="status" class="form-label">Status</label>
									<select id="status" class="form-control" name="status">
										<option value="1" <?= !empty($category['status']) ? 'selected="selected"' : ""; ?> >Enabled</option>
										<option value="0" <?= empty($category['status']) ? 'selected="selected"' : ""; ?> >Disabled</option>
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
