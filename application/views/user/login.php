<h2>Login</h2>

<?php echo validation_errors('<p class="error">','</p>'); ?>

<?php echo form_open('user/login') ?>

  <label for="name">User Name:</label> 
  <input type="input" name="name" /><br />

  <label for="pass">Password:</label>
  <input type="password" name="pass" /><br />
  
  <input type="submit" name="submit" value="login" /> 

</form>