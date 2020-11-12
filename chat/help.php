<html>
	
<head>
<title>FlashChat Help</title>
<style type="text/css">
<!--
.title {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 18px;
	font-weight: bold;
}
.normal {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
}
.subtitle {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
}
.welcome {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 24px;
	font-weight: bold;
}
A {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #0000FF;
}
A:hover {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #FF0000;
}
-->
</style>
</head>

	<body class="normal">
<p class="welcome">Welcome!</p>
<p>This document should help answer some of the most frequently asked questions 
  regarding the FlashChat software sold on <a href="http://www.tufat.com" target="_blank">TUFaT.com</a>. 
  If you do not find what you need in this document, please post your question 
  on the <a href="http://www.tufat.com/phpBB2/" target="_blank">TUFaT.com Support 
  Forum</a>. This document does not describe the basic usage of the chat room, 
  however, because it is assumed that it's fairly obvious (answer: type a message 
  and click send!).</p>
<p class="title">Using &amp; Configuring FlashChat</p>
<p><span class="subtitle">What IRC commands are available for FlashChat?</span><br>
  <span class="normal">There are several command-line options that users and moderators 
  can use for advanced functionality. These options do not exist in the FlashChat 
  interface, but they are available to you by typing them directly into the message 
  input box. These commands are &quot;IRC-like&quot; since they begin with the 
  backslash. The following table summaries these options:</span></p>
<table width="100%" border="0" cellpadding="1" cellspacing="0" class="normal">
  <tr class="subtitle"> 
    <td>Command</td>
    <td width="995">Description</td>
  </tr>
  <tr valign="top"> 
    <td>/away</td>
    <td>Sets user as away. Typing this command again sets user as &quot;here&quot;.</td>
  </tr>
  <tr valign="top"> 
    <td>/here</td>
    <td>Sets user as here. This reverses the &quot;away&quot; and &quot;busy&quot; 
      states.</td>
  </tr>
  <tr valign="top"> 
    <td>/busy</td>
    <td>Sets user as busy. Typing this command again sets user as &quot;here&quot;.</td>
  </tr>
  <tr valign="top"> 
    <td>/back ##</td>
    <td>Shows the last ## entries of the room's chat, including any chat text 
      that was present before arrival to the room.</td>
  </tr>
  <tr valign="top"> 
    <td>/backtime ##</td>
    <td>Shows the last ## minutes of the room's chat, including any chat text 
      that was present before arrival to the room.</td>
  </tr>
  <tr valign="top"> 
    <td>/clear</td>
    <td>Clears the chat screen. This only affects your screen, not the screen 
      of other users.</td>
  </tr>
  <tr valign="top"> 
    <td>/me &lt;action&gt;</td>
    <td>Issues an IRC-like &quot;action&quot; to the chat. &quot;/me&quot; will 
      be changed to your user name, and the text in &lt;action&gt; will appear 
      as a system message. For example: &quot;/me is thinking&quot; would translate 
      to &quot;Joe is thinking&quot;.</td>
  </tr>
  <tr valign="top"> 
    <td>/join &lt;room&gt;</td>
    <td>Switches the user to &lt;room&gt;. For example: &quot;/join The Lounge&quot;</td>
  </tr>
  <tr valign="top"> 
    <td>/part</td>
    <td>Logout of the chat.</td>
  </tr>
  <tr valign="top"> 
    <td>/quit</td>
    <td>Logout of the chat.</td>
  </tr>
  <tr valign="top"> 
    <td>/logout</td>
    <td>Logout of the chat.</td>
  </tr>
  <tr valign="top"> 
    <td>/version</td>
    <td>Shows which version of the chat you are using.</td>
  </tr>
  <tr valign="top"> 
    <td>/invite &lt;user&gt;</td>
    <td>Invites &quot;user&quot; to the room that you are currently in. </td>
  </tr>
  <tr valign="top"> 
    <td nowrap>/ignore &lt;user&gt;</td>
    <td>Ignore &quot;user&quot;.</td>
  </tr>
  <tr valign="top"> 
    <td nowrap>/broadcast &lt;msg&gt;</td>
    <td>Only available to moderators. This broadcasts a message to all users in 
      all rooms. For example, &quot;/broadcast Hello everyone!&quot;</td>
  </tr>
  <tr valign="top"> 
    <td>/kick &lt;user&gt;</td>
    <td>Only available to moderators. This kicks &quot;user&quot; from the room.</td>
  </tr>
  <tr valign="top"> 
    <td>/boot &lt;user&gt;</td>
    <td>Same as /kick.</td>
  </tr>
  <tr valign="top"> 
    <td>/ban &lt;user&gt;</td>
    <td>Only available to moderators. Bans &quot;user&quot; from the chat.</td>
  </tr>
  <tr valign="top"> 
    <td>/banip &lt;user&gt;</td>
    <td>Only available to moderators. Bans the IP address of the user from all 
      chat activity.</td>
  </tr>
  <tr valign="top"> 
    <td>/gagX &lt;user&gt;</td>
    <td>Only available to moderators. Gags the user for X minutes. For example, 
      /gag5 joe. If the user's name has more than one word, then it must be enclosed 
      with quotes. For example: /gag5 &quot;Joe Shmoe&quot;</td>
  </tr>
  <tr valign="top"> 
    <td>/alert &lt;user&gt; &lt;msg&gt;</td>
    <td>Only available to moderators. Sends a popup alert to the user. If the 
      user's name has more than one word, then it must be enclosed with quotes.</td>
  </tr>
  <tr valign="top"> 
    <td>/roomalert &lt;msg&gt;</td>
    <td>Same as /alert, but sends the message to all users in the room.</td>
  </tr>
  <tr valign="top">
    <td>/chatalert &lt;msg&gt;</td>
    <td>Same as /alert, but sends the message to all users in all rooms.</td>
  </tr>
