<?php
	$GLOBALS['fc_config']['languages']['pt'] = array(
		'name' => "Português (Portugal)",

		'messages' => array(
			'ignored' => "'USER_LABEL' está a ignorar as suas mensagens",
			'banned' => "Você foi banido",
			'login' => 'Por favor faça login no chat',
			'wrongPass' => 'Nome de utilizador ou senha inválidos. Por favor tente novamente.',
			'anotherlogin' => 'Existe outro utilizador autenticado com esse nome de utilizador. Por favor tente novamente.',
			'expiredlogin' => 'A sua conexão expirou. Por favor faça login novamente.',
			'enterroom' => "[ROOM_LABEL]: USER_LABEL entrou às TIMESTAMP",
			'leaveroom' => "[ROOM_LABEL]: USER_LABEL saiu às TIMESTAMP",
			'selfenterroom' => "Bem-vindo! Você entrou em [ROOM_LABEL] às TIMESTAMP",
			'bellrang' => 'USER_LABEL tocou à campainha',
			'chatfull' => 'O chat está cheio. Por favor tente novamente mais tarde.',
			'iplimit' => 'Você já está no chat.'
		),

		'usermenu' => array(
			'profile' => "Perfil",
			'unban' => "Des-banir",
			'ban' => "Banir",
			'unignore' => "Des-ignorar",
			'fileshare' => 'Compartilhar arquivo',
			'ignore' => "Ignorar",
			'invite' => "Convidar",
			'privatemessage' => "Mensagem privada",
		),

		'status' => array(
			'away' => "Ausente",
			'busy' => "Ocupado",
			'here' => "Presente",
			'brb'  => 'Volto logo',
		),

		'dialog' => array(
			'misc' => array(
				'roomnotfound' => "Sala 'ROOM_LABEL' não encontrada",
				'usernotfound' => "Utilizador 'USER_LABEL' não encontrado",
				'unbanned' => "Você foi des-banido pelo utilizador 'USER_LABEL'",
				'banned' => "Você foi banido pelo utilizador 'USER_LABEL'",
				'unignored' => "Você foi des-ignorado pelo utilizador 'USER_LABEL'",
				'ignored' => "Você foi ignorado pelo utilizador 'USER_LABEL'",
				'invitationdeclined' => "O utilizador 'USER_LABEL' recusou o seu convite para entrar na sala 'ROOM_LABEL'",
				'invitationaccepted' => "O utilizador 'USER_LABEL' aceitou o seu convite para entrar na sala 'ROOM_LABEL'",
				'roomnotcreated' => "A sala não foi criada",
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
				'unignoreBtn' => "Des-ignorar",
				'unignoretext' => "Introduzir um texto de des-ignorar",
			),

			'unban' => array(
				'unbanBtn' => "Des-banir",
				'unbantext' => "Introduzir um texto de des-banir",
			),

			'tablabels' => array(
				'themes' => "Temas",
				'sounds' => "Sons",
				'text'  => "Texto",
				'effects'  => 'Efeitos',
				'admin'  => "Admin",
				'about' => 'Sobre',
			),

			'text' => array(
				'itemChange' => "Item a alterar",
				'fontSize' => "Tamanho da letra",
				'fontFamily' => "Família da letra",
				'language' => "Idioma",
				'mainChat' => "Chat principal",
				'interfaceElements' => "Elementos da interface",
				'title' => "Título",
				'mytextcolor' => 'Use minha cor de texto para todas as mensagens recebidas.',
			),

			'effects' => array(
				'avatars' => 'Avatars',
				'mainchat' => 'Chat Principal',
				'roomlist' => 'Lista de Salas',
				'background' => 'Fundo',
				'custom' => 'Customizado',
				'showBackgroundImages' => 'Apresentar fundo',
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
				'userbannedbooted' => "Utilizador banido ou chutado",
				'usermenumouseover' => "Rato sobre menu de utilizador",
				'roomopenclose' => "Abrir/Fechar secção de sala",
				'popupwindowopen' => "Abrir janela de popup",
				'popupwindowclosemin' => "Fechar janela de popup",
				'pressbutton' => "Premir tecla",
				'otheruserenters' => "Outro utilizador entra na sala",
			),

			'skin' => array(
				'inputBoxBackground' => "Fundo da caixa de entrada",
				'privateLogBackground' => "Fundo do log privado",
				'publicLogBackground' => "Fundo do log público",
				'enterRoomNotify' => "Notificação de entrada na sala",
				'roomText' => "Texto da sala",
				'room' => "Fundo da sala",
				'userListBackground' => "Fundo da lista de utilizador",
				'dialogTitle' => "Título do diálogo",
				'dialog' => "Fundo do diálogo",
				'buttonText' => "Texto dos botões",
				'button' => "Fundo dos botões",
				'bodyText' => "Texto do corpo",
				'background' => "Fundo principal",
				'borderColor' => "Cor da borda",
				'selectskin' => "Escolher esquema de cores...",
				'buttonBorder' => "Cor da borda dos botões",
				'selectBigSkin' => "Escolher máscara...",
				'titleText' => "Texto do título",
			),

			'privateBox' => array(
				'sendBtn' => "Enviar",
				'toUser' => "A falar com USER_LABEL:",
			),

			'login' => array(
				'loginBtn' => "Login",
				'language' => "Idioma:",
				'moderator' => "(se moderador)",
				'password' => "Senha:",
				'username' => "Utilizador:",
			),

			'invitenotify' => array(
				'declineBtn' => "Recusar",
				'acceptBtn' => "Aceitar",
				'userinvited' => "'USER_LABEL' convidou-o para um chat na 'ROOM_LABEL'",
			),

			'invite' => array(
				'sendBtn' => "Enviar",
				'includemessage' => "Incluir esta mensagem no seu convite:",
				'inviteto' => "Convidar utilizador para:",
			),

			'ignore' => array(
				'ignoreBtn' => "Ignorar",
				'ignoretext' => "Introduza texto de ignorar",
			),

			'createroom' => array(
				'createBtn' => "Criar",
				'private' => "Privada",
				'public' => "Pública",
				'entername' => "Introduzir nome da sala",
			),

			'ban' => array(
				'banBtn' => "Banir",
				'byIP' => "por IP",
				'fromChat' => "do chat",
				'fromRoom' => "sa sala",
				'banText' => "Introduzir texto de banir",
			),

			'common' => array(
				'cancelBtn' => "Cancelar",
				'okBtn' => "OK",
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
				'win_title'  => 'Fundo Customizado',
				'file_info'  => 'Seu arquivo precisa ser uma imagem em formato JPG "non-progressive", ou um arquivo Flash SWF.',
				'use_label'  => 'Use este aquivo para:',
				'rb_mainchat_avatar' => 'Avatar único do chat principal',
				'rb_roomlist_avatar' => 'Avatar único da lista de salas',
				'rb_mc_rl_avatar'    => 'Avatar do chat principal e da lista de salas',
				'rb_this_theme'      => 'Fundo para somente este tema',
				'rb_all_themes'      => 'Fundo para todos os temas',
			),


		),

		'desktop' => array(
			'invalidsettings' => "Definições inválidas",
			'selectsmile' => "Smilies",
			'sendBtn' => "Enviar",
			'saveBtn' => "Guardar",
			'clearBtn' => 'Limpar',
			'skinBtn' => "Opções",
			'addRoomBtn' => "Adicionar",
			'myStatus' => "Meu estado",
			'room' => "Sala",
			'welcome' => "Ben-vindo USER_LABEL",
			'ringTheBell' => "Sem resposta? Toque à campaínha:",
			'logOffBtn' => "X",
			'helpBtn' => "?",
			'adminSign' => "",
		)
	);
?>
