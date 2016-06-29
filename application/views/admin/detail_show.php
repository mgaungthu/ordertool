 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 <div class="container"> 
<div class="col-md-6">

<div class="table-responsive  smallpadding">
       <table class="table table-bordered table-hover">


        <tbody>
      
        <tr>
          <td>
             <b>Realname</b>
            </td>
            <td>
              <?=$row['first_name']?> <?=$row['last_name']?>
            </td>
        </tr>
        <tr>
            <td>
             <b>Username</b>
            </td>
            <td>
              <?=$row['username']?>
            </td>
        </tr>
        <tr>
            <td>
             <b>Creat Date</b>
            </td>
            <td>
              <?=date_time($row['creat_date'])?>
            </td>
        </tr>  
        <tr>
            <td>
             <b>User Role</b>
            </td>
            <td>
              <?=$row['user_role']?>
            </td>
        </tr>    
        <tr>
            <td>
             <b>Who Created</b>
            </td>
            <td>
              <?=$row['creator_name']?>
            </td>
        </tr>        
       
        </tbody>
             	 	 	 	   	 	 	 	 	
            
        
       
      </table>
  </div>
</div>

</div>