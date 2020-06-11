<?php
$this->load->view('templates/header');
?>
<h3>Register for Event Calendar</h3>
<form action="<?php echo base_url(); ?>Login/userRegister" method="POST" name="register">
	<div class="form-group">
	    <label for="fname">First Name</label>
	    <input type="text" class="form-control" id="fname" aria-describedby="fnameHelp" placeholder="Enter your first name" name="fname">
  	</div>
    <div class="form-group">
    	<label for="lname">Last Name</label>
    	<input type="text" class="form-control" id="lname" aria-describedby="lnameHelp" placeholder="Enter your last name" name="lname">
	</div>
	<div class="form-group">
    	<label for="pnumber">Phone Number</label>
    	<input type="phone" class="form-control" id="pnumber" aria-describedby="pnumberHelp" placeholder="Enter your phone number" name="pnumber">
	</div>
	<div class="form-group">
    	<label for="age">Age</label>
    	<input type="number" class="form-control" id="age" aria-describedby="ageHelp" placeholder="Enter your age" name="age">
	</div>
	<div class="form-group">
   		<label for="exampleInputUsername1">Username</label>
    	<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="usernameHelp" placeholder="Enter username" name="username">    	
  	</div>
  	<div class="form-group">
    	<label for="exampleInputPassword1">Password</label>
    	<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  	</div>
  	<div class="form-check">
    	<input type="checkbox" class="form-check-input" id="exampleCheck1" name="rememberMe">
    	<label class="form-check-label" for="exampleCheck1">Remember me</label>
  	</div>
  	<button type="submit" class="btn btn-primary" name="login">Submit</button>
</form>
<p>Register user ? Please <a href="<?php echo base_url();?>">Login</a></p>
<?php
$this->load->view('templates/footer');
?>