<?php $oJob = Job::find($_GET['id']) ?>
<p><label>Date Posted:</label>&nbsp;<span><?php echo $oJob->pubdate; ?></span></p>
<p><label>Title:</label>&nbsp;<span><?php echo $oJob->title; ?></span></p>
<p><label>Description:</label>&nbsp;<span><?php echo $oJob->description; ?></span></p>
<p><label>Link:</label>&nbsp;<span>
<a href='<?php echo $oJob->link; ?>'><?php echo $oJob->link; ?></a></span></p>
<p><label>Posted By:</label>&nbsp;<span><?php echo $oJob->author; ?></span></p>

<form action='.' method="post">
	<p><label>Next Action:</label>&nbsp;
	<input type="hidden" name='id' value='<?php echo $oJob->id; ?>' />
	<input type="text" name='nextaction' value='<?php echo $oJob->nextaction; ?>' /></p>
	<input type="submit" name='action' value='Update' />
</form>
