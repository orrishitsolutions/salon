<?php
include('include/head.php');
include('include/left-header.php');
include('include/top-header.php');
$page = substr(pathinfo(__FILE__, PATHINFO_FILENAME), 4);
$addPage = "add-".$page;
?>
<div class="page-content">
	<div class="row">
		<div class="col-md-8">
			<h6 class="card-title">MANAGEMENT CATEGORY > Catalog > Products</h6>
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
								<script>
									$(document).ready(function () {
										var i = 20;
										$('.categorytree input[type=checkbox]').each(function () {
											if ($(this).attr("parent_id") > 0) {
												$('<div style="margin-left: ' + i + 'px;width: ' + i + 'px;float: left;">&nbsp;</div>').insertAfter($(this));
											}
										})
										$('.categorytree input[type=checkbox]').each(function () {
											if ($(this).attr("parent_id") > 0) {
												var j = $(this).prevAll("input[type=checkbox]");
												if (j.attr("parent_id") > 0 && $(this).attr("parent_id") == j.val()) {
													var w = parseInt(j.next("div").css("margin-left"));
													if ($(this).next().is("div")) {
														$(this).next("div").css("margin-left", w + parseInt(i) + "px");
														$(this).next("div").css("width", w + parseInt(i) + "px");
													}
												}
											}
										})
									});
								</script>
								<div class="mb-3 categorytree" style="height: 400px; overflow: auto">
									<label for="category" class="form-label">Category</label>
									<br/>
									<?php
									$cat = !empty($data['category']) ? $data['category'] : [];
									//echo "<pre>";print_r($cat);die;
									$subMark = '';
									?>
									<?= $controller->login->categoryTree(0 , $subMark, $cat); ?>
								</div>
								<div class="mb-3">
									<label for="product_type_id" class="form-label">Type Name</label>
									<select id="product_type_id" class="form-control" name="product_type_id">
										<option value="">------SELECT------</option>
										<?php
										foreach ($data['product_type'] as $tVal) {
											?>
											<option value="<?= $tVal->id; ?>" <?= !empty($data['product_type_id']) ? ($data['product_type_id'] == $tVal->id ? 'selected="selected"' : '') : "" ?> >
												<?= $tVal->type_name; ?>
											</option>
											<?php
										}
										?>
									</select>
								</div>
								<div id="configurable_options" style="<?= $data['product_type_id'] == 2 ? 'display: block;' : 'display: none;'; ?>">
									<input id="check_configurable_options" type="hidden" value="0">
									<div class="mb-3">
										<label for="attributes_set_id" class="form-label">Attribute Set</label>
										<select id="attributes_set_id" class="form-control" name="attributes_set_id">
											<option value="">------SELECT------</option>
											<?php
											foreach ($data['attribute_set'] as $aVal) {
												?>
												<option value="<?= $aVal->id; ?>" <?= !empty($data['attributes_set_id']) ? ($data['attributes_set_id'] == $aVal->id ? 'selected="selected"' : '') : "" ?> >
													<?= $aVal->name; ?>
												</option>
												<?php
											}
											?>
										</select>
									</div>
								</div>
								<div class="mb-3">
									<label for="users_id" class="form-label">Users</label>
									<select id="users_id" class="form-control" name="users_id">
										<option value="">------SELECT------</option>
										<?php
										foreach ($data['users'] as $pVal) {
											?>
											<option value="<?= $pVal->id; ?>" <?= !empty($data['users_id']) ? ($data['users_id'] == $pVal->id ? 'selected="selected"' : '') : "" ?> >
												<?= $pVal->first_name.' '.$pVal->middle_name.' '.$pVal->last_name.' ('.$pVal->email.')'; ?>
											</option>
											<?php
										}
										?>
									</select>
								</div>
								<div class="mb-3">
									<label for="title" class="form-label">Title
									</label>
									<input id="title" class="form-control" name="title" type="text" value="<?= !empty($data['title']) ? $data['title'] : "" ?>">
								</div>
								<div class="mb-3">
									<label for="meta_title" class="form-label">Meta Title</label>
									<input id="meta_title" class="form-control" name="meta_title" type="text" value="<?= !empty($data['meta_title']) ? $data['meta_title'] : "" ?>">
								</div>
								<div class="mb-3">
									<label for="meta_keyword" class="form-label">Meta Keyword</label>
									<input id="meta_keyword" class="form-control" name="meta_keyword" type="text" value="<?= !empty($data['meta_keyword']) ? $data['meta_keyword'] : "" ?>">
								</div>
								<div class="mb-3">
									<label for="meta_description" class="form-label">Meta Description</label>
									<input id="meta_description" class="form-control" name="meta_description" type="text" value="<?= !empty($data['meta_description']) ? $data['meta_description'] : "" ?>">
								</div>
								<input id="slug" class="form-control" name="slug" type="hidden" value="<?= !empty($data['slug']) ? $data['slug'] : "" ?>">
								<div class="mb-3">
									<label for="sku" class="form-label">Sku</label>
									<input id="sku" class="form-control" name="sku" type="text" value="<?= !empty($data['sku']) ? $data['sku'] : "" ?>">
								</div>
								<div class="mb-3">
									<label for="quantity" class="form-label">Quantity</label>
									<input id="quantity" class="form-control" name="quantity" type="text" value="<?= !empty($data['quantity']) ? $data['quantity'] : "" ?>">
								</div>
								<div class="mb-3">
									<label for="content" class="form-label">Content</label>
									<textarea class="form-control" name="content" id="content" rows="10"><?= !empty($data['content']) ? $data['content'] : "" ?></textarea>
								</div>
								<div class="mb-3">
									<label for="image" class="form-label">Image</label>
									<input type="file" class="form-control" name="image[]" multiple="multiple">
								</div>
								<div class="mb-3">
									<label for="status" class="form-label">Status</label>
									<select id="status" class="form-control" name="status">
										<option value="1" <?= !empty($data['status']) ? 'selected="selected"' : ""; ?> >Enabled</option>
										<option value="0" <?= empty($data['status']) ? 'selected="selected"' : ""; ?> >Disabled</option>
									</select>
								</div>

								<input class="btn btn-primary" type="submit" value="Submit">
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
<script>
	$('#product_type_id').on('change', function () {
		if (this.value == 2) {
			$("#configurable_options").css("display", "block");
			$("#check_configurable_options").val(1);
		} else {
			$("#configurable_options").css("display", "none");
			$("#check_configurable_options").val(0);
		}
	});
</script>
<?php
include('include/footer.php');
?>
