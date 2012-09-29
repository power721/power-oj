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

    $("tr.status").mouseover(function() {$(this).css("background-color", "#6589D1");});
    $("tr.status").mouseout(function() {$(this).css("background-color", "");});
  });
</script>
<?php echo $this->page->show(4); ?>
<table cellSpacing=0 cellPadding=0 width=99% border=1 style="border-collapse: collapse">
            <tr bgcolor=#6589D1>
                <td class=status align=center width=8%>
                    <b>
                        Run ID
                    </b>
                </td>
                <td class=status align=center width=10%>
                    <b>
                        User
                    </b>
                </td>
                <td class=status align=center width=6%>
                    <b>
                        Problem
                    </b>
                </td>
                <td class=status align=center width=20%>
                    <b>
                        Result
                    </b>
                </td>
                <td class=status align=center width=7%>
                    <b>
                        Memory
                    </b>
                </td>
                <td class=status align=center width=7%>
                    <b>
                        Time
                    </b>
                </td>
                <td class=status align=center width=7%>
                    <b>
                        Language
                    </b>
                </td>
                <td class=status align=center width=7%>
                    <b>
                        Code Length
                    </b>
                </td>
                <td class=status align=center width=17%>
                    <b>
                        Submit Time
                    </b>
                </td>
            </tr>
<?php foreach($solutions as $item): ?>
<tr align="center" class="status">
    <td>
        <?php echo $item->sid ?>
    </td>
    <td>
        <a href="userstatus?user_id=<?php echo $item->sid ?>">
            <?php echo $item->uid ?>
        </a>
    </td>
    <td>
        <a href="showproblem?problem_id=<?php echo $item->pid ?>">
            <?php echo $item->pid ?>
        </a>
    </td>
    <td>
        <font color="blue">
            <?php echo $item->result ?>
        </font>
    </td>
    <td>
        <?php echo $item->result ? $item->memory.'K' : '' ?>
    </td>
    <td>
        <?php echo $item->result ? $item->time.'MS' : '' ?>
    </td>
    <td>
        <?php echo $item->language ?>
    </td>
    <td>
        <?php echo $item->code_length ?>b
    </td>
    <td>
        <?php echo unix_to_human($item->in_date,TRUE,'eu') ?>
    </td>
</tr>
<?php endforeach ?>
</table>