   <?php 
   $errors=$this->session->flashdata();
   
   
     include('include/head.php');
     include('include/left-header.php');
     include('include/top-header.php');
     ?>
<div class="page-content">
   <div class="row mb-3">
      <div class="col-md-8">
         <h6 class="card-title">
            Add Stock            
            <?php 
                 
               $pro_id = $this->uri->segment(4);
               if(isset($pro_id)) 
               {
                   $style_id = $product_list->style_id;
                   $cat_id = $product_list->cat_id;
                   $name = $product_list->name;
                   $status = $product_list->status;
                   $price = $product_list->price;
                   $model = $product_list->model;
                   $location = $product_list->location;
                   $view = $product_list->view;
                   $driven = $product_list->driven;
                   $fuel = $product_list->fuel;
                   $seller = $product_list->seller;
                   $transmission = $product_list->transmission;
                   $owner = $product_list->owner;
                   $p_file = $product_list->p_file;
                   $description = $product_list->description;
                   $features = $product_list->features;
                   $meta_title = $product_list->meta_title;
                   $meta_description = $product_list->meta_description;
                   $meta_keywords = $product_list->meta_keywords;
                   $sco_Keyword = $product_list->sco_Keyword;                        
               }
               else
               {
                   $style_id = '';
                   $cat_id = '';
                   $name = '';
                   $status = '';
                   $price = '';
                   $model = '';
                   $location = '';
                   $view = '';
                   $driven = '';
                   $fuel = '';
                   $seller = '';
                   $transmission = '';
                   $owner = '';
                   $p_file = '';
                   $description = '';
                   $features = '';
                   $meta_title = '';
                   $meta_description = '';
                   $meta_keywords = '';
                   $sco_Keyword = '';
               
               } 
               ?>
         </h6>
      </div>
      <div class="col-md-4">
         <div class="d-flex justify-content-space-between">
            <button type="submit" form-id="form-hotel" id="btn-add-hotel" class="btn btn-primary ml-1"><i class="fa fa-save"></i>Save</button> &nbsp&nbsp&nbsp
            <a href="<?=base_url('admin/all-stock')?>" class="btn btn-danger "><i class="fa fa-undo"></i>Back</a>
         </div>
      </div>      
   </div>
      

   <div class="error-screen"></div>
   <div class="row mt-4">
      <div class="row align-items-start">
         <div class="col-md-12 d-flex ">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
               <li class="nav-item">
                  <a class="nav-link active" id="General-tab" data-bs-toggle="tab" href="#General" role="tab" aria-controls="General" aria-selected="true">General</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="Prodata-tab" data-bs-toggle="tab" href="#Prodata" role="tab" aria-controls="Prodata" aria-selected="false">Data</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="SEO-tab" data-bs-toggle="tab" href="#SEO" role="tab" aria-controls="SEO" aria-selected="false">SEO</a>
               </li>
            </ul>
         </div>
      </div>
      <?PHP if(isset($pro_id)) 
         {
            ?>
               

      <form onsubmit="return addHotel()"  method="post" enctype="multipart/form-data" id="form-hotel" class="form-horizontal" >
         <input type="hidden" name="actionAtt" id="actionAtt" value="<?=base_url('admin/add-stock/Upd')?>">
         <input type="hidden" name="pro_id" value="<?=$pro_id?>">
         <input type="hidden" name="del_img" value="<?=$p_file?>">
         <?php
            }
            else
            {
            ?>
      <form method="post"  onsubmit="return addHotel()" enctype="multipart/form-data" id="form-hotel" class="form-horizontal">
         <input type="hidden" name="actionAtt" id="actionAtt" value="<?php echo base_url('admin/add-stock/Add')?>">
         <?php } ?>


         <input type="hidden" name="<?= $this->security->get_csrf_token_name()?>" value="<?= $this->security->get_csrf_hash(); ?>">
         <div class="tab-content border  p-3" id="myTabContent">
            <div class="tab-pane fade active show" id="General" role="tabpanel" aria-labelledby="General-tab">
               <div class="card-body">
                  <div class="form-group required row">
                     <label class="col-sm-2 control-label" for="input-name1">Brand Name</label>
                     <div class="col-sm-10">
                        <select name="brandname" id="Brandname" class="form-control">
                           <option >select Brand Name</option>
                           <?php                            
                                if(count($category_select)!=="")
                                {
                                    for ($i=0; $i < count($category_select); $i++) { 
                                        ?>
                                 <option <?php if($category_select[$i]['id']==$cat_id) {echo "selected"; } ?> value="<?=$category_select[$i]['id']?>">
                                    <?=$category_select[$i]['c_name']?>
                                  </option>
                                 <?php
                                 }
                                }
                           ?>
                        </select>
                     </div>
                  </div>
                  <div class="form-group required row">
                     <label class="col-sm-2 control-label" for="input-name1">Car Style</label>
                    <div class="col-sm-10">
                        <select name="stylename" id="Stylename" class="form-control">
                           <option >select Car Style</option>
                           <?php                            
                                if(count($carstyle_select)!=="")
                                {
                                    for ($i=0; $i < count($carstyle_select); $i++) { 
                                        ?>
                                 <option <?php if($carstyle_select[$i]['id']==$style_id) {echo "selected"; } ?> value="<?=$carstyle_select[$i]['id']?>">
                                    <?=$carstyle_select[$i]['s_name']?>
                                  </option>
                                 <?php
                                 }
                                }
                           ?>
                        </select>
                     </div>
                  </div>
                  <div class="form-group row required">
                     <label class="col-sm-2 control-label" for="input-meta-title1">Name</label>
                     <div class="col-sm-10">
                        <input type="text" name="name" value="<?=$name?>" placeholder="Name...." id="name" class="form-control"  autocomplete="off">
                     </div>
                  </div>
                  <div class="form-group row  required">
                     <label class="col-sm-2 control-label" for="input-meta-title1">Price</label>
                     <div class="col-sm-10">
                        <input type="text" name="price" value="<?=$price?>" placeholder="Price..." id="price" class="form-control"  autocomplete="off">
                     </div>
                  </div>
                  <div class="form-group row ">
                     <label class="col-sm-2 control-label" for="input-meta-title1">Model</label>
                     <div class="col-sm-10">
                        <input type="text" name="model" value="<?=$model?>" placeholder="model..." id="model" class="form-control">
                     </div>
                  </div>
                  <div class="form-group row ">
                     <label class="col-sm-2 control-label" for="input-meta-title1">Location</label>
                     <div class="col-sm-10">
                        <input type="text" name="location" value="<?=$location?>" placeholder="location" id="location" class="form-control">
                     </div>
                  </div>
                  <div class="form-group row ">
                     <label class="col-sm-2 control-label" for="input-meta-title1">View</label>
                     <div class="col-sm-10">
                        <input type="text" name="view" value="<?=$view?>" placeholder="view" id="view..." class="form-control">
                     </div>
                  </div>
                  <div class="form-group row ">
                     <label class="col-sm-2 control-label" for="input-meta-title1">Driven</label>
                     <div class="col-sm-10">
                        <input type="text" name="driven" id="driven" value="<?=$driven?>" placeholder="driven..." class="form-control">
                     </div>
                  </div>
                  <div class="form-group row ">
                     <label class="col-sm-2 control-label" for="input-meta-title1">Fuel</label>
                     <div class="col-sm-10">
                        <input type="text" name="fuel" id="fuel" value="<?=$fuel?>" placeholder="fuel..." class="form-control">
                     </div>
                  </div>
                  <div class="form-group row ">
                     <label class="col-sm-2 control-label" for="input-meta-title1">Seller</label>
                     <div class="col-sm-10">
                        <input type="text" name="seller" id="seller" value="<?=$seller?>" placeholder="seller..." class="form-control">
                     </div>
                  </div>
                  <div class="form-group row ">
                     <label class="col-sm-2 control-label" for="input-meta-title1">Transmission</label>
                     <div class="col-sm-10">
                        <input type="text" name="transmission" id="transmission" value="<?=$transmission?>" placeholder="transmission..." class="form-control">
                     </div>
                  </div>
                  <div class="form-group row ">
                     <label class="col-sm-2 control-label" for="input-meta-title1">Owner</label>
                     <div class="col-sm-10">
                        <input type="text" name="owner" id="owner" value="<?=$owner?>" placeholder="Owner..." class="form-control">
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
            <div class="tab-pane fade " id="Prodata" role="tabpanel" aria-labelledby="Prodata-tab">
               <div class="card-body">
                  <div class="form-group row">
                     <label class="col-sm-2 control-label" for="input-description1">Description</label>
                     <div class="col-sm-10">
                        <textarea class="form-control" name="description" id="tinymceExample" rows="10">
                        <?=$description?>
                        </textarea> 
                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-sm-2 control-label" for="input-description1">Features</label>
                     <div class="col-sm-10">
                        <textarea class="form-control" name="features" id="ckeditor1" rows="10">
                              <?=$features?>
                        </textarea>                         
                     </div>
                  </div>
                  <div class="form-group required row">
                     <label class="col-sm-2 control-label">Image</label>
                     <div class="col-sm-10">
                        <img onclick="document.getElementById('profile').click();" id="profileImg" src="<?=base_url()?>assets-orrish/storage/product/<?php if($p_file!=='') { echo $p_file; } else{ echo "placeholder.png"; } ?>" >
                        <input type="file" name="file" class="d-none" id="profile">
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
   .save_stock
   {
   margin-right: 10px;
   margin-left:150px
   }
