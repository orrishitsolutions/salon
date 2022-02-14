<?php

$errors = $this->session->flashdata();


include('include/head.php');
include('include/left-header.php');
include('include/top-header.php');
?>

<div class="page-content">
   <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
      <div>
         <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
      </div>
      <div class="d-flex align-items-center flex-wrap text-nowrap">
         <div class="input-group date datepicker wd-200 me-2 mb-2 mb-md-0" id="dashboardDate"><span class="input-group-text input-group-addon bg-transparent border-primary"><i data-feather="calendar" class=" text-primary"></i></span><input type="text" class="form-control border-primary bg-transparent"></div>
         <!-- <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0"><i class="btn-icon-prepend" data-feather="printer"></i>Print</button><button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0"><i class="btn-icon-prepend" data-feather="download-cloud"></i>Download Report</button> -->
      </div>
   </div>
	<!--
   <div class="row">
      <div class="col-12 col-xl-12 stretch-card">
         <div class="row flex-grow-1">
            <div class="col-md-6 grid-margin stretch-card">
               <div class="card">
                  <div class="card-body">
                     <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">New Customers</h6>
                        <div class="dropdown mb-2">
                           <button class="btn p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i></button>
                           <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a></div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-6 col-md-12 col-xl-5">
                           <h3 class="mb-2">3,897</h3>
                           <div class="d-flex align-items-baseline">
                              <p class="text-success"><span>+3.3%</span><i data-feather="arrow-up" class="icon-sm mb-1"></i></p>
                           </div>
                        </div>
                        <div class="col-6 col-md-12 col-xl-7">
                           <div id="customersChart" class="mt-md-3 mt-xl-0"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
               <div class="card">
                  <div class="card-body">
                     <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">New Products</h6>
                        <div class="dropdown mb-2">
                           <button class="btn p-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i></button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a></div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-6 col-md-12 col-xl-5">
                           <h3 class="mb-2">35,084</h3>
                           <div class="d-flex align-items-baseline">
                              <p class="text-danger"><span>-2.8%</span><i data-feather="arrow-down" class="icon-sm mb-1"></i></p>
                           </div>
                        </div>
                        <div class="col-6 col-md-12 col-xl-7">
                           <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
	-->
   <div class="row">
      <div class="col-12 col-xl-12 grid-margin stretch-card navbarsd">
         <div class="card overflow-hidden">
            <div class="card-body">
               <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                  <h6 class="card-title mb-0">Setting</h6>
               </div>
               <div class="row align-items-start">
                  <div class="col-md-7">
                    <!--  <p class="text-muted tx-13 mb-3 mb-md-0">
                        Metadata is used by browsers
                        (how to display content or reload page),
                        search engines (keywords), and other web services.
                     </p> -->
                  </div>
                  <div class="col-md-5 d-flex justify-content-md-end">
                     <ul class="nav nav-tabs" id="myTab" role="tablist">                        
                        <li class="nav-item">
                           <a class="nav-link " id="Change_Password-tab" data-bs-toggle="tab" href="#Change_Password" role="tab" aria-controls="Change_Password" aria-selected="false">Change Password</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link active" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Social Media</a>
                        </li>   
                         <li class="nav-item ">
                           <a class="nav-link " id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Information</a>
                        </li>

                     </ul>
                  </div>
               </div>
               <div class="tab-content border  p-3" id="myTabContent">
                  
                  <div class="tab-pane fade " id="Change_Password" role="tabpanel" aria-labelledby="Change_Password-tab">
                     <div class="card-body">
                           <h2 class="card-title">Edit Admin Information</h2>
                           <form class="cmxform" id="signupForm" method="get" action="#">
                              <fieldset>
                                 <div class="mb-3">
                                    <label for="name" class="form-label">Email
                                    </label>
                                    <input id="email" class="form-control" name="email" type="text" value="<?=$Auth['email']; ?>" >
                                 </div>
                                 <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input id="upassword" class="form-control" name="password" type="password" autocomplete="new-password">
                                 </div>
                                 <div class="mb-3">
                                    <label for="confirm_password" class="form-label">Confirm password</label>
                                    <input id="uconfirm_password" class="form-control" name="confirm_password" type="password" >
                                    <div>
                                    <span class="font-weight-bold text-danger text-small invisible" id="passtext"> 
                                          Password Not  matched
                                    </span>
                                    </div>
                                 </div>
                                 <input class="btn btn-primary" type="submit" value="Submit">
                              </fieldset>
                           </form>
                        </div>
                  </div>

                  <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
   					         <?php if (!empty($errors['status_social_media'])) : ?>
                             <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
                                 <strong> <?= $errors['status_social_media'] ?></strong>
                                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                             </div>
                            <?php endif; ?>
                        <form  action="<?= base_url('Admin/Update_social') ?>" method="post">
                           <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>"
                          value="<?= $this->security->get_csrf_hash(); ?>">
                           <div class="form-group required row mt-3">
                              <label class="col-sm-2 control-label" for="input-name1">facebook</label>
                              <div class="col-sm-10">
                                 <input type="text" name="facebook" id="facebook" class="form-control" value="<?=$social_media->facebook?>">
                              </div>
                           </div>
                           <div class="form-group required row mt-3">
                              <label class="col-sm-2 control-label" for="input-name1">Twitter</label>
                              <div class="col-sm-10">
                                 <input type="text" name="twitter" id="twitter" class="form-control" value="<?=$social_media->twitter?>">
                              </div>
                           </div>
                           <div class="form-group required row mt-3">
                              <label class="col-sm-2 control-label" for="input-name1">linkedin</label>
                              <div class="col-sm-10">
                                 <input type="text" name="linkedin" id="linkedin" class="form-control" value="<?=$social_media->linkedin?>">
                              </div>
                           </div>
                           <div class="form-group required row mt-3">
                              <label class="col-sm-2 control-label" for="input-name1">instagram</label>
                              <div class="col-sm-10">
                                 <input type="text" name="instagram" id="instagram" class="form-control" value="<?=$social_media->instagram?>">
                              </div>
                           </div>
                           

                           <div class="form-group  row mt-4">
                              <label class="col-sm-4 control-label" ></label>
                              <div class="col-sm-4">
                                 <input type="submit" name="" class="btn btn-primary" value="Update">
                              </div>
                              <label class="col-sm-4 control-label" ></label>                        
                           </div>
                           
                        </form>   
                  </div>

                  <div class="tab-pane fade show " id="home" role="tabpanel" aria-labelledby="home-tab">
                     <?php if (!empty($errors['status_admin_info'])) : ?>
                       <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
                           <strong> <?= $errors['status_admin_info'] ?></strong>
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                       </div>
                       <?php endif; ?>
                     <form  action="<?= base_url('Admin/Update_address') ?>" method="post">
                           <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>"  value="<?= $this->security->get_csrf_hash(); ?>">
                        <div class="row mb-3">
                           <div class="col-md-12">
                              <label class="form-label">Address:</label>
                              <input class="form-control mb-4 mb-md-0" type="text" name="admin_add" value="<?=$admin_info->admin_add?>">
                           </div>
                           

                           <div class="col-md-12">
                              <label class="form-label">Email:</label>
                             <input class="form-control mb-4 mb-md-0" type="text" name="admin_email" value="<?=$admin_info->admin_email?>">
                           </div>
                           <div class="col-md-12">
                              <label class="form-label">Phone:</label>
                             <input class="form-control mb-4 mb-md-0" type="text" name="admin_phone" value="<?=$admin_info->admin_phone?>">
                           </div>

                           <div class="col-md-12">
                              <label class="form-label">Mobile </label>
                             <input class="form-control mb-4 mb-md-0" type="text" name="admin_mobile" value="<?=$admin_info->admin_mobile?>">
                           </div>

                           
                           <div class="form-group  row mt-4">
                              <label class="col-sm-4 control-label" ></label>
                              <div class="col-sm-4">
                                 <input type="submit" name="" class="btn btn-primary" value="Update">
                              </div>
                              <label class="col-sm-4 control-label" ></label>                        
                           </div>
                           
                        </div>
                     </form>
                  </div>

               </div>
            </div>
         </div>
      </div>
   </div>
	<?php /*
   <div class="row">
      <div class="col-lg-5 col-xl-4 grid-margin grid-margin-xl-0 stretch-card">
         <div class="card">
            <div class="card-body">
               <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0">Enquiry</h6>
                  <div class="dropdown mb-2">
                     <button class="btn p-0" type="button" id="dropdownMenuButton6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i></button>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton6"><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a></div>
                  </div>
               </div>
               <div class="d-flex flex-column">
                  <a href="javascript:;" class="d-flex align-items-center border-bottom pb-3">
                     <div class="me-3"><img src="<?=base_url()?>assets-orrish/images/faces/face2.jpg" class="rounded-circle wd-35" alt="user"></div>
                     <div class="w-100">
                        <div class="d-flex justify-content-between">
                           <h6 class="text-body mb-2">Leonardo Payne</h6>
                           <p class="text-muted tx-12">12.30 PM</p>
                        </div>
                        <p class="text-muted tx-13">Hey! there I'm available...</p>
                     </div>
                  </a>
                  <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
                     <div class="me-3"><img src="<?=base_url()?>assets-orrish/images/faces/face3.jpg" class="rounded-circle wd-35" alt="user"></div>
                     <div class="w-100">
                        <div class="d-flex justify-content-between">
                           <h6 class="text-body mb-2">Carl Henson</h6>
                           <p class="text-muted tx-12">02.14 AM</p>
                        </div>
                        <p class="text-muted tx-13">I've finished it! See you so..</p>
                     </div>
                  </a>
                  <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
                     <div class="me-3"><img src="<?=base_url()?>assets-orrish/images/faces/face4.jpg" class="rounded-circle wd-35" alt="user"></div>
                     <div class="w-100">
                        <div class="d-flex justify-content-between">
                           <h6 class="text-body mb-2">Jensen Combs</h6>
                           <p class="text-muted tx-12">08.22 PM</p>
                        </div>
                        <p class="text-muted tx-13">This template is awesome!</p>
                     </div>
                  </a>
                  <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
                     <div class="me-3"><img src="<?=base_url()?>assets-orrish/images/faces/face5.jpg" class="rounded-circle wd-35" alt="user"></div>
                     <div class="w-100">
                        <div class="d-flex justify-content-between">
                           <h6 class="text-body mb-2">Amiah Burton</h6>
                           <p class="text-muted tx-12">05.49 AM</p>
                        </div>
                        <p class="text-muted tx-13">Nice to meet you</p>
                     </div>
                  </a>
                  <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
                     <div class="me-3"><img src="<?=base_url()?>assets-orrish/images/faces/face6.jpg" class="rounded-circle wd-35" alt="user"></div>
                     <div class="w-100">
                        <div class="d-flex justify-content-between">
                           <h6 class="text-body mb-2">Yaretzi Mayo</h6>
                           <p class="text-muted tx-12">01.19 AM</p>
                        </div>
                        <p class="text-muted tx-13">Hey! there I'm available...</p>
                     </div>
                  </a>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-7 col-xl-8 stretch-card">
         <div class="card">
            <div class="card-body">
               <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0">Pages</h6>
                  <div class="dropdown mb-2">
                     <button class="btn p-0" type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i></button>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7"><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a></div>
                  </div>
               </div>
               <div class="table-responsive">
                  <table class="table table-hover mb-0">
                     <thead>
                        <tr>
                           <th class="pt-0">#</th>
                           <th class="pt-0">Project Name</th>
                           <th class="pt-0">Start Date</th>
                           <th class="pt-0">Due Date</th>
                           <th class="pt-0">Status</th>
                           <th class="pt-0">Assign</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>1</td>
                           <td>NobleUI jQuery</td>
                           <td>01/01/2021</td>
                           <td>26/04/2021</td>
                           <td><span class="badge bg-danger">Released</span></td>
                           <td>Leonardo Payne</td>
                        </tr>
                        <tr>
                           <td>2</td>
                           <td>NobleUI Angular</td>
                           <td>01/01/2021</td>
                           <td>26/04/2021</td>
                           <td><span class="badge bg-success">Review</span></td>
                           <td>Carl Henson</td>
                        </tr>
                        <tr>
                           <td>3</td>
                           <td>NobleUI ReactJs</td>
                           <td>01/05/2021</td>
                           <td>10/09/2021</td>
                           <td><span class="badge bg-info">Pending</span></td>
                           <td>Jensen Combs</td>
                        </tr>
                        <tr>
                           <td>4</td>
                           <td>NobleUI VueJs</td>
                           <td>01/01/2021</td>
                           <td>31/11/2021</td>
                           <td><span class="badge bg-warning">Work in Progress</span></td>
                           <td>Amiah Burton</td>
                        </tr>
                        <tr>
                           <td>5</td>
                           <td>NobleUI Laravel</td>
                           <td>01/01/2021</td>
                           <td>31/12/2021</td>
                           <td><span class="badge bg-danger">Coming soon</span></td>
                           <td>Yaretzi Mayo</td>
                        </tr>
                        <tr>
                           <td>6</td>
                           <td>NobleUI NodeJs</td>
                           <td>01/01/2021</td>
                           <td>31/12/2021</td>
                           <td><span class="badge bg-primary">Coming soon</span></td>
                           <td>Carl Henson</td>
                        </tr>
                        <tr>
                           <td class="border-bottom">3</td>
                           <td class="border-bottom">NobleUI EmberJs</td>
                           <td class="border-bottom">01/05/2021</td>
                           <td class="border-bottom">10/11/2021</td>
                           <td class="border-bottom"><span class="badge bg-info">Pending</span></td>
                           <td class="border-bottom">Jensen Combs</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
	<?php */ ?>

</div>
<?php
include('include/footer.php');

?>
