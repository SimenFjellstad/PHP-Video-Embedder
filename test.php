<?php
/*
	This is a test project, to show you how this works.
*/
	$link = "http://www.twitch.tv/tharixer/v/3968478";
	include('embedder.php');
	setDebug(true);
	embed_video($link);
	echo '<br><br>';
	embed_sized_video($link,720,480);
?>	
