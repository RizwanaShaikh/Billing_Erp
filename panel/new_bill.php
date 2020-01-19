
<!DOCTYPE html>
<html lang="en">

	<head>
		<?php include 'header.php';?>

		<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("controller/customers.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>

	</head>

	<body class="no-skin">
		<?php include 'top_nav.php'; ?>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<?php include 'side_nav.php';?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="index.php">Home</a>
							</li>

							<li>
								Invoice
							</li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Invoice
								
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
													
								<div class="row">
									<div class="container">
										

									<form action="controller/bill.php" method="post">
										<div class="col-sm-6">
											<div class="form-group">
										    
										    <div class="search-box">
									        Customer Name : <input type="text" autocomplete="off" placeholder="Search Customer..." class="form-control" name="c_name" />
									        <div class="dropdown result"></div>
									    	</div>
										  </div>
										</div>
										<div class="col-sm-6" style="padding: 1%">
											<button type="submit" name="gen_bill" class="btn btn-default">Submit</button>
										</div>
										  
										  
										</form>

									</div>
								</div>



								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<?php include 'footer.php';?>


			
	</body>
</html>
<!-- New Customer Modal -->
<div id="new_cust" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Product</h4>
      </div>
      <div class="modal-body">

		<form action="controller/products.php" method="post">
		  <div class="form-group">
		    <label for="p_name">Product Name : </label>
		    <input type="text" class="form-control" name="p_name" required>
		  </div>
		  <div class="form-group">
		    <label for="p_num">Product No. : </label>
		    <input type="text" class="form-control" name="p_num" required>
		  </div>
		  <div class="form-group">
		    <label for="p_qantity">Qantity : </label>
		    <input type="text" class="form-control" name="p_qantity" required>
		  </div>
		  <!-- <div class="form-group">
		  	 <div class="dropdown">
				  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
				  <span class="caret"></span></button>
				  <ul class="dropdown-menu">
				    <li><a href="#">HTML</a></li>
				    <li><a href="#">CSS</a></li>
				    <li><a href="#">JavaScript</a></li>
				  </ul>
				</div> 
		  </div> -->
		  <div class="form-group">
		    <label for="p_qnt_type">Quantity Type : </label>
		    <input type="text" class="form-control" name="p_qnt_type" required>
		  </div>
		  <button type="submit" name="new_pro" class="btn btn-default">Submit</button>
		</form> 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<script type="text/javascript">
	$(document).ready(function(){
		$('.editbtn').on('click',function() {
			$('#update_cust').modal('show');

			$tr = $(this).closest('tr');

			var data = $tr.children('td').map(function(){
				return $(this).text();
			}).get();

			console.log(data);

			$('#p_name').val(data[1].trim());
			$('#p_num').val(data[2].trim());
			$('#p_qantity').val(data[3].trim());
			$('#p_qnt_type').val(data[4].trim());
			$('#p_id').val(data[5].trim());

		});
	});
</script>

<!-- Update Customer Modal -->
<div id="update_cust" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true"> 
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Product</h4>
      </div>
      <div class="modal-body">
       
		<form action="controller/products.php" method="post">
		  <div class="form-group">
		    <label for="p_name">Product Name : </label>
		    <input type="text" class="form-control" name="p_name" id="p_name" required>
		  </div>
		  <div class="form-group">
		    <label for="p_num">Product No. : </label>
		    <input type="text" class="form-control" name="p_num" id="p_num" required>
		  </div>
		  <div class="form-group">
		    <label for="p_qantity">Qantity : </label>
		    <input type="text" class="form-control" name="p_qantity" id="p_qantity" required>
		  </div>
		  <div class="form-group">
		    <label for="p_qnt_type">Quantity Type. : </label>
		    <input type="text" class="form-control" name="p_qnt_type" id="p_qnt_type" required>
		  </div>
		  <input type="hidden" name="p_id" id="p_id">
		  <button type="submit" name="update_pro" class="btn btn-default">Submit</button>
		</form> 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

