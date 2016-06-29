 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="<?php if($this->uri->segment(2)==''){echo'active';}?>"><a href="admin"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
            <li class="<?php if($this->uri->segment(2)=='add-order'){echo'active';}?>"><a href="admin/add-order"><i class="fa fa-link"></i> <span>Add New Order</span></a></li>

            <?php if($this->session->userdata('user_role')==1):?>
             <li class="<?php if($this->uri->segment(2)=='user'){echo'active';}?>" ><a href="user"><i class="fa fa-link"></i> <span>Admin Management</span></a></li>
          	<?php endif;?>
          </ul><!-- /.sidebar-menu -->