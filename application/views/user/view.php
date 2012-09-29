	<div id="user-profile" class="user user-profile">
		<div><?php echo $user->name?><?php if($user->nick)echo ' -- '.$user->nick ?><div>
		<div>Last Loginned Time:<?php echo $login_time ?></div>
		<table id="user-profile" class="user user-profile">
			<tr>
				<!--<td></td><td colspan=2></td>-->
			</tr>
			<tr>
				<td>Rank:</td><td><?php echo $rank ?></td><td align="center">Solved Problems List</td>
			</tr>
			<tr>
				<td>Solved:</td><td><a href="<?php echo base_url().'status/u/'.$user->uid.'/r/0' ?>"><?php echo $user->solved ?></a></td>
				<td rowspan=4>
					<?php
					$n = 0;
					foreach($problems as $problem) {
						echo anchor('problem/'.$problem->pid, $problem->pid).' ';
						$n++;
						if($n%13 == 0)
							echo "<br>\n";
					}
					?>
				</td>
			</tr>
			<tr>
				<td>Submissions:</td><td><a href="<?php echo base_url().'status/u/'.$user->uid ?>"><?php echo $user->submit ?></a></td>
			</tr>
			<tr>
				<td>School:</td><td><?php echo $user->school ?></td>
			</tr>
			<tr>
				<td>Email:</td><td><a href="mailto:<?php echo $user->mail ?>"><?php echo $user->mail ?></a></td>
			</tr>
		</table>
	</div>