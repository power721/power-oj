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
<div class="Pagination"><?php echo $this->page->show(4); ?></div>
<table id="problem-list" class="list" align="center">
<tr>
  <th>ID</th><th>Title</th><th>Accept</th><th>Submit</th><th>Ratio</th><th>Date</th>
</tr>
<?php foreach($problems as $problem): ?>
<tr>
  <td><?php echo $problem->problem_id ?></td>
  <td><a href="<?php echo base_url() ?>problem/<?php echo $problem->problem_id ?>"><?php echo $problem->title ?></a></td>
  <td><?php echo $problem->accepted ?></td>
  <td><?php echo $problem->submit ?></td>
  <td><?php echo $problem->ratio.'%' ?></td>
  <td><?php echo $problem->in_date ?></td>
</tr>
<?php endforeach ?>
</table>
<div class="Pagination"><?php echo $this->page->show(4); ?></div>