
<?php
/*
	This is a test project, to show you how this works.
*/
	$link = "https://www.youtube.com/watch?v=xshEZzpS4CQ";
	include('embedder.php');
	setDebug(false);
	embed_video($link);
	echo '<br><br>';
	//embed_sized_video($link,720,480);
?>	
<script src="embedder_control.js"></script>
<script>
	embed_setSizeByAspect(480,'16:9');
	embed_setZ(-10);
</script>