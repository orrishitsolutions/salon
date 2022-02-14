<?php 
   include('include/head.php');
   include('include/left-header.php');
   include('include/top-header.php');
   ?>
<div class="page-content">
   <div class="row">
      <div class="col-md-8">
         <h6 class="card-title">Donate Product categories</h6>
      </div>
      <div class="col-md-4 mb-4">
         <div class="Add-bottom">
            <a href="<?=base_url('admin/add-categories')?>" class="btn btn-danger"><i class="fa fa-plus"></i>categories</a>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <h6 class="card-title">Data Table</h6>
               <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                     <thead>
                        <tr>
                           <th>S.N</th>
                           <th>Name</th>
                           <th>Status</th>
                           <th>image</th>
                           <th>Date</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           if(count($category_select)!=="")
                           {
                               for ($i=0; $i < count($category_select); $i++) { 
                                  ?>
                        <tr>
                           <td><?=$i+1?></td>
                           <td><?=$category_select[$i]['c_name']?></td>
                           <td>
                              <?php
                                 if($category_select[$i]['status']=='0')
                                 {
                                     ?>
                              <a  class="text-danger" href="<?=base_url('admin/cat-update-Home')?>/<?=$category_select[$i]['id']?>">
                              <i data-feather="toggle-left"></i>
                              </a>
                              <?php    
                                 }
                                 else
                                 {
                                     ?>
                              <a class="text-success " href="<?=base_url('admin/cat-update-Home')?>/<?=$category_select[$i]['id']?>">
                              <i data-feather="toggle-right"></i>
                              </a>
                              <?php
                                 }
                                 ?>
                           </td>
                           <td >
                              <img src="<?=base_url()?>assets-orrish/storage/category-image/<?=$category_select[$i]['file']?>" style="width: 40px;height: 40px;object-fit: contain; background-color: #fff;" >
                           </td>
                           <td>
                              <?php
                                 echo date('d M Y',strtotime($category_select[$i]['created_at']))
                                 ?>
                           <td>
                              <div class="d-flex justify-content-start">
                                 <a href="<?=base_url()?>admin/edit-categories/<?=$category_select[$i]['id']?>" class="btn btn-outline-success " >
                                 <i data-feather="edit-2"></i> Edit
                                 </a>
                                 <a href="<?=base_url('admin/cat-delect')?>/<?=$category_select[$i]['id']?>" class=" btn btn-outline-danger mrr" >
                                 <i data-feather="minus-circle"></i> Delect
                                 </a>
                              </div>
                           </td>
                        </tr>
                        <?php
                           }
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
   .Add-bottom
   {
   margin-left:200px ;
   }
   .Add-bottom a i
   {
   margin-right: 10px;
   }
   .mrr
   {
      margin-left: 10px;
   }
</style>