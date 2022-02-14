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
									<label for="page_id" class="form-label">Page
									</label>
									<select id="page_id" class="form-control" name="page_id" >
										<option value="">------SELECT------</option>
										<?php
										foreach ($data['pages'] as $pVal) {
											?>
											<option value="<?= $pVal->id; ?>" <?= !empty($data['page_id']) ? ($data['page_id'] == $pVal->id ? 'selected="selected"' : '') : "" ?> >
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
									<input id="title" class="form-control" name="title" type="text" value="<?= !empty($data['title']) ? $data['title'] : "" ?>">
								</div>
								<div class="mb-3">
									<label for="content" class="form-label">Content</label>
									<textarea class="form-control" name="content" id="content" rows="10"><?= !empty($data['content']) ? $data['content'] : "" ?></textarea>
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