</table>
<p>If there is some command that you would like to see in FlashChat but which 
  is not in this list, please post your suggestion on the <a href="http://www.tufat.com/phpBB2/">TUFaT.com 
  Support Forum</a>, and it will likely be added in a future release.</p>
<p><span class="subtitle">Does FlashChat connect to actual IRC servers?</span><br>
  In release 3.8 no, although this is a planned upgrade for a future release of 
  FlashChat. The ultimate the goal of FlashChat is to create a sort of &quot;universal&quot; 
  chat system, which would be able to connect to all known chat servers, including 
  desktop instant messaging programs like AIM, ICQ, and MSN Messenger. This is 
  an upgrade which is probably very far into the future, however.</p>
<p>The purpose of the IRC commands listed above is to make the use of FlashChat 
  more familiar and intuitive for users who may be accustomed to IRC systems. 
  Thus, many of the commands that they already know can be used in FlashChat.</p>
<p><span class="subtitle">How frequently does FlashChat check the server for new 
  messages?</span><br>
  By default, every 3 seconds. However, this setting can be adjusted easily in 
  the FlashChat configuration file. Setting this to a lower value will cause messages 
  to be displayed more quickly, but it will increase the bandwidth requirements 
  for the system. It is strongly recommended that you keep the 3-second interval 
  setting unless you have a dedicated server. If you anticipate that a very large 
  number of users will be chatting (&gt;100), then you may want to change this 
  to 4 or 5 seconds instead of 3, to reduce the server load. This will produce 
  small delays in the message processing, however.</p>
<p><span class="subtitle">How do I change the background images?</span><br>
  The background images in FlashChat can be changed very easily in the PHP configuration 
  file which comes with the software. Users can change the transparency of the 
  images, and toggle the images on/off. However, you must have access to the chat 
  installation to change the image completely. When changing images, it is recommended 
  that you use a low-resolution JPG file, preferably 1024 x 758 pixels, under 
  50KB. For the best results, use an advanced image editor like Macromedia Fireworks 
  or Adobe Photoshop. Also, you should NOT save the file as a &quot;progressive 
  JPG&quot;, or it will not work. After you change the background image for any 
  theme, be sure to clear your browser cache before reloading the chat to see 
  the changed background.</p>
