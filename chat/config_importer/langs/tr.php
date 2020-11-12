<?php
	$GLOBALS['fc_config']['languages']['tr'] = array(
		'name' => "Türkçe",

		'messages' => array(
			'ignored' => "Kullanıcı 'USER_LABEL' mesajlarınızı red ediyor",
			'banned' => "Yasaklandınız",
			'login' => 'Sohbete girmek için lütfen giriş yapınız',
			'wrongPass' => 'Yanlış kullanıcı ismi veya şifresi. Lütfen tekrar deneyin',
			'anotherlogin' => 'Bu kullanıcı ismi ile başka kullanıcı girmiş. Lütfen tekrar deneyin.',
			'expiredlogin' => 'Bağlantınız zaman aşımına uğradı. Lütfen yeniden giriş yapın.',
			'enterroom' => "[ROOM_LABEL]: USER_LABEL odaya saat TIMESTAMP da girdi",
			'leaveroom' => "[ROOM_LABEL]: USER_LABEL, odadan saat TIMESTAMP da çıktı",
			'selfenterroom' => "Hoşgeldiniz! [ROOM_LABEL] odasına TIMESTAMP da giriş yaptınız",
			'bellrang' => 'USER_LABEL kullanıcısı zil çaldı',
			'chatfull' => 'Sohbet dolu. Lütfen daha sonra tekrar deneyiniz.',
			'iplimit' => 'Zaten sohbettesiniz.'
		),

		'usermenu' => array(
			'profile' => "Profil",
			'unban' => "Yasak iptali",
			'ban' => "Yasaklı",
			'unignore' => "Red iptali",
			'fileshare' => 'Dosya Paylaş',
			'ignore' => "Red",
			'invite' => "Davet",
			'privatemessage' => "Özel mesaj",
		),

		'status' => array(
			'away' => "Uzakta",
			'busy' => "Meşgul",
			'here' => "Burada",
			'brb'  => 'Hemen Gelecek',
		),

		'dialog' => array(
			'misc' => array(
				'roomnotfound' => "'ROOM_LABEL' odası bulunamadı",
				'usernotfound' => "Kullanıcı 'USER_LABEL' bulunamadı",
				'unbanned' => "Kullanıcı 'USER_LABEL' tarafından yasağınız kaldırıldı",
				'banned' => "Kullanıcı 'USER_LABEL' tarafından yasaklandınız",
				'unignored' => "Kullanıcı 'USER_LABEL' tarafından red listesinden çıkartıldınız",
				'ignored' => "Kullanıcı 'USER_LABEL' tarafından red edildiniz",
				'invitationdeclined' => "Kullanıcı 'USER_LABEL','ROOM_LABEL' odasına davetinizi kabul etmedi",
				'invitationaccepted' => "Kullanıcı 'USER_LABEL','ROOM_LABEL' odasına davetinizi kabul etti",
				'roomnotcreated' => "Oda yaratılmadı",
				'roomisfull' => '[ROOM_LABEL] odası dolu. Lütfen başka bir oda seçiniz.',
				'alert' => '<b>UYARI!</b><br><br>',
				'chatalert' => '<b>UYARI!</b><br><br>',
				'gag' => "<b>DURATION dakika boyunca susturuldunuz!</b><br><br>Bu odadaki mesajları görebilirsiniz, ancak susturulma ".
						 "süreniz sona erene kadar yeni mesaj gönderemezsiniz.",
				'ungagged' => "'USER_LABEL' tarafından susturulma cezanız iptal edildi.",		 
				'gagconfirm' => 'USER_LABEL MINUTES dakika için susturuldu.',
				'alertconfirm' => 'USER_LABEL uyarıyı okudu.',
				'file_declined' => 'Dosyanız USER_LABEL tarafından reddedildi.',
				'file_accepted' => 'Dosyanız USER_LABEL tarafından kabul edildi.',
			),

			'unignore' => array(
				'unignoreBtn' => "Red iptal",
				'unignoretext' => "Red iptal metnini giriniz",
			),

			'unban' => array(
				'unbanBtn' => "Yasak iptal",
				'unbantext' => "Yasak iptal metnini giriniz",
			),

			'tablabels' => array(
				'themes' => "Temalar",
				'sounds' => "Sesler",
				'text'  => "Metin",
				'effects'  => 'Efektler',
				'admin'  => "Yönetici",
				'about' => 'Hakkında',
			),

			'text' => array(
				'itemChange' => "Değiştirilecek madde",
				'fontSize' => "Yazı karakter büyüklüğü",
				'fontFamily' => "Yazı tipi",
				'language' => "Dil",
				'mainChat' => "Ana Sohbet",
				'interfaceElements' => "Arabirim Elemanları",
				'title' => "Başlık",
				'mytextcolor' => 'Alınan mesajların hepsi için benim metin rengimi kullan.',
			),

			'effects' => array(
				'avatars' => 'Avatarlar',
				'mainchat' => 'Ana sohbet',
				'roomlist' => 'Oda listesi',
				'background' => 'Arka plan',
				'custom' => 'Diğer',
				'showBackgroundImages' => 'Arka planı görüntüle',
				'splashWindow' => 'Yeni mesaj geldiğinde pencereyi göster',
				'uiAlpha' => 'Şeffaflık',
			),

			'sound' => array(
				'sampleBtn' => "Örnek",
				'testBtn' => "Test",
				'muteall' => "Sessiz",
				'submitmessage' => "Mesaj yolla",
				'reveivemessage' => "Mesaj al",
				'enterroom' => "Odaya gir",
				'leaveroom' => "Odadan çık",
				'pan' => "Denge",
				'volume' => "Ses",
				'initiallogin' => "İlk giriş",
				'logout' => "Çıkış",
				'privatemessagereceived' => "Özel mesaj al",
				'invitationreceived' => "Davet al",
				'combolistopenclose' => "Seçenek listesini aç/kapa",
				'userbannedbooted' => "Kullanıcı yasaklandı veya çıkartıldı",
				'usermenumouseover' => "Fare kullanıcı menüsü üzerinde",
				'roomopenclose' => "Oda bölümünü aç/kapa",
				'popupwindowopen' => "Yeni pencere açılışı",
				'popupwindowclosemin' => "Yeni pencere kapanışı",
				'pressbutton' => "Buton basılması",
				'otheruserenters' => "Diğer kullanıcı odaya girdi",
			),

			'skin' => array(
				'inputBoxBackground' => "Giriş kutusu arkaplan",
				'privateLogBackground' => "Özel log arkaplan",
				'publicLogBackground' => "Genel log arkaplan",
				'enterRoomNotify' => "Odaya giriş uyarısını girin",
				'roomText' => "Oda metni",
				'room' => "Oda arkaplan",
				'userListBackground' => "Kullanıcı listesi arkaplan",
				'dialogTitle' => "Diyalog başlığı",
				'dialog' => "Diyalog arkaplan",
				'buttonText' => "Buton yazısı",
				'button' => "Buton arkaplan",
				'bodyText' => "Gövde metni",
				'background' => "Ana arkaplan",
				'borderColor' => "Buton rengi",
				'selectskin' => "Renk tasarımını seçin...",
				'buttonBorder' => "Buton sınır rengi",
				'selectBigSkin' => "Görüntü türü şeçin...",
				'titleText' => "Başlık metni",
			),

			'privateBox' => array(
				'sendBtn' => "Gönder",
				'toUser' => "USER_LABEL ile konuşuluyor:",
			),

			'login' => array(
				'loginBtn' => "Giriş",
				'language' => "Dil:",
				'moderator' => "(moderator ise)",
				'password' => "Şifre:",
				'username' => "Kullanıcı ismi:",
			),

			'invitenotify' => array(
				'declineBtn' => "Reddet",
				'acceptBtn' => "Kabul et",
				'userinvited' => "Kullanıcı 'USER_LABEL', sizi 'ROOM_LABEL' odasına davet etti",
			),

			'invite' => array(
				'sendBtn' => "Gönder",
				'includemessage' => "Bu mesajı davetinize ekleyin:",
				'inviteto' => "Kullanıcıyı davet ettiğiniz oda:",
			),

			'ignore' => array(
				'ignoreBtn' => "Red",
				'ignoretext' => "Red metnini giriniz",
			),

			'createroom' => array(
				'createBtn' => "Yarat",
				'private' => "Özel",
				'public' => "Genel",
				'entername' => "Oda ismini girin",
			),

			'ban' => array(
				'banBtn' => "Yasakla",
				'byIP' => "IP ile",
				'fromChat' => "sohbetten",
				'fromRoom' => "odadan",
				'banText' => "Yasaklama metnini giriniz",
			),

			'common' => array(
				'cancelBtn' => "İptal",
				'okBtn' => "Tamam",
				
				'win_choose'         => 'Gönderilecek dosyayı seçiniz:',
				'win_upl_btn'        => '  Gönder  ',
				'upl_error'          => 'Dosya gönderme hatası',
				'pls_select_file'    => 'Lütfen gönderilecek dosyayı seçiniz',
				'ext_not_allowed'    => 'FILE_EXT uzantılı dosyalara izin verilmemektedir. Lütfen bu uzantılardan birine sahip bir dosya seçiniz: ALLOWED_EXT',
				'size_too_big'       => 'Paylaşmak istediğiniz dosyanın boyutu izin verilen azami dosya boyutundan büyüktür. Lütfen tekrar deneyiniz.',
			),

			'sharefile' => array(
				'chat_users'=> '[ Sohbet ile Paylaş ]',
				'all_users' => '[ Oda ile Paylaş ]',
				'file_info_size'  => '<br>Bu dosya için izin verilen azami boyut MAX_SIZE.',
				'file_info_ext' => ' İzin Verilen Dosya Türleri: ALLOWED_EXT',
				'win_share_only'=>'ile Paylaş',				
				'usr_message' => '<b>USER_LABEL sizinle bir dosya paylaşmak istiyor</b><br><br>Dosya adı: F_NAME<br>Dosya boyutu: F_SIZE',				
			),

			'loadavatarbg' => array(
				'win_title'  => 'Özel Arka plan',
				'file_info'  => 'Dosyanız progresif olmayan bir JPG resmi veya bir Flash SWF dosyası olmalıdır.',
				'use_label'  => 'Bu dosyayı şunun için kullan:',
				'rb_mainchat_avatar' => 'Sadece ana sohbet avatarı',
				'rb_roomlist_avatar' => 'Sadece oda listesi avatarı',
				'rb_mc_rl_avatar'    => 'Hem ana sohbet hem de oda listesi avatarı',
				'rb_this_theme'      => 'Sadece bu tema için arka plan',
				'rb_all_themes'      => 'Tüm temalar için arka plan',
			),


		),

		'desktop' => array(
			'invalidsettings' => "Geçersiz ayarlar",
			'selectsmile' => "Gülenyüzler",
			'sendBtn' => "Yolla",
			'saveBtn' => "Kaydet",
			'soundBtn' => "Ses",
			'skinBtn' => "Görünüm",
			'addRoomBtn' => "Ekle",
			'myStatus' => "Durumum",
			'room' => "Oda",
			'welcome' => "Hoşgeldin USER_LABEL",
			'ringTheBell' => "Cevap Yok? Zili çal:",
			'logOffBtn' => "X",
			'helpBtn' => "?",
			'adminSign' => "(M)"
		)
	);
?>