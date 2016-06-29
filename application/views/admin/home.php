 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

                <div class="box-body">
             <div class="table-responsive">
                  <table id="hometbl" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Item Code</th>
                        <th>Full Name</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Color</th>
                        <th>Qty</th>
                        <th>Notepad</th>                        
                        <th>Order Date</th>
                        <th>Who Created</th>
                        <th>Situation</th>

                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      $no=1;

                      foreach ($query as $key => $row) :
                        $send="unsend";
                       if($row["situation"]==1)
                       { 
                        $send="send";
                      } 
                      ?>
                      <tr id="row-<?=$row["t_id"]?>" class="<?=$send?>"  >
                        <td><?=$no++?></td>
                         <td> 
                          <?=$row["item_code"]?>
                        </td>
                        <td> 
                          <?=$row["first_name"]?> <?=$row["last_name"]?>
                         </td>
                        <td> 
                          <?=$row["ph_no"]?>
                        </td>
                        <td> 
                          <?=$row["address"]?>
                        </td>
                        <td> 
                          <?=$row["city"]?>
                        </td>
                       <td> 
                          <?=$row["color"]?>
                        </td>
                        <td> 
                          <?=$row["quantity"]?>
                        </td>
                         <td> 
                          <?=$row["note_pad"]?>
                        </td>
                        <td> 
                          <?=date_time($row["create_date"])?>
                        </td>
                        <td> 
                          <?=$row["who_created"]?>
                        </td>


               <?php
               $color="";
              if ($row["situation"]==1)
                {
                  
                  $color = "green";
                }
              elseif ($row["situation"]==0)
                {
                 
                 $color = "teal";
                 }
                elseif ($row["situation"]==2)
                {
                 
                 $color = "blue";
                 }
                elseif ($row["situation"]==3)
                {
                $color = "red";
                }
               elseif ($row["situation"]==4)
                {
                $color = "yellow";
                }
                 else
                 {                   
                    $color = "normal";
                 }
              ?>
                  <td id="pend-<?=$row["t_id"]?>" class="text-center">

                      <?php
                      if($row["situation"]==5):
                      ?>
                      <span class="situat">
                        P ->
                        <span id="pending_sit"><?=situation($row["pending_sit"])?></span>
                      </span>
                       <?php if ($user_role==1 && $row["situation"]==5 ) :?>
                          <div class="btn-confirm" >
                          <a  id="confirm_sit" href="<?=base_url()?>admin/confirm_sit" pending="<?=$row["pending_sit"]?>" change="<?=$row["t_id"]?>" >Go</a>
                          </div>
                         <?php endif;?>
                    <?php else :?>

                      <span class="situat" id="situat">
 <select  tid="<?=$row["t_id"]?>" url="<?=base_url()?>admin/situation_update" id="situation" name="situation" class="form-control <?=$color?>">

                        <option value="">Choose One</option>
                        <?php
                        for ($i=0; $i <= 4 ; $i++) :
                        
                        ?>
                       <option value="<?=$i?>" <?php if($row["situation"]==$i){echo "selected";} ?> > <?=situation($i)?></option>
                       
                    <?php endfor ?>
                          </select>
                        
                        </span> 
                      <span id="pending_sit"></span>
                       
                      <?php endif;?>
                  </td>

                         <td> 
                          <a href="admin/edit-order/<?=$row["t_id"]?>"><i class="fa fa-pencil-square-o"></i> </a>| 
<?php if($user_role==1):?>
<a href="admin/delete-order" id="<?=$row["t_id"]?>" class="delete_order"><i class="fa fa-trash-o"></i> </a>       
<?php endif;?>              
                        </td>
                      </tr>
                    <?php endforeach;?>
                    </tfoot>
                  </table>
                  </div>
                </div><!-- /.box-body -->
