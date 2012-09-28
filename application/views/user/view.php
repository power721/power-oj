	<div id="user-profile" class="user user-profile">
		<div><?php echo $user->name?><?php if($user->nick)echo ' -- '.$user->nick ?><div>
		<div>Last Loginned Time:<?php echo $login_time ?></div>
		<table id="user-profile" class="user user-profile">
			<tr>
				<td></td><td colspan=2></td>
			</tr>
			<tr>
				<td>Rank:</td><td><?php echo $rank ?></td><td>Solved Problems List</td>
			</tr>
			<tr>
				<td>Solved:</td><td><?php echo $user->solved ?></td>
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
				<td>Submissions:</td><td><?php echo $user->submit ?>
			</tr>
			<tr>
				<td>School:</td><td><?php echo $user->school ?>
			</tr>
			<tr>
				<td>Email:</td><td><?php echo $user->mail ?>
			</tr>
		</table>
	</div>