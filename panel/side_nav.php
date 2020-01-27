<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="active">
						<a href="index.php">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>
					

					<li class="">
						<a href="bills.php">
							<i class="menu-icon fa fa-file-text"></i>
							<span class="menu-text"> Bill </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="customers.php">
							<i class="menu-icon fa fa-group"></i>
							<span class="menu-text"> Customers </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="products.php">
							<i class="menu-icon fa fa-industry"></i>
							<span class="menu-text"> Products </span>
						</a>

						<b class="arrow"></b>
					</li>
<?php
if (isset($_SESSION['b_id']))
{
	?>
				<li class="">
						<a href="bill_items.php">
							<i class="menu-icon fa fa-file-text"></i>
							<span class="menu-text"> Pending Bill </span>
						</a>

						<b class="arrow"></b>
					</li>
<?php
}
?>


					
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>