</style>
<script> 
   CKEDITOR.replace(ckeditor1);
  // CKEDITOR.replace(ckeditor2);

  //submit product 
      $(document).ready(function() {
        //Form Submit for IE Browser
        $('button[type=\'submit\']').on('click', function() {
            $("form[id*='form-']").submit();
        });
    });

  function addHotel() {
    var formData = new FormData($("form#form-hotel")[0]);
    console.log(formData);
    var action =$('#actionAtt').val();
    //console.log(action);
    $.ajax({
        url: action,
        data: formData,
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        type: "post",
        dataType: "json",
        
        success: function (json) {           
           if(json.error){ 
               $('.error-screen').append('<div class="alert alert-'+json.color+' alert-dismissible fade show" role="alert">'+
                           '<strong>'+json.type+'</strong> '+json.message+''+
                           '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">'+
                           '</button>'+
                           '</div>');
                $('input.form-control').removeClass('is-invalid');
                $('.font-weight-bold.text-danger').html('');
                $.each(json, function( index, value ) {
                    $('input[name=\''+index+'\']').addClass('is-invalid');
                    if(index == 'brandname') {
                        $('select[name="'+index+'"]').addClass('is-invalid');
                    } 
                    if(index == 'stylename'){
                        $('select[name="'+index+'"]').addClass('is-invalid');
                    }
                });
            }
            if(json.success) {
               $('form#form-hotel')[0].reset();
               $('.error-screen').append('<div class="alert alert-'+json.color+' alert-dismissible fade show" role="alert">'+
                           '<strong>'+json.name+'</strong> '+json.message+''+
                           '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">'+
                           '</button>'+
                           '</div>');
            }
        },
        error:function(jxxhr,xhr,error) {
         $('.error-screen').append('<div class="alert alert-warning alert-dismissible fade show" role="alert">'+
                                   '<strong>Warning! </strong>'+error+'.'+
                                   '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">'+
                                   '</button>'+
                                   '</div>');
         
        }
    });
    return false;
}

</script>
