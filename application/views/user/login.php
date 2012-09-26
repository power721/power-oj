		<h2>Login</h2>
			<div class="login-form">
			<?php echo form_open('user/login') ?>
			<?php echo validation_errors('<p class="error">','</p>'); ?>
			  <label for="name">User Name:</label> 
			  <?php echo form_input('name',set_value('name')); ?><br>
			  <label for="pass">Password:</label>
			  <input type="password" name="pass" /><br>
			  <input type="submit" name="submit" value="login" /> 
			</form>
			<?php echo anchor('user/signup','Create an Account'); ?>
			<br>
		</div>
