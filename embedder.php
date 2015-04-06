<?php
/*
Author: Simen Fjellstad, http://simenfjellstad.no
Project page: https://github.com/SimenFjellstad/PHP-Video-Embedder/

This document is published under the Creative Commons 4.0 License:
http://creativecommons.org/licenses/by/4.0
*/

	$debug = false;
	$width = -1;
	$height = -1;

	function embed_sized_video($link, $width, $height){
		$GLOBALS['width'] = $width;
		$GLOBALS['height'] = $height;
		embed_video($link);
	}

	function embed_video($link){
		if(strpos($link,"twitch") !== false){ //This is a twitch video
			if(!($GLOBALS['width'] != -1 && $GLOBALS['height'] != -1)) {
				$width = 620;
				$height = 378;
			}
			else{
				$width = $GLOBALS['width'];
				$height = $GLOBALS['height'];
			}
			if(strpos($link,".tv/") !== false){
				if(strpos($link,"/c/") !== false){ //This is a VOD
					$params = explode('.tv/', $link)[1];
					$channel = explode('/c/', $params)[0];
					$videoid = explode('/c/', $params)[1];
					if($GLOBALS['debug']){
						echo nl2br("Link: ".$link."\n");
						echo nl2br("Params: ".$params."\n");
						echo nl2br("Channel: ".$channel."\n");
						echo nl2br("Video ID: ".$videoid."\n");
					}
					echo '<object class="embed_video" id="embed_video"
						bgcolor="#000000" 
						data="http://www.twitch.tv/swflibs/TwitchPlayer.swf" 
						width="'.$width.'"
						height="'.$height.'" 
						id="clip_embed_player_flash" 
						type="application/x-shockwave-flash">
							<param name="movie" value="http://www.twitch.tv/swflibs/TwitchPlayer.swf" />
							<param name="allowScriptAccess" value="always" />
							<param name="allowNetworking" value="all" />
							<param name="allowFullScreen" value="true" />
							<param name="flashvars" value="channel='.$channel.'&amp;videoId=c'.$videoid.'"/>
					</object>';
				}
				else{ // This is a live stream
					$channel = explode('.tv/', $link)[1];
					$channel = explode('?',$channel)[0];
					$channel = explode('&',$channel)[0];
					$channel = explode('/',$channel)[0];
					if($GLOBALS['debug']){
						echo nl2br("Link: ".$link."\n");
						echo nl2br("Channel: ".$channel."\n");
					}
					echo '<iframe 
							class="embed_video" 
							id="embed_video" 
							src="http://www.twitch.tv/'.$channel.'/embed" 
							frameborder="0" 
							scrolling="no" 
							height="'.$height.'" 
							width="'.$width.'" 
							webkitallowfullscreen 
							mozallowfullscreen 
							allowfullscreen>
						</iframe>';

				}
			}
		}
		else if(strpos($link,"youtu") !== false){ // this is a youtube video
			if(!($GLOBALS['width'] != -1 && $GLOBALS['height'] != -1)) {
				$width= 620;
				$height = 338;
			}
			else{
				$width = $GLOBALS['width'];
				$height = $GLOBALS['height'];
			}

			if(strpos($link,".be") !== false){ //Shortened link
				$videoid = explode('.be/',$link)[1];
				$videoid = explode('?',$videoid)[0];
				$videoid = explode('&',$videoid)[0];
			}
			else if(strpos($link,".com") !== false){ //Standard link
				$videoid = explode('v=',$link)[1];
				$videoid = explode('&',$videoid)[0];
				$videoid = explode('/',$videoid)[0];	
			}
			if($GLOBALS['debug']){
				echo nl2br("Link: ".$link."\n");
				echo nl2br("Video ID: ".$videoid."\n");
			}
			echo '<iframe 
					class="embed_video" 
					id="embed_video" 
					width="'.$width.'" 
					height="'.$height.'" 
					src="https://www.youtube.com/embed/'.$videoid.'" 
					frameborder="0" 
					webkitallowfullscreen 
					mozallowfullscreen 
					allowfullscreen>
				</iframe>';		
		}
		else if(strpos($link,"vimeo") !== false){ // this is a youtube video
			if(!($GLOBALS['width'] != -1 && $GLOBALS['height'] != -1)) {
				$width= 620;
				$height = 348;
			}
			else{
				$width = $GLOBALS['width'];
				$height = $GLOBALS['height'];
			}

			$videoid = explode('.com/',$link)[1];
			$videoid = explode('&',$videoid)[0];
			$videoid = explode('?',$videoid)[0];
			if($GLOBALS['debug']){
				echo nl2br("Link: ".$link."\n");
				echo nl2br("Video ID: ".$videoid."\n");
			}
			echo '<iframe 
					class="embed_video" 
					id="embed_video" 
					src="https://player.vimeo.com/video/'.$videoid.'" 
					width="'.$width.'" 
					height="'.$height.'" 
					frameborder="0" 
					webkitallowfullscreen 
					mozallowfullscreen 
					allowfullscreen>
				</iframe>';
		}
		$width = -1;
		$height = -1;
	}

	function setDebug($debug){
		if($debug == true || $debug == false)
			$GLOBALS['debug'] = $debug;
	}
?>
