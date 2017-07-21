<ul class="nav nav-pills">
	<li class="active">
		<a  href="#1a" data-toggle="tab">Category</a>
	</li>
	<li>
		<a href="#2a" data-toggle="tab">Task</a>
	</li>
</ul>

	<div class="tab-content clearfix">
		<div class="tab-pane active" id="1a">
			<h3>Adding new category</h3>
			<hr/>
			<form id="addCategory" method="POST">
				<input type="text" id="name" placeholder="Name" required/>
				
				<br/>
				<br/>
				
				<textarea id="desc" rows="3" cols="25" placeholder="Description"></textarea>
				
				<br/>
				
				<input type="submit" id="addCat" value="Add category" class="btn btn-primary"/>
			</form>
		</div>
		<div class="tab-pane" id="2a">
			<h3>Adding new task</h3>
			<hr/>
			
			<form id="addTask" method="POST">
				<input type="text" placeholder="Name" required/>
				
				<select name="category">
					<?php
						core::allCategories();
					?>
				</select>
				
				<input type="submit" id="addTask" value="Add Task" class="btn btn-primary"/>
			</form>
		</div>
	</div>
