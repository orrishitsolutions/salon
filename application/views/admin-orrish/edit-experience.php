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
            Add About Experience            
            <?php 
            if(isset($abouts_details)) 
            {
               $cat_id = $abouts_details->id; 
               $name = $abouts_details->title1;
               $title2 =$abouts_details->title2;
               $title3 =$abouts_details->title3;
               $description =$abouts_details->description1;
               $file =$abouts_details->file;
            }
            else
            {
            $name ='';
            $title2 = '';
            $title3 = '';
            $description ='';
            $file='';
            } 
            ?>
         </h6>
      </div>
      <div class="col-md-4">
         <div class="d-flex justify-content-space-between">
            <button type="submit" form-id="form-category" class="btn btn-primary save" id="category_submit" value="Do you really want to Edit experience Abouts" >
               <i class="fa fa-save"></i>
               Save 
            </button>
            <!-- <a href="<?=base_url('admin/our-directors')?>" class="btn btn-danger "><i class="fa fa-undo"></i>Back</a> -->
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
            <?PHP if(isset($abouts_details)) 
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
         <input type="hidden" name="type" value="experience">
         <div class="tab-content border  p-3" id="myTabContent">
            <div class="tab-pane fade active show" id="General" role="tabpanel" aria-labelledby="General-tab">
               <div class="card-body row">
                  <div class="col-sm-6">
                  <div class="form-group ">
                     <label class="control-label">Description</label>
                        <textarea class="form-control" name="description" id="tinymceExample" rows="10">
                        <?=$description?>
                        </textarea> 
                     </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group">
                     <label class="control-label">Image size (600x350 px)</label>
                     <img onclick="document.getElementById('profile').click();" id="profileImg" src="<?=base_url()?>assets-orrish/storage/About-image/<?php if($file!=='') { echo $file; } else{ echo "placeholder.png"; } ?>" >
                     <input type="file" name="file" class="d-none" id="profile">
                  </div>
                  
               </div>
               <div class="row">
                  <div class="col-md-4">
                     <input type="hidden" name="status" value="1">
                     <div class="form-group required ">
                     <label class="control-label">Exclusive Variant</label>
                        <input type="text" name="name" value="<?=$name?>" placeholder="Directors Name" id="name" class="form-control">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group required ">
                     <label class="control-label">Luxury Car Brands</label>
                        <input type="text" name="title2" value="<?=$title2?>" placeholder="Directors Name" id="name" class="form-control">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group required ">
                     <label class="control-label">Happy Clients</label>
                        <input type="text" name="title3" value="<?=$title3?>" placeholder="Directors Name" id="name" class="form-control">
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
   width: 100%;
   height: 400px;
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