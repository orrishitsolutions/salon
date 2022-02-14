<?php
include('include/head.php');
include('include/left-header.php');
include('include/top-header.php');
$addPage = "add-category-pages";
$page = "category-pages";
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
							<?= !empty($category['error']) ? $category['error'] : ""; ?>
							<?= !empty($category['success']) ? $category['success'] : ""; ?>
						</div>
						<form class="cmxform" id="socialForm" method="post" action="<?= base_url('admin/'.$addPage); ?><?= !empty($category['param']) ? "/".$category['param'] : ""; ?>" enctype="multipart/form-data" >
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
							<fieldset>
								<div class="mb-3">
									<label for="name" class="form-label">Name
									</label>
									<input id="name" class="form-control" name="name" type="text" value="<?= !empty($category['name']) ? $category['name'] : "" ?>">
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
