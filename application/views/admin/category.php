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
				<a href="<?= base_url('admin/add-category') ?>" class="btn btn-danger"><i class="fa fa-plus"></i> Add</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h6 class="card-title"></h6>
					<div class="table-responsive">
						<?= $this->session->flashdata('success'); ?>
						<table id="dataTableExample" class="table">
							<thead>
							<tr>
								<th>ID</th>
								<th>Title</th>
								<th>image</th>
								<th>Date</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							foreach ($category as $valCategory) {
								?>
								<tr>
									<td><?= $valCategory->id ?></td>
									<td><?= $valCategory->title; ?></td>
									<td>
										<?php
										if(!empty($valCategory->category_image)) {
										?>
										<img src="<?= base_url($valCategory->category_image) ?>" style="width: 40px;height: 40px;object-fit: contain; background-color: #fff;">
										<?php
										}
										?>
									</td>
									<td><?= $valCategory->created_at; ?></td>
									<td>
										<a class="text-<?= !empty($valCategory->status) ? "success" : "danger"; ?>" href="<?= base_url('admin/change-status/category/'.$valCategory->id) ?>">
											<i data-feather="toggle-<?= !empty($valCategory->status) ? "right" : "left"; ?>"></i>
										</a>
									</td>
									<td>
										<div class="d-flex justify-content-start">
											<a href="<?= base_url("admin/add-category/".$valCategory->id); ?>" class="btn btn-outline-success "><i data-feather="edit-2"></i> Edit</a>
											<a href="javascript:void(0)" onclick="if(confirm('Are you sure to delete this?')){ window.location='<?= base_url("admin/delete/category/".$valCategory->id); ?>/'; }" class=" btn btn-outline-danger mrr"><i data-feather="minus-circle"></i> Delect</a>
										</div>
									</td>
								</tr>
								<?php
							}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include('include/footer.php');

?>
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
