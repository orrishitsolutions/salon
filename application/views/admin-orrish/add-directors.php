<?php 
   $errors = $this->session->flashdata();  
     include('include/head.php');
     include('include/left-header.php');
     include('include/top-header.php');
     ?>
<div class="page-content">
   <div class="row mb-3">
      <div class="col-md-8">
         <h6 class="card-title">
            <i data-feather="user-plus"></i> Add Directors            
            <?php 
            $cat_id = $this->uri->segment(3);
            if(isset($cat_id)) 
            {
               $name =$abouts_details->title1;
               $description =$abouts_details->description1;
               $status =$abouts_details->status;
               $file =$abouts_details->file;
            }
            else
            {
            $name ='';
            $description ='';
            $status ='';
            $file='';
            } 
            ?>
         </h6>
      </div>
      <div class="col-md-4">
         <div class="d-flex justify-content-space-between">
            <button type="submit" form-id="form-category" class="btn btn-primary save" id="category_submit" value="Do you really want to Add/Edit Directors Abouts" >
               <i class="fa fa-save"></i>
               Save 
            </button>
            <a href="<?=base_url('admin/our-directors')?>" class="btn btn-danger "><i class="fa fa-undo"></i>Back</a>
         </div>
      </div>
      <?php if(!empty($errors['status'])) :?>
      <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
         <strong> <?=$errors['status']?></strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
      </div>
      <?php endif; ?>

      <?php if(!empty($errors['error'])) :?>
      <div class="alert alert-fill-warning alert-dismissible fade show mt-1" role="alert">
         <strong> <?=$errors['error']?></strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
      </div>
      <?php endif; ?>

   </div>
   <div class="row mt-4">
      <div class="row align-items-start">
         <div class="col-md-12 d-flex ">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <!--  <li class="nav-item">
                  <a class="nav-link active" id="General-tab" data-bs-toggle="tab" href="#General" role="tab" aria-controls="General" aria-selected="true">General</a>
               </li> -->
               </ul>
         </div>
      </div>
            <?PHP if(isset($cat_id)) 
            {
               ?>
               <form action="<?=base_url('admin/add-directors/UpdateData')?>" method="post" enctype="multipart/form-data" id="form-category" class="form-horizontal">
                  <input type="hidden" name="id" value="<?=$cat_id?>">
                  <input type="hidden" name="del_img" value="<?=$file?>">
               <?php
            }
            else
            {
            ?>
     <form action="<?=base_url('admin/add-directors/insertData')?>" method="post" enctype="multipart/form-data" id="form-category" class="form-horizontal"> 
      <?php } ?>
         <input type="hidden" name="<?= $this->security->get_csrf_token_name()?>" value="<?= $this->security->get_csrf_hash(); ?>">
         <input type="hidden" name="type" value="directors">
         <div class="tab-content border  p-3" id="myTabContent">
            <div class="tab-pane fade active show" id="General" role="tabpanel" aria-labelledby="General-tab">
               <div class="card-body">
                  <div class="form-group required row">
                     <label class="col-sm-2 control-label" for="input-name1">Directors Name</label>
                     <div class="col-sm-10">
                        <input type="text" name="name" value="<?=$name?>" placeholder="Directors Name" id="name" class="form-control">
                     </div>
                  </div>
                  
                  <div class="form-group row">
                     <label class="col-sm-2 control-label" for="input-description1">Description</label>
                     <div class="col-sm-10">
                        <textarea class="form-control" name="description" id="tinymceExample" rows="10">
                        <?=$description?>
                        </textarea> 
                     </div>
                  </div>
                  <div class="form-group row">
                  <label class="col-sm-2 control-label">Image</label>
                  <div class="col-sm-10">
                     <img onclick="document.getElementById('profile').click();" id="profileImg" src="<?=base_url()?>assets-orrish/storage/About-image/<?php if($file!=='') { echo $file; } else{ echo "placeholder.png"; } ?>" >
                     <input type="file" name="file" class="d-none" id="profile">
                  </div>
               </div>
               <div class="form-group row">
                     <label class="col-sm-2 control-label" for="input-status">Status</label>
                     <div class="col-sm-10">
                        <select name="status" id="input-status" class="form-control">
                           <option class="text-success" value="1" <?php if($status==1) { echo 'selected'; } ?> >Enabled</option>
                           <option class="text-danger" value="0" <?php if($status==0) { echo 'selected'; } ?> >Disabled</option>
                        </select>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </form>
   </div>
</div>
<?php
   include('include/footer.php');
   ?>
<style type="text/css">
   #profileImg
   {
   width: 135px;
   height: 107px;
   }
   .form-group
   {
   margin-top: 10px;
   }
   .save
   {
   margin-right: 10px;
   margin-left:150px
   }
</style>