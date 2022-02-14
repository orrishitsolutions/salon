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
                    
            <?php 
           $url = $this->uri->segment(2);
           if($url=='add-exterior')
           {
            $prensent_id = $this->uri->segment(3);
            $type = $this->uri->segment(4);
           }
           else
           {
            $prensent_id = $this->uri->segment(4);
            $type = $this->uri->segment(5);
            $exterior_id = $this->uri->segment(6);
            }
            if(isset($Exterior_select)) 
            {
               $name =$Exterior_select->name;
               $file =$Exterior_select->file;
            }
            else
            {
            $name ='';
            $file='';
            } 
            ?>
             Our <?=$type?>
         </h6>
      </div>
      <div class="col-md-4">
         <div class="d-flex justify-content-space-between">
            <button type="submit" form-id="form-category" class="btn btn-primary save" id="category_submit" value="Do you really want to Add/Edit <?=$type?> Stock" >
               <i class="fa fa-save"></i>
               Save 
            </button>
            <a href="<?=base_url('admin/stock-'.$type.'/'.$prensent_id.'/'.$type)?>" class="btn btn-danger vvvvvv"><i class="fa fa-undo"></i> Back</a>
            <a href="<?=base_url('admin/all-stock')?>" class="btn btn-danger "><i class="fa fa-car"></i> Back To Stock</a>
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
            <?PHP if(isset($Exterior_select)) 
            {
               ?>
               <form action="<?=base_url('admin/edit-insertexterior')?>" method="post" enctype="multipart/form-data" id="form-category" class="form-horizontal">
                  <input type="hidden" name="id" value="<?=$exterior_id?>">
                  <input type="hidden" name="del_img" value="<?=$file?>">

               <?php
            }
            else
            {
            ?>
     <form action="<?=base_url('admin/add-insertexterior')?>" method="post" enctype="multipart/form-data" id="form-category" class="form-horizontal"> 
      <?php } ?>
         <input type="hidden" name="<?= $this->security->get_csrf_token_name()?>" value="<?= $this->security->get_csrf_hash(); ?>">
         <input type="hidden" name="prensent_id" value="<?=$prensent_id?>">
         <input type="hidden" name="type" value="<?=$type?>">
         <div class="tab-content border  p-3" id="myTabContent">
            <div class="tab-pane fade active show" id="General" role="tabpanel" aria-labelledby="General-tab">
               <div class="card-body">
                  <div class="form-group required row">
                     <label class="col-sm-2 control-label" for="input-name1">Name</label>
                     <div class="col-sm-10">
                        <input type="text" name="name" value="<?=$name?>" placeholder="Name" id="name" class="form-control">
                     </div>
                  </div>
                  <div class="form-group row">
                  <label class="col-sm-2 control-label">Image</label>
                  <div class="col-sm-10">
                     <img onclick="document.getElementById('profile').click();" id="profileImg" src="<?=base_url()?>assets-orrish/storage/product/exterior/<?php if($file!=='') { echo $file; } else{ echo "placeholder.png"; } ?>" >
                     <input type="file" name="file" class="d-none" id="profile">
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
   margin-left:10px
   }
   .vvvvvv
   {
      margin-right: 10px;
   }
</style>