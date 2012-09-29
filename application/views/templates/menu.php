	<div id="menu">
  	<span class="menu_item"><a href="<?php echo base_url() ?>">Home</a></span> |
    <span class="menu_item"><a href="<?php echo base_url() ?>problem">Problems</a></span> |
  	<span class="menu_item"><a href="<?php echo base_url() ?>status">Status</a></span> |
    <span class="menu_item"><a href="<?php echo base_url() ?>user">Users</a></span> |
    <span class="menu_item"><a href="<?php echo base_url() ?>contest">Contests</a></span> |
  	<span class="menu_item"><a href="<?php echo base_url() ?>faq">F.A.Q</a></span>
  	<div id="user" align="right">
  	<?php if($user = $this->session->userdata('user')): ?>
  	  <span class="user_item"><a href="<?php echo base_url() ?>user/<?php echo $this->session->userdata('uid') ?>"><?php echo $user.'(0)' ?></a></span>
  	  <span class="user_item"><a href="<?php echo base_url() ?>user/logout">Logout</a></span>
  	<?php else: ?>
      <span class="user_item"><a href="<?php echo base_url() ?>user/login">Login</a></span>
  	  <span class="user_item"><a href="<?php echo base_url() ?>user/signup">Signup</a></span>
  	<?php endif ?>
  	</div><!-- /#user -->
	</div><!-- /#menu -->
	<hr>
  <div id="messages">
    <?php $messages = $this->session->flashdata('messages') ?>
    <?php if (!empty($messages)): ?>
      <?php foreach ($messages as $message): ?>
        <div class="message-item"><?php echo $message ?></div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div><!-- /#messages -->
<div id="content">
