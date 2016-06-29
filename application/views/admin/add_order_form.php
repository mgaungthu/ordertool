 <div class="container bigpadding">

 <div class="col-md-6 col-md-push-1 smalltopmargin">
  <?php
  if (!empty($this->uri->segment(3))) :
  ?>
<?=form_open("admin/edit-order-process/".$this->uri->segment(3),'')?>
<?php else:?>
    <?=form_open("admin/add-order-process",'')?>
<?php endif;?>
      <div class="col-md-3 smallpadding midsidepadding">
           <?=form_label('Full Name :')?>
      </div>           
      <div class="col-md-5">
        <div class="form-group">                       
        <?=form_input("first_name",@$row["first_name"],"placeholder='First Name' class='form-control' required")?>
        </div>
      </div> 
       <div class="col-md-4">
        <div class="form-group">                       
        <?=form_input("last_name",@$row["last_name"],"placeholder='Last Name' class='form-control' ")?>
        </div>
      </div> 

      <div class="col-md-3 smallpadding midsidepadding">
           <?=form_label('Ph number :')?>
      </div>
         

      <div class="col-md-9">
        <div class="form-group">   
         <input type="number" value="<?=@$row["ph_no"]?>" name="ph_no" placeholder='Phone number' class='form-control' required")?>                     
       
        </div>
      </div>     

      <div class="col-md-3 smallpadding midsidepadding">
           <?=form_label('Address :')?>
      </div>           
      <div class="col-md-9">
        <div class="form-group">                       

            <textarea class="form-control" placeholder="Address" name="address" rows="5"><?=@$row["address"]?></textarea>
      </div>
      </div>  
      <div class="col-md-3 smallpadding midsidepadding">
           <?=form_label('Note Pad:')?>
      </div>           
      <div class="col-md-9">
        <div class="form-group">                       
         <textarea class="form-control" placeholder="Note Pad" name="note_pad" rows="5"><?=@$row["note_pad"]?></textarea>
      </div>
      </div>  

      <div class="col-md-3 smallpadding midsidepadding">
           <?=form_label('City :')?>
      </div>           
      <div class="col-md-9">
        <div class="form-group">                       
        <?=form_input("city",@$row["city"],"placeholder='City' class='form-control' required")?>
      </div>
      </div> 

       <div class="col-md-3 smallpadding midsidepadding">
           <?=form_label('Item Code :')?>
      </div>           
      <div class="col-md-9">
        <div class="form-group">                       
        <?=form_input("item_code",@$row["item_code"],"placeholder='Item Code' class='form-control' required")?>
      </div>
      </div> 

      <div class="col-md-3 smallpadding midsidepadding">
           <?=form_label('Quantity :')?>
      </div>           
      <div class="col-md-9">
        <div class="form-group">   
        <input type="number" name="quantity" value="<?=@$row["quantity"]?>" placeholder='Quantity' class='form-control' required>                    
        
      </div>
      </div> 
        <div class="col-md-3 smallpadding midsidepadding">
           <?=form_label('Color :')?>
      </div>           
      <div class="col-md-9">
        <div class="form-group">                       
        <?=form_input("color",@$row["color"],"placeholder='Color' class='form-control' ")?>
      </div>
      </div>


      <div class="modal-footer">              
         <?=form_submit("Save","Save","class='btn btn-primary'")?>
      </div>


 
</div>
        
      
  <div class="col-md-2">
  </div>
</div>
<?=form_close();?>
