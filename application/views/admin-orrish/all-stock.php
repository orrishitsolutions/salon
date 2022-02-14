<?php 
   include('include/head.php');
   include('include/left-header.php');
   include('include/top-header.php');
   ?>
<div class="page-content">
   <div class="row mb-3">
      <div class="col-md-8">
         <h6 class="card-title">All Stock</h6>
      </div>
      <div class="col-md-4">
         <div class="Add-bottom ">
            <a href="<?=base_url('admin/add-stock')?>" class="btn btn-danger ">
                  <i data-feather="file-plus"></i>&nbsp Stock
            </a>
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
                           <th>Brand Name</th>
                           <th>Style Type</th>
                           <th>Exterior</th>
                           <th>Interior</th>
                           <th>Sell Status</th>
                           <th>Status</th>
                           <th>image</th>
                           <th>Date</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           if(count($product_select)!=="")
                           {
                               for ($i=0; $i < count($product_select); $i++) { 
                                  ?>
                        <tr>
                           <td><?=$i+1?></td>
                           <td class="name_pro"><?=$product_select[$i]['name']?></td>
                           <td><?=$product_select[$i]['c_name']?></td>
                           <td><?=$product_select[$i]['s_name']?></td>
                           <td>
                              <a href="<?=base_url()?>admin/stock-exterior/<?=$product_select[$i]['id']?>/exterior">
                                 <i data-feather="upload"></i>
                              </a>
                           </td>
                           <td>
                              <a href="<?=base_url()?>admin/stock-interior/<?=$product_select[$i]['id']?>/interior">
                                 <i data-feather="upload"></i>
                              </a>
                           </td>
                           <td>
                              <?php
                                 if($product_select[$i]['sell_status']=='0')
                                 {
                                     ?>
                              <a  class="text-danger" href="<?=base_url('admin/sell_status')?>/<?=$product_select[$i]['id']?>">
                              <i data-feather="toggle-left"></i>
                              </a>
                              <?php    
                                 }
                                 else
                                 {
                                     ?>
                              <a class="text-success " href="<?=base_url('admin/sell_status')?>/<?=$product_select[$i]['id']?>">
                              <i data-feather="toggle-right"></i>
                              </a>
                              <?php
                                 }
                                 ?>
                           </td>
                           <td>
                              <?php
                                 if($product_select[$i]['status']=='0')
                                 {
                                     ?>
                              <a  class="text-danger" href="<?=base_url('admin/update-Home')?>/<?=$product_select[$i]['id']?>">
                              <i data-feather="toggle-left"></i>
                              </a>
                              <?php    
                                 }
                                 else
                                 {
                                     ?>
                              <a class="text-success " href="<?=base_url('admin/update-Home')?>/<?=$product_select[$i]['id']?>">
                              <i data-feather="toggle-right"></i>
                              </a>
                              <?php
                                 }
                                 ?>
                           </td>
                           <td >
                              <img src="<?=base_url()?>assets-orrish/storage/product/<?=$product_select[$i]['p_file']?>" style="width: 50px;height: 50px;" >
                           </td>
                           <td>
                              <?php
                                 echo date('d M Y',strtotime($product_select[$i]['created_at']))
                                 ?>
                           <td>
                              <div class="d-flex justify-content-start">
                                 <a href="<?=base_url()?>admin/add-stock/Edit/<?=$product_select[$i]['id']?>"  >
                                 <i class=" text-success " data-feather="edit" ></i>
                                 </a>
                                 <a href="<?=base_url('admin/stock-delect')?>/<?=$product_select[$i]['id']?>" class="  mrr" >
                                    <i class=" text-danger " data-feather="delete" ></i>
                                 
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
   table#dataTableExample {
    font-size: 12px !important;
   }
   .name_pro
   {
    max-width: 75px !important;
    white-space: inherit !important;
    display: block;    
    min-width: 75px;
   font-size: 12px !important;
   }
</style>