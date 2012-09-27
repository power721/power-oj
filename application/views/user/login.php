		<h2>Login</h2>
			<div id="login-form" class="form user-form">
			<?php echo form_open('user/login') ?>
			<?php echo validation_errors('<p class="error">','</p>'); ?>
			  <label for="username">User Name:</label> 
			  <?php echo form_input('username',set_value('username')); ?><br>
			  <label for="password">Password:</label>
			  <input type="password" name="password" /><br>
			  <input type="submit" name="submit" value="login" /> 
			</form>
			<?php echo anchor('user/signup','Create an Account'); ?>
			<br>
		</div>
