
  <!-- Main Footer -->
  <footer class="main-footer">
  <div class="pull-right hidden-xs"> </div>
    <strong>Copyright &copy; 2023-2023 <a href="#">Gipra Test</a>.</strong>
    All rights reserved.
 </footer>  
 

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="<?=base_url()?>assets/admin/js/jquery-3.5.1.js"></script>
<!-- jQuery -->
<script src="<?=base_url()?>assets/admin/js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?=base_url()?>assets/admin/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="<?=base_url()?>assets/admin/js/adminlte.js"></script>
<script src="<?=base_url()?>assets/admin/js/jquery.dataTables.min.js"></script>
<!-- datatable -->
<script src="<?=base_url()?>assets/admin/js/dataTables.bootstrap4.min.js"></script>
<!-- ckeditor -->
 <script src="<?=base_url()?>assets/admin/js/ckeditor.js"></script>
 <script src="<?=base_url()?>assets/admin/js/admin_js.js"></script>

        <script src="<?=base_url('assets/admin/js/jquery-3.0.0.js')?>" type='text/javascript'></script>
        <script src="<?=base_url('assets/admin/js/jquery-ui.min.js')?>" type='text/javascript'></script>
 
<script>
   $(document).ready(function () {
		$('#dtable').DataTable({
			"bPaginate": true,
		"bLengthChange": false,
		"bFilter": true,
		"bInfo": true,
		"bAutoWidth": true ,
		"searching": false
		});
    });
	
</script>
 <script type='text/javascript'>
        $(document).ready(function(){
            // Date Object
            $('#dob').datepicker({
                dateFormat: "yy-mm-dd",
                maxDate: new Date('2005-12-25')

            });


        });


        </script>
</body>
</html>