<p><span class="subtitle">How do I disable various buttons or options in FlashChat?</span><br>
  This can be done very easily in the PHP configuration file which comes with 
  FlashChat by editing the appropriate file in /inc/layouts. The default layout 
  for a standard chat installation is called &quot;user.php&quot;. The &quot;customer.php&quot; 
  layout is used on in Live Support mode. There are over 100 different options 
  available to the chat administrator to help customize the look and feel of the 
  software, including customizations for sound, color, layout, language, CMS parameters, 
  login modes, and more!</p>
<p><span class="subtitle">How do I send a private message?</span><br>
  There are two ways to send a private message in FlashChat. You can either find 
  the user's name in the room manager and click on the name, or you can type &quot;/username:&quot; 
  in the chat input box, followed by your message. The recipient will be alerted 
  of the private message, regardless of the room that they are in. If you send 
  a private message by clicking on a user's name in the room list, then a small 
  private message window will be opened, which you can keep open indefinitely. 
  This is useful is you want to send multiple private messages to one person, 
  or if you want to engage in several private chats simultaneously.</p>

<p><span class="subtitle">How do I login as a moderator or as a &quot;spy&quot;?</span><br>
  You must possess the moderator or spy password to do this. These passwords are 
  set internally by the chat administrator, and provide special &quot;powers&quot; 
  that are not available to normal users. For example, a moderator is able to 
  boot users from rooms, and ban users from the chat completely. Spies are able 
  to eavesdrop on any ongoing chat without being observed.</p>
<p><span class="subtitle">How do I insert text in bold or italic print?</span><br>
  In version 3.8 this is not possible. The reason is that FlashChat uses a pixel 
  font which does not support bold or italic symbols. However, to emphasize text 
  you can underline it using &lt;u&gt;...&lt;/u&gt;, for example &lt;u&gt;This 
  is underlined&lt;/u&gt;, or you can use a different font color for your text. 
  Support for bold and italic text will likely be available in a later version 
  of FlashChat.</p>
<p><span class="subtitle">How do I use smilies?</span><br>
  You may send a smilie in one of two ways: select the smilie from the list of 
  available smilies, or type the smilie code into the chat input area. For example, 
  :red: is the code to display the blushing-face smilie. The chat administrator 
  can enable or disable any smilie.</p>
<p><span class="subtitle">What is the sound &quot;Pan&quot; feature?</span><br>
  This option allows you to set the amount of sound coming from the right and 
  left speakers on your computer system.</p>
<p><span class="subtitle">How do I configure FlashChat for use in a family-friendly 
  environment?</span><br>
  First of all, you should probably disable the 'f**k' smilie in the PHP configuration 
  file which comes with FlashChat. Then, you can add any &quot;bad words&quot; 
  that you want to have omitted from the chat using the &quot;dirtywords&quot; 
  text field. 1 word = 1 line of the file. These words will automatically be replaced 
  by !@#$%&amp;* (or other symbol specified by the chat administrator) during 
  normal chat operation.</p>
<p><span class="subtitle">How do I logout of the chat?</span><br>
  The best way to logout is to click on the &quot;X&quot; in the upper right corner 
  of the screen. However, if you simply close your web browser, then you will 
  also be logged out after a period of time. The system will &quot;time-out&quot; 
  after some interval, which is specified in the PHP configuration file. Thus, 
  users who close their web browsers to logout will still be visible to logged-in 
  users for a short period of time. However, clicking on &quot;X&quot; immediately 
  logs you out of the system.</p>
<p><span class="subtitle">Can the logout &quot;X&quot; icon be disabled?</span><br>
  Yes, it can be easily disabled by editing the &quot;user.php&quot; file in the 
  /inc/layouts folder, which comes with your FlashChat distribution.</p>
