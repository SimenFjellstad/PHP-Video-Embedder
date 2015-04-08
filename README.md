# PHP-Video-Embedder
PHP Video Embedder is an embedding plugin that embeds videos from various hosts.  
The PHP Video Embedder is hosted under the Creative Commons 4.0 License: http://creativecommons.org/licenses/by/4.0.

#Supported video sites:
- Youtube
  - shortened links (youtu.be/)
  - standard links (youtube.com/watch?v=)
- Twitch
  - Live stream
  - Video on Demand (VOD)
- Vimeo
- Hitbox
  - Live stream
  - Video on Demand (VOD)

All the embeds has **id** equal to **"embed_video"** unless otherwise set.

#Usage
####PHP Implementation:  
To use the PHP Video Embedder, you have to first include the **embedder.php** file.  
For embedding, we have 4 configurations you can embed in:  
  
To embed the video with standard width and id, use the embed_video() function:  
`embed_video('LINK_TO_VIDEO');`

To embed the video with a custom size only, use the **embed_sized_video()** function:  
`embed_sized_video('LINK_TO_VIDEO',WIDTH,HEIGHT);`

To embed the video with a custom id only, use the **embed_video_with_id()** function:  
`embed_video_with_id('LINK_TO_VIDEO', ID);`

To embed the video using a custom size *and* id, use the **embed_sized_video_with_id** function: 
`embed_sized_video_with_id('LINK_TO_VIDEO', ID, WIDTH, HEIGHT);`

#####You may also use the setDebug(bool) command if you want to see the variable output as well.  
`setDebug(bool);`  

#####If you want control over parameters passed into the url of the video, you can use the param functions:
To set allowParams to a specific bool: `setAllowParams(bool);`  
To allow params: `allowParams();`  
To Deny(Disallow) params: `disallowParams();`  

####JavaScript functions: (Optional)  
To use javascript functions for this plugin, you will have to import the **embedder_control.js** file:  
`<script src="embedder_control.js"></script>`  

#####Functions:
- Set player size:  
  - Set the size of the player to the desired width and height
    - `embed_setSize(width, height)`
    - `embed_setSize(id, width, height)`  
  - Set the size of the player to the desired width and height according to given aspect ratio ex.16:9 or 16/9
    - `embed_setSizeByAspect(width, aspect)`
    - `embed_setSizeByAspect(id, width, aspect)`
- Set player Opacity:
  - `embed_setOpacity(opacity)`
  - `embed_setOpacity(id, opacity)`
- Set player Z-index:
  - `embed_setZ(index)`
  - `embed_setZ(id, index)`
