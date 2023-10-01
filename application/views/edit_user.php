<style>
.error{color:red;}</style>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

            <h1 class="m-0"><?=$seo_title?> </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item active"><?=$this->session->userdata('username')?></li>
            </ol>
            
          </div><!-- /.col -->
          
        </div><!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->            
            <div class="card card-primary">
            
             
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo base_url('edit_user/'.$userdetails->id)?>" method="post" name="addnew" enctype="multipart/form-data" autocomplete="off">
                <div class="card-body">
                 <?php if($this->session->flashdata('success')) {?>
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <?php echo $this->session->flashdata('success');?>
                </div>
                <?php }?>
                <?php if($this->session->flashdata('error')) {?>
                <div class="alert alert-error">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <?php echo $this->session->flashdata('error');?>
                </div>
                <?php }?>
                  <div class="form-group  col-lg-4">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder=" Name" required value="<?php if(!empty($userdetails->name)){echo $userdetails->name;}?>">
					<?php echo form_error('name'); ?> 
                  </div>                  
                  <div class="form-group col-lg-4">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder=" Email"  value="<?php if(!empty($userdetails->email)){echo $userdetails->email;}?>">
					<?php echo form_error('email'); ?> 
                  </div>
				
                  <div class="form-group  col-lg-4">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text" name="phone" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" class="form-control" id="phone" placeholder=" Phone"  value="<?php if(!empty($userdetails->phone)){echo $userdetails->phone;}?>">
					<?php echo form_error('phone'); ?> 
                  </div>
                  <div class="form-group  col-lg-6">
                    <label for="exampleInputEmail1">Address</label>
                    <textarea name="address" class="form-control" id="editor" placeholder="Address" required> <?php if(!empty($userdetails->address)){echo $userdetails->address;}?></textarea> 
					<?php echo form_error('address'); ?> 					
                  </div>
				   <div class="form-group">
                    <label for="exampleInputEmail1">Date of Birth</label>
                    <input type="text" name="dob" class="form-control col-sm-2 dob" id="dob" placeholder=" date of Birth"  value="<?php if(!empty($userdetails->dob)){echo $userdetails->dob;}?>">
					<?php echo form_error('dob'); ?> 
                  </div>
				   <div class="form-group">
                    <label for="exampleInputEmail1">Gender</label><br>
					<?php $activem='';
						  $activef='';
					if(!empty($userdetails->gender)){
						if($userdetails->gender=="male"){
							$activem = 'checked="true"';
						} else {
							$activef = 'checked="true"';
						}
					}
						?>
                    <input type="radio" <?=$activem?> name="gender" class="gender"  id="gender" value="male" checked="true" >Male
					<input type="radio" <?=$activef?> name="gender" class="gender" id="gender" value="female">Female
					
                  </div>
				 
                     <div class="form-group  col-lg-4">
                    <label for="exampleInputEmail1">Image</label>
                    <input type="file" name="image" class="form-control" id="image" placeholder=" image"  >
                  </div>
				  <div class="form-group col-lg-4">
                    <label for="exampleInputEmail1">User Type</label>
                    <select name="usertype" class="form-control" required >
					 <option value="">Select user type</option>
					 <?php foreach ($usertype as $row){
						 if($userdetails->usertype_id ==$row->id){
						 $active="selected";} else {$active="";}
						 ?>
						 <option <?=$active?> value="<?=$row->id?>"><?=$row->name?></option>
					 <?php }?>
					 </select>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" class="btn btn-success" name="submit" value="submit">
				   <a href="javascript:history.go(-1)" class="btn btn-danger">Cancel</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content --><!-- /.content -->
    
  </div>
  <!-- /.content-wrapper -->
