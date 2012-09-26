<script language="javascript" type="text/javascript">
  $(document).ready(function(){
    document.onkeydown = changepage
    var prevpage = "<?php echo $this->page->pre_url() ?>"
    var nextpage = "<?php echo $this->page->next_url() ?>"
    function changepage(event)
    {
      event = event ? event : (window.event ? window.event : null);
      if(prevpage && event.keyCode == 37)location = prevpage;
      if(nextpage && event.keyCode == 39)location = nextpage;
    }
  });
</script>
<?php echo $this->page->show(4); ?>
<table id="user-list" class="list" align="center">
<tr>
  <th>UID</th><th>Name</th><th>Nick</th><th>School</th><th>Mail</th><th>Solved</th><th>Submit</th><th>Ratio</th>
</tr>
<?php foreach($users as $user): ?>
<tr>
  <td><?php echo $user->uid ?></td>
  <td><a href="<?php echo base_url() ?>user/<?php echo $user->uid ?>"><?php echo $user->name ?></a></td>
  <td><?php echo $user->nick ?></td>
  <td><?php echo $user->school ?></td>
  <td><?php echo $user->mail ?></td>
  <td><?php echo $user->solved ?></td>
  <td><?php echo $user->submit ?></td>
  <td><?php echo $user->submit ? round($user->solved*100/$user->submit,2) : 0 ?>%</td>
</tr>
<?php endforeach ?>
</table>