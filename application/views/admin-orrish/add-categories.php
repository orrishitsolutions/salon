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
            Add/Edit categories            
            <?php 

            $cat_id = $this->uri->segment(3);
            if(isset($cat_id)) 
            {
               $c_name =$category_details->c_name;
               $description =$category_details->description;
               $meta_title =$category_details->meta_title;
               $meta_description =$category_details->meta_description;
               $meta_keywords =$category_details->meta_keywords;
               $status =$category_details->status;
               $file =$category_details->file;
               $sco_Keyword =$category_details->sco_Keyword;  
                       
            }
            else
            {
            $c_name ='';
            $description ='';
            $meta_title ='';
            $meta_description ='';
            $meta_keywords ='';
            $status ='';
            $file='';
            $sco_Keyword ='';
          
            } 
            ?>
         </h6>
      </div>
      <div class="col-md-4">
         <div class="d-flex justify-content-space-between">
            <button type="submit" form-id="form-category" class="btn btn-primary save" id="category_submit" value="Do you really want to Add/Edit Categories" >
               <i class="fa fa-save"></i>
               Save 
            </button>
            <a href="<?=base_url('admin/categories')?>" class="btn btn-danger "><i class="fa fa-undo"></i>Back</a>
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
               <li class="nav-item">
                  <a class="nav-link active" id="General-tab" data-bs-toggle="tab" href="#General" role="tab" aria-controls="General" aria-selected="true">General</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="SEO-tab" data-bs-toggle="tab" href="#SEO" role="tab" aria-controls="SEO" aria-selected="false">SEO</a>
               </li>
            </ul>
         </div>
      </div>
            <?PHP if(isset($cat_id)) 
            {
               ?>
               <form action="<?=base_url('admin/add-categories/UpdateData')?>" method="post" enctype="multipart/form-data" id="form-category" class="form-horizontal">
                  <input type="hidden" name="id" value="<?=$cat_id?>">
                  <input type="hidden" name="del_img" value="<?=$file?>">
               <?php
            }
            else
            {
            ?>
     <form action="<?=base_url('admin/add-categories/update')?>" method="post" enctype="multipart/form-data" id="form-category" class="form-horizontal"> 
      <?php } ?>
         <input type="hidden" name="<?= $this->security->get_csrf_token_name()?>" value="<?= $this->security->get_csrf_hash(); ?>">
         <div class="tab-content border  p-3" id="myTabContent">
            <div class="tab-pane fade active show" id="General" role="tabpanel" aria-labelledby="General-tab">
               <div class="card-body">
                  <div class="form-group required row">
                     <label class="col-sm-2 control-label" for="input-name1">Categories Name</label>
                     <div class="col-sm-10">
                        <input type="text" name="c_name" value="<?=$c_name?>" placeholder="Categories Name" id="name" class="form-control">
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
                     <img onclick="document.getElementById('profile').click();" id="profileImg" src="<?=base_url()?>assets-orrish/storage/category-image/<?php if($file!=='') { echo $file; } else{ echo "placeholder.png"; } ?>" >
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
            
            <div class="tab-pane fade" id="SEO" role="tabpanel" aria-labelledby="SEO-tab">
               <div class="form-group row ">
                     <label class="col-sm-3 control-label" for="input-meta-title1">Meta Tag Title</label>
                     <div class="col-sm-9">
                        <input type="text" name="meta_title" value="<?=$meta_title?>" placeholder="Meta Tag Title" id="meta_title" class="form-control">
                     </div>
                  </div>
               <div class="form-group row">
                     <label class="col-sm-3 control-label" for="input-meta-description1">Meta Tag Description</label>
                     <div class="col-sm-9">
                        <textarea name="meta_description" rows="5" placeholder="Meta Tag Description" id="input-meta-description1" class="form-control"> <?=$meta_description?></textarea>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-sm-3 control-label" for="input-meta-keyword1">Meta Tag Keywords</label>
                     <div class="col-sm-9">
                        <textarea name="meta_keywords" rows="5" placeholder="Meta Tag Keywords" id="input-meta-keyword1" class="form-control"><?=$meta_keywords?></textarea>
                     </div>
                  </div>
               
                  
               <div class="table-responsive">
                  <table class="table table-bordered table-hover">
                     <thead>
                        <tr>
                           <td class="text-left">Stores</td>
                           <td class="text-left">Keyword</td>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td class="text-left">Default</td>
                           <td class="text-left">
                              <div class="input-group"><span class="input-group-addon">
                                 <img src="<?=base_url()?>assets-orrish/images/indean.png" title="English"></span>
                                 <input type="text" name="sco_Keyword" value="<?=$sco_Keyword?>" placeholder="Keyword" class="form-control">
                              </div>
                           </td>
                        </tr>
                     </tbody>
                  </table>
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