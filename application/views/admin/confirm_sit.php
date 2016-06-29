 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

 <?php
	
	$this->db->where("t_id",$change);
	$data = array(
		'situation' => $pending,
		'pending_sit'=>0
		 );
	$this->db->update("order_list_tbl",$data);
 ?>

                <?php
               $color="";
              if ($pending==1)
                {
                  
                  $color = "green";
                }
                elseif ($pending==2)
                {
                 
                 $color = "blue";
                 }
                elseif ($pending==3)
                {
                $color = "red";
                }
		elseif ($pending==5)
		{
		$color = "brown";
		}
                 else
                 {                   
                    $color = "normal";
                 }
              ?>

  <select   url="<?=base_url()?>admin/situation_update" id="situation" name="situation" class="form-control <?=$color?>">

                        <option value="">Choose One</option>
                        <?php
                        for ($i=1; $i <= 3 ; $i++) :
                        
                        ?>
                       <option value="<?=$i?>" <?php if($i==$pending){echo "selected";} ?> > <?=situation($i)?></option>
                       
                    <?php endfor ?>
     </select>
