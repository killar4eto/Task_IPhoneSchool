<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="./">My To-DO List</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li>
					<a href="?page=add">Add</a>
				</li>
				<li>
					<a href="?page=all">View All</a>
				</li>				
				<li>
					<a href="?page=profile">Profile</a>
				</li>				
				<li>
					<a href="#" id="signOut">Signout</a>
				</li>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container -->
</nav>

<br/>
<br/>
<br/>
<!-- Page Content -->
<div class="container">
	
	<?php
	
	if(isset($_GET['page'])){
		include "$_GET[page].php";
	}
	else{
	?>
	<div class="row">

		<div class="col-md-3">
			<p class="lead">My Tasks</p>
				<ul class="list-group">
				  <?php
					core::tasks();
				  ?>
				</ul>
		</div>

		<div class="col-md-9">
			<br/>
			<br/>
			<br/>
			<?php
				core::viewTask();
			?>

		</div>
	</div>	
	<?php	
		}
	?>

</div>
<!-- /.container -->

<div class="container">

	<hr>

	<!-- Footer -->
	<footer>
		<div class="row">
			<div class="col-lg-12">
				<p>Copyright &copy; To-DO 2017</p>
			</div>
		</div>
	</footer>

</div>
<!-- /.container -->