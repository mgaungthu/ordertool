 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 <?php
               $color="";
              if ($value==1)
                {
                  
                  $color = "green";
                }
              elseif ($value==0)
                {
                 
                 $color = "teal";
                 }
                elseif ($value==2)
                {
                 
                 $color = "blue";
                 }
                elseif ($value==3)
                {
                $color = "red";
                }
               elseif ($value==4)
                {
                $color = "yellow";
                }
                 else
                 {                   
                    $color = "normal";
                 }
              ?>
                
                    

                      <span class="situat" id="situat">
 <select  tid="<?=$id?>" url="<?=base_url()?>admin/situation_update" id="situation" name="situation" class="form-control <?=$color?>">

                        <option value="">Choose One</option>
                        <?php
                        for ($i=0; $i <= 4 ; $i++) :
                        
                        ?>
                       <option value="<?=$i?>" <?php if($value==$i){echo "selected";} ?> > <?=situation($i)?></option>
                       
                    <?php endfor ?>
                          </select>
                        
                        </span> 
                     