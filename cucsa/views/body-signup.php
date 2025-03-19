<div class="container main-container">

	<div><?php echo $alert_sign2; ?></div>

	<form method="post">

		<input type="hidden" name="action" value="signup">

		<div class="form-group">

			<label for="user-type">User Type</label>
			<select class="form-control" id="role" name="role" required>
				<option value="">Please Select</option>
				<option value="2">Member</option>
				<option value="1">Admin</option>

			</select>

		</div>

	  <div class="form-group">

	    <label for="email">Email</label>

	    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your current email" required>

	  </div>
        
        <div class="form-group">

            <label for="nickname">Nickname</label>

            <input type="text" class="form-control" id="nickname" name="nickname"required>
            
            <small id="nicknameHelp" class="form-text text-muted">Enter your [nickname] [#year] [faculty] e.g. Kul #5 EDU</small>

        </div>

	  <div class="form-group">

	    <label for="password">Password</label>
	    <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
        <small id="passwordHelp" class="form-text text-muted">Enter password recieved from CU Cheer Club staff</small>

	  </div>


		<button type="submit" id="signup-button" class="btn btn-primary">Sign Up</button>

		<a class="ml-3" href="index.php">or Login</a>

	</form>  

</div>
