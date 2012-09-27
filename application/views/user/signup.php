		<h2>Signup</h2>
		<div id="signup-form" class="form user-form">
			<?php echo form_open('user/signup'); ?>
			<?php echo validation_errors('<p class="error">','</p>'); ?>
			<p>
				<label for="username">Username: </label>
				<?php echo form_input('username',set_value('username')); ?>
			</p>
			<p>
				<label for="password">Password: </label>
				<?php echo form_password('password'); ?>
			</p>
			<p>
				<label for="passconf">Confirm Password: </label>
				<?php echo form_password('passconf'); ?>
			</p>
			<p>
				<label for="email">E-mail: </label>
				<?php echo form_input('email',set_value('email')); ?>
			</p>
			<p>
				<?php echo form_submit('submit','Signup'); ?>
			</p>
			<?php echo form_close(); ?>
		</div>