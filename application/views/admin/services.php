<?php
include('include/head.php');
include('include/left-header.php');
include('include/top-header.php');
$page = pathinfo(__FILE__, PATHINFO_FILENAME);
$addPage = "add-".$page;
?>
<div class="page-content">
	<div class="row">
		<div class="col-md-8">
			<h6 class="card-title">WEBSITE HOME > Home > Pages Categories</h6>
		</div>
		<div class="col-md-4 mb-4" style="text-align: right;">
			<div class="Add-bottom">
				<a href="<?= base_url('admin/add-'.$page) ?>" class="btn btn-danger"><i class="fa fa-plus"></i> Add</a>
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
								<th>Date</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							foreach ($data as $valData) {
								?>
								<tr>
									<td><?= $valData->id ?></td>
									<td><?= $valData->title; ?></td>
									<td><?= $valData->created_at; ?></td>
									<td>
										<a class="text-<?= !empty($valData->status) ? "success" : "danger"; ?>" href="<?= base_url('admin/change-status/'.$page.'/'.$valData->id) ?>">
											<i data-feather="toggle-<?= !empty($valData->status) ? "right" : "left"; ?>"></i>
										</a>
									</td>
									<td>
										<div class="d-flex justify-content-start">
											<a href="<?= base_url("admin/".$addPage."/".$valData->id); ?>" class="btn btn-outline-success "><i data-feather="edit-2"></i> Edit</a>
											<a href="javascript:void(0)" onclick="if(confirm('Are you sure to delete this?')){ window.location='<?= base_url("admin/delete/".$page."/".$valData->id); ?>/'; }" class=" btn btn-outline-danger mrr"><i data-feather="minus-circle"></i> Delect</a>
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