<p><span class="subtitle">How do I force FlashChat to authenticate every user 
  with a valid username &amp; password?</span><br>
  To do this, open the &quot;common.php&quot; file which comes with the FlashChat 
  distribution, then uncomment this line:</p>
<p>require_once(INC_DIR . 'cmses/defaultCMS.php');</p>
<p>and comment (put &quot;//&quot; before) all of the CMS-related lines below 
  it (those lines with &quot;cmses/&quot; in them). Then, open the langs/en.php 
  file set to &quot;&quot; the line with &quot;(if moderator)&quot; in it:</p>
<p>'moderator' =&gt; &quot;&quot;,</p>
<p>Finally, refresh your web browser to restart the chat. Now, instead of allowing 
  anyone to enter the chat, the system will check the user ID and password against 
  the FlashChat users table in mysql. If the user is not present, then the user 
  will not be allowed to login. In addition, moderators must be defined as having 
  the &quot;admin&quot; role assigned to them in the users table in mysql. FlashChat 
  - when used in a &quot;stateless&quot; CMS mode - makes a user a moderator if 
  the admin password defined in config.php is used. When using FlashChat in the 
  &quot;DefaultCMS&quot; mode, users are logged in as moderators only if the admin 
  role is assigned to them in the users table. Please note that the terms &quot;moderator&quot; 
  and &quot;administrator&quot; are used interchangeably.</p>
<p>You can think of these two methods of user authentication like this:<br>
  Stateless CMS: every user is allowed in, moderators are determined by a special 
  password<br>
  Default CMS: users are only allowed in if the user ID + password combination 
  match an entry in the FlashChat users table. Moderators are determined by the 
  &quot;role&quot; assigned to them in the users table. You should use this method 
  if you want a stricter authentication protocol for FlashChat.</p>
<p><span class="subtitle">How does &quot;Live Support&quot; mode work for FlashChat?</span><br>
  The idea behind Live Support mode is to give companies a simple way to implement 
  a live support feature on their websites. For example, instead of calling your 
  company to ask questions, they can simply chat with you online. This is advantageous 
  because it allows customer service reps to help many users at once, 24 hours 
  a day. Besides, it's much cheaper than maintaining multiple toll-free numbers 
  for your customers, and it enables you to provide assistance easily to customers 
  all around the world. In short, Live Support can be a true windfall for your 
  business if used well. To enable Live Support, simply set the appropriate option 
  in the PHP configuration file which comes with FlashChat (config.php). When 
  users login to Live Support, they are able to &quot;ring the bell&quot; to get 
  assistance.</p>
<p>When a customer enters the chat to request &quot;Live Support&quot;, they are 
  automatically placed into a private room, created automatically by FlashChat. 
  These rooms are auto-named with the customer's login name, so you can quickly 
  identify who is in which room. The customer support person is able to access 
  all of these rooms, and thus help any customer in any order. In addition, it 
  is possible for multiple support persons to be present, in case there is a high 
  volume of support requests. Support persons should login as moderators to the 
  chat.</p>
<p>Customers are only able to chat with moderators, not with other customers. 
  Thus, Live Support mode enforces a one-on-one private chat between the moderator 
  and the customer. Moderators still have full chat capabilities, however, so 
  they can chat with one another and send private messages, etc. For example, 
  one moderator could send a private to another moderator like &quot;Hey Joe - 
  can you help the customer in Room X? I'm busy helping someone right now...&quot;.</p>
<p><span class="subtitle">How can I remove the (c) tufat.com notice in the lower-right 
  corner of the screen?</span><br>
  You can't and shouldn't. Doing so would violate the FlashChat license agreement. 
  The copyright notice has been deliberately made small and inconspicuous so that 
  it doesn't interfere with the chat environment, but you should not attempt to 
  remove it. Also, you should not make any attempt to decompile the SWF file - 
  doing so would be a violation of the license agreement.</p>
<p><span class="subtitle">Am I allowed to change the contents of this Help file?</span><br>
  Yes, definitely. I fully expect that before implementing FlashChat on your website, 
  you will want to remove some parts of this help file, and perhaps add some other 
  notes which may be specific to your system. You can change any part of FlashChat 
  that you see fit, except for the main SWF (since that would require decompiling 
  the SWF, which would be a violation of the license). You may change ANY PHP 
  file which comes with FlashChat to your liking.</p>
<p><span class="subtitle">Why did you put all of this information in the help.php 
  file instead of the readme file or on your website?</span><br>
  I'm hoping to answer some pre-sale questions in advance, and since you're reading 
  the help file anyway, I may as well stock it full of information! At one point, 
  I had most of this information in a readme.txt file, but it seems like no one 
  reads 'readme' files these days. The readme file which comes with the FlashChat 
  distribution contains mainly just installation and license information.</p>
<p class="title">About FlashChat</p>
<p><span class="subtitle">How can I get this software for my own website?</span><br>
  Simple: visit <a href="http://www.tufat.com" target="_blank">http://www.tufat.com</a>, click 
  on the FlashChat link, and then complete the purchasing instructions. PayPal 
  is the preferred payment method, although other payment methods will be implemented 
  soon. All of the programs on TUFaT.com cost $5 at the time of writing this document, 
  although prices and terms are subject to change without notice.</p>
<p><span class="subtitle">What do I get for $5?</span><br>
  All of the PHP and MySQL code is included in the FlashChat distribution, as 
  well as the Flash MX SWF file, but not the Flash MX FLA file. The reason for 
  this is that TUFaT.com has - unfortunately - been the subject of several scams 
  in the past year, and I felt that it was necessary to take measures against 
  this. For about 99% of users, this will not matter, since most people do not 
  know how to directly edit Flash Actionscript. If you need a new feature for 
  FlashChat, please suggest the feature on the wish list at <a href="http://www.tufat.com" target="_blank">http://www.tufat.com</a>, 
  and it is *very* likely that it will be implemented in the next release of the 
  software.</p>
<p>Steps have been taken to put a large variety of configuration options in external 
  PHP files, which the FlashChat administrator can easily edit. This allows you 
  to configure FlashChat in any of a variety of ways, and customize the interface 
  so that it integrates well with your website's design and needs.</p>
<p><span class="subtitle">I want a new feature... what can I do?</span><br>
  You should post your feature request on the <a href="http://www.tufat.com/phpBB2/" target="_blank">TUFaT.com 
  Support Forum</a>. If your suggestion would be useful to many users, then it 
  is very likely that it will be implemented in a later release. You can also 
  email it to <a href="mailto:g8z@yahoo.com">g8z@yahoo.com</a>, but I cannot guarantee 
  a prompt response.</p>
<p><span class="subtitle">Why $5?</span><br>
  $5 was chosen because I want all users - individuals, students, non-profits, 
  and businesses alike - to be able to afford these scripts, including users in 
  the developing world, where $5 may represent a substantial amount of money. 
  Also, my experience with Internet commerce is that charging too much promotes 
  piracy, and there are so many freebie scripts on the web that people are accustomed 
  to paying nothing or next-to-nothing for software. $5 is, in my option, next-to-nothing.</p>
<p><span class="subtitle">What client and server components are needed?</span><br>
  To use FlashChat, you must have a server running PHP 4.1.2+ and MySQL 3.23+. 
  Also, you must have sufficient permissions to create and edit tables in MySQL. 
  You do not need to have a MySQL editing tool like phpMyAdmin, since FlashChat 
  comes with an installation file to create the necessary MySQL table structures 
  for you. However, it can help to have such a tool just to verify that the installation 
  was successful. For the client-side, you must have at least version 6 of the 
  Flash player (as of FlashChat 4.0, you will need the Flash 7 player). Over 95% 
  of the computers in the world are Flash-enabled, so this is usually not a problem.</p>
<p><span class="subtitle">Why don't you support Asian languages?</span><br>
  Asian language support is currently being planned for FlashChat 4.0, which should 
  be released sometime in mid-2004. The reason that is was not originally included 
  is that there is a very larger number of glyphs in the character sets of some 
  Asian languages, which would increase the loading time for the chat substantially. 
  Support of Chinese, Japanese, Hindi, and other languages is a very high priority 
  for FlashChat.</p>
<p><span class="subtitle">FlashChat doesn't support my CMS - what can I do?</span><br>
  Many of the most popular PHP-based CMS systems are supported by FlashChat. If 
  you own a CMS that is not supported by FlashChat, please post a message on the 
  <a href="http://www.tufat.com/phpBB2/" target="_blank">TUFaT.com Support Forum</a> 
  or submit a feature request, and the CMS will likely be supported in a future 
  release. Typically, CMS systems have a way to add &quot;modules&quot; like FlashChat. 
  If your CMS is uncommon, then please also provide module creation documentation, 
  and the CMS files, if possible.</p>
<p><span class="subtitle">Who wrote FlashChat?</span><br>
  Lots of people! Over the past 3 years, probably 20-30 coders have contributed 
  in various ways to the development of FlashChat. This development assistance 
  comes in the form of Flash coding, language assistance, suggestions for CMS 
  integration, design suggestions, testing, and of course direct monetary support. 
  The original version of the software was written by Darren Gates way back in 
  1999. It was one of the original - and maybe THE original - Flash-based chat 
  rooms in existence. The current version is largely the combined effort of Darren 
  Gates and Andrew Danylchenko.</p>
<p><span class="subtitle">Who owns the rights to FlashChat?</span><br>
  All copyrights, re-sale, and distribution rights are exclusively owned by Darren 
  Gates. To re-sell or re-distribute FlashChat in any form, you MUST have the 
  written permission of Darren Gates. If these rights are granted to you, the 
  (c) tufat.com notice in the lower right corner of the FlashChat screen (the 
  SWF file), must remain intact. I have deliberately made the link very small 
  and inconspicuous so that it does not annoy users. You do NOT have to keep the 
  copyright information in this help file, or in the index.php file, or in any 
  other PHP files that are included with the FlashChat distribution. Thus, copyright 
  information in PHP files can be deleted, but the (c) tufat.com link in the main 
  FlashChat SWF interface should not be removed or obscured. Any attempt at decompilation 
  of the SWF for *any* reason would be a violation of the FlashChat license.</p>
<p><span class="subtitle">How do I integrate FlashChat with my current PHP/MySQL 
  website?</span><br>
  You should have some knowledge of PHP/MySQL to do this. Essentially, you can 
  change the Default CMS parameters to draw user information from the MySQL table 
  of your choice.</p>
<p><span class="subtitle">Can I get a refund for FlashChat?</span><br>
  There are no refunds under any circumstances. Of course, there are some servers 
  on which FlashChat might not work, or not work as well as it does on TUFaT.com. 
  There are infinitely many server configurations, and it is impossible to test 
  FlashChat on all of them. However, there are many server configurations and 
  web hosts on which FlashChat works quite well. Thus, you can always choose another 
  server on which to run FlashChat. Also, you can test FlashChat using the demo 
  on TUFaT.com to make sure that you like it before purchase.</p>
<p><span class="subtitle">Your smilie component looks suspiciously like the Jolan 
  component!</span><br>
  Yes, that's true. There is a simple reason for this: the Jolan component was 
  used as the model for the FlashChat smilie component. However, the actual engine 
  for the FlashChat textfield is substantially different from the Jolan component 
  - only the smilie graphics are similar. In addition, the license for the Jolan 
  component clearly states that the component can be used as a &quot;small part&quot; 
  of a larger application (including commercial applications), which it is in 
  the case of FlashChat. Thus, in my opinion FlashChat is using the Jolan textfield 
  component in a manner that is consistent with the license.</p>
<p>Thanks for your interest in FlashChat. If you need any information that is 
  not answered here, please post a message on the <a href="http://www.tufat.com/phpBB2/" target="_blank">TUFaT.com 
  Support Forum</a>.</p>
<p>Kind regards,<br>
  Darren</p>
</body>
</help>