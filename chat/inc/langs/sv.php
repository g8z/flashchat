<?php
        $GLOBALS['fc_config']['languages']['sv'] = array(
                'name' => "Svenska",

                'messages' => array(
                        'ignored' => "'USER_LABEL' ignorerar dina meddelanden.",
                        'banned' => "Du har blivit bannad",
                        'login' => 'Vänligen logga in på chatten',
                        'wrongPass' => 'Felaktigt användarnamn eller lösenord. Försök igen.',
                        'anotherlogin' => 'En annan användare är inloggad med detta användarnamnet. Försök igen.',
                        'expiredlogin' => 'Tiden har gått ut för din anslutning. Vänligen logga in igen.',
                        'enterroom' => '[ROOM_LABEL]: USER_LABEL har gått in i rummet TIMESTAMP',
                        'leaveroom' => '[ROOM_LABEL]: USER_LABEL har lämnat rummet TIMESTAMP',
                        'selfenterroom' => 'Välkommen! Du har gått in i [ROOM_LABEL] TIMESTAMP',
                        'bellrang' => 'USER_LABEL ringde på klockan',
                        'chatfull' => 'Chatten är full. Försök igen senare.',
                        'iplimit' => 'Du chattar redan.'
                ),

                'usermenu' => array(
                        'profile' => 'Profil',
                        'unban' => 'Ta bort ban',
                        'ban' => 'Ban',
                        'unignore' => 'Sluta ignorera',
                        'fileshare' => 'Dela fil',
                        'ignore' => 'Ignorera',
                        'invite' => 'Bjud in',
                        'privatemessage' => 'Privat meddelande',
                ),

                'status' => array(
                        'away' => 'Borta',
                        'busy' => 'Upptagen',
                        'here' => 'Tillgänglig',
                        'brb'  => 'BRB',
                ),

                'dialog' => array(
                        'misc' => array(
                                'roomnotfound' => "Rummet 'ROOM_LABEL' ej hittat",
                                'usernotfound' => "Användaren 'USER_LABEL' ej hittad",
                                'unbanned' => "Du blev un-bannad av användaren 'USER_LABEL'",
                                'banned' => "Du blev bannad av användaren 'USER_LABEL'",
                                'unignored' => "Användaren  'USER_LABEL' tog bort ignorering på dig",
                                'ignored' => "Du har blivit ignorerad av användaren 'USER_LABEL'",
                                'invitationdeclined' => "Användaren 'USER_LABEL' nekade din inbjudan till  'ROOM_LABEL'",
                                'invitationaccepted' => "Användaren 'USER_LABEL' accepterade din inbjudan till 'ROOM_LABEL'",
                                'roomnotcreated' => 'Rummet ej skapat',
                                'roomisfull' => '[ROOM_LABEL] är full. Välj ett annat rum.',
                                'alert' => '<b>ALERT!</b><br><br>',
                                'chatalert' => '<b>ALERT!</b><br><br>',
                                'gag' => "<b>Du har blivit dämpat för DURATION minute(r)!</b><br><br>Du får observera samtal i rummet, men får ej bidra ".
                                                 "till samtalet, för närvarande.",
                                'ungagged' => "Du blev un-dämpat av användaren 'USER_LABEL'",
                                'gagconfirm' => 'USER_LABEL är dämpad för MINUTES minute(r).',
                                'alertconfirm' => 'USER_LABEL har läst alertet.',
                                'file_declined' => 'Din fil har nekats av USER_LABEL.',
                                'file_accepted' => 'Din fil accepterades av USER_LABEL.',
                        ),

                        'unignore' => array(
                                'unignoreBtn' => 'Stäng av ignorering',
                                'unignoretext' => 'Välj av-ignoreringstext',
                        ),

                        'unban' => array(
                                'unbanBtn' => 'Ta bort ban',
                                'unbantext' => 'Välj un-ban text',
                        ),

                        'tablabels' => array(
                                'themes' => 'Teman',
                                'sounds' => 'Ljud',
                                'text'  => 'Text',
                                'effects'  => 'Effekter',
                                'admin'  => 'Admin',
                                'about' => "Om",
                        ),

                        'text' => array(
                                'itemChange' => 'Del att ändra',
                                'fontSize' => 'Fontstorlek',
                                'fontFamily' => 'Fontfamilj',
                                'language' => 'Språk',
                                'mainChat' => 'Huvud chat',
                                'interfaceElements' => 'Gränssnittsdel',
                                'title' => 'Titel',
                                'mytextcolor' => 'Använd min text färg för alla mottagna meddelande.',
                        ),

                        'effects' => array(
                                'avatars' => 'Avatars',
                                'mainchat' => 'Main chat',
                                'roomlist' => 'Chatrum lista',
                                'background' => 'Bakgrund',
                                'custom' => 'Anpassad',
                                'showBackgroundImages' => 'Visa bakgrund',
                                'splashWindow' => 'Fokusera fönster vid nytt meddelande',
                                'uiAlpha' => 'genomsynlighet',
                        ),

                        'sound' => array(
                                'sampleBtn' => 'Exempel',
                                'testBtn' => 'Testa',
                                'muteall' => 'Stäng av ljudet',
                                'submitmessage' => 'Skicka meddelande',
                                'reveivemessage' => 'Ta emot meddelande',
                                'enterroom' => 'Gå in i rum',
                                'leaveroom' => 'Lämna rum',
                                'pan' => 'Pan',
                                'volume' => 'Ljudvolum',
                                'initiallogin' => 'Första inloggningen',
                                'logout' => 'Logga ut',
                                'privatemessagereceived' => 'Tog emot privat meddelande',
                                'invitationreceived' => 'Tog emot inbjudan',
                                'combolistopenclose' => 'öppna/stäng combo lista',
                                'userbannedbooted' => 'Användare bannad eller utslängd',
                                'usermenumouseover' => 'Användarmeny mouse over',
                                'roomopenclose' => 'öppna/stäng rumsdel',
                                'popupwindowopen' => 'Popup-fönster öppnas',
                                'popupwindowclosemin' => 'Popup-fönster stängs',
                                'pressbutton' => 'Tangent nertryckt',
                                'otheruserenters' => 'Annan användare går in i rummet'
                        ),

                        'skin' => array(
                                'inputBoxBackground' => 'Input box bakgrund',
                                'privateLogBackground' => 'Privat logg bakgrund',
                                'publicLogBackground' => 'Publik logg bakgrund',
                                'enterRoomNotify' => 'Gå in i rum notifiering',
                                'roomText' => 'Text i rum',
                                'room' => 'Bakgrund i rum',
                                'userListBackground' => 'Användarlista bakgrund',
                                'dialogTitle' => 'Titel på dialogruta',
                                'dialog' => 'Dialogruta bakgrund',
                                'buttonText' => 'Knappar text',
                                'button' => 'Knappar bakgrund',
                                'bodyText' => 'Body text',
                                'background' => 'Huvudbakgrund',
                                'borderColor' => 'Border färg',
                                'selectskin' => 'Välj färgschema...',
                                'buttonBorder' => 'Knapp border',
                                'selectBigSkin' => 'Välj skal...',
                                'titleText' => 'Titeltext'
                        ),

                        'privateBox' => array(
                                'sendBtn' => 'Skicka',
                                'toUser' => 'Konversation med USER_LABEL:',
                        ),

                        'login' => array(
                                'loginBtn' => 'Logga in',
                                'language' => 'Språk:',
                                'moderator' => '(om moderator)',
                                'password' => 'Lösenord:',
                                'username' => 'Användarnamn:',
                        ),

                        'invitenotify' => array(
                                'declineBtn' => 'Neka',
                                'acceptBtn' => 'Acceptera',
                                'userinvited' => "Användaren 'USER_LABEL' bjöd in dig till rummet 'ROOM_LABEL'",
                        ),

                        'invite' => array(
                                'sendBtn' => 'Skicka',
                                'includemessage' => 'Skicka med detta meddelande tillsammans med din inbjudan:',
                                'inviteto' => 'Bjud in användare till:',
                        ),

                        'ignore' => array(
                                'ignoreBtn' => 'Ignorera',
                                'ignoretext' => 'Ange ignoreringstext',
                        ),

                        'createroom' => array(
                                'createBtn' => 'Skapa',
                                'private' => 'Privat',
                                'public' => 'Publik',
                                'entername' => 'Ange namn på rummet',
                        ),

                        'ban' => array(
                                'banBtn' => 'Banna',
                                'byIP' => 'efter IP',
                                'fromChat' => 'från chat',
                                'fromRoom' => 'från rum',
                                'banText' => 'Ange ban text',
                        ),

                        'common' => array(
                                'cancelBtn' => 'Avbryt',
                                'okBtn' => 'OK',

                                'win_choose'         => 'Välj en fil att ladda upp:',
                                'win_upl_btn'        => '  Ladda upp  ',
                                'upl_error'          => 'Fel vid uppladdning',
                                'pls_select_file'    => 'Välj en fil att ladda upp',
                                'ext_not_allowed'    => 'Filtypen FILE_EXT är ej tillåten. Var vänlig välj en fil av typ: ALLOWED_EXT',
                                'size_too_big'       => 'Filen som du vill dela är för stor. Försök igen.',
                        ),

                        'sharefile' => array(
                                'chat_users'=> '[ Dela med Chatten ]',
                                'all_users' => '[ Dela med Rummet ]',
                                'file_info_size'  => '<br>Filstorleken får vara maximalt MAX_SIZE .',
                                'file_info_ext' => ' Tillåtna filer: ALLOWED_EXT',
                                'win_share_only'=>'Dela med',
                                'usr_message' => '<b>USER_LABEL vill dela en fil med dig</b><br><br>Fil namn: F_NAME<br>Fil storlek: F_SIZE',
                        ),

                        'loadavatarbg' => array(
                                'win_title'  => 'Custom Bakgrund',
                                'file_info'  => 'Din fil måste vara en ej-progressiv JPG bild eller en Flash SWF fil.',
                                'use_label'  => 'Använd filen för:',
                                'rb_mainchat_avatar' => 'Endast Main chat avatar',
                                'rb_roomlist_avatar' => 'Endast Room list avatar',
                                'rb_mc_rl_avatar'    => 'Såväl Main Chat som rumslista avatars',
                                'rb_this_theme'      => 'Background för det här temat',
                                'rb_all_themes'      => 'Background för alla teman',
                        ),


                ),

                'desktop' => array(
                        'invalidsettings' => 'Felaktiga inställningar',
                        'selectsmile' => 'Smilies',
                        'sendBtn' => 'Skicka',
                        'saveBtn' => 'Spara',
                        'clearBtn' => 'Rensa',
                        'skinBtn' => 'Val',
                        'addRoomBtn' => 'Lägg till',
                        'myStatus' => 'Min status',
                        'room' => 'Rum',
                        'welcome' => 'Välkommen USER_LABEL',
                        'ringTheBell' => 'Inget svar? Ring i klockan:',
                        'logOffBtn' => 'x',
                        'helpBtn' => '?',
                        'adminSign' => '',
                )
        );
?>