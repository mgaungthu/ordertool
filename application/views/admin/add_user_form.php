
        
<div class="col-md-8 text-left col-md-push-2">
          <h3 class="titletext">Add User</h3>
</div>
 <div class="container ">

 <div class="col-md-6 col-md-push-3 smalltopmargin">
      <?=form_open("user/add-user-process",'')?>
      <div class="col-md-3 smallpadding midsidepadding">
           <?=form_label('Realname')?>
      </div>           
      <div class="col-md-5">
        <div class="form-group">                       
        <?=form_input("first_name",set_value('first_name'),"placeholder='First Name' class='form-control' required")?>
        </div>
      </div> 
       <div class="col-md-4">
        <div class="form-group">                       
        <?=form_input("last_name",set_value('last_name'),"placeholder='Last Name' class='form-control' required")?>
        </div>
      </div> 

      <div class="col-md-3 smallpadding midsidepadding">
           <?=form_label('Username')?>
      </div>           
      <div class="col-md-9">
        <div class="form-group">                       
        <?=form_input("username",set_value('username'),"placeholder='Username' class='form-control' required")?>
        </div>
      </div>     

      <div class="col-md-3 smallpadding midsidepadding">
           <?=form_label('Password')?>
      </div>           
      <div class="col-md-9">
        <div class="form-group">                       
        <?=form_password("password",set_value('password'),"placeholder='Password' class='form-control' required")?>
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
      <?=form_dropdown('user_role', $options,''," class='form-control' required")?>
        </div>
       </div>
      <div class="modal-footer">              
          <?=form_submit("Save","Save","class='btn'")?>
      </div>


 
</div>
        
      
  <div class="col-md-2">
  </div>
</div>
<?=form_close();?>
