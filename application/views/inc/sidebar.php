<style>.menu-open{background-color:#000;}
</style>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#00949e;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">Gipra Test</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">   
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		<?php if($this->session->userdata('user_type') ==1){ ?>
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
			 <li class="nav-item <?php if(($this->uri->segment(1)=="users" ) || ($this->uri->segment(1)=="add_user") || ($this->uri->segment(1)=="edit_user")) :echo 'active menu-open'; endif; ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
               User Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">   
				<li class="nav-item <?php if($this->uri->segment(1)=="add_user")  :echo 'active menu-open'; endif; ?>">
                <a href="<?=base_url('add_user')?>" class="nav-link">
                  <i class="nav-icon fas fa-plus"></i>
                  <p>Add New User</p>
                </a>
              </li> 			
              <li class="nav-item <?php if($this->uri->segment(1)=="users")  :echo 'active menu-open'; endif; ?>">
                <a href="<?=base_url('users')?>" class="nav-link">
                  <i class="nav-icon fas fa-list"></i>
                  <p>View All Users</p>
                </a>
              </li> 
			      	
            </ul>
          </li>
		
           <li class="nav-item <?php if($this->uri->segment(1)=="profile_edit")  :echo 'active menu-open'; endif; ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                 Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">           
           <li class="nav-item">
                <a href="<?=base_url('profile_edit')?>" class="nav-link">                
				  <i class="nav-icon fa fa-lock"></i>
                  <p>Profile Edit</p>
                </a>
              </li> 
               <li class="nav-item">
                <a href="<?=base_url('manager/signout')?>" class="nav-link">                
				  <i class="nav-icon fa fa-lock"></i>
                  <p>Sign Out</p>
                </a>
              </li>               
            </ul>
          </li>  
         <?php } else {?>
		 <li class="nav-item <?php if($this->uri->segment(2)=="settings")  :echo 'active menu-open'; endif; ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                 Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">           
				<li class="nav-item">
                <a href="<?=base_url('edit_developer')?>" class="nav-link">                
				  <i class="nav-icon fa fa-lock"></i>
                  <p>Profile Edit</p>
                </a>
              </li> 
               <li class="nav-item">
                <a href="<?=base_url('signout')?>" class="nav-link">                
				  <i class="nav-icon fa fa-lock"></i>
                  <p>Sign Out</p>
                </a>
              </li>               
            </ul>
          </li>  
		 <?php }?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>