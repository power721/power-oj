<script language="javascript" type="text/javascript">
  $(document).ready(function(){
    $("a.ProblemHead").click(function(){
      $(this).parent().next("div").children("pre").toggle("slow");
    });
    document.onkeydown = changepage;
    var prevpage = "<?php echo $problem->problem_id-1 ?>";
    var nextpage = "<?php echo $problem->problem_id+1 ?>";
    function changepage(event)
    {
      event = event ? event : (window.event ? window.event : null);
      if(prevpage && event.keyCode == 37)
        location = prevpage;
      else if(nextpage && event.keyCode == 39)
        location = nextpage;
    }
  });
</script>

<table border=0 cellpadding=0 cellspacing=0 width=99%>
    <tr>
        <td class="no" width=50% align="left">
            <a href=<?php echo $problem->problem_id-1 ?> title="←左方向键快捷翻页">&lt;&lt;Previous</a>
        </td>
        <td class="no" width=50% align="right">
            <a href=<?php echo $problem->problem_id+1 ?> title="→右方向键快捷翻页">Next&gt;&gt;</a>
        </td>
    </tr>
</table>
<p align="center">
    &nbsp;
    <font size=5>
        <?php echo $problem->problem_id ?>
    </font>
    :
    <font color="blue" size=5>
        <?php echo $problem->title ?>
    </font>
</p>
<p align="center">
    <font color="blue">
        Time Limit:
    </font>
    <?php echo $problem->time_limit ?>MS&nbsp;
    <font color="blue">
        Memory Limit:
    </font>
    <?php echo $problem->memory_limit ?>K
    <br>
    <font color="red">
        Total Submit:
    </font>
    <a href="<?php echo base_url() ?>status/p/<?php echo $problem->problem_id ?>">
        <?php echo $problem->submit ?>
    </a>
    <font color="red">
        Accepted:
    </font>
    <a href="<?php echo base_url() ?>status/p/<?php echo $problem->problem_id ?>/r/0">
        <?php echo $problem->accepted ?>
    </a>
    Page View:
    <font color="blue">
        <?php echo $problem->view ?>
    </font>
</p>
<font color="blue" size=4>
    <p align="center">
        [<a href="<?php echo base_url() ?>problem/submit/1008">Submit</a>]&nbsp;&nbsp; 
        [<a href="<?php echo base_url() ?>problem/status/1008">Status</a>]&nbsp;&nbsp;
        [<a href="<?php echo base_url() ?>bbs/p/1008">Discuss</a>]
    </p>
</font>
<div style="border-top:1px solid #aaa; width:99%; color:#555" align="right">
    Font Size:
    <span style="font-size:16px;">
        <a href="javascript:void(0)" onclick="set_size(17);">Aa</a>
    </span>
    <span style="font-size:18px;">
        <a href="javascript:void(0)" onclick="set_size(19);">Aa</a>
    </span>
    <span style="font-size:20px;">
        <a href="javascript:void(0)" onclick="set_size(21);">Aa</a>
    </span>
</div>
<div id="Problem">
    <div class="ProblemBody">
        <h2>
            <a href="javascript:void(0)" class="ProblemHead">Description</a>
        </h2>
        <div class="problem" id="probelm-description">
            <pre><?php echo $problem->description ?></pre>
        </div>
        <h2>
            <a href="javascript:void(0)" class="ProblemHead">Input</a>
        </h2>
        <div class="problem" id="probelm-input">
            <pre><?php echo $problem->input ?></pre>
        </div>
        <h2>
            <a href="javascript:void(0)" class="ProblemHead">Output</a>
        </h2>
        <div class="problem" id="probelm-output">
            <pre><?php echo $problem->output ?></pre>
        </div>
        <h2>
            <a href="javascript:void(0)" class="ProblemHead">Sample Input</a>
        </h2>
        <div class="problem" id="probelm-sinput">
            <pre><?php echo $problem->sample_input ?></pre>
        </div>
        <h2>
            <a href="javascript:void(0)" class="ProblemHead">Sample Output</a>
        </h2>
        <div class="problem" id="probelm-soutput">
            <pre><?php echo $problem->sample_output ?></pre>
        </div>
        <?php if(!empty($problem->hint)): ?>
        <h2>
            <a href="javascript:void(0)" class="ProblemHead">Hint</a>
        </h2>
        <div class="problem" id="probelm-hint">
            <pre><?php echo $problem->hint ?></pre>
        </div>
        <?php endif ?>
        <?php if(!empty($problem->source)): ?>
        <h2>
            <a href="javascript:void(0)" class="ProblemHead">Source</a>
        </h2>
        <div class="problem" id="probelm-source">
            <pre><a href="#"><?php echo $problem->source ?></a></pre>
        </div>
        <?php endif ?>
    </div>
</div>
<font color="blue" size=4>
    <p align="center">
        [<a href="<?php echo base_url() ?>problem/submit/1008">Submit</a>]&nbsp;&nbsp; 
        [<a href="<?php echo base_url() ?>problem/status/1008">Status</a>]&nbsp;&nbsp;
        [<a href="<?php echo base_url() ?>bbs/p/1008">Discuss</a>]
    </p>
</font>