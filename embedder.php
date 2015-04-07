<?php
/*
Author: Simen Fjellstad, http://simenfjellstad.no
Project page: https://github.com/SimenFjellstad/PHP-Video-Embedder/

This document is published under the Creative Commons 4.0 License:
http://creativecommons.org/licenses/by/4.0
*/
	$debug = false;
	$allowParams = true;
	$width = -1;
	$height = -1;
	$id = 'embed_video';


	function embed_sized_video($link, $width, $height){
		$GLOBALS['width'] = $width;
		$GLOBALS['height'] = $height;
		embed_video($link);
	}
	function embed_video_with_id($link, $id){
		$GLOBALS['id'] = $id;
		embed_video($link);
	}
	function embed_sized_video_with_id($link, $id, $width, $height){
		$GLOBALS['width'] = $width;
		$GLOBALS['height'] = $height;
		$GLOBALS['id'] = $id;
		embed_video($link);
	}


	function embed_video($link){
		if(stripos($link,"twitch") !== false){ //This is a twitch video
			if(!($GLOBALS['width'] != -1 && $GLOBALS['height'] != -1)) {
				$GLOBALS['width'] = 620;
				$GLOBALS['height'] = 378;
			}

			$videotype = '';

			if(stripos($link,"/v/") !== false || stripos($link,"/c/") !== false){
				if(stripos($link,"/c/") !== false){
					$videotype = 'c';
					$params = explode('.tv/', $link)[1];
					$channel = explode('/c/', $params)[0];
					$videoid = explode('/c/', $params)[1];

				}
				else if(stripos($link,"/v/") !== false){
					$videotype = 'v';
					$params = explode('.tv/', $link)[1];
					$channel = explode('/v/', $params)[0];
					$videoid = explode('/v/', $params)[1];
				}

				echo 
				'<object id="'.$GLOBALS['id'].'"
					width="'.$GLOBALS['width'].'" 
					height="'.$GLOBALS['height'].'"
					bgcolor="#000000" 
					data="http://www.twitch.tv/swflibs/TwitchPlayer.swf" 
					type="application/x-shockwave-flash">
						<param name="movie" value="http://www.twitch.tv/swflibs/TwitchPlayer.swf" />
						<param name="allowScriptAccess" value="always" />
						<param name="allowNetworking" value="all" />
						<param name="allowFullScreen" value="true" />
						<param name="flashvars" value="channel='.$channel.'&amp;videoId='.$videotype.$videoid.'"/>
				</object>';
			}
			else{ // This is most likely a live stream
				$channel = explode('.tv/', $link)[1];
				if(!$GLOBALS['allowParams']){
					$channel = explode('?', $channel)[0];
					$channel = explode('&', $channel)[0];
					$channel = explode('/', $channel)[0];
				}
				echo 
				'<iframe 
					id="'.$GLOBALS['id'].'" 
					width="'.$GLOBALS['width'].'" 
					height="'.$GLOBALS['height'].'"
					src="http://www.twitch.tv/'.$channel.'/embed" 
					frameborder="0" 
					scrolling="no" 
					allowscriptaccess="always" 
					webkitallowfullscreen 
					mozallowfullscreen 
					allowfullscreen>
				</iframe>';
			}
		}
		else if(stripos($link,"youtu") !== false){ // this is a youtube video
			if(!($GLOBALS['width'] != -1 && $GLOBALS['height'] != -1)) {
				$GLOBALS['width']= 620;
				$GLOBALS['height'] = 338;
			}

			if(stripos($link,".be") !== false)
				$videoid = explode('.be/',$link)[1];
			else if(stripos($link,".com") !== false)
				$videoid = explode('v=',$link)[1];
			else if(stripos($link,'/embed/') !== false)
				$videoid = explode('/embed/',$link)[1];
			
			if(!$GLOBALS['allowParams']){
				$videoid = explode('?', $videoid)[0];
				$videoid = explode('&', $videoid)[0];
				$videoid = explode('/', $videoid)[0];
			}	
			echo 
			'<iframe 
				id="'.$GLOBALS['id'].'" 
				width="'.$GLOBALS['width'].'" 
				height="'.$GLOBALS['height'].'"
				allowscriptaccess="always"  
				src="https://www.youtube.com/embed/'.$videoid.'" 
				frameborder="0" 
				webkitallowfullscreen 
				mozallowfullscreen 
				allowfullscreen>
			</iframe>';		
		}
		else if(stripos($link,"vimeo") !== false){ // this is a vimeo video
			if(!($GLOBALS['width'] != -1 && $GLOBALS['height'] != -1)) {
				$GLOBALS['width'] = 620;
				$GLOBALS['height'] = 348;
			}

			$videoid = explode('.com/',$link)[1];
			$videoid = explode('&',$videoid)[0];
			$videoid = explode('?',$videoid)[0];
			echo 
			'<iframe 
				id="'.$GLOBALS['id'].'" 
				width="'.$GLOBALS['width'].'" 
				height="'.$GLOBALS['height'].'"
				src="https://player.vimeo.com/video/'.$videoid.'" 
				frameborder="0" 
				allowscriptaccess="always" 
				webkitallowfullscreen 
				mozallowfullscreen 
				allowfullscreen>
			</iframe>';
		}
		else if(stripos($link,"hitbox") !== false){ // this is a hitbox video
			if(!($GLOBALS['width'] != -1 && $GLOBALS['height'] != -1)) {
				$GLOBALS['width']= 620;
				$GLOBALS['height'] = 348;
			}

			if(stripos($link, "/video/") !== false){ //This is a Video on Demand
				$videoid = explode('/video/',$link)[1];
				if(!$GLOBALS['allowParams']){
					$videoid = explode('?', $videoid)[0];
					$videoid = explode('&', $videoid)[0];
					$videoid = explode('/', $videoid)[0];
				}
				echo 
				'<iframe
					id="'.$GLOBALS['id'].'" 
					width="'.$GLOBALS['width'].'" 
					height="'.$GLOBALS['height'].'"
					src="http://www.hitbox.tv/#!/embedvideo/'.$videoid.'"
					frameborder="0"
					allowscriptaccess="always" 
					webkitallowfullscreen 
					mozallowfullscreen 
					allowfullscreen>
				</iframe>';
			}
			else if(stripos($link, ".tv/") !== false){ //This is a live stream
				$channel = explode('.tv/',$link)[1];
				if(!$GLOBALS['allowParams']){
					$channel = explode('?', $channel)[0];
					$channel = explode('&', $channel)[0];
					$channel = explode('/', $channel)[0];
				}
				echo 
				'<iframe 
					id="'.$GLOBALS['id'].'" 
					width="'.$GLOBALS['width'].'" 
					height="'.$GLOBALS['height'].'"
					allowscriptaccess="always" 
					src="http://www.hitbox.tv/embed/'.$channel.'" 
					frameborder="0" 
					webkitallowfullscreen 
					mozallowfullscreen 
					allowfullscreen>
				</iframe>';
			}
		}
		if($GLOBALS['debug']){
			echo nl2br("Link: ".$link."\n");
			echo nl2br("Params: ".$params."\n");
			echo nl2br("Channel: ".$channel."\n");
			echo nl2br("Video ID: ".$videoid."\n");
		}
		
		$id = 'embed_video';
		$GLOBAL['width'] = -1;
		$GLOBAL['height'] = -1;
	}

	function setDebug($debug){
		if($debug == true || $debug == false)
			$GLOBALS['debug'] = $debug;
	}

	function setAllowParams($params){
		if($params == true || $params == false)
			$GLOBALS['allowParams'] = $params;
	}
	function allowParams(){
		$GLOBALS['allowParams'] = true;

	}
	function disallowParams(){
		$GLOBALS['allowParams'] = false;
	}
?>
