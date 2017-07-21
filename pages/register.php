<div class="login-box">

  <div class="login-logo">
    <a href="./"><b>Register</b></a>
  </div>
  
  <div class="login-box-body">
  
    <p class="login-box-msg">Register your account to start your session.</p>
	
    <form id="regForm" action="./?page=register&done" method="POST">
	
      <div class="form-group has-feedback">
        <input type="email" id="email" class="form-control" placeholder="Email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" id="firstname" class="form-control" placeholder="Firstname" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>     
	  <div class="form-group has-feedback">
        <input type="text" id="lastname" class="form-control" placeholder="Lastname" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
	  <div class="form-group has-feedback">
        <input type="text" id="phone" class="form-control" placeholder="+371" required>
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
		<span id="errmsg"></span>
      </div>	  
      <div class="form-group has-feedback">
        <input type="password" id="pass" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>	  
      <div class="row">
        <div class="col-xs-8">
			<a href="./" class="text-center">I have account already!</a>
        </div>
        <div class="col-xs-4">
			<input type="submit" id="regMe" class="btn btn-primary btn-block btn-flat" value="Register">
        </div>
      </div>
	  
    </form>
	
  </div>
  
</div>

