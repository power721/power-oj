  <div align="center">
    <img height=29 src="<?php echo base_url() ?>misc/image/home.jpg" width=40 border=0>
    <font size=3>
        <a href="<?php echo base_url() ?>">
            Home Page
        </a>
    </font>
    &nbsp;&nbsp;
    <img height=29 src="<?php echo base_url() ?>misc/image/goback.jpg" width=40 border=0>
    <font size=3>
        <a href="javascript:history.go(-1)">
            Go Back
        </a>
        &nbsp;&nbsp;
        <img height=29 width=40 border=0 src="<?php echo base_url() ?>misc/image/top.jpg">
        <a href="#top">
            To top
        </a>
    </font>
<div>
  <hr>
  </div><!-- /#content -->
    <div id="copy_right">
    <strong>Copyright &copy; PowerOJ 2010-2012</strong><br>
      Any problem, Please Contact <a href="#">Administrator</a>
    </div><!-- /#copy_right -->
    <div id="debug">
      <?php echo 'Time:  '.$this->benchmark->elapsed_time().'s' ?><br>
      <?php echo 'Memory:'.$this->benchmark->memory_usage() ?><br>
      <?php echo 'REQUEST_TIME:'.REQUEST_TIME ?><br>
    </div><!-- /#debug -->
   </div><!-- /#page -->
  </body>
</html>