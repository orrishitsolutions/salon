<?php
$errors = $this->session->flashdata();
include('include/head.php');
include('include/left-header.php');
include('include/top-header.php');
?>
<div class="page-content">
	<div class="row">
		<div class="col-md-8">
			<h6 class="card-title">MANAGEMENT BLOG </h6>
		</div>
		<div class="col-md-4 mb-4" style="text-align: right;">
			<div class="Add-bottom">
				<a href="<?= base_url('admin/add_Blog') ?>" class="btn btn-danger"><i class="fa fa-plus"></i> Add</a>
			</div>
		</div>


		 <?php if (!empty($errors['status'])) : ?>
        <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
            <strong> <?= $errors['status'] ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
        </div>
        <?php endif; ?>

        <?php if (!empty($errors['error'])) : ?>
        <div class="alert alert-fill-warning alert-dismissible fade show mt-1" role="alert">
            <strong> <?= $errors['error'] ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
        </div>
        <?php endif; ?>


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
								 $sn=0;
                                if (count($blog_details) !== "") {
                                    for ($i = 0; $i < count($blog_details); $i++) {
                                    	$sn++;
                                ?>
                                <tr>
                                	<td><?=$sn?></td>
									<td style="white-space: unset; text-align: left;"> 
											<?= $blog_details[$i]['title'] ?>
									</td>
									<td>
										<img src="<?= base_url() ?>assets/frontend/upload/blog-image/<?= $blog_details[$i]['file'] ?>"
                                            style="width: 70px;height: 70px;object-fit: cover;">
									</td>
									<td> 

                                        <?php
                                                echo date('d M Y', strtotime($blog_details[$i]['created_at']))
                                        ?>
									</td>
									<td> 
										<?php
                                                if ($blog_details[$i]['status'] == '0') {
                                                ?>
                                        <a class="text-danger"
                                            href="<?= base_url('admin/home_status_blog') ?>/<?= $blog_details[$i]['id'] ?>">
                                            <i data-feather="toggle-left"></i>
                                        </a>
                                        <?php
                                                } else {
                                                ?>
                                        <a class="text-success "
                                            href="<?= base_url('admin/home_status_blog') ?>/<?= $blog_details[$i]['id'] ?>">
                                            <i data-feather="toggle-right"></i>
                                        </a>
                                        <?php
                                                }
                                                ?>
									</td>
									<td>
										
										<div class="d-flex justify-content-start">
											<a href="<?= base_url("admin/edit_blog/".$blog_details[$i]['id']); ?>" class="btn btn-outline-success "><i data-feather="edit-2"></i> Edit</a>


											<a href="javascript:void(0)" onclick="if(confirm('Are you sure to delete this?')){ window.location='<?= base_url("admin/delete_blog/".$blog_details[$i]['id']); ?>'; }" class=" btn btn-outline-danger mrr"><i data-feather="minus-circle"></i> Delect</a>
										</div>

									</td>
									
                            	</tr>

                            <?php } } ?>
							
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
