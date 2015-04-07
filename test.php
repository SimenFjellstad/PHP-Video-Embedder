
<?php
/*
	This is a test project, to show you how this works.
*/
	$link = "http://www.twitch.tv/sp4zie/c/4624666";
	include('embedder.php');
	setDebug(false);
	setAllowParams(true);
	//embed_video($link);
	echo '<br><br>';
	embed_sized_video($link,920,480);
?>	
<script src="embedder_control.js"></script>
<script>
	embed_setSizeByAspect(480,'16:10');
	embed_setZ(-10);
</script>