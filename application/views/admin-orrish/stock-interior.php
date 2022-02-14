<?php 
   include('include/head.php');
   include('include/left-header.php');
   include('include/top-header.php');
   ?>
<div class="page-content">
   <div class="row mb-3">
      <div class="col-md-8">
         <h6 class="card-title">All Interior</h6>
      </div>

      <?php 
         $prensent_id = $this->uri->segment(3);
         $type = $this->uri->segment(4);
      ?>
      <div class="col-md-4">
         <div class="Add-bottom ">
            <a href="<?=base_url('admin/add-exterior/').$prensent_id.'/'.$type?>" class="btn btn-danger ">
                  <i data-feather="file-plus"></i>&nbsp Interior
            </a>
             <a href="<?=base_url('admin/all-stock')?>" class="btn btn-danger "><i class="fa fa-car"></i> Back To Stock</a>
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
                           <th>image</th>
                           <th>Date</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           if(count($Exterior_select)!=="")
                           {
                               for ($i=0; $i < count($Exterior_select); $i++) { 
                                  ?>
                        <tr>
                           <td><?=$i+1?></td>
                           <td><?=$Exterior_select[$i]['name']?></td>
                           
                           <td >
                              <img src="<?=base_url()?>assets-orrish/storage/product/exterior/<?=$Exterior_select[$i]['file']?>" style="width: 70px;height: 70px;object-fit: contain;" >
                           </td>
                           <td>
                              <?php
                                 echo date('d M Y',strtotime($Exterior_select[$i]['created_at']))
                                 ?>
                           <td>
                              <div class="d-flex justify-content-start">
                                 <a href="<?=base_url()?>admin/exterior-stock/Edit/<?=$prensent_id?>/<?=$type?>/<?=$Exterior_select[$i]['id']?>" class="btn btn-outline-success " >
                                 <i data-feather="edit"></i>
                                 </a>
                                 <a href="<?=base_url('admin/exterior-delect')?>/<?=$Exterior_select[$i]['id']?>" class=" btn btn-outline-danger mrr" >
                                 <i data-feather="delete"></i>
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
   margin-left:10px ;
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