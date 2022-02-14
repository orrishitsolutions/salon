kljkj
<?php 
   require_once('include/head.php');
   require_once('include/left-header.php');
   require_once('include/top-header.php');
   ?>
<?php //require_once('../luxurycarsemporio/application/views/layouts/head.php');?>
<?php $errors = $this->session->flashdata();?>
<div class="page-content">
   <div class="profile-page tx-13">
      <div class="row">
         <?php if(!empty($errors['error'])):?>
         <div class="col-md-12">
            <div class="alert alert-fill-warning alert-dismissible fade show" role="alert">
               <strong>Report!</strong> <?=$errors['error']?>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
         </div>
         <?php endif;?>
         <?php if(!empty($errors['save'])):?>
         <div class="col-md-12">
            <div class="alert alert-fill-success alert-dismissible fade show" role="alert">
               <strong>Report!</strong> <?=$errors['save']?>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
         </div>
         <?php endif;?>
         <div class="col-12 grid-margin">
            <div class="profile-header">
               <div class="cover">
                  <?php $rand = rand(0,9);?>
                  <div class="" style="height: 40vh;background-image: linear-gradient(to right, #ab3c3c26,#7f9cf552),url('<?=base_url()?>assets/logo/pattern/pattern_<?=$rand?>.png');width: 100%;background-position: center;background-size: contain;"></div>
                  <div class="cover-body d-flex justify-content-between align-items-center">
                     <div>
                        <?php if($Auth['profile'] != null): ?>
                        <img class="profile-pic" src="<?=base_url()?>assets-orrish/storage/profile/<?=$Auth['profile']?>" alt="<?=$Auth['name']?>" style="width:80px; height:80px;">
                        <?php else: ?>
                        <img class="profile-pic" src="https://ui-avatars.com/api/?name=<?= explode(' ',$Auth['name'])[0] ?>+<?php if(isset(explode(' ',$Auth['name'])[1])) echo explode(' ',$Auth['name'])[1]; ?>&color=7F9CF5&background=EBF4FF" alt="<?=$Auth['name']?>">
                        <?php endif; ?>
                        <span class="profile-name" style="background: #0c1427;padding: 10px;border-radius: 35px;"><?=$Auth['name']?></span>
                     </div>
                  </div>
               </div>
               <div class="header-links">
                  <ul class="links d-flex align-items-center mt-3 mt-md-0">
                     <li class="header-link-item ml-3 pl-3  text-dark d-flex align-items-center active">
                        <i class="mr-1 icon-md" data-feather="activity"></i>
                        <a class="pt-1px d-none d-md-block" href="javascript:;">Manage Profile</a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <div class="row profile-body">
         <!-- left wrapper start -->
         <div class="col-md-12">
            <div class="row">
               <div class="col-md-12">
                  <div class="row">
                     <div class="col-md-4">
                        <h3 class="text-lg font-weight-light text-dark">Profile Information</h3>
                        <p class="mt-1 text-sm text-gray-600">Update your account&#039;s profile information and email address.</p>
                     </div>
                     <div class="col-md-8">
                        <form class="form-profile" method="post" enctype="multipart/form-data" action="<?=base_url('admin/profile/update')?>">
                           <div class="card">
                              <div class="card-body">
                                 <div class="row">
                                    <div class="col-md-10">
                                       <div class="mb-3 profile-sm" >
                                          <p>Photo</p>
                                          <?php if($Auth['profile'] != null): ?>
                                          <img onclick="document.getElementById('profile').click();" id="profileImg" src="<?=base_url()?>assets-orrish/storage/profile/<?=$Auth['profile']?>" alt="<?=$Auth['name']?>">
                                          <?php else: ?>
                                          <img onclick="document.getElementById('profile').click();" class="profile-pic" id="profileImg" src="https://ui-avatars.com/api/?name=<?= explode(' ',$Auth['name'])[0] ?>+<?php if(isset(explode(' ',$Auth['name'])[1])) echo explode(' ',$Auth['name'])[1]; ?>&color=7F9CF5&background=EBF4FF" alt="<?=$Auth['name']?>">
                                          <?php endif;?>                                                            
                                          <div class="camera">
                                             <i data-feather="camera"></i>
                                          </div>
                                          <input type="file" name="profile" class="d-none" id="profile">
                                       </div>
                                       <div class="f-flex justify-content-between">
                                          <?php if($Auth['profile'] != null):?>
                                          <a href="<?=base_url('profile/delete-photo')?>" id="removeBackground" class="mt-1 btn btn-danger">REMOVE PHOTO</a>
                                          <?php endif;?>
                                       </div>
                                       <?php if(!empty($errors['profile_up'])):?>
                                       <div class="mt-1">
                                          <small class="text-danger"><strong><?=$errors['profile_up']?></strong></small>
                                       </div>
                                       <?php endif;?>
                                    </div>
                                 </div>
                                 <input type="hidden" name="<?= $this->security->get_csrf_token_name()?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                 <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control <?php if(!empty($errors['name_up'])) :?> is-invalid<?php endif;?>" value="<?=$Auth['name']?>">
                                    <?php if(!empty($errors['name_up'])) :?>
                                    <div class="">
                                       <small class="text-danger"><?=$errors['name_up']?></small>
                                    </div>
                                    <?php endif;?>
                                 </div>
                                 <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control <?php if(!empty($errors['email_up'])) :?> is-invalid<?php endif;?>" value="<?=$Auth['email']?>">
                                    <?php if(!empty($errors['email_up'])) :?>
                                    <div class="">
                                       <small class="text-danger"><?=$errors['email_up']?></small>
                                    </div>
                                    <?php endif;?>
                                 </div>
                                 <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control <?php if(!empty($errors['phone_up'])) :?> is-invalid<?php endif;?>" value="<?=$Auth['phone']?>">
                                    <?php if(!empty($errors['phone_up'])) :?>
                                    <div class="">
                                       <small class="text-danger"><?=$errors['phone_up']?></small>
                                    </div>
                                    <?php endif;?>
                                 </div>
                              </div>
                              <div class="card-footer ">
                                 <button class="btn btn-primary" type="button" id="check_submit">SAVE</button>
                              </div>
                        </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-12 border mt-5 mb-5"></div>
            <div class="col-md-12">
               <div class="row">
                  <div class="col-md-12">
                     <div class="row">
                        <div class="col-md-4">
                           <h3 class="text-lg font-weight-light text-dark">Update Password</h3>
                           <p class="mt-1 text-sm text-gray-600">
                              Ensure your account is using a long, random password to stay secure.
                           </p>
                        </div>
                        <div class="col-md-8">
                           <form class="form-password" method="post" action="<?=base_url('admin/profile/password-change')?>">
                              <div class="card">
                                 <div class="card-body">
                                    <div class="form-group">
                                       <label for="name">Current Password</label>
                                       <input type="password" name="current_password" class="form-control <?php if(!empty($errors['current_password'])) :?> is-invalid<?php endif;?>">
                                       <input type="hidden" name="<?= $this->security->get_csrf_token_name()?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                       <?php if(!empty($errors['current_password'])) :?>
                                       <div class="">
                                          <small class="text-danger"><?=$errors['current_password']?></small>
                                       </div>
                                       <?php endif;?>
                                    </div>
                                    <div class="form-group">
                                       <label for="password">New Password</label>
                                       <input id="upassword" type="password" name="password" class="form-control <?php if(!empty($errors['password_change'])) :?> is-invalid<?php endif;?> <?php if(!empty($errors['password_confirmation'])) :?> is-invalid<?php endif;?>" autocomplete="new-password">
                                       <?php if(!empty($errors['password_change'])) :?>
                                       <div class="">
                                          <small class="text-danger"><?=$errors['password_change']?></small>
                                       </div>
                                       <?php endif;?>
                                       <?php if(!empty($errors['password_confirmation'])) :?>
                                       <div class="">
                                          <small class="text-danger"><?=$errors['password_confirmation']?></small>
                                       </div>
                                       <?php endif;?>
                                    </div>
                                    <div class="form-group">
                                       <label for="password_confirmation">Confirm Password</label>
                                       <input type="password" name="password_confirmation" class="form-control" autocomplete="new-password" id="uconfirm_password">
                                    </div>
                                 </div>
                                 <div class="card-footer ">
                                    <button class="btn btn-light" type="button" id="check_submitPassword">PASSWORD UPDATE</button>
                                    <span class="text-dark ml-2">
                                    <strong></strong>
                                    </span>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php
   require_once('include/footer.php');
   ?>