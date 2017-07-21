<div class="login-box">

  <div class="login-logo">
    <a href="./"><b>My To-Do</b> list</a>
  </div>
  
  <div class="login-box-body">
  
    <p class="login-box-msg">Sign in to start your session</p>
	
    <form id="signinForm" action="./" method="POST">
	<div class="error"></div>
	
      <div class="form-group has-feedback">
        <input type="email" id="email" class="form-control" placeholder="Email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" id="pass" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
			<a href="./?page=register" class="text-center">Register a new account</a>
        </div>
        <div class="col-xs-4">
          <button type="submit" id="signin" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
	  
    </form>
	
  </div>
  
</div>

