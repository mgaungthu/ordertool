
        
<div class="col-md-8 text-left col-md-push-2">
          <h3 class="titletext">Edit User</h3>
</div>
 <div class="box-body">

 <div class="col-md-6 col-md-push-3 smalltopmargin">
      <?=form_open("user/edit-user-process/".$this->uri->segment(3),'')?>
      <div class="col-md-3 smallpadding midsidepadding">
           <?=form_label('Realname')?>
      </div>
      <div class="col-md-5">
        <div class="form-group">
        <?=form_input("first_name",$row['first_name'],"placeholder='First Name' class='form-control' ")?>
        </div>
      </div>
       <div class="col-md-4">
        <div class="form-group">
        <?=form_input("last_name",$row['last_name'],"placeholder='Last Name' class='form-control' ")?>
        </div>
      </div> 

      <div class="col-md-3 smallpadding midsidepadding">
           <?=form_label('Username')?>
      </div>
      <div class="col-md-9">
        <div class="form-group">
        <?=form_input("username",$row['username'],"placeholder='Username' class='form-control' ")?>
        </div>
      </div>     

      <div class="col-md-3 smallpadding midsidepadding">
           <?=form_label('Password')?>
      </div>           
      <div class="col-md-9">
        <div class="form-group">                       
        <?=form_password("password",'',"placeholder='Password' class='form-control' ")?>
        </div>
      </div>  
         <?php
        $options = array
        (
        ''       => 'Choice one',
        '1'      => 'Super Admin',
        '2'      => 'Data Entry' ,
                                      
    );
    ?>
     <div class="col-md-3 smallpadding midsidepadding">
           <?=form_label('User Role')?>
      </div>
       <div class="col-md-9">
        <div class="form-group">     
      <?=form_dropdown('user_role', $options,$row['user_role']," class='form-control' ")?>
        </div>
       </div>
      <div class="modal-footer">  
            
       <?=anchor('user/delete-user/'.$this->uri->segment(3),'Delete',' class="btn btn-danger" ')?>

       <?=form_submit("Save","Save","class='btn btn-primary'")?>  
      </div>



</div>


  <div class="col-md-2">
  </div>
</div>
<?=form_close();?>
