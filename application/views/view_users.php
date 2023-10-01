  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Home</a></li>
              <li class="breadcrumb-item active"><?=ucfirst($this->uri->segment(2))?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            
              <!-- /.card-header -->
				<div class="card-body">
					<table id="dtable" class="table table-striped table-bordered" style="width:100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Image</th>
									<th>Name</th>									
									<th>Email Address</th>
									<th>Date of Birth</th>									
									<th>Phone</th>																
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
							<?php if(count($users)>0){
								$i=1;
							foreach($users as $row){
														
								?>
								<tr>
									<td><?=$i?></td>
									<td><img src="<?=base_url('uploads/'.$row->image)?>" width="30" height="30"/></td>
									<td><?=$row->name?></td>
									<td><?=$row->email?></td>
									<td><?=$row->dob?></td>
									<td><?=$row->phone?></td>
																               
									<td><a  href="<?=base_url('edit_user/'.$row->id)?>"><i class="fa fa-pencil-alt"></i>EDIT</a> |
									<a style="color:red" class="delete" onclick="return confirm('Are you absolutely sure you want to delete?');" href="<?=base_url('delete_user/'.$row->id)?>"> <i class="fa fa-trash" aria-hidden="true"></i>DELETE</a></td>
								 
								</tr>
								<?php $i++;
							} } else {?>
							 <tr><td colspan="5" align="center"><b>There is No results found</b></td></tr>
							<?php }?>
							</tbody>

						</table>
				</div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
</div> 	