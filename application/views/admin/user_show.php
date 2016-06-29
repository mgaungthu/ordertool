 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="row smallpadding">
<?php
  foreach ($query as $key => $col) :
?>
<div class="col-md-3">
<div class="user-block">
<span><p><b>Username </b>: <?=$col['username']?></p></span>
<span><p><b>Realname</b> : <?=$col['first_name']?> <?=$col['last_name']?></p></span>
<span><p><b>Creatdate</b> : <?=date_time($col['creat_date'])?></p></span>
 <div class="user-footer"> 
 	<div class="pull-left">
	<a href="user/user-detail/<?=$col['t_id']?>">Detail</a>
	</div>
	<div class="pull-right">
        	<a href="user/edit-user/<?=$col['t_id']?>"><i class="fa fa-pencil-square-o"></i></a>
	</div>

</div>
</div>
</div>

<?php endforeach;?>
</div>
<div class="pull-right smallpadding">
<a class="btn btn-primary" href="user/add-user">Add user</a>
</div>
