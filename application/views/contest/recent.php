<table id="recent-contests" align="center" width=80%>
    <tr><th>OJ</th><th>Contest Name</th><th>Start Time</th><th>Access</th></tr>
<?php foreach($contests as $contest): ?>
<?php if(strpos($contest->oj, 'Topcoder') !== FALSE)$contest->access = 'Register' ?>
<?php if(strpos($contest->name, 'SRM') !== FALSE): ?>
<tr class="srm">
<?php elseif(strpos($contest->name, 'Regional') !== FALSE): ?>
<tr class="regional">
<?php else: ?>
<tr>
<?php endif ?>
  <td><?php echo $contest->oj ?></td>
  <td><a href="<?php echo $contest->link ?>"><?php echo $contest->name ?></a></td>
  <td align="left"><?php echo $contest->start_time.' '.$contest->week ?></td>
  <td><?php echo $contest->access ?></td>
</tr>
<?php endforeach ?>
</table>
<span align="center">数据来源：<a href="http://contests.acmicpc.info/contests.json">http://contests.acmicpc.info/contests.json</a></span>
<br><br>
