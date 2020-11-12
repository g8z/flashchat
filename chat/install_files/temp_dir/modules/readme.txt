Greetings!

Beginning with FlashChat 4.3.3, you can use the FlashChat module pack, which is available for $5 from www.tufat.com/modules.php

After unzipping the module pack, copy the contents to this folder. Thus, after copying the modules, you will have something like:

www.yourdomain.com/chat/modules/admin/
www.yourdomain.com/chat/modules/banner/
www.yourdomain.com/chat/modules/mp3_player/
www.yourdomain.com/chat/modules/text_ads/
www.yourdomain.com/chat/modules/web_radio/
www.yourdomain.com/chat/modules/whiteboard/

You will need to edit the module properties in /inc/config.php to enable the module of your choice. The 'path' property should contain the path, relative to the FlashChat root, of the .swf file for the module.

For example, to enable the MP3 Player module, you  would edit /inc/config.php to this:

'module' => array(
	'anchor'  => 0,
	'path'    => './modules/mp3_player/mp3player.swf',
	'stretch' => true,
	'float_x' => 300, 
	'float_y' => 200,
	'float_w' => 100, 
	'float_h' => 100, 
),

Since 'stretch' is set to true, the module will fill all available space, and since 'anchor' is set to '0', the space that the module will occupy is immediately below the room list. In this example, the 'float' properties do not apply, since they only apply when the module occupies a floating window ('anchor' => -1).

Please also refer to the online documentation at:

http://www.tufat.com/docs/modpack/index.html

To edit the Flash source code, you will need Flash 2004 Professional.

AUDIO VIDEO MODULE: Please refer to the online docs at: http://www.tufat.com/docs/modpack/audio_video.html

The Audio/Video module REQUIRES Flash Communication Server or Flash Media Server to operate. The Whiteboard module can use FlashComm as an optional add-on to allow real-time whiteboard sharing, but it will still work without FlashComm without real-time sharing features.

WHITEBOARD MODULE: Before using the whiteboard, you MUST set this line in your config.xml file to the correct path:

<framework url="http://www.yourdomain.com/chat/modules/whiteboard/framework/engine.php" queryTime="3000" />

WEB RADIO: I just want to point out that the IP address list that I've included in the Web Radio module is about 2 years old, so at least some of those IP addresses are probably invalid at this point. I'm looking for an enterprising FlashChat user who can tell me which of these are no longer functional, and perhaps add others that have recently come online. Please contact me at g8z@yahoo.com with such IP address updates for the Web Radio module.

Good luck!
Darren