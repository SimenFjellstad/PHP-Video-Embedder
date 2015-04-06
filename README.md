# PHP-Video-Embedder
PHP Video Embedder is an embedding plugin that embeds videos from various hosts.  
The PHP Video Embedder is hosted under the Creative Commons 4.0 License: http://creativecommons.org/licenses/by/4.0.

#Supported video sites:
- Youtube
- Twitch
  - Live stream
  - Video on Demand (VOD)
- Vimeo
- Hitbox
  - Live stream
  - Video on Demand (VOD)

All the embeds has **class** and **id** equal to **"embed_video"**

#Usage
You have to include the embedding code, you may do it like this:
>include_once('embedder.php');

#####There's 2 ways to use the embedder:  
Primitive, where only a link is provided, and the video will be returned with width="620" and an automatic height to fit your video:
>embed_video('LINK_TO_VIDEO');  

Advanced, where you manually set link, width and height of the output:
>embed_sized_video('LINK_TO_VIDEO', WIDTH, HEIGHT); 

#####You may also use the setDebug(bool) command if you want to see the variable output as well.
>setDebug(bool);
