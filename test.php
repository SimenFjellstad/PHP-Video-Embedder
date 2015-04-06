<?php
/*
	This is a test file, it's here to show you how to use this plugin.
*/
	include('embedder.php');
	setDebug(false);
	embed_video('https://www.youtube.com/watch?v=WsSQL1hIiro');
	echo '<br><br>';
	embed_sized_video('https://www.youtube.com/watch?v=WsSQL1hIiro',720,480);
?>	
