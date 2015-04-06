<?php
/*
	This is a test project, to show you how this works.
*/

	include('embedder.php');
	setDebug(false);
	embed_video('https://www.youtube.com/watch?v=WsSQL1hIiro');
	echo '<br><br>';
	embed_sized_video('https://www.youtube.com/watch?v=WsSQL1hIiro',720,480);
?>	
