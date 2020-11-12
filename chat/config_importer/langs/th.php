<?php
	$GLOBALS['fc_config']['languages']['th'] = array(
		'name' => "ไทย",

		'messages' => array(
			'ignored' => "'USER_LABEL' ไม่ตอบรับข้อความข้อคุณ",
			'banned' => "คุณไม่ได้รับอนุญาต",
			'login' => 'โปรดเข้าสู่ระบบสนทนา',
			'wrongPass' => 'ชื่อผู้ใช้อและรหัสผ่านผิด, โปรดใส่ใหม่อีกครั้ง.',
			'anotherlogin' => 'ชื่อผู้ใช้นี้ได้ถูกเข้าสู่ระบบแล้ว. โปรดใส่ชื่อผู้ใช้ใหม่อีกครั้ง.',
			'expiredlogin' => 'การติดต่อของคุณได้สิ้นสุด. โปรดเข้าสู่ระบบอีกครั้ง.',
			'enterroom' => '[ROOM_LABEL]: USER_LABEL ได้เข้าสู่ TIMESTAMP',
			'leaveroom' => '[ROOM_LABEL]: USER_LABEL ได้ออกจาก  TIMESTAMP',
			'selfenterroom' => 'ยินดีต้องรับ! คุณได้เข้าสู่ [ROOM_LABEL] TIMESTAMP',
			'bellrang' => 'USER_LABEL สั่นกระดิ่ง',
			'chatfull' => 'การสนทนาเต็มแล้ว โปรดลองใหม่อีกครั้ง',
			'iplimit' => 'คุณอยู่ในการสนทนา'
		),

		'usermenu' => array(
			'profile' => 'ประวัติย่อ',
			'unban' => 'ได้รับอนุญาต',
			'ban' => 'ห้าม',
			'unignore' => 'ตอบรับ',
			'fileshare' => 'แบ่งแฟ้ม',
			'ignore' => 'ไม่ตอบรับ',
			'invite' => 'เชิญชวน',
			'privatemessage' => 'ข้อความส่วนตัว'
		),

		'status' => array(
			'here' => 'ที่นี่่',
			'busy' => 'ไม่ว่าง',
			'away' => 'ไม่อยู่',
			'brb'  => 'BRB'	
		),

		'dialog' => array(
			'misc' => array(
				'roomnotfound' => "ห้อง 'ROOM_LABEL' ไม่พบ",
				'usernotfound' => "ผู้ใช้ 'USER_LABEL' ไม่พบ",
				'unbanned' => "คุณได้รับอนุญาตโดยผู้ใช้'USER_LABEL'",
				'banned' => "คุณไม่ได้รับอนุญาตโดยผู้ใช้'USER_LABEL'",
				'unignored' => "คุณได้รับการตอบรับโดยผู้ใช้'USER_LABEL'",
				'ignored' => "คุณไม่ไดรับการตอบรับโดยผู้ใช้'USER_LABEL'",
				'invitationdeclined' => "ผู้ใช้ 'USER_LABEL' ปฎิเสธการเชิญชวนของคุณสู่ห้อง'ROOM_LABEL'",
				'invitationaccepted' => "ผู้ใช้ 'USER_LABEL'ตอบรับการเชิญชวนของคุณสู่ห้อง'ROOM_LABEL'",
				'roomnotcreated' => 'ห้องยังไม่ได้ถูกสร้าง',
				'roomisfull' => '[ROOM_LABEL] เต็ม โปรดเลือกห้องใหม่',
				'alert' => '<b>คำเตือน</b><br><br>',
				'chatalert' => '<b>คำเตือน</b><br><br>',
				'gag' => "<b>คุณไม่สามารถสนทนาได้DURATION นาที</b><br><br>คุณสามารถมองเห็นข้อความจากภาพ แต่คุณไม่สามารถเขียนใสข้อความใหม่ในการสนทนาจนกว่าจะถึงเวลาที่ตั้งไว้",
				'ungagged' => "คุณสามารถสนทนาได้โดยผู้ใช้'USER_LABEL'",
				'gagconfirm' => 'USER_LABEL คือความไม่สามารถสนทนาสำหรับ MINUTES นาที',
				'alertconfirm' => 'USER_LABEL ได้อ่านคำเตือนแล้ว',
				'file-declined' => 'แฟ้มของคุณถูกปฏิเสธโดย USER_LABEL',
				'file-accepted' => 'แฟ้มของคุณถูกยอมรับโดย USER_LABEL'
			),

			'unignore' => array(
				'unignoreBtn' => 'ไม่ตอบรับ',
				'unignoretext' => 'เข้าสู่การตอบรับข้อความ'
			),

			'unban' => array(
				'unbanBtn' => 'ได้รับอนุญาต',
				'unbantext' => 'เข้าสู่ข้อความที่ไม่ถูกห้าม'
			),

			'tablabels' => array(
				'themes' => 'หัวข้อ',
				'sounds' => 'เสียง',
				'text'  => 'ข้อความ',
				'effects'  => 'ผลกระทบ',				
				'admin'  => 'ผู้บริหาร',
				'about' => 'เกี่ยวกับ'
			),

			'text' => array(
				'itemChange' => 'เรื่องที่เปลี่ยน',
				'fontSize' => 'ขนาดตัวอักษร',
				'fontFamily' => 'ตระกูลตัวอักษร',
				'language' => 'ภาษา',
				'mainChat' => 'สนทนาหลัก',
				'interfaceElements' => 'ปัจจัยสำคัญอินเตอร์เฟส',
				'title' => 'หัวเรื่อง',
                'mytextcolor'=>'ใช้ข้อความสีของเราสำหรับข้อความที่ได้รับ'
			),

            'effects' => array(
				'avatars' => 'ชื่อสมมุติ',
				'mainchat' => 'สนทนาหลัก',
				'roomlist' => 'รายการห้อง',
				'background' => 'พื้นหลัง',
				'custom' => 'เปลี่ยน',
				'showBackgroundImages' => 'โชว์พื้นหลัง',
				'splashWindow' => 'โฟกัสวินโดบนข้อความของคุณ',
				'uiAlpha' => 'ความโปร่งใส'
			),

			'sound' => array(
				'sampleBtn' => 'ตัวอย่าง',
				'testBtn' => 'ทดสอบ',
				'muteall' => 'เงียบทั้งหมด',
				'submitmessage' => 'ส่งข้อความ',
				'reveivemessage' => 'รับข้อความ',
				'enterroom' => 'เข้าห้อง',
				'leaveroom' => 'ออกจากห้อง',
				'pan' => 'กะทะ',
				'volume' => 'ระดับเสียง',
				'initiallogin' => 'เข้าสู่ระบบชื่อแรก',
				'logout' => 'ออกจากระบบ',
				'privatemessagereceived' => 'รับข้อความส่วนตัว',
				'invitationreceived' => 'รับการเชิญชวน',
				'combolistopenclose' => 'เปิด/ปิด รายการคอมโบบ็อกซ์',
				'userbannedbooted' => 'ผุ้ใช้ถูกห้าม',
				'usermenumouseover' => 'เมนุผ้ใช้เมาส์',
				'roomopenclose' => 'เปิด/ปิด ส่วนของห้อง',
				'popupwindowopen' => 'เปิดหน้าต่างป็อปอัพ',
				'popupwindowclosemin' => 'ปิดหน้าต่างป็อปอัพ',
				'pressbutton' => 'ปุ่มกด',
				'otheruserenters' => 'ผู้ใช้อี่นเข้าสู่ห้อง'
			),

			'skin' => array(
				'inputBoxBackground' => 'พื้นหลังกล่องนำเข้า',
				'privateLogBackground' => 'พื้นหลังส่วสนตัว',
				'publicLogBackground' => 'พท้นหลังส่วนตัว',
				'enterRoomNotify' => 'เข้าห้องการแจ้งความ',
				'roomText' => 'ข้อความห้อง',
				'room' => 'พื้นหลังห้อง',
				'userListBackground' => 'พื้นหลังรายการผู้ใช้',
				'dialogTitle' => 'ชื่อเรื่องการสนทนา',
				'dialog' => 'พื้นหลังการสนทนา',
				'buttonText' => 'ข้อความปุ่ม',
				'button' => 'พื้นหลังปุ่ม',
				'bodyText' => 'ข้อความเนื้อหา',
				'background' => 'พื้นหลังหลัก',
				'borderColor' => 'ขอบสี',
				'selectskin' => 'เลือกแบบแผนสี...',
				'buttonBorder' => 'ปุ่มขอบสี',
				'selectBigSkin' => 'เลือกพื้น...',
				'titleText' => 'ชื่อเรื่องข้อความ'
			),

			'privateBox' => array(
				'sendBtn' => 'ส่ง',
				'toUser' => 'กำลังคุยกับ USER_LABEL:'
			),

			'login' => array(
				'loginBtn' => 'เข้าส่ระบบ',
				'language' => 'ภาษา:',
				'moderator' => '(พิธีกร)',
				'password' => 'รหัสผ่าน:',
				'username' => 'ชื่อผู้ใช้:'
			),

			'invitenotify' => array(
				'declineBtn' => 'ปฏิเสธ',
				'acceptBtn' => 'ตอบรับ',
				'userinvited' => "'USER_LABEL' ได้เชิญคุณสนทนาใน 'ROOM_LABEL'"
			),

			'invite' => array(
				'sendBtn' => 'ส่ง',
				'includemessage' => 'เพิ่มข้อความนี้กับการเชิญชวนของคุณ:',
				'inviteto' => 'เชิญผู้ใช้สู่:'
			),

			'ignore' => array(
				'ignoreBtn' => 'ระงับ',
				'ignoretext' => 'เข้าสู่ระงับข้อความ'
			),

			'createroom' => array(
				'createBtn' => 'สร้าง',
				'private' => 'ส่วนตัว',
				'public' => 'ส่วนรวม',
				'entername' => 'เข้าสู่ห้องชื่อ'
			),

			'ban' => array(
				'banBtn' => 'ไม่อนุญาต',
				'byIP' => 'โดยอินเตอร์เน็ตแอดเดรส',
				'fromChat' => 'จากสนทนา',
				'fromRoom' => 'จากห้อง',
				'banText' => 'เข้าสู่ห้ามข้อความ'
			),

			'common' => array(
				'cancelBtn' => 'ปฏิเสธ',
				'okBtn' => 'ตกลง',				
				'win_choose'         => 'เลือกแฟ้มที่อัพโหลด:',
				'win_upl_btn'        => '  อัพโหลด  ',
				'upl_error'          => 'แฟ้มกำลังอัพโหลดผิดพลาด',
				'pls_select_file'    => 'โปรดเลือกแฟ้มที่อัพโหลด',
				'ext_not_allowed'    => 'FILE_EXT ชนิดของแฟ้มไม่อนุญาต โปรดเลือกหนึ่งในแฟ้มเหล่านี้: ALLOWED_EXT',
				'size_too_big'       => 'แฟ้มที่คุณพยายามแบ่งใหญ่เกินกว่าขนาดที่ทำได้โปรดลองใหม่'
			),
			
			'sharefile' => array(
				'chat_users'=> '[ แบ่งการสนทนา ]',
				'all_users' => '[ แบ่งห้อง ]',
				'file_info_size'  => '<br>เกินขนาดทีของแฟ้มนี้ที่อนุญาตให้ทำ MAX_SIZE.',
				'file_info_ext' => 'ถูกอนุญาตชนิดของแฟ้ม: ALLOWED_EXT',
				'win_share_only'=>'แบ่งโดย',				
				'usr_message' => '<b>USER_LABEL ต้องการแบ่งแฟ้มกับคุณ</b><br><br>ชื่อแฟ้ม: F_NAME<br>ขนาดแฟ้ม: F_SIZE'
			),
			
			'loadavatarbg' => array(
				'win_title'  => 'เปลี่ยนพื้นหลัง',
				'file_info'  => 'แฟ้มของคุณควรเป็น ภาพ JPG, หรือ Flash SWF.',
				'use_label'  => 'ใช้แฟ้มนี้สำหรับ:',
				'rb_mainchat_avatar' => 'สนทนาหลักใช้ชื่อสมมุติเท่านั้น',
				'rb_roomlist_avatar' => 'รายชื่อชื่อสมมุติ',
				'rb_mc_rl_avatar'    => 'ได้ทั้งสนทนาหลักและรายชื่อสมมุต',
				'rb_this_theme'      => 'พื้นหลังสำหรับหัวข้อเท่านั้น',
				'rb_all_themes'      => 'พื้นหลังสำหรับทุกหัวข้อ'
			),		
			
							
		),

		'desktop' => array(
			'invalidsettings' => 'ลักษณะที่มองเห็นซึ่งไม่สมบูรณ์, เป็นโมฆะ',
			'selectsmile' => 'รอยยิ้ม',
			'sendBtn' => 'ส่ง',
			'saveBtn' => 'บันทึก',
			'clearBtn' => 'เสียง',
			'skinBtn' => 'ทางเลือก',
			'addRoomBtn' => 'เพิ่ม',
			'myStatus' => 'สถานะของฉัน',
			'room' => 'ห้อง',
			'welcome' => 'ยินดีต้อนรับ USER_LABEL',
			'ringTheBell' => 'ไม่มีผู้ตอบรับ? สั่นกระดิ่ง:',
			'logOffBtn' => 'ปิดระบบ',
			'helpBtn' => 'ช่วยเหลือ',
			'adminSign' => '(แอดมิน)'
		)
	);
?>