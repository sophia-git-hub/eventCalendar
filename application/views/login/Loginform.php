<?php
$this->load->view('templates/header.php');
?>
<h3>Login to Event Calender</h3>
<form action="<?php echo base_url(); ?>Login/userlogin" method="POST">
  <div class="form-group">
    <label for="exampleInputUserename1">Username</label>
    <input type="text" class="form-control" id="exampleInputUsername1" aria-describedby="usernameHelp" placeholder="Enter username" name="username">    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="userpassword">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="rememberMe">
    <label class="form-check-label" for="exampleCheck1">Remeber me</label>
  </div>
  <button type="submit" class="btn btn-primary" name="login">Submit</button>
</form>
<p>Not a registered user. Click <a href="Login/userReg">here</a> to register</p>
<?php
$this->load->view('templates/footer.php');
?>