<?php
	$GLOBALS['fc_config']['languages']['br'] = array(
		'name' => "Português (Brazil)",

		'messages' => array(
			'ignored' => "'USER_LABEL' está ignorando suas mensagens",
			'banned' => "Você foi banido",
			'login' => 'Por favor registre-se no chat',
			'wrongPass' => 'Nome do usuário ou senha incorreto. Por favor tente novamente.',
			'anotherlogin' => 'Outro usuário está registrado com este nome. Por favor tente novamente.',
			'expiredlogin' => 'Sua conexão expirou. Por favor registre-se novamente.',
			'enterroom' => '[ROOM_LABEL]: USER_LABEL entrou a(s) TIMESTAMP',
			'leaveroom' => '[ROOM_LABEL]: USER_LABEL saiu a(s) TIMESTAMP',
			'selfenterroom' => 'Bem-vindo! Você entrou em [ROOM_LABEL] a(s) TIMESTAMP',
			'bellrang' => 'USER_LABEL tocou a campainha',
			'chatfull' => 'O chat está cheio. Por favor tente novamente mais tarde.',
			'iplimit' => 'Você já está no chat.'
		),

		'usermenu' => array(
			'profile' => 'Perfil',
			'unban' => 'Cancelar banimento',
			'ban' => 'Banir',
			'unignore' => 'Cancelar ignorar',
			'fileshare' => 'Compartilhar arquivo',
			'ignore' => 'Ignorar',
			'invite' => 'Convidar',
			'privatemessage' => 'Mesagem privada',			
		),

		'status' => array(
			'here' => 'Online',
			'busy' => 'Ocupado',
			'away' => 'Ausente',
			'brb'  => 'Volto logo',			
		),

		'dialog' => array(
			'misc' => array(
				'roomnotfound' => "Sala 'ROOM_LABEL' não encontrada",
				'usernotfound' => "Usuário 'USER_LABEL' não encontrado",
				'unbanned' => "Foi cancelado o seu banimento pelo usuário 'USER_LABEL'",
				'banned' => "Você foi banido pelo usuário 'USER_LABEL'",
				'unignored' => "Foi cancelado o ignorar dado a você pelo usuário 'USER_LABEL'",
				'ignored' => "Você foi ignorado pelo usuário 'USER_LABEL'",
				'invitationdeclined' => "O usuário 'USER_LABEL' recusou seu convite para a sala 'ROOM_LABEL'",
				'invitationaccepted' => "O usuário 'USER_LABEL' aceitou seu convite para a sala 'ROOM_LABEL'",
				'roomnotcreated' => 'A sala não foi criada',
				'roomisfull' => '[ROOM_LABEL] está cheia. Por favor escolha outra sala.',
				'alert' => '<b>ALERTA!</b><br><br>',
				'chatalert' => '<b>ALERTA!</b><br><br>',
				'gag' => "<b>Você foi amordaçado por DURATION minuto(s)!</b><br><br>Você poderá visualizar as mensagens nesta sala, mas não contribuir com ".
						 "novas mensagens na conversa, até este período terminar.",
				'ungagged' => "Foi cancelado seu amordaçamento pelo  usuário 'USER_LABEL'",		 
				'gagconfirm' => 'USER_LABEL está amordaçado por MINUTES minuto(s).',
				'alertconfirm' => 'USER_LABEL leu o alerta.',
				'file_declined' => 'Seu arquivo foi recusado por USER_LABEL.',
				'file_accepted' => 'Seu arquivo foi aceito por USER_LABEL.',
			),

			'unignore' => array(
				'unignoreBtn' => 'Cancelar ignorar',
				'unignoretext' => 'Insira um texto do cancelamento do ignorar',
			),

			'unban' => array(
				'unbanBtn' => 'Cancelar banimento',
				'unbantext' => 'Insira um texto do cancelamento do banimento',
			),
			
			'tablabels' => array(
				'themes' => 'Temas',
				'sounds' => 'Sons',
				'text'  => 'Textos',
				'effects'  => 'Efeitos',
				'admin'  => 'Administração',
				'about' => 'Sobre',
			),

			'text' => array(
				'itemChange' => 'Item para mudar',
				'fontSize' => 'Tamanho da fonte',
				'fontFamily' => 'Família da fonte',
				'language' => 'Idioma',
				'mainChat' => 'Chat principal',
				'interfaceElements' => 'Elementos de interface',
				'title' => 'Título',
				'mytextcolor' => 'Use minha cor de texto para todas as mensagens recebidas.',
			),
			
			'effects' => array(
				'avatars' => 'Avatars',
				'mainchat' => 'Chat Principal',
				'roomlist' => 'Lista de Salas',
				'background' => 'Background',
				'custom' => 'Customizado',
				'showBackgroundImages' => 'Apresentar background',
				'splashWindow' => 'Foque janela quando receber nova mensagem',
				'uiAlpha' => 'Transparência',
			),

			'sound' => array(
				'sampleBtn' => "Amostra",
				'testBtn' => "Teste",
				'muteall' => "Sem som",
				'submitmessage' => "Submeter mensagem",
				'reveivemessage' => "Receber mensagem",
				'enterroom' => "Entrar na sala",
				'leaveroom' => "Sair da sala",
				'pan' => "Pan",
				'volume' => "Volume",
				'initiallogin' => "Login inicial",
				'logout' => "Logout",
				'privatemessagereceived' => "Receber mensagem privada",
				'invitationreceived' => "Receber convite",
				'combolistopenclose' => "Abrir/fechar lista de opções",
				'userbannedbooted' => "Usuário banido ou chutado",
				'usermenumouseover' => "Mouse sobre menu do usuário",
				'roomopenclose' => "Abrir/Fechar secção de sala",
				'popupwindowopen' => "Abrir janela de popup",
				'popupwindowclosemin' => "Fechar janela de popup",
				'pressbutton' => "Pressionar tecla",
				'otheruserenters' => "Outro usuário entra na sala",
			),


			'skin' => array(
				'inputBoxBackground' => 'Background da caixa de input',
				'privateLogBackground' => 'Background do log privado',
				'publicLogBackground' => 'Background do log público',
				'enterRoomNotify' => 'Notificação da entrada na sala',
				'roomText' => 'Texto das salas',
				'room' => 'Background das salas',
				'userListBackground' => 'Background das listas de usuários',
				'dialogTitle' => 'Título de diálogo',
				'dialog' => 'Background de diálogo',
				'buttonText' => 'Texto de botões',
				'button' => 'Background de botões',
				'bodyText' => 'Corpo do texto',
				'background' => 'Background principal',
				'borderColor' => 'Cor da borda',
				'selectskin' => 'Selecione esquema de cores...',
				'buttonBorder' => 'Cor da borda dos botões',
				'selectBigSkin' => 'Selecione o Skin...',
				'titleText' => 'Texto do título',
			),

			'privateBox' => array(
				'sendBtn' => 'Enviar',
				'toUser' => 'Falando com USER_LABEL:',
			),

			'login' => array(
				'loginBtn' => 'Login',
				'language' => 'Idioma:',
				'moderator' => '(se moderador)',
				'password' => 'Senha:',
				'username' => 'Nome do usuário:',
			),

			'invitenotify' => array(
				'declineBtn' => 'Recusar',
				'acceptBtn' => 'Aceitar',
				'userinvited' => "'USER_LABEL' convidou você para conversar em 'ROOM_LABEL'",
			),

			'invite' => array(
				'sendBtn' => 'Enviar',
				'includemessage' => 'Inclua esta mensagem com seu convite:',
				'inviteto' => 'Convide usuário para:',
			),

			'ignore' => array(
				'ignoreBtn' => 'Ignorar',
				'ignoretext' => 'Entre o texto de ignorar',
			),

			'createroom' => array(
				'createBtn' => 'Criar',
				'private' => 'Privada',
				'public' => 'Pública',
				'entername' => 'Entre o nome da sala',
			),

			'ban' => array(
				'banBtn' => 'Banir',
				'byIP' => 'pelo IP',
				'fromChat' => 'do chat',
				'fromRoom' => 'da sala',
				'banText' => 'Entre o texto de banimento',
			),

			'common' => array(
				'cancelBtn' => 'Cancelar',
				'okBtn' => 'OK',
				'win_choose'         => 'Escolha o arquivo para upload:',
				'win_upl_btn'        => '  Upload  ',
				'upl_error'          => 'Erro no upload do arquivo',
				'pls_select_file'    => 'Por favor selecione o arquivo para upload',
				'ext_not_allowed'    => 'A extensão FILE_EXT do arquivo não é permitida. Por favor selecione um arquivo com uma das seguintes extensões: ALLOWED_EXT',
				'size_too_big'       => 'O arquivo que você tentou compartilhar possui tamanho maior do que o permitido. Por favor tente novamente.',
			),
			
			'sharefile' => array(
				'chat_users'=> '[ Compartilhar para o Chat ]',
				'all_users' => '[ Compartilhar para a Sala ]',
				'file_info_size'  => '<br>O tamannho máximo permitido para este arquivo MAX_SIZE.',
				'file_info_ext' => ' Tipos de Aquivos Permitidos: ALLOWED_EXT',
				'win_share_only'=>'Compartilhar com',				
				'usr_message' => '<b>USER_LABEL quer compartilhar um arquivo com você</b><br><br>Nome do arquivo: F_NAME<br>Tamanho do arquivo: F_SIZE',				
			),
			
			'loadavatarbg' => array(
				'win_title'  => 'Background Customizado',
				'file_info'  => 'Seu arquivo precisa ser uma imagem em formato JPG "non-progressive", ou um arquivo Flash SWF.',
				'use_label'  => 'Use este aquivo para:',
				'rb_mainchat_avatar' => 'Avatar único do chat principal',
				'rb_roomlist_avatar' => 'Avatar único da lista de salas',
				'rb_mc_rl_avatar'    => 'Avatar do chat principal e da lista de salas',
				'rb_this_theme'      => 'Background para somente este tema',
				'rb_all_themes'      => 'Background para todos os temas',
			),

			
		),

		'desktop' => array(
			'invalidsettings' => 'Configurações inválidas',
			'selectsmile' => 'Smilies',
			'sendBtn' => 'Enviar',
			'saveBtn' => 'Salvar',
			'clearBtn' => 'Limpar',
			'skinBtn' => 'Opções',
			'addRoomBtn' => 'Adicionar',
			'myStatus' => 'Meu status',
			'room' => 'Sala',
			'welcome' => 'Bem-vindo USER_LABEL',
			'ringTheBell' => 'Sem Resposta? Toque a Campainha:',
			'logOffBtn' => 'X',
			'helpBtn' => '?',
			'adminSign' => '',
		)
	);
?>