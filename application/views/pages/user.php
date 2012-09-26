<?php if($user = $this->session->userdata('user')): ?>
<a href=<?php echo site_url('user/logout') ?>>Logout</a>
<?php else: ?>
<a href=<?php echo site_url('user/login') ?>>Login</a>
<?php endif ?>