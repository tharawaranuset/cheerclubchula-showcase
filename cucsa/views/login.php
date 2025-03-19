<div class="container main-container">

	<div><?php echo $alert_sign.$_COOKIE['alert_sign']; ?></div>

	<form method="post">

		<input type="hidden" name="action" value="login">

	  <div class="form-group">

	    <label for="email">Email</label>

	    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your current email" required>

	  </div>

	  <div class="form-group">

	    <label for="password">Password</label>
	    <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
        <small id="passwordHelp" class="form-text text-muted">Enter password recieved from CU Cheer Club staff</small>

	  </div>

		<button type="submit" id="login-button" class="btn btn-primary">Login</button>

		<a class="ml-3" href="signup.php">or Sign Up</a>

	</form>
    <br><br><br><div class="text-right"><a href="public-seatpaper.php" class="btn btn-info">Go to Public Seat Paper</a></div> 

</div>
