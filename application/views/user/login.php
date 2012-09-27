		<h2>Login</h2>
		<div id="login-form" class="form user-form">
			<?php echo form_open('user/login') ?>
			<?php echo validation_errors('<p class="error">','</p>'); ?>
			<p>
			  <label for="username">Username:</label> 
			  <?php echo form_input('username',set_value('username')); ?>
			</p>
			<p>
			  <label for="password">Password:</label>
			  <?php echo form_password('password'); ?>
			</p>
			<p>
			  <?php echo form_submit('submit','Login'); ?> 
			</p>
			</form>
			<?php echo anchor('user/signup','Create an Account'); ?>
			<br>
		</div>
