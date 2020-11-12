<?php
        $GLOBALS['fc_config']['languages_admin']['fr'] = array(
                'name'=>'FranÃ§ais',

                'admin_index.tpl' => array(
                        't0' => 'Panneau d\'administration de FlashChat',
                        't1' => 'Cet outil est conçu pour donner à des administrateurs de FlashChat des manières multiples de regarder les notations de causerie, a remis à zéro les notations de causerie, et ajoute/édite/enlève des salles.',
                        't2' => 'Il y a {$usrnumb} utilisateurs enregistrés'
                ),

                'banlist.tpl' => array(
                        't0' => 'Interdictions',
                        't1' => 'créé',
                        't2' => 'utilisateur',
                        't3' => 'utilisateurinterdit',
                        't4' => 'identificationdesalle',
                        't5' => 'niveau d\'interdiction',
                        't6' => 'enlevez l\'interdiction',
                        't7' => 'Aucunes interdictions trouvées'
                ),

                'bot.tpl' => array(
                        't0' => 'bot',
                        't1' => 'nom de bot',
                        't2' => 'avatar de liste de pièce de bot',
                        't3' => 'aucun',
                        't4' => 'avatar principal de causerie de bot',
                        't5' => 'ouvrez une session dans la salle',
                        't6' => 'active quand &lt;X les utilisateurs sont présents',
                        't7' => 'active quand &gt;X les utilisateurs sont présents',
                        't8' => 'active en employant FlashChat dans le mode de "soutien"',
                        't9' => 'active quand un admin n\'est pas présent',
                        't10' => 'active quand il n\'y a aucun autre bots dans la chambre',
                        't11' => 'active quand un utilisateur particulier est présent',
                        't12' => 'Les Bots est handicapé sur votre système.',
                        't13' => 'Le bot ne pourrait pas être ajouté parce que l\'installation de bot a été sautée dans l\'installateur instantané de causerie.',
                        't14' => 'Veuillez réexécuter l\'installateur pour permettre l\'appui de bot.'
                ),

                'botlist.tpl' => array(
                        't0' => 'Bots',
                        't1' => 'Ajoutez le nouveau bot',
                        't2' => 'Nom de Bot',
                        't3' => 'Suppression',
                        't4' => 'Aucuns bots trouvés',
                        't5' => 'Le dispositif de bot est actuellement désactivé. Pour permettre l\'appui de bot, placez "Permettez Bots" au "Yes" dans les "arrangements généraux" section de configuration de ce panneau d\'admin.',
                        't6' => 'Vous pouvez devoir réexécuter l\'installateur de FlashChat pour ajouter les bases de connaissances nécessaires, aussi.'
                ),

                'chatlist.tpl' => array(
                        't0' => 'Cette option n\'est pas disponible quand FlashChat est intégré avec un CMS de coutume (système de gestion content).',
                        't1' => 'Causeries',
                        't2' => 'dans cette chambre:',
                        't3' => 'Toute pièce',
                        't4' => 'entre ces dates:',
                        't5' => ' et',
                        't6' => 'des jours passés de X:',
                        't7' => 'par l\'initiateur:',
                        't8' => 'Tout utilisateur',
                        't9' => 'par le modérateur:',
                        't10' => 'Nom de pièce',
                        't11' => 'Ouverture d\'initiateur',
                        't12' => 'Ouverture de modérateur',
                        't13' => 'Début',
                        't14' => 'Extrémité',
                        't15' => 'prévision',
                        't16' => 'Aucun modérateur',
                        't17' => 'Aucunes causeries trouvées',
                        't18' => 'Veuillez utiliser les outils d\'administration d\'utilisateur qui viennent avec votre système pour ajouter, éditer, ou enlever des utilisateurs.',
                        't19' => 'Montrez les causeries',
                        't20' => 'Filtre clair',
                        't21' => 'Enlevez les messages',
                        't22' => 'Envoyé',
                        't23' => 'De',
                        't24' => ' À',
                        't25' => 'Message',
                        't26' => 'messages à montrer'
                ),

                'connlist.tpl' => array(
                        't0' => 'Raccordements',
                        't1' => 'mis à jour',
                        't2' => 'créé',
                        't3' => 'utilisateur',
                        't4' => 'identificationdesalle',
                        't5' => 'statut',
                        't6' => 'couleur',
                        't7' => 'début',
                        't8' => 'lang',
                        't9' => 'tzoffset',
                        't10' => 'centre serveur',
                        't11' => 'Aucuns raccordements trouvés'
                ),

                'ignorelist.tpl' => array(
                        't0' => 'Ignore',
                        't1' => 'créé',
                        't2' => 'utilisateur',
                        't3' => 'utilisateur ignoré',
                        't4' => 'enlevez ignorent',
                        't5' => 'Aucun ignore trouvé'
                ),

                'logout.tpl' => array(
                        't0' => 'Déconnexion de panneau de FlashChat Admin',
                        't1' => 'Vous avez été déconnecté',
                        't2' => 'Cliquez sur ici pour ouvrir une session.',
                        't3' => 'Si vous employez FlashChat intégré avec un CMS de coutume (système de gestion content), alors vous pouvez encore être ouvert une session, selon la façon dont votre système stocke des données d\'utilisateur.',
                        't4' => 'FlashChat n\'est pas installé.'
                ),

                'msglist.tpl' => array(
                        't0' => 'Messages',
                        't1' => 'dans cette chambre:',
                        't2' => 'Toute pièce',
                        't3' => 'entre ces dates',
                        't4' => 'et',
                        't5' => 'des jours passés de X:',
                        't6' => 'par cet utilisateur:',
                        't7' => 'Tout utilisateur',
                        't8' => 'contenir ce mot-clé:',
                        't9' => 'envoyé',
                        't10' => 'de l\'utilisateur',
                        't11' => 'à la pièce',
                        't12' => 'à l\'utilisateur',
                        't13' => 'Aucuns messages trouvés',
                        't14' => 'Montrez les messages',
                        't15' => 'Filtre clair',
                        't16' => 'Enlevez les messages'
                ),

                'nopermit.tpl' => array(
                        't0' => 'Vous n\'avez pas les permissions nécessaires d\'accéder à cet outil.'
                ),

                'room.tpl' => array(
                        't0' => 'Pièce',
                        't1' => 'nom',
                        't2' => 'mot de passe',
                        't3' => 'public',
                        't4' => 'permanent',
                        't5' => 'Ajoutez la nouvelle pièce',
                        't6' => 'Pièce de mise à jour',
                        't7' => 'Enlevez la pièce'
                ),

                'uninstall.tpl' => array(
                        't0' => 'FlashChat est désinstallé avec succès.',
                        't1' => 'FlashChat n\'est pas installé.',
                        't2' => 'Désinstallez',
                        't3' => 'Enlevez toutes les tables de FlashChat de MySQL. Cette option te permettra de réexécuter l\'installateur.',
                        't4' => 'Vous pouvez avoir besoin de re-téléchargement le "install_files" le dossier et le dossier d\' install.php avant réinstallent.',
                        't5' => 'Les tables suivantes seront de manière permanente enlevées:',
                        't6' => 'Enlevez tous les dossiers de config de l\' Cache Dir. Cette option te permettra de réexécuter l\'installateur.',
                        't7' => 'You may need to re-upload the "install_files" folder and the install.php file before re-install.',
                        't8' => 'Je comprends que ces actions ne sont pas réversibles.',
                        't9' => 'Êtes vous sure?!? Cette action n\'est pas réversible!',
                        't10' => 'Continuez',
                        't11' => 'Annulation'
                ),

                'user.tpl' => array(
                        't0' => 'Cette option n\'est pas disponible quand FlashChat est intégré avec un CMS de coutume (système de gestion content).',
                        't1' => 'utilisateur',
                        't2' => 'ouverture',
                        't3' => 'mot de passe',
                        't4' => 'rôle',
                        't5' => 'Veuillez utiliser les outils d\'administration d\'utilisateur qui viennent avec votre système pour ajouter, éditer, ou enlever des utilisateurs.',
                        't6' => 'Ajoutez le nouvel utilisateur',
                        't7' => 'Utilisateur en mise à jour',
                        't8' => 'Enlevez l\'utilisateur'
                ),

                'usrlist.tpl' => array(
                        't0' => 'Cette option n\'est pas disponible quand FlashChat est intégré avec un CMS de coutume (système de gestion content).',
                        't1' => 'Utilisateurs',
                        't2' => 'Ajoutez le nouvel utilisateur',
                        't3' => 'identification',
                        't4' => 'ouverture',
                        't5' => 'mot de passe',
                        't6' => 'rôle',
                        't7' => 'Utilisateur n\'a pas trouvé',
                        't8' => 'Veuillez utiliser les outils d\'administration d\'utilisateur qui viennent avec votre système pour ajouter, éditer, ou enlever des utilisateurs.'
                ),

                'top.tpl' => array(
                        't0' => 'Maison',
                        't1' => 'Principal',
                        't2' => 'Configuration',
                        't3' => 'Messages',
                        't4' => 'Causeries',
                        't5' => 'Utilisateurs',
                        't6' => 'Salles',
                        't7' => 'Raccordements',
                        't8' => 'Interdictions',
                        't9' => 'Ignore',
                        't10' => 'Bots',
                        't11' => 'Désinstallez',
                        't12' => 'Déconnexion'
                ),

                'roomlist.tpl' => array(
                        't0' => 'Salles',
                        't1' => 'Ajoutez la nouvelle pièce',
                        't2' => 'nom',
                        't3' => 'mot de passe',
                        't4' => 'public',
                        't5' => 'permanent',
                        't6' => 'Cognez vers le haut',
                        't7' => 'Suppression',
                        't8' => 'Soumettez tous',
                        't9' => 'Vous devez recharger la causerie (la page régénèrent) et la re-ouverture pour voir des changements de pièce.',
                        't10' => 'Aucunes salles trouvées',
                        't11' => 'éditez'
                ),

                'login.tpl' => array(
                        't0' => 'Ouverture de panneau de FlashChat Admin',
                        't1' => 'ouverture',
                        't2' => 'mot de passe',
                        't3' => 'choisissez la langue',
                        't4' => 'ouverture',
                        't5' => 'N\'a pas pu accorder le rôle d\'admin pour ces ouverture et mot de passe.',
                        't6' => 'FlashChat n\'est pas installé.'
                ),

                'cnf_top.tpl' => array(
                        't0' => 'Exemples de causerie',
                        't1' => 'Arrangements généraux',
                        't2' => 'Arrangements de raccordement',
                        't3' => 'Stockage de message',
                        't4' => 'Couleurs et images de thème',
                        't5' => 'Directeur de disposition',
                        't6' => 'Arrangements de police',
                        't7' => 'Bruits',
                        't8' => 'Smilies',
                        't9' => 'Avatars',
                        't10' => 'Partage de fichiers',
                        't11' => 'Modules',
                        't12' => 'Dispositif de précharge',
                        't13' => 'Arrangements de déconnexion',
                        't14' => 'Langues',
                        't15' => 'Mauvais mots / Texte rapide',
                        't16' => 'Tous autres arrangements'
                ),

                'cnf_avatars' => array(
                        't762' => array(
                                'value' => 'Mod seulement:'
                        ),

                        't763' => array(
                                'value' => 'Valeur par défaut principale de causerie:',
                                'hint' => 'un code de smilie'
                        ),

                        't764' => array(
                                'value' => 'État de défaut principal de causerie:',
                                'hint' => 'Sur = vérifié/sur par défaut'
                        ),

                        't765' => array(
                                'value' => 'La causerie principale permettent le dépassement:',
                                'hint' => 'si le non, ne peut pas être changé (la boîte combinée est débronchement)'
                        ),

                        't766' => array(
                                'value' => 'Valeur par défaut de pièce:',
                                'hint' => 'un code de smilie'
                        ),

                        't767' => array(
                                'value' => 'État de défaut de pièce:',
                                'hint' => 'Sur = vérifié/sur par défaut'
                        ),

                        't768' => array(
                                'value' => 'La pièce permettent le dépassement:',
                                'hint' => 'si le non, ne peut pas être changé (la boîte combinée est débronchement)'
                        ),

                        't769' => array(
                                'value' => 'Valeur par défaut principale de causerie:',
                                'hint' => 'un code de smilie'
                        ),

                        't770' => array(
                                'value' => 'État de défaut principal de causerie:',
                                'hint' => 'Sur = vérifié/sur par défaut'
                        ),

                        't771' => array(
                                'value' => 'La causerie principale permettent le dépassement:',
                                'hint' => 'si le non, ne peut pas être changé (la boîte combinée est débronchement)'
                        ),

                        't772' => array(
                                'value' => 'Valeur par défaut de pièce:',
                                'hint' => 'un code de smilie'
                        ),

                        't773' => array(
                                'value' => 'État de défaut de pièce:',
                                'hint' => 'Sur = vérifié/sur par défaut'
                        ),

                        't774' => array(
                                'value' => 'La pièce permettent le dépassement:',
                                'hint' => 'si le non, ne peut pas être changé (la boîte combinée est débronchement)'
                        ),

                        't775' => array(
                                'value' => 'Valeur par défaut principale de causerie:',
                                'hint' => 'un code de smilie'
                        ),

                        't776' => array(
                                'value' => 'État de défaut principal de causerie:',
                                'hint' => 'Sur = vérifié/sur par défaut'
                        ),

                        't777' => array(
                                'value' => 'La causerie principale permettent le dépassement:',
                                'hint' => 'si le non, ne peut pas être changé (la boîte combinée est débronchement)'
                        ),

                        't778' => array(
                                'value' => 'Valeur par défaut de pièce:',
                                'hint' => 'un code de smilie'
                        ),

                        't779' => array(
                                'value' => 'État de défaut de pièce:',
                                'hint' => 'Sur = vérifié/sur par défaut'
                        ),

                        't780' => array(
                                'value' => 'La pièce permettent le dépassement:',
                                'hint' => 'si le non, ne peut pas être changé (la boîte combinée est débronchement)'
                        ),

                        't781' => array(
                                'value' => 'Valeur par défaut principale de causerie:',
                                'hint' => 'un code de smilie'
                        ),

                        't782' => array(
                                'value' => 'État de défaut principal de causerie:',
                                'hint' => 'Sur = vérifié/sur par défaut'
                        ),

                        't783' => array(
                                'value' => 'La causerie principale permettent le dépassement:',
                                'hint' => 'si le non, ne peut pas être changé (la boîte combinée est débronchement)'
                        ),

                        't784' => array(
                                'value' => 'Valeur par défaut de pièce:',
                                'hint' => 'un code de smilie'
                        ),

                        't785' => array(
                                'value' => 'État de défaut de pièce:',
                                'hint' => 'Sur = vérifié/sur par défaut'
                        ),

                        't786' => array(
                                'value' => 'La pièce permettent le dépassement:',
                                'hint' => 'si le non, ne peut pas être changé (la boîte combinée est débronchement)'
                        ),

                        't787' => array(
                                'value' => 'Valeur par défaut principale de causerie:',
                                'hint' => 'un code de smilie'
                        ),

                        't788' => array(
                                'value' => 'État de défaut principal de causerie:',
                                'hint' => 'Sur = vérifié/sur par défaut'
                        ),

                        't789' => array(
                                'value' => 'La causerie principale permettent le dépassement:',
                                'hint' => 'si le non, ne peut pas être changé (la boîte combinée est débronchement)'
                        ),

                        't790' => array(
                                'value' => 'Valeur par défaut de pièce:',
                                'hint' => 'un code de smilie'
                        ),

                        't791' => array(
                                'value' => 'État de défaut de pièce:',
                                'hint' => 'Sur = vérifié/sur par défaut'
                        ),

                        't792' => array(
                                'value' => 'La pièce permettent le dépassement:',
                                'hint' => 'si le non, ne peut pas être changé (la boîte combinée est débronchement)'
                        ),

                        't793' => array(
                                'value' => 'Valeur par défaut principale de causerie:',
                                'hint' => 'un code de smilie'
                        ),

                        't794' => array(
                                'value' => 'État de défaut principal de causerie:',
                                'hint' => 'Sur = vérifié/sur par défaut'
                        ),

                        't795' => array(
                                'value' => 'La causerie principale permettent le dépassement:',
                                'hint' => 'si le non, ne peut pas être changé (la boîte combinée est débronchement)'
                        ),

                        't796' => array(
                                'value' => 'Valeur par défaut de pièce:',
                                'hint' => 'un code de smilie'
                        ),

                        't797' => array(
                                'value' => 'État de défaut de pièce:',
                                'hint' => 'Sur = vérifié/sur par défaut'
                        ),

                        't798' => array(
                                'value' => 'La pièce permettent le dépassement:',
                                'hint' => 'si le non, ne peut pas être changé (la boîte combinée est débronchement)'
                        ),

                        't0' => 'Changez l\'arrangement pour:',
                        't1' => 'Arrangement masculin',
                        't2' => 'Arrangement femelle',
                        't3' => 'Sauf des arrangements'

                ),

                'cnf_badwords' => array(
                        't0' => 'Marques d\'astérisque (*) peut être employé pour indiquer les allumettes partielles. Laissez le champ de droit-côté emply pour employer le texte de substitution de défaut, ou le texte d\'entrée dans le droit-côté pour placer un texte de remplacement spécifique pour les mauvais mots.',
                        't2' => 'Ce dispositif peut également être employé pour "Texte rapide" s\'il y a une expression que vous employez fréquemment. Par exemple "sicyadv" a pu être changé en "Salut il, comment y a de vous ?" par la spécification "sicyadv" comme mauvais mot, et phrase correspondante comme produit de remplacement des textes.',
                        't3' => 'Texte de remplacement de défaut:',
                        't4' => 'Ajoutez',
                        't5' => 'Sur',
                        't6' => 'Outre de',
                        't7' => 'Suppression',
                        't8' => 'Désactivez tous les filtres',
                        't9' => 'Sauf des arrangements',
                        't10' => 'Êtes vous sure que vous voulez supprimer ce mot?\nNote : Ce mot sera perdu.',
                ),

                'cnf_conn' => array(
                        't23' => array(
                                'value' => 'Intervalle d\'inondation:',
                                'hint' => 'en secondes, le nombre de heures qui doit passer avant l\'utilisateur signale un autre message'
                        ),

                        't24' => array(
                                'value' => 'Intervalle d\'inactivité:',
                                'hint' => 'en secondes, si un utilisateur a FlashChat ouvert pendant des secondes (d\'intervalled\'inactivité)'
                        ),

                        't799' => array(
                                'value' => 'Intervalle de demande de message:',
                                'hint' => 'la causerie régénèrent le temps, seconde'
                        ),

                        't800' => array(
                                'value' => 'Intervalle de demande de message loin:',
                                'hint' => 'la causerie régénèrent le temps dans toujours l\'état, seconde'
                        ),

                        't802' => array(
                                'value' => 'Déconnexion automatique ensuite:',
                                'hint' => 'la période de la mise en commun inactivaty après quoi de l\'utilisateur est considérée fermée une session, des secondes'
                        ),

                        't803' => array(
                                'value' => 'Fin d\'automobile ensuite:',
                                'hint' => 'la période de la mise en commun inactivaty après quoi du raccordement est enlevée de la base de données, secondes'
                        ),

                        't804' => array(
                                'value' => 'Aide Url:',
                                'hint' => 'vous pouvez employer également help.php'
                        )

                ),

                'cnf_const' => array(
                        't626' => array(
                                'value' => 'Nom de peau de défaut:'
                        ),

                        't627' => array(
                                'value' => 'Nom de la peau SWF de défaut:'
                        ),

                        't628' => array(
                                'value' => 'Nom de peau du défaut XP:'
                        ),

                        't629' => array(
                                'value' => 'Nom de la peau SWF du défaut XP:'
                        ),

                        't630' => array(
                                'value' => 'Nom de peau d\'Aqua de défaut:'
                        ),

                        't631' => array(
                                'value' => 'Nom de la peau SWF d\'Aqua de défaut:'
                        ),

                        't632' => array(
                                'value' => 'Nom de peau de gradient de défaut:'
                        ),

                        't633' => array(
                                'value' => 'Nom de la peau SWF de gradient de défaut:'
                        )

                ),

                'cnf_filesharing' => array(
                        't830' => array(
                                'value' => 'Permettez la pièce de part:',
                                'hint' => 'le modérateur peut toujours partager la largeur tous les utilisateurs dans la chambre - cette option est seulement pour des non-modérateurs'
                        ),

                        't831' => array(
                                'value' => 'Permettez la causerie de part:',
                                'hint' => 'le modérateur peut toujours partager la largeur tous les utilisateurs dans la causerie - cette option est seulement pour des non-modérateurs'
                        ),

                        't832' => array(
                                'value' => 'Permettez les prolongements de dossier:',
                                'hint' => "prolongements de dossier permis, virgule séparée (a permis tous les prolongements réglés à \'\')"
                        ),

                        't833' => array(
                                'value' => 'Taille de fichier maximum:',
                                'hint' => 'taille de fichier maximum en bytes (2*1024*1024 égales 2Mb)'
                        ),

                        't834' => array(
                                'value' => 'La vie maximum d\'heures de dossier:',
                                'hint' => 'heure en heures de stocker le dossier sur le serveur (le dossier sera supprimé après ce temps)'
                        ),

                        't835' => array(
                                'value' => 'Permettez le dossier Extenisons:',
                                'hint' => "prolongements de dossier permis, virgule séparée (pour permettre tous les prolongements réglés à \'\')"
                        ),

                        't836' => array(
                                'value' => 'Taille de fichier maximum:',
                                'hint' => 'taille de fichier maximum en bytes (2*1024*1024 égales 2Mb)'
                        ),

                        't837' => array(
                                'value' => 'La vie maximum d\'heures de dossier:',
                                'hint' => 'heure en heures de stocker le dossier sur le serveur (le dossier sera supprimé après ce temps)'
                        ),

                        't838' => array(
                                'value' => 'Permettez le dossier Extenisons:',
                                'hint' => "prolongements de dossier permis, virgule séparée (pour permettre tous les prolongements réglés à \'\')"
                        ),

                        't839' => array(
                                'value' => 'Taille de fichier maximum:',
                                'hint' => 'taille de fichier maximum en bytes (2*1024*1024 égales 2Mb)'
                        ),

                        't840' => array(
                                'value' => 'La vie maximum d\'heures de dossier:',
                                'hint' => 'heure en heures de stocker le dossier sur le serveur (le dossier sera supprimé après ce temps)'
                        ),

                        't0' => 'Partage de fichiers de causerie',
                        't1' => 'Chargement de fond d\'avatar',
                        't2' => 'Chargement de photo d\'utilisateur',
                        't3' => 'Oui',
                        't4' => 'Non',
                        't5' => 'Sauf des arrangements',
                        't6' => 'bytes',
                        't7' => 'heures'
                ),

                'cnf_font' => array(
                        't635' => array(
                                'value' => 'Permettez le dépassement de couleur des textes:',
                                'hint' => 'défauts (présence : est cette option évidente ou cachée)'
                        ),

                        't636' => array(
                                'value' => 'Permettez le changement:',
                                'hint' => 'défauts (présence : est cette option évidente ou cachée)'
                        ),

                        't637' => array(
                                'value' => 'Taille de défaut:',
                                'hint' => 'défauts (présence : est cette option évidente ou cachée)'
                        ),

                        't638' => array(
                                'value' => 'Famille de font:',
                                'hint' => 'défauts (présence : est cette option évidente ou cachée)'
                        ),

                        't639' => array(
                                'value' => 'Permettez le changement:',
                                'hint' => 'défauts (présence : est cette option évidente ou cachée)'
                        ),

                        't640' => array(
                                'value' => 'Taille de défaut:',
                                'hint' => 'défauts (présence : est cette option évidente ou cachée)'
                        ),

                        't641' => array(
                                'value' => 'Famille de font:',
                                'hint' => 'défauts (présence : est cette option évidente ou cachée)'
                        ),

                        't642' => array(
                                'value' => 'Permettez le changement:',
                                'hint' => 'défauts (présence : est cette option évidente ou cachée)'
                        ),

                        't643' => array(
                                'value' => 'Taille de défaut:',
                                'hint' => 'défauts (présence : est cette option évidente ou cachée)'
                        ),

                        't644' => array(
                                'value' => 'Famille de font:',
                                'hint' => 'défauts (présence : est cette option évidente ou cachée)'
                        ),

                        't0' => 'Oui',
                        't1' => 'Non',
                        't2' => 'Causerie principale',
                        't3' => 'Éléments d\'interface',
                        't4' => 'Titre',
                        't5' => 'Taille de font:',
                        't6' => 'Famille de font:',
                        't7' => 'Nom',
                        't8' => 'Handicapé',
                        't9' => 'Sauf des arrangements'

                ),

                'cnf_general' => array(
                        't3' => array(
                                'value' => 'Corrigez le mode:',
                                'hint' => 'placez pour rectifier pour courir dedans corrigent le mode'
                        ),

                        't4' => array(
                                'value' => 'Version de FlashChat:',
                                'hint' => 'dégagement d\'architecture. dégagement de dispositif. dégagement de correction'
                        ),

                        't5' => array(
                                'value' => 'Permettez le serveur de socket:',
                                'hint' => 'ensemble à rectifier pour permettre le serveur de douille - voir les documents en ligne de PDF pour plus de détails'
                        ),

                        't6' => array(
                                'value' => 'Permettez le "Vivent l\'appui" mode :',
                                'hint' => "placez pour rectifier pour employer la causerie dedans \'Vivent l\'appui\' mode"
                        ),

                        't7' => array(
                                'value' => 'Permettez les rapports d\'erreur:',
                                'hint' => 'placez pour rectifier pour permettre des rapports d\'erreur'
                        ),

                        't8' => array(
                                'value' => 'Permettez les Bots:<br>Vous devez réinstaller FlashChat pour permettre l\'option de Bot',
                                'hint' => 'placez pour rectifier pour permettre des Bots'
                        ),

                        't9' => array(
                                'value' => 'IP virtuel de bot:',
                                'hint' => 'ip virtuel de bot'
                        ),

                        't10' => array(
                                'value' => 'Menu d\'individu de liste utilisateurs de débronchement:',
                                'hint' => 'placez à faux pour permettre à individu le menu instantané'
                        ),

                        't11' => array(
                                'value' => 'Permettez à confirmation la fenêtre automatique pour admin (le modérateur):',
                                'hint' => 'placez pour rectifier pour permettre à confirmation la fenêtre automatique pour admin (le modérateur)'
                        ),

                        't12' => array(
                                'value' => 'Format d\'étiquette:',
                                'hint' => 'les valeurs possibles sont toutes les combinaisons d\'AVATAR, d\'USER et d\'TIMESTAMP'
                        ),

                        't13' => array(
                                'value' => 'Format de groupe date/heure:',
                                'hint' => 'modèle pour PHP date fonction'
                        ),

                        't14' => array(
                                'value' => 'Ouvertures maximum par IP address:',
                                'hint' => 'le nombre d\'ouvertures a permis par IP address'
                        ),

                        't15' => array(
                                'value' => 'Commandes handicapées d\'IRC:',
                                'hint' => 'vous pouvez mettre la liste de commandes d\'IRC de désactiver ici, comme (back,backtime)'
                        ),

                        't16' => array(
                                'value' => 'Commandes handicapées d\'IRC pour des modérateurs:',
                                'hint' => 'Restrictions de modérateurs (que l\'IRC commande sont handicapé pour des modérateurs)'
                        ),

                        't17' => array(
                                'value' => 'Restrictions de modérateurs dans la section d\'admin:',
                                'hint' => 'Restrictions de modérateurs dans la section d\'admin (admin.php), comme (bots,uninstall,connections,users)'
                        ),

                        't18' => array(
                                'value' => 'Taille maximum des textes d\'entrée:',
                                'hint' => 'taille maximum des textes d\'entrée, # caractères'
                        ),

                        't19' => array(
                                'value' => 'Nombre maximum de la notation de causerie de messages:',
                                'hint' => 'nombre maximum des messages stockés dans la notation de causerie'
                        ),

                        't20' => array(
                                'value' => 'Ouvre toutes les salles avec des utilisateurs:',
                                'hint' => 'si véritable la liste utilisateurs ouvre toutes les salles avec des utilisateurs dans eux'
                        ),

                        't21' => array(
                                'value' => 'Montrez la fenêtre de déconnexion:',
                                'hint' => 'si faux, employez alors seulement ....src=logout.php la méthode, mais n\'emploient pas popup méthode du tout'
                        ),

                        't22' => array(
                                'value' => 'Temps d\'affichage de fenêtre de déconnexion:',
                                'hint' => 'en secondes'
                        ),

                        't25' => array(
                                'value' => 'Éclaboussez la fenêtre de causerie quand le nouveau message est reçu:',
                                'hint' => 'éclaboussez la fenêtre non active de causerie quand le nouveau message est reçu'
                        ),

                        't26' => array(
                                'value' => 'Pièce de défaut:',
                                'hint' => 'clé primaire de pièce où tous les utilisateurs vont après ouverture'
                        ),

                        't27' => array(
                                'value' => 'Autoremove pièce:',
                                'hint' => 'le nombre de secondes avant pièce est enlevé'
                        ),

                        't28' => array(
                                'value' => 'Titre de pièce dedans userlist:',
                                'hint' => 'corde de format pour le titre de pièce dedans userlist'
                        ),

                        't29' => array(
                                'value' => 'Utilisateurs maximum par pièce:'
                        ),

                        't30' => array(
                                'value' => 'Ordre de liste:',
                                'hint' => 'options : Alphabétique, A à Z, ordre par l\'entrée à la pièce, Mods et Admins d\'abord, puis A à Z, & de Mods ; D\'abord, puis Admins par l\'entrée, l\'ordre par statut d\'utilisateur, le Mods et l\'Admins d\'abord, puis par statut d\'utilisateur'
                        ),

                        't31' => array(
                                'value' => 'Système de CMS:',
                                'hint' => 'defaultCMS - CMS de défaut, blanc - CMS apatride'
                        ),

                        't32' => array(
                                'value' => 'L\'ouverture UTF8 décodent:',
                                'hint' => 'valeurs possibles - true, false'
                        ),

                        't33' => array(
                                'value' => 'Chiffrez le mot de passe:',
                                'hint' => 'l\'option pour chiffrer le mot de passe d\'utilisateur pour le defaultCMS, peut être 1 - chiffrez et 0 - aucun chiffrent'
                        ),

                        't34' => array(
                                'value' => 'Automotd:',
                                'hint' => '1 pour dessus, 0 pour outre de (sur des moyens il est montré sur l\'entrée de causerie)'
                        ),

                        't35' => array(
                                'value' => 'Autotopic:',
                                'hint' => '1 pour dessus, 0 pour outre de (sur des moyens il est montré sur l\'entrée de pièce)'
                        ),

                        't36' => array(
                                'value' => 'Mot de passe d\'Admin:<br>seulement applicable si (invité) le CMS apatride est utilisé',
                                'hint' => 'permet à n\'importe quel utilisateur d\'ouvrir une session en tant qu\'administrateur - mode apatride de CMS seulement'
                        ),

                        't37' => array(
                                'value' => 'Mot de passe de modérateur:<br>seulement applicable si (invité) le CMS apatride est utilisé',
                                'hint' => 'permet à n\'importe quel utilisateur d\'ouvrir une session comme modérateur - mode apatride de CMS seulement'
                        ),

                        't38' => array(
                                'value' => 'Mot de passe d\'espion:<br>seulement applicable si (invité) le CMS apatride est utilisé',
                                'hint' => 'permet à n\'importe quel utilisateur d\'ouvrir une session en tant qu\'espion - mode apatride de CMS seulement'
                        ),

                        't981' => array(
                                'value' => 'Nombre maximum des minutes de commande de backtime:',
                                'hint' => 'place le nombre maximum des minutes où la commande de backtime servira vers le haut, emploie 0 pour n\'avoir aucun maximum'
                        ),

                        't982' => array(
                                'value' => 'Nombre maximum des lignes de commande de backtime:',
                                'hint' => 'place le nombre maximum des lignes que la commande arrière servira vers le haut, emploie 0 pour n\'avoir aucun maximum'
                        ),

                        't1104' => array(
                                'value' => 'Drapeau si c\'est un exemple payé de causerie',
                                'hint' => 'placez à 1 si c\'est un exemple payé'
                        ),

                        't1105' => array(
                                'value' => 'Quantité d\'adhésion (si c\'est un exemple payé de causerie)',
                                'hint' => 'si c\'est un exemple payé, mettez à jour svp la quantité pour l\'adhésion'
                        ),

                        't1106' => array(
                                'value' => 'Spécifiez si c\'est un mode d\'essai (si c\'est un exemple payé de causerie)',
                                'hint' => 'si c\'est un exemple payé, spécifiez svp si c\'est un mode d\'essai'
                        ),

                        't1107' => array(
                                'value' => 'Email de bussiness de Paypal (si c\'est un exemple payé de causerie)',
                                'hint' => 'si c\'est un exemple payé, spécifiez svp la mention l\'email de bussiness'
                        ),

                        't1108' => array(
                                'value' => 'Devise (si c\'est un exemple payé de causerie)',
                                'hint' => "si c'est un exemple payé, mentionnez svp la devise pour par exemple: \'USD\'"
                        ),

                        't1109' => array(
                                'value' => 'Permettez java socket serveur:',
                                'hint' => 'ensemble à rectifier pour permettre le serveur socket - voir les documents en ligne de pdf pour plus de détails'
                        ),

                        't1110' => array(
                                'value' => 'Type de cachette : (pour changer des arrangements de cachette, vous devez réinstaller FlashChat)',
                                'hint' => '0 = aucune mise en antémémoire, 1 = a limité la mise en antémémoire, 2 = complètement cachant'
                        ),

                        't1111' => array(
                                'value' => 'Chemin de cachette:',
                                'hint' => '0 = aucune mise en antémémoire, 1 = a limité la mise en antémémoire, 2 = complètement cachant'
                        ),

                        't1112' => array(
                                'value' => 'Préfixe de dossier de cachette:',
                                'hint' => '0 = aucune mise en antémémoire, 1 = a limité la mise en antémémoire, 2 = complètement cachant'
                        ),

                        't1190' => array(
                                'value' => 'Titre d\'utilisateur dans l\'userlist:',
                                'hint' => 'les valeurs possibles sont toutes les combinaisons d\'AVATAR, USER et STATUS'
                        ),

                        't2' => array(
                                'value' => 'Excentrage de temps de serveur:',
                                'hint' => 'place l\'excentrage de temps de serveur (requis pour corriger seulement le problème de fuseau horaire de serveur)'
                        ),

                        't1192' => array(
                                'value' => 'Ligne texte de coupure:',
                                'hint' => 'ligne texte de coupure'
                        )

                ),

                'cnf_layout' => array(
                        't39' => array(
                                'value' => 'Permettez les interdictions:'
                        ),

                        't40' => array(
                                'value' => 'Permettez les invitations:'
                        ),

                        't41' => array(
                                'value' => 'Laissez ignore:'
                        ),

                        't42' => array(
                                'value' => 'Permettez les profils:'
                        ),

                        't43' => array(
                                'value' => 'Laissez créent des salles:'
                        ),

                        't44' => array(
                                'value' => 'Permettez les parts de dossier:'
                        ),

                        't45' => array(
                                'value' => 'Permettez les milieux faits sur commande:',
                                'hint' => 'si le non, bouton de douane d\'étiquette d\'effets disparaît'
                        ),

                        't46' => array(
                                'value' => 'Montrez le panneau d\'option:'
                        ),

                        't47' => array(
                                'value' => 'Montrez la boîte d\'entrée:'
                        ),

                        't48' => array(
                                'value' => 'Montrez la notation privée:'
                        ),

                        't49' => array(
                                'value' => 'Montrez la notation publique:'
                        ),

                        't50' => array(
                                'value' => 'Montrez la liste utilisateurs:'
                        ),

                        't51' => array(
                                'value' => 'Montrez la déconnexion:'
                        ),

                        't52' => array(
                                'value' => 'Est le mode de chambre pour une personne:',
                                'hint' => 'si oui baisse de pièce-est vers le bas évident'
                        ),

                        't53' => array(
                                'value' => 'Permettez le message privé:'
                        ),

                        't54' => array(
                                'value' => 'Montrez le destinataire:'
                        ),

                        't55' => array(
                                'value' => 'Montrez la liste de statut:'
                        ),

                        't56' => array(
                                'value' => 'Montrez le bouton d\'options:'
                        ),

                        't57' => array(
                                'value' => 'Montrez la liste de couleur:'
                        ),

                        't58' => array(
                                'value' => 'Montrez le bouton de sauvegarde:'
                        ),

                        't59' => array(
                                'value' => 'Montrez le bouton d\'aide:'
                        ),

                        't60' => array(
                                'value' => 'Montrez la liste de smilies:',
                                'hint' => 'débronchement, liste combinée, fenêtre automatique '
                        ),

                        't61' => array(
                                'value' => 'Montrez le bouton clair:'
                        ),

                        't62' => array(
                                'value' => 'Montrez la cloche:'
                        ),

                        't63' => array(
                                'value' => 'Étiquette de thèmes:',
                                'hint' => 'quelles étiquettes à montrer dans le panneau d\'options (au sujet de l\'étiquette ne peut pas être caché)'
                        ),

                        't64' => array(
                                'value' => 'Étiquette de bruits:'
                        ),

                        't65' => array(
                                'value' => 'Étiquette d\'effets:'
                        ),

                        't66' => array(
                                'value' => 'Étiquette des textes:'
                        ),

                        't67' => array(
                                'value' => 'Largeur minimum:',
                                'hint' => 'largeur minimale de vue de liste utilisateurs, Pixel'
                        ),

                        't68' => array(
                                'value' => 'Largeur de défaut:',
                                'hint' => 'largeur exacte d\'userlist, pour cent'
                        ),

                        't69' => array(
                                'value' => 'Largeur relative;',
                                'hint' => 'largeur relative d\'userlist, pour cent'
                        ),

                        't70' => array(
                                'value' => 'Largeur accouplée:',
                                'hint' => 'largeur relative d\'userlist accouplé, pour cent'
                        ),

                        't71' => array(
                                'value' => 'Taille accouplée:',
                                'hint' => 'taille relative d\'userlist accouplé, pour cent'
                        ),

                        't72' => array(
                                'value' => 'Position:',
                                'hint' => 'position sur l\'étape p.v. est RIGHT ou LEFT'
                        ),

                        't73' => array(
                                'value' => 'Taille minimum:',
                                'hint' => 'taille minimale de notation publique, Pixel'
                        ),

                        't74' => array(
                                'value' => 'Taille de défaut:',
                                'hint' => 'taille exacte de notation publique, Pixel'
                        ),

                        't75' => array(
                                'value' => 'Taille relative:',
                                'hint' => 'taille relative de notation publique, pour cent'
                        ),

                        't76' => array(
                                'value' => 'Taille minimum:'
                        ),

                        't77' => array(
                                'value' => 'Taille de défaut:'
                        ),

                        't78' => array(
                                'value' => 'Taille relative:'
                        ),

                        't79' => array(
                                'value' => 'Taille minimum:'
                        ),

                        't80' => array(
                                'value' => 'Taille de défaut:'
                        ),

                        't81' => array(
                                'value' => 'Taille relative:'
                        ),

                        't82' => array(
                                'value' => 'Position:',
                                'hint' => 'position sur l\'étape p.v. est BOTTOM ou TOP'
                        ),

                        't83' => array(
                                'value' => 'Permettez les interdictions:'
                        ),

                        't84' => array(
                                'value' => 'Permettez les invitations:'
                        ),

                        't85' => array(
                                'value' => 'Laissez ignore:'
                        ),

                        't86' => array(
                                'value' => 'Permettez les profils:'
                        ),

                        't87' => array(
                                'value' => 'Laissez créent des salles:'
                        ),

                        't88' => array(
                                'value' => 'Permettez les parts de dossier:'
                        ),

                        't89' => array(
                                'value' => 'Permettez les milieux faits sur commande:',
                                'hint' => 'si le non, bouton de douane d\'étiquette d\'effets disparaît'
                        ),

                        't90' => array(
                                'value' => 'Montrez le panneau d\'option:'
                        ),

                        't91' => array(
                                'value' => 'Montrez la boîte d\'entrée:'
                        ),

                        't92' => array(
                                'value' => 'Montrez la notation privée:'
                        ),

                        't93' => array(
                                'value' => 'Montrez la notation publique:'
                        ),

                        't94' => array(
                                'value' => 'Montrez la liste utilisateurs:'
                        ),

                        't95' => array(
                                'value' => 'Montrez la déconnexion:'
                        ),

                        't96' => array(
                                'value' => 'Est le mode de chambre pour une personne:',
                                'hint' => 'si oui baisse de pièce - est vers le bas évident'
                        ),

                        't97' => array(
                                'value' => 'Permettez le message privé :'
                        ),

                        't98' => array(
                                'value' => 'Montrez le destinataire:'
                        ),

                        't99' => array(
                                'value' => 'Montrez la liste de statut:'
                        ),

                        't100' => array(
                                'value' => 'Montrez le bouton d\'options:'
                        ),

                        't101' => array(
                                'value' => 'Montrez la liste de couleur:'
                        ),

                        't102' => array(
                                'value' => 'Montrez le bouton de sauvegarde:'
                        ),

                        't103' => array(
                                'value' => 'Montrez le bouton d\'aide:'
                        ),

                        't104' => array(
                                'value' => 'Montrez la liste de smilies:',
                                'hint' => 'débronchement, liste combinée, fenêtre automatique'
                        ),

                        't105' => array(
                                'value' => 'Montrez le bouton clair:'
                        ),

                        't106' => array(
                                'value' => 'Montrez la cloche:'
                        ),

                        't107' => array(
                                'value' => 'Étiquette de thèmes:',
                                'hint' => 'quelles étiquettes à montrer dans le panneau d\'options (au sujet de l\'étiquette ne peut pas être caché)'
                        ),

                        't108' => array(
                                'value' => 'Étiquette de bruits:'
                        ),

                        't109' => array(
                                'value' => 'Étiquette d\'effets:'
                        ),

                        't110' => array(
                                'value' => 'Étiquette des textes:'
                        ),

                        't111' => array(
                                'value' => 'Largeur minimum:',
                                'hint' => 'largeur minimale de vue de liste utilisateurs, Pixel'
                        ),

                        't112' => array(
                                'value' => 'Largeur de défaut:',
                                'hint' => 'exact width of userlist, percent'
                        ),

                        't113' => array(
                                'value' => 'Largeur relative:',
                                'hint' => 'largeur relative d\'userlist, pour cent'
                        ),

                        't114' => array(
                                'value' => 'Largeur accouplée:',
                                'hint' => 'largeur relative d\'userlist accouplé, pour cent'
                        ),

                        't115' => array(
                                'value' => 'Taille accouplée:',
                                'hint' => 'taille relative d\'userlist accouplé, pour cent'
                        ),

                        't116' => array(
                                'value' => 'Position:',
                                'hint' => 'position sur l\'étape p.v. est RIGHT ou LEFT'
                        ),

                        't117' => array(
                                'value' => 'Taille minimum:',
                                'hint' => 'taille minimale de notation publique, Pixel'
                        ),

                        't118' => array(
                                'value' => 'Taille de défaut:',
                                'hint' => 'taille exacte de notation publique, Pixel'
                        ),

                        't119' => array(
                                'value' => 'Taille relative:',
                                'hint' => 'taille relative de notation publique, pour cent'
                        ),

                        't120' => array(
                                'value' => 'Taille minimum:'
                        ),

                        't121' => array(
                                'value' => 'Taille de défaut:'
                        ),

                        't122' => array(
                                'value' => 'Taille relative:'
                        ),

                        't123' => array(
                                'value' => 'Taille minimum:'
                        ),

                        't124' => array(
                                'value' => 'Taille de défaut:'
                        ),

                        't125' => array(
                                'value' => 'Taille relative:'
                        ),

                        't126' => array(
                                'value' => 'Position:',
                                'hint' => 'position sur l\'étape p.v. est BOTTOM ou TOP'
                        ),

                        't127' => array(
                                'value' => 'Permettez l\'interdiction:'
                        ),

                        't128' => array(
                                'value' => 'Permettez les invitations:'
                        ),

                        't129' => array(
                                'value' => 'Laissez ignore:'
                        ),

                        't130' => array(
                                'value' => 'Permettez les profils:'
                        ),

                        't131' => array(
                                'value' => 'Laissez créent des salles:'
                        ),

                        't132' => array(
                                'value' => 'Permettez les parts de dossier:'
                        ),

                        't133' => array(
                                'value' => 'Permettez les milieux faits sur commande:',
                                'hint' => 'si le non, bouton de douane d\'étiquette d\'effets disparaît'
                        ),

                        't134' => array(
                                'value' => 'Montrez le panneau d\'option:'
                        ),

                        't135' => array(
                                'value' => 'Montrez la boîte d\'entrée:'
                        ),

                        't136' => array(
                                'value' => 'Montrez la notation privée:'
                        ),

                        't137' => array(
                                'value' => 'Montrez la notation publique:'
                        ),

                        't138' => array(
                                'value' => 'Montrez la liste utilisateurs:'
                        ),

                        't139' => array(
                                'value' => 'Montrez la déconnexion:'
                        ),

                        't140' => array(
                                'value' => 'Est le mode de chambre pour une personne:',
                                'hint' => 'si oui la pièce drop-down est évidente'
                        ),

                        't141' => array(
                                'value' => 'Permettez le message privé:'
                        ),

                        't142' => array(
                                'value' => 'Montrez le destinataire:'
                        ),

                        't143' => array(
                                'value' => 'Montrez la liste de statut:'
                        ),

                        't144' => array(
                                'value' => 'Montrez le bouton d\'options:'
                        ),

                        't145' => array(
                                'value' => 'Montrez la liste de couleur:'
                        ),

                        't146' => array(
                                'value' => 'Montrez le bouton de sauvegarde:'
                        ),

                        't147' => array(
                                'value' => 'Montrez le bouton d\'aide:'
                        ),

                        't148' => array(
                                'value' => 'Montrez la liste de smilies:',
                                'hint' => 'débronchement, liste combinée, fenêtre automatique'
                        ),

                        't149' => array(
                                'value' => 'Montrez le bouton clair:'
                        ),

                        't150' => array(
                                'value' => 'Montrez la cloche:'
                        ),

                        't151' => array(
                                'value' => 'Étiquette de thèmes:',
                                'hint' => 'quelles étiquettes à montrer dans le panneau d\'options (au sujet de l\'étiquette ne peut pas être caché)'
                        ),

                        't152' => array(
                                'value' => 'Étiquette de bruits:'
                        ),

                        't153' => array(
                                'value' => 'Étiquette d\'effets:'
                        ),

                        't154' => array(
                                'value' => 'Étiquette des textes:'
                        ),

                        't155' => array(
                                'value' => 'Largeur minimum:',
                                'hint' => 'largeur minimale de vue de liste utilisateurs, Pixel'
                        ),

                        't156' => array(
                                'value' => 'Largeur de défaut:',
                                'hint' => 'largeur exacte d\'userlist, pour cent'
                        ),

                        't157' => array(
                                'value' => 'Largeur relative:',
                                'hint' => 'largeur relative d\'userlist, pour cent'
                        ),

                        't158' => array(
                                'value' => 'Largeur accouplée:',
                                'hint' => 'largeur relative d\'userlist accouplé, pour cent'
                        ),

                        't159' => array(
                                'value' => 'Taille accouplée:',
                                'hint' => 'taille relative d\'userlist accouplé, pour cent'
                        ),

                        't160' => array(
                                'value' => 'Position:',
                                'hint' => 'la position sur l\'étape p.v. est RIGHT ou LEFT'
                        ),

                        't161' => array(
                                'value' => 'Taille minimum:',
                                'hint' => 'taille minimale de notation publique, Pixel'
                        ),

                        't162' => array(
                                'value' => 'Taille de défaut:',
                                'hint' => 'taille exacte de notation publique, Pixel'
                        ),

                        't163' => array(
                                'value' => 'Taille relative:',
                                'hint' => 'taille relative de notation publique, pour cent'
                        ),

                        't164' => array(
                                'value' => 'Taille minimum:'
                        ),

                        't165' => array(
                                'value' => 'Taille de défaut:'
                        ),

                        't166' => array(
                                'value' => 'Taille relative:'
                        ),

                        't167' => array(
                                'value' => 'Taille minimum:'
                        ),

                        't168' => array(
                                'value' => 'Taille de défaut:'
                        ),

                        't169' => array(
                                'value' => 'Taille relative:'
                        ),

                        't170' => array(
                                'value' => 'Position:',
                                'hint' => 'la position sur l\'étape p.v. est BOTTOM ou TOP'
                        ),

                        't171' => array(
                                'value' => 'Permettez les interdictions:'
                        ),

                        't172' => array(
                                'value' => 'Permettez les invitations:'
                        ),

                        't173' => array(
                                'value' => 'Laissez ignore:'
                        ),

                        't174' => array(
                                'value' => 'Permettez les profils:'
                        ),

                        't175' => array(
                                'value' => 'Laissez créent des salles:'
                        ),

                        't176' => array(
                                'value' => 'Permettez les parts de dossier:'
                        ),

                        't177' => array(
                                'value' => 'Permettez les milieux faits sur commande:',
                                'hint' => 'si le non, bouton de douane d\'étiquette d\'effets disparaît'
                        ),

                        't178' => array(
                                'value' => 'Montrez le panneau d\'option:'
                        ),

                        't179' => array(
                                'value' => 'Montrez la boîte d\'entrée:'
                        ),

                        't180' => array(
                                'value' => 'Montrez la notation privée:'
                        ),

                        't181' => array(
                                'value' => 'Montrez la notation publique:'
                        ),

                        't182' => array(
                                'value' => 'Montrez la liste utilisateurs:'
                        ),

                        't183' => array(
                                'value' => 'Montrez la déconnexion:'
                        ),

                        't184' => array(
                                'value' => 'Est le mode de chambre pour une personne:',
                                'hint' => 'si oui baisse de pièce - est vers le bas évident'
                        ),

                        't185' => array(
                                'value' => 'Permettez le message privé:'
                        ),

                        't186' => array(
                                'value' => 'Montrez le destinataire:'
                        ),

                        't187' => array(
                                'value' => 'Montrez la liste de statut:'
                        ),

                        't188' => array(
                                'value' => 'Montrez le bouton d\'options:'
                        ),

                        't189' => array(
                                'value' => 'Montrez le bouton de sauvegarde:'
                        ),

                        't190' => array(
                                'value' => 'Montrez le bouton d\'aide:'
                        ),

                        't191' => array(
                                'value' => 'Montrez la liste de smilies:',
                                'hint' => 'débronchement, liste combinée, fenêtre automatique'
                        ),

                        't192' => array(
                                'value' => 'Montrez la liste de couleur:'
                        ),

                        't193' => array(
                                'value' => 'Montrez le bouton clair:'
                        ),

                        't194' => array(
                                'value' => 'Montrez la cloche:'
                        ),

                        't195' => array(
                                'value' => 'Étiquette de thèmes:',
                                'hint' => 'quelles étiquettes à montrer dans le panneau d\'options (au sujet de l\'étiquette ne peut pas être caché)'
                        ),

                        't196' => array(
                                'value' => 'Étiquette des textes:'
                        ),

                        't197' => array(
                                'value' => 'Étiquette d\'effets:'
                        ),

                        't198' => array(
                                'value' => 'Étiquette de bruits:'
                        ),

                        't199' => array(
                                'value' => 'Minimum Width:',
                                'hint' => 'minimal width of user list view, pixels'
                        ),

                        't200' => array(
                                'value' => 'Largeur de défaut:',
                                'hint' => 'largeur exacte d\'userlist, pour cent'
                        ),

                        't201' => array(
                                'value' => 'Largeur relative:',
                                'hint' => 'largeur relative d\'userlist, pour cent'
                        ),

                        't202' => array(
                                'value' => 'Largeur accouplée:',
                                'hint' => 'largeur relative d\'userlist accouplé, pour cent'
                        ),

                        't203' => array(
                                'value' => 'Taille accouplée:',
                                'hint' => 'taille relative d\'userlist accouplé, pour cent'
                        ),

                        't204' => array(
                                'value' => 'Position:',
                                'hint' => 'la position sur l\'étape p.v. est RIGHT ou LEFT'
                        ),

                        't205' => array(
                                'value' => 'Taille minimum:',
                                'hint' => 'taille minimale de notation publique, Pixel'
                        ),

                        't206' => array(
                                'value' => 'Taille de défaut:',
                                'hint' => 'taille exacte de notation publique, Pixel'
                        ),

                        't207' => array(
                                'value' => 'Taille relative:',
                                'hint' => 'taille relative de notation publique, pour cent'
                        ),

                        't208' => array(
                                'value' => 'Taille minimum:'
                        ),

                        't209' => array(
                                'value' => 'Taille de défaut:'
                        ),

                        't210' => array(
                                'value' => 'Taille relative:'
                        ),

                        't211' => array(
                                'value' => 'Taille minimum:'
                        ),

                        't212' => array(
                                'value' => 'Taille de défaut:'
                        ),

                        't213' => array(
                                'value' => 'Taille relative:'
                        ),

                        't214' => array(
                                'value' => 'Position:',
                                'hint' => 'la position sur l\'étape p.v. est BOTTOM ou TOP'
                        ),

                        't215' => array(
                                'value' => 'Permettez les interdictions:'
                        ),

                        't216' => array(
                                'value' => 'Permettez les invitations:'
                        ),

                        't217' => array(
                                'value' => 'Laissez ignore:'
                        ),

                        't218' => array(
                                'value' => 'Permettez les profils:'
                        ),

                        't219' => array(
                                'value' => 'Laissez créent des salles:'
                        ),

                        't220' => array(
                                'value' => 'Permettez les parts de dossier:'
                        ),

                        't221' => array(
                                'value' => 'Permettez les milieux faits sur commande:',
                                'hint' => 'si le non, bouton de douane d\'étiquette d\'effets disparaît'
                        ),

                        't222' => array(
                                'value' => 'Montrez le panneau d\'option:'
                        ),

                        't223' => array(
                                'value' => 'Montrez la boîte d\'entrée:'
                        ),

                        't224' => array(
                                'value' => 'Montrez la notation privée:'
                        ),

                        't225' => array(
                                'value' => 'Montrez la notation publique:'
                        ),

                        't226' => array(
                                'value' => 'Montrez la liste utilisateurs:'
                        ),

                        't227' => array(
                                'value' => 'Montrez la déconnexion:'
                        ),

                        't228' => array(
                                'value' => 'Est le mode de chambre pour une personne:',
                                'hint' => 'si oui baisse de pièce - est vers le bas évident'
                        ),

                        't229' => array(
                                'value' => 'Permettez le message privé:'
                        ),

                        't230' => array(
                                'value' => 'Montrez le destinataire:'
                        ),

                        't231' => array(
                                'value' => 'Montrez la liste de statut:'
                        ),

                        't232' => array(
                                'value' => 'Montrez le bouton d\options:'
                        ),

                        't233' => array(
                                'value' => 'Montrez la liste de couleur:'
                        ),

                        't234' => array(
                                'value' => 'Montrez le bouton de sauvegarde:'
                        ),

                        't235' => array(
                                'value' => 'Montrez le bouton d\aide:'
                        ),

                        't236' => array(
                                'value' => 'Montrez la liste de smilies:',
                                'hint' => 'débronchement, liste combinée, fenêtre automatique'
                        ),

                        't237' => array(
                                'value' => 'Montrez le bouton clair:'
                        ),

                        't238' => array(
                                'value' => 'Montrez la cloche:'
                        ),

                        't239' => array(
                                'value' => 'Étiquette de thèmes:',
                                'hint' => 'quelles étiquettes à montrer dans le panneau d\'options (au sujet de l\'étiquette ne peut pas être caché)'
                        ),

                        't240' => array(
                                'value' => 'Étiquette de bruits:'
                        ),

                        't241' => array(
                                'value' => 'Étiquette d\'effets:'
                        ),

                        't242' => array(
                                'value' => 'Étiquette des textes:'
                        ),

                        't243' => array(
                                'value' => 'Largeur minimum:',
                                'hint' => 'largeur minimale de vue de liste utilisateurs, Pixel'
                        ),

                        't244' => array(
                                'value' => 'Largeur de défaut:',
                                'hint' => 'largeur exacte d\'userlist, pour cent'
                        ),

                        't245' => array(
                                'value' => 'Largeur relative:',
                                'hint' => 'largeur relative d\'userlist, pour cent'
                        ),

                        't246' => array(
                                'value' => 'Largeur accouplée:',
                                'hint' => 'largeur relative d\'userlist accouplé, pour cent'
                        ),

                        't247' => array(
                                'value' => 'Taille accouplée:',
                                'hint' => 'taille relative d\'userlist accouplé, pour cent'
                        ),

                        't248' => array(
                                'value' => 'Position:',
                                'hint' => 'la position sur l\'étape p.v. est RIGHT ou LEFT'
                        ),

                        't249' => array(
                                'value' => 'Taille minimum:',
                                'hint' => 'taille minimale de notation publique, Pixel'
                        ),

                        't250' => array(
                                'value' => 'Taille de défaut:',
                                'hint' => 'taille exacte de notation publique, Pixel'
                        ),

                        't251' => array(
                                'value' => 'Taille relative:',
                                'hint' => 'taille relative de notation publique, pour cent'
                        ),

                        't252' => array(
                                'value' => 'Taille minimum:'
                        ),

                        't253' => array(
                                'value' => 'Taille de défaut:'
                        ),

                        't254' => array(
                                'value' => 'Taille relative:'
                        ),

                        't255' => array(
                                'value' => 'Taille minimum:'
                        ),

                        't256' => array(
                                'value' => 'Taille de défaut:'
                        ),

                        't257' => array(
                                'value' => 'Taille relative:'
                        ),

                        't258' => array(
                                'value' => 'Position:',
                                'hint' => 'la position sur l\'étape p.v. est BOTTOM ou TOP'
                        ),

                        't0' => 'Éditez la disposition pour:',
                        't1' => 'Oui',
                        't2' => 'Non',
                        't3' => 'Sauf des arrangements',
                        't4' => 'Barre porte-outils',
                        't5' => 'Panneau d\'options',
                        't6' => 'Contraintes de liste utilisateurs',
                        't7' => 'Contraintes publiques de liste',
                        't8' => 'Contraintes privées de liste',
                        't9' => 'Contraintes de liste d\'entrée',
                ),

                'cnf_logout' => array(
                        't841' => array(
                                'value' => 'FlashChat étroit:',
                                'hint' => 'si oui, alors la fenêtre de FlashChat est fermée sur la déconnexion'
                        ),

                        't842' => array(
                                'value' => 'Réorientez l\'URL:',
                                'hint' => 'le redirectURL doit être un URL valide'
                        ),

                        't843' => array(
                                'value' => 'URL:',
                                'hint' => 'réorientez doit être placé à l\'oui pour que ceci travaille'
                        ),

                        't844' => array(
                                'value' => 'Fenêtre:',
                                'hint' => 'la fenêtre à s\'ouvrir dans. valeurs possibles: _blank, _self,_parent, ou une fenêtre appelée'
                        ),

                        't0' => 'Éditez la disposition pour:'
                ),

                'cnf_modules' => array(
                        't845' => array(
                                'value' => 'Point d\'attache:',
                                'hint' => 'le point d\'attache: -1,0,1,2,3 ou 4 (0 = centré, 1-4 = coins de l\'espace au-dessous du roomlist) + 5-12 point'
                        ),

                        't846' => array(
                                'value' => 'Chemin:',
                                'hint' => "placez à \' \' pour désactiver. Pour voir comment ce travail, emploient \'banner.swf\' ou \'moduletest.swf\'"
                        ),

                        't847' => array(
                                'value' => 'Bout droit:',
                                'hint' => 'si oui, SWF achered streched horizontalement et verticalement au fiil tout l\'espace disponible'
                        ),

                        't848' => array(
                                'value' => 'Défaut x position:',
                                'hint' => "le défaut \'x\' position de la fenêtre de flottement (quand anchor = -1)"
                        ),

                        't849' => array(
                                'value' => 'Défaut y position:',
                                'hint' => "le défaut \'y\' position de la fenêtre de flottement (quand anchor = -1)"
                        ),

                        't850' => array(
                                'value' => 'Largeur de défaut:',
                                'hint' => 'la largeur de défaut de la fenêtre de flottement (quand anchor = -1)'
                        ),

                        't851' => array(
                                'value' => 'Taille de défaut:',
                                'hint' => 'la taille de défaut de la fenêtre de flottement (quand anchor = -1)'
                        ),

                        't0' => 'Il n\'y a aucun module.',
                        't1' => 'Ajoutez le nouveau module',
                        't2' => 'Module',
                        't3' => 'Oui',
                        't4' => 'Non',
                        't5' => 'Suppression',
                        't6' => 'Sauf des arrangements',
			't7' => 'module requires Flash Media Server or Red5 Server',
			't8' => 'Enabled',
			't9' => 'Configure',
			't10' => 'Floating',
			't11' => 'Center of space below Room List',
			't12' => 'Top-Left of space below Room List',
			't13' => 'Top-Right of space below Room List',
			't14' => 'Bottom-Left of space below Room List',
			't15' => 'Bottom-Right of space below Room List',
			't16' => 'Top-Left of Title Bar',
			't17' => 'Top-Center of Title Bar',
			't18' => 'Top-Right of Title Bar',
			't19' => 'Top-Left of Chat Pane',
			't20' => 'Top-Right of Chat Pane',
			't21' => 'Bottom-Right of Chat Pane',
			't22' => 'Bottom-Left of Chat Pane',
			't23' => 'Center of Chat Pane'
                ),

                'cnf_msg' => array(
                        't801' => array(
                                'value' => 'Le message enlèvent ensuite:',
                                'hint' => 'message enlevé après ce temps, seconde'
                        )

                ),

                'cnf_other' => array(
                        't625' => array(
                                'value' => 'Thème de défaut:'
                        ),

                        't634' => array(
                                'value' => 'Peau de défaut:'
                        ),

                        't670' => array(
                                'value' => 'Langue spéciale:'
                        ),

                        't805' => array(
                                'value' => 'Unbanned automatique ensuite:',
                                'hint' => 'temps après que l\'utilisateur unbanned, secondes'
                        ),

                        't806' => array(
                                'value' => 'Langue de défaut:',
                                'hint' => 'code à deux lettres de la langue de défaut (voir ci-dessous)'
                        ),

                        't807' => array(
                                'value' => 'Permettez la langue:',
                                'hint' => 'permettez à l\'utilisateur de choisir une autre langue'
                        ),

                        't808' => array(
                                'value' => 'Base:'
                        ),

                        't809' => array(
                                'value' => 'Montrez l\'IP:',
                                'hint' => 'montrez l\'IP d\'utilisateur et l\'accueillez à /qui si ensemble à oui'
                        ),

                        't810' => array(
                                'value' => 'Utilisateur :',
                                'hint' => 'placez à l\'oui pour produire la liste d\'ordre d\'utilisateur à un PM fenêtre, non pour causer la fenêtre'
                        ),

                        't811' => array(
                                'value' => 'Admin PM:',
                                'hint' => 'placez à l\'oui pour produire la liste de commande de modérateur à un PM fenêtre, non pour causer la fenêtre'
                        ),

                        't812' => array(
                                'value' => 'Salles maximum:',
                                'hint' => 'nombre maximum des salles publiques'
                        ),

                        't0' => 'Oui',
                        't1' => 'Non',
                        't2' => 'Sauf des arrangements'
                ),

                'cnf_preloader' => array(
                        't660' => array(
                                'value' => 'Texte d\'arrangement:'
                        ),

                        't661' => array(
                                'value' => 'Texte de Smilies:'
                        ),

                        't662' => array(
                                'value' => 'Texte principal de causerie:'
                        ),

                        't663' => array(
                                'value' => 'Commencer le texte:'
                        ),

                        't664' => array(
                                'value' => 'Texte OK:'
                        ),

                        't665' => array(
                                'value' => 'Famille de Font:'
                        ),

                        't666' => array(
                                'value' => 'Taille de Font:'
                        ),

                        't667' => array(
                                'value' => 'Couleur de Font:'
                        ),

                        't668' => array(
                                'value' => 'Couleur de fond:'
                        ),

                        't669' => array(
                                'value' => 'Couleur de barre:'
                        ),

                        't985' => array(
                                'value' => 'Montrez le bouton d\'"ouverture":',
                                'hint' => "si faux, \'Ouverture\' le bouton est caché"
                        ),

                        't986' => array(
                                'value' => 'Montrez la barre de titre:',
                                'hint' => 'si fausse, la barre de titre est cachée'
                        ),

                        't987' => array(
                                'value' => 'Thème:'
                        ),

                        't988' => array(
                                'value' => 'Largeur:'
                        ),

                        't989' => array(
                                'value' => 'Taille:'
                        ),

                        't990' => array(
                                'value' => 'Message entré:',
                                'hint' => 'si vrai, le message semble sinon entré'
                        ),

                        't991' => array(
                                'value' => 'Alignez:',
                                'hint' => "\'gauche\' ou \'droite\'"
                        ),

                        't992' => array(
                                'value' => 'Étiquette X:'
                        ),

                        't993' => array(
                                'value' => 'Étiquette Y:'
                        ),

                        't994' => array(
                                'value' => 'Champ X:'
                        ),

                        't995' => array(
                                'value' => 'Champ Y:'
                        ),

                        't996' => array(
                                'value' => 'Type de texte:'
                        ),

                        't997' => array(
                                'value' => 'Largeur des textes:'
                        ),

                        't998' => array(
                                'value' => 'Message entré:'
                        ),

                        't999' => array(
                                'value' => 'Alignez:'
                        ),

                        't1000' => array(
                                'value' => 'Étiquette X:'
                        ),

                        't1001' => array(
                                'value' => 'Étiquette Y:'
                        ),

                        't1002' => array(
                                'value' => 'Champ X:'
                        ),

                        't1003' => array(
                                'value' => 'Champ Y:'
                        ),

                        't1004' => array(
                                'value' => 'Type de texte:'
                        ),

                        't1005' => array(
                                'value' => 'Largeur des textes:'
                        ),

                        't1006' => array(
                                'value' => 'Alignez:'
                        ),

                        't1007' => array(
                                'value' => 'Étiquette X:'
                        ),

                        't1008' => array(
                                'value' => 'Étiquette Y:'
                        ),

                        't1009' => array(
                                'value' => 'Champ X:'
                        ),

                        't1010' => array(
                                'value' => 'Champ Y:'
                        ),

                        't1011' => array(
                                'value' => 'Alignez:'
                        ),

                        't1012' => array(
                                'value' => 'Étiquette X'
                        ),

                        't1013' => array(
                                'value' => 'Étiquette Y'
                        ),

                        't1014' => array(
                                'value' => 'Champ X'
                        ),

                        't1015' => array(
                                'value' => 'Champ Y'
                        ),

                        't1099' => array(
                                'value' => 'Le message a entré:',
                                'hint' => 'si vrai, le message semble sinon entré'
                        ),

                        't1100' => array(
                                'value' => 'Le message a entré:'
                        ),

                        't0' => 'Arrangements de boîte d\'ouverture',
                        't1' => 'Nom d\'utilisateur',
                        't2' => 'Mot de passe',
                        't3' => 'Langue',
                        't4' => 'Titre',
                        't5' => 'Cliquez sur ici pour prendre la couleur',
                        't6' => 'Oui',
                        't7' => 'Non',
                        't8' => 'Sauf des arrangements'
                ),

                'cnf_smilies' => array(
                        't672' => array(
                                'value' => 'Sourire:',
                                'hint' => ''
                        ),

                        't673' => array(
                                'value' => 'Triste:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't674' => array(
                                'value' => 'Clin d\'oeil:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't675' => array(
                                'value' => 'Rire:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't676' => array(
                                'value' => 'Rouge:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't677' => array(
                                'value' => 'Langue:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't678' => array(
                                'value' => 'Demandez:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't679' => array(
                                'value' => 'Crainte:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't680' => array(
                                'value' => 'Bébé:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't681' => array(
                                'value' => 'Frais:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't682' => array(
                                'value' => 'Mal:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't683' => array(
                                'value' => 'Grimace:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't684' => array(
                                'value' => 'Coeur:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't685' => array(
                                'value' => 'Baiser:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't686' => array(
                                'value' => 'Caractère NL:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't687' => array(
                                'value' => 'Ninja:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't688' => array(
                                'value' => 'Pain:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't689' => array(
                                'value' => 'Yeux de pain:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't690' => array(
                                'value' => 'Barre oblique:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't691' => array(
                                'value' => 'Sommeil:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't692' => array(
                                'value' => 'Étrange:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't693' => array(
                                'value' => 'Sifflement:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't694' => array(
                                'value' => 'Merveille:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't695' => array(
                                'value' => 'Appel:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't696' => array(
                                'value' => 'Argent comptant:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't697' => array(
                                'value' => 'Choc:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't698' => array(
                                'value' => 'Contrôle:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't699' => array(
                                'value' => 'Boule:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't700' => array(
                                'value' => 'Tape:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't701' => array(
                                'value' => 'Cri:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't702' => array(
                                'value' => 'Chance:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't703' => array(
                                'value' => 'Nono:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't704' => array(
                                'value' => 'Poinçon:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't705' => array(
                                'value' => 'Crâne:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't706' => array(
                                'value' => 'Ouais:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't707' => array(
                                'value' => 'Yinyang:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't708' => array(
                                'value' => 'La terre:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't709' => array(
                                'value' => 'Huh:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't710' => array(
                                'value' => 'Hypno:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't711' => array(
                                'value' => 'Java:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't712' => array(
                                'value' => 'Non:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't713' => array(
                                'value' => 'Pluie:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't714' => array(
                                'value' => 'Rose:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't715' => array(
                                'value' => 'Usa:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't716' => array(
                                'value' => 'Grande grimace:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't717' => array(
                                'value' => 'Faible:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't718' => array(
                                'value' => 'Contenu malade:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't719' => array(
                                'value' => 'Meow:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't720' => array(
                                'value' => 'Pouces vers le bas:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't721' => array(
                                'value' => 'Pouces vers le haut:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't722' => array(
                                'value' => 'Woof:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't723' => array(
                                'value' => 'Bière:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't724' => array(
                                'value' => 'Musique:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't725' => array(
                                'value' => 'Lecture:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't726' => array(
                                'value' => 'Bulle de mot:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't727' => array(
                                'value' => 'Femelle:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't728' => array(
                                'value' => 'Femelle2:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't729' => array(
                                'value' => 'Mâle:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't730' => array(
                                'value' => 'Mâle2:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't731' => array(
                                'value' => 'Admin:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't732' => array(
                                'value' => 'Modérateur:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't733' => array(
                                'value' => 'Basket-ball:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't734' => array(
                                'value' => 'Bowling:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't735' => array(
                                'value' => 'Cricket:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't736' => array(
                                'value' => 'Football:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't737' => array(
                                'value' => 'Golf:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't738' => array(
                                'value' => 'Hockey:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't739' => array(
                                'value' => 'Navigation:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't740' => array(
                                'value' => 'Le football:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't741' => array(
                                'value' => 'Tennis:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't742' => array(
                                'value' => 'Drapeau de l\'Australie:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't743' => array(
                                'value' => 'Le Brésil:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't744' => array(
                                'value' => 'Drapeau du Canada:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't745' => array(
                                'value' => 'La Chine:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't746' => array(
                                'value' => 'L\'Espagne:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't747' => array(
                                'value' => 'Union européenne:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't748' => array(
                                'value' => 'La France:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't749' => array(
                                'value' => 'L\'Allemagne:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't750' => array(
                                'value' => 'La Grèce:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't751' => array(
                                'value' => 'Drapeau indien:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't752' => array(
                                'value' => 'L\'Italie:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't753' => array(
                                'value' => 'Le Japon:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't754' => array(
                                'value' => 'Drapeau du Mexique:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't755' => array(
                                'value' => 'Drapeau de la Pologne:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't756' => array(
                                'value' => 'Drapeau du Portugal:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't757' => array(
                                'value' => 'La Russie:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't758' => array(
                                'value' => 'Sweeden:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't759' => array(
                                'value' => 'Drapeau de l\'Ukraine:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't760' => array(
                                'value' => 'UK:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

                        't761' => array(
                                'value' => 'Carte des USA:',
                                'hint' => 'désactivez n\'importe quel smilie choisi au loin'
                        ),

			't0' => 'On',
			't1' => 'Off'

                ),

                'cnf_sound' => array(
                        't259' => array(
                                'value' => 'Casserole de défaut:',
                                'hint' => 'gamme de -100 à 100 (gauche..droite)',
                                'r' => '(-100 ... 100)'

                        ),

                        't260' => array(
                                'value' => 'Volume de défaut:',
                                'hint' => 'volume sain de défaut, en pourcentage',
                                'r' => '(0 ... 100)'
                        ),

                        't261' => array(
                                'value' => 'Assourdissez tous:',
                                'hint' => 'assourdissez tout l\'arrangement de défaut'
                        ),

                        't262' => array(
                                'hint' => 'Placez "oui" pour activer ce bruit ou "non" pour mettre hors tension'
                        ),

                        't263' => array(
                                'hint' => 'Placez "oui" pour activer ce bruit ou "non" pour mettre hors tension'
                        ),

                        't264' => array(
                                'hint' => 'Placez "oui" pour activer ce bruit ou "non" pour mettre hors tension'
                        ),

                        't265' => array(
                                'hint' => 'Placez "oui" pour activer ce bruit ou "non" pour mettre hors tension'
                        ),

                        't266' => array(
                                'hint' => 'Placez "oui" pour activer ce bruit ou "non" pour mettre hors tension'
                        ),

                        't267' => array(
                                'hint' => 'Placez "oui" pour activer ce bruit ou "non" pour mettre hors tension'
                        ),

                        't268' => array(
                                'hint' => 'Placez "oui" pour activer ce bruit ou "non" pour mettre hors tension'
                        ),

                        't269' => array(
                                'hint' => 'Placez "oui" pour activer ce bruit ou "non" pour mettre hors tension'
                        ),

                        't270' => array(
                                'hint' => 'Placez "oui" pour activer ce bruit ou "non" pour mettre hors tension'
                        ),

                        't271' => array(
                                'hint' => 'Placez "oui" pour activer ce bruit ou "non" pour mettre hors tension'
                        ),

                        't272' => array(
                                'hint' => 'Placez "oui" pour activer ce bruit ou "non" pour mettre hors tension'
                        ),

                        't273' => array(
                                'hint' => 'Placez "oui" pour activer ce bruit ou "non" pour mettre hors tension'
                        ),

                        't274' => array(
                                'hint' => 'Placez "oui" pour activer ce bruit ou "non" pour mettre hors tension'
                        ),

                        't275' => array(
                                'hint' => 'Placez "oui" pour activer ce bruit ou "non" pour mettre hors tension'
                        ),

                        't276' => array(
                                'hint' => 'Placez "oui" pour activer ce bruit ou "non" pour mettre hors tension'
                        ),

                        't277' => array(
                                'hint' => 'Placez "oui" pour activer ce bruit ou "non" pour mettre hors tension'
                        ),

                        't813' => array(
                                'value' => 'Anneau Bell:',
                                'hint' => 'Placez oui pour activer ce bruit ou non pour mettre hors tension'
                        ),

                        't814' => array(
                                'value' => 'Quittez la pièce:',
                                'hint' => 'Placez oui pour activer ce bruit ou non pour mettre hors tensione'
                        ),

                        't815' => array(
                                'value' => 'L\'autre utilisateur entre:',
                                'hint' => 'Placez oui pour activer ce bruit ou non pour mettre hors tension'
                        ),

                        't816' => array(
                                'value' => 'Recevez le message:',
                                'hint' => 'Placez oui pour activer ce bruit ou non pour mettre hors tension'
                        ),

                        't817' => array(
                                'value' => 'Soumettez le message:',
                                'hint' => 'Placez oui pour activer ce bruit ou non pour mettre hors tension'
                        ),

                        't818' => array(
                                'value' => 'Pièce ouverte/étroite:',
                                'hint' => 'Placez oui pour activer ce bruit ou non pour mettre hors tension'
                        ),

                        't819' => array(
                                'value' => 'Ouverture initiale:',
                                'hint' => 'Placez oui pour activer ce bruit ou non pour mettre hors tension'
                        ),

                        't820' => array(
                                'value' => 'Déconnexion:',
                                'hint' => 'Placez oui pour activer ce bruit ou non pour mettre hors tension'
                        ),

                        't821' => array(
                                'value' => 'Liste combinée ouverte/étroite:',
                                'hint' => 'Placez oui pour activer ce bruit ou non pour mettre hors tension'
                        ),

                        't822' => array(
                                'value' => 'L\'utilisateur a interdit/initialisé:',
                                'hint' => 'Placez oui pour activer ce bruit ou non pour mettre hors tension'
                        ),

                        't823' => array(
                                'value' => 'L\'invitation a reçu:',
                                'hint' => 'Placez oui pour activer ce bruit ou non pour mettre hors tension'
                        ),

                        't824' => array(
                                'value' => 'Le message privé a reçu:',
                                'hint' => 'Placez oui pour activer ce bruit ou non pour mettre hors tension'
                        ),

                        't825' => array(
                                'value' => 'Menu utilisateur MouseOver:',
                                'hint' => 'Placez oui pour activer ce bruit ou non pour mettre hors tension'
                        ),

                        't826' => array(
                                'value' => 'Popup ouvert:',
                                'hint' => 'Placez oui pour activer ce bruit ou non pour mettre hors tension'
                        ),

                        't827' => array(
                                'value' => 'La fin de popup/réduisent au minimum:',
                                'hint' => 'Placez oui pour activer ce bruit ou non pour mettre hors tension'
                        ),

                        't828' => array(
                                'value' => 'Entrez dans la pièce:',
                                'hint' => 'Placez oui pour activer ce bruit ou non pour mettre hors tension'
                        ),

                        't829' => array(
                                'value' => 'Presse principale:',
                                'hint' => 'Placez oui pour activer ce bruit ou non pour mettre hors tension'
                        ),

                        't984' => array(
                                'hint' => 'Placez "oui" pour activer ce bruit ou "non" pour mettre hors tension'
                        ),

                        't0' => 'Oui',
                        't1' => 'Non',
                        't2' => 'Nom sain',
                        't3' => 'Muet',
                        't4' => 'Défaut',
                        't5' => 'Sauf des arrangements'
                ),

                'cnf_theme' => array(
                        't278' => array(
                                'value' => 'Nom de thème:'
                        ),

                        't279' => array(
                                'value' => 'Fond de dialogue:'
                        ),

                        't280' => array(
                                'value' => 'Fond d\'image:'
                        ),

                        't282' => array(
                                'value' => 'Montrez le fond d\'image:'
                        ),

                        't283' => array(
                                'value' => 'Transparent d\'interface utilisateurs:'
                        ),

                        't284' => array(
                                'value' => 'Couleur de titre de dialogue:'
                        ),

                        't285' => array(
                                'value' => 'Couleur de fond de dialogue:'
                        ),

                        't286' => array(
                                'value' => 'Couleur des textes de pièce:'
                        ),

                        't287' => array(
                                'value' => 'Couleur de fond de liste utilisateurs:'
                        ),

                        't288' => array(
                                'value' => 'Couleur de fond de pièce:'
                        ),

                        't289' => array(
                                'value' => 'Entrez dans la pièce informent la couleur:'
                        ),

                        't290' => array(
                                'value' => 'Couleur des textes de bouton:'
                        ),

                        't291' => array(
                                'value' => 'Couleur de bouton:'
                        ),

                        't292' => array(
                                'value' => 'Couleur de presse de bouton:'
                        ),

                        't293' => array(
                                'value' => 'Couleur de frontière de bouton:'
                        ),

                        't294' => array(
                                'value' => 'Le rouleau BG colorent:'
                        ),

                        't295' => array(
                                'value' => 'Scroller BG colorent:'
                        ),

                        't296' => array(
                                'value' => 'Le rouleau BG pressent la couleur:'
                        ),

                        't297' => array(
                                'value' => 'Couleur de fond de boîte d\'entrée:'
                        ),

                        't298' => array(
                                'value' => 'Couleur privée de fond de notation:'
                        ),

                        't299' => array(
                                'value' => 'Couleur publique de fond de notation:'
                        ),

                        't300' => array(
                                'value' => 'Couleur de frontière:'
                        ),

                        't301' => array(
                                'value' => 'Couleur des textes de corps:'
                        ),

                        't302' => array(
                                'value' => 'Couleur des textes de titre:'
                        ),

                        't303' => array(
                                'value' => 'Couleur de fond:'
                        ),

                        't304' => array(
                                'value' => 'Couleur recommandée d\'utilisateur:'
                        ),

                        't305' => array(
                                'value' => 'Couleur de bouton étroit:'
                        ),

                        't306' => array(
                                'value' => 'Couleur de presse de bouton étroit:'
                        ),

                        't307' => array(
                                'value' => 'Couleur de frontière de bouton étroit:'
                        ),

                        't308' => array(
                                'value' => 'Couleur de flèche de bouton étroit:'
                        ),

                        't309' => array(
                                'value' => 'Réduisez au minimum la couleur de bouton:'
                        ),

                        't310' => array(
                                'value' => 'Réduisez au minimum la couleur de presse de bouton:'
                        ),

                        't311' => array(
                                'value' => 'Réduisez au minimum la couleur de frontière de bouton:'
                        ),

                        't312' => array(
                                'value' => 'Vérifiez la couleur:'
                        ),

                        't313' => array(
                                'value' => 'Nom de thème:'
                        ),

                        't314' => array(
                                'value' => 'Fond de dialogue:'
                        ),

                        't315' => array(
                                'value' => 'Fond d\'image:'
                        ),

                        't317' => array(
                                'value' => 'Montrez le fond d\'image:'
                        ),

                        't318' => array(
                                'value' => 'Transparent d\'interface utilisateurs:'
                        ),

                        't319' => array(
                                'value' => 'Couleur de titre de dialogue:'
                        ),

                        't320' => array(
                                'value' => 'Couleur de fond de dialogue:'
                        ),

                        't321' => array(
                                'value' => 'Couleur des textes de pièce:'
                        ),

                        't322' => array(
                                'value' => 'Couleur de fond de pièce:'
                        ),

                        't323' => array(
                                'value' => 'Couleur de fond de liste utilisateurs:'
                        ),

                        't324' => array(
                                'value' => 'Entrez dans la pièce informent la couleur:'
                        ),

                        't325' => array(
                                'value' => 'Couleur des textes de bouton:'
                        ),

                        't326' => array(
                                'value' => 'Couleur de bouton:'
                        ),

                        't327' => array(
                                'value' => 'Couleur de frontière de bouton:'
                        ),

                        't328' => array(
                                'value' => 'Couleur de fond de boîte d\'entrée:'
                        ),

                        't329' => array(
                                'value' => 'Couleur privée de fond de notation:'
                        ),

                        't330' => array(
                                'value' => 'Couleur publique de fond de notation:'
                        ),

                        't331' => array(
                                'value' => 'Couleur de frontière:'
                        ),

                        't332' => array(
                                'value' => 'Couleur des textes de corps:'
                        ),

                        't333' => array(
                                'value' => 'Couleur des textes de titre:'
                        ),

                        't334' => array(
                                'value' => 'Couleur de fond:'
                        ),

                        't335' => array(
                                'value' => 'Couleur recommandée d\'utilisateur:'
                        ),

                        't336' => array(
                                'value' => 'Couleur de bouton étroit:'
                        ),

                        't337' => array(
                                'value' => 'Couleur de presse de bouton étroit:'
                        ),

                        't338' => array(
                                'value' => 'Couleur de frontière de bouton étroit:'
                        ),

                        't339' => array(
                                'value' => 'Couleur de flèche de bouton étroit:'
                        ),

                        't340' => array(
                                'value' => 'Réduisez au minimum la couleur de bouton:'
                        ),

                        't341' => array(
                                'value' => 'Réduisez au minimum la couleur de presse de bouton:'
                        ),

                        't342' => array(
                                'value' => 'Réduisez au minimum la couleur de frontière de bouton:'
                        ),

                        't343' => array(
                                'value' => 'Vérifiez la couleur:'
                        ),

                        't344' => array(
                                'value' => 'Nom de thème:'
                        ),

                        't345' => array(
                                'value' => 'Fond de dialogue:'
                        ),

                        't346' => array(
                                'value' => 'Fond d\'image:'
                        ),

                        't348' => array(
                                'value' => 'Montrez le fond d\'image:'
                        ),

                        't349' => array(
                                'value' => 'Transparent d\'interface utilisateurs:'
                        ),

                        't350' => array(
                                'value' => 'Couleur de titre de dialogue:'
                        ),

                        't351' => array(
                                'value' => 'Couleur de fond de dialogue:'
                        ),

                        't352' => array(
                                'value' => 'Couleur des textes de pièce:'
                        ),

                        't353' => array(
                                'value' => 'Couleur de fond de liste utilisateurs:'
                        ),

                        't354' => array(
                                'value' => 'Couleur de fond de pièce:'
                        ),

                        't355' => array(
                                'value' => 'Entrez dans la pièce informent la couleur:'
                        ),

                        't356' => array(
                                'value' => 'Couleur des textes de bouton:'
                        ),

                        't357' => array(
                                'value' => 'Couleur de bouton:'
                        ),

                        't359' => array(
                                'value' => 'Couleur de frontière de bouton:'
                        ),

                        't361' => array(
                                'value' => 'Couleur de fond de boîte d\'entrée:'
                        ),

                        't362' => array(
                                'value' => 'Couleur privée de fond de notation:'
                        ),

                        't363' => array(
                                'value' => 'Couleur publique de fond de notation:'
                        ),

                        't364' => array(
                                'value' => 'Couleur de frontière:'
                        ),

                        't365' => array(
                                'value' => 'Couleur des textes de corps:'
                        ),

                        't366' => array(
                                'value' => 'Couleur des textes de titre:'
                        ),

                        't367' => array(
                                'value' => 'Couleur de fond:'
                        ),

                        't368' => array(
                                'value' => 'Couleur recommandée d\'utilisateur:'
                        ),

                        't369' => array(
                                'value' => 'Couleur de bouton étroit:'
                        ),

                        't370' => array(
                                'value' => 'Couleur de presse de bouton étroit:'
                        ),

                        't371' => array(
                                'value' => 'Couleur de frontière de bouton étroit:'
                        ),

                        't372' => array(
                                'value' => 'Couleur de flèche de bouton étroit:'
                        ),

                        't373' => array(
                                'value' => 'Réduisez au minimum la couleur de bouton:'
                        ),

                        't374' => array(
                                'value' => 'Réduisez au minimum la couleur de presse de bouton:'
                        ),

                        't375' => array(
                                'value' => 'Réduisez au minimum la couleur de frontière de bouton:'
                        ),

                        't376' => array(
                                'value' => 'Vérifiez la couleur:'
                        ),

                        't377' => array(
                                'value' => 'Nom de thème:'
                        ),

                        't378' => array(
                                'value' => 'Fond de dialogue:'
                        ),

                        't379' => array(
                                'value' => 'Fond d\'image:'
                        ),

                        't381' => array(
                                'value' => 'Montrez le fond d\'image:'
                        ),

                        't382' => array(
                                'value' => 'Transparent d\'interface utilisateurs:'
                        ),

                        't383' => array(
                                'value' => 'Couleur de titre de dialogue:'
                        ),

                        't384' => array(
                                'value' => 'Couleur de fond de dialogue:'
                        ),

                        't385' => array(
                                'value' => 'Couleur des textes de pièce:'
                        ),

                        't386' => array(
                                'value' => 'Couleur de fond de pièce:'
                        ),

                        't387' => array(
                                'value' => 'Couleur de fond de liste utilisateurs:'
                        ),

                        't388' => array(
                                'value' => 'Entrez dans la pièce informent la couleur:'
                        ),

                        't389' => array(
                                'value' => 'Couleur des textes de bouton:'
                        ),

                        't390' => array(
                                'value' => 'Couleur de bouton:'
                        ),

                        't391' => array(
                                'value' => 'Couleur de frontière de bouton:'
                        ),

                        't392' => array(
                                'value' => 'Couleur de fond de boîte d\'entrée:'
                        ),

                        't393' => array(
                                'value' => 'Couleur privée de fond de notation:'
                        ),

                        't394' => array(
                                'value' => 'Couleur publique de fond de notation:'
                        ),

                        't395' => array(
                                'value' => 'Couleur de frontière:'
                        ),

                        't396' => array(
                                'value' => 'Couleur des textes de corps:'
                        ),

                        't397' => array(
                                'value' => 'Couleur des textes de titre:'
                        ),

                        't398' => array(
                                'value' => 'Couleur de fond:'
                        ),

                        't399' => array(
                                'value' => 'Couleur recommandée d\'utilisateur:'
                        ),

                        't400' => array(
                                'value' => 'Couleur de bouton étroit:'
                        ),

                        't401' => array(
                                'value' => 'Couleur de presse de bouton étroit:'
                        ),

                        't402' => array(
                                'value' => 'Couleur de frontière de bouton étroit:'
                        ),

                        't403' => array(
                                'value' => 'Couleur de flèche de bouton étroit:'
                        ),

                        't404' => array(
                                'value' => 'Réduisez au minimum la couleur de bouton:'
                        ),

                        't405' => array(
                                'value' => 'Réduisez au minimum la couleur de presse de bouton:'
                        ),

                        't406' => array(
                                'value' => 'Réduisez au minimum la couleur de frontière de bouton:'
                        ),

                        't407' => array(
                                'value' => 'Vérifiez la couleur:'
                        ),

                        't408' => array(
                                'value' => 'Nom de thème:'
                        ),

                        't409' => array(
                                'value' => 'Fond de dialogue:'
                        ),

                        't410' => array(
                                'value' => 'Fond d\'image:'
                        ),

                        't412' => array(
                                'value' => 'Montrez le fond d\'image:'
                        ),

                        't413' => array(
                                'value' => 'Transparent d\'interface utilisateurs:'
                        ),

                        't414' => array(
                                'value' => 'Couleur de titre de dialogue:'
                        ),

                        't415' => array(
                                'value' => 'Couleur de fond de dialogue:'
                        ),

                        't416' => array(
                                'value' => 'Couleur des textes de pièce:'
                        ),

                        't417' => array(
                                'value' => 'Couleur de fond de pièce:'
                        ),

                        't418' => array(
                                'value' => 'Couleur de fond de liste utilisateurs:'
                        ),

                        't419' => array(
                                'value' => 'Entrez dans la pièce informent la couleur:'
                        ),

                        't420' => array(
                                'value' => 'Couleur des textes de bouton:'
                        ),

                        't421' => array(
                                'value' => 'Button Color:'
                        ),

                        't422' => array(
                                'value' => 'Couleur de frontière de bouton:'
                        ),

                        't423' => array(
                                'value' => 'Couleur de fond de boîte d\'entrée:'
                        ),

                        't424' => array(
                                'value' => 'Couleur privée de fond de notation:'
                        ),

                        't425' => array(
                                'value' => 'Couleur publique de fond de notation:'
                        ),

                        't426' => array(
                                'value' => 'Couleur de frontière:'
                        ),

                        't427' => array(
                                'value' => 'Couleur des textes de corps:'
                        ),

                        't428' => array(
                                'value' => 'Couleur des textes de titre:'
                        ),

                        't429' => array(
                                'value' => 'Couleur de fond:'
                        ),

                        't430' => array(
                                'value' => 'Couleur recommandée d\'utilisateur:'
                        ),

                        't431' => array(
                                'value' => 'Couleur de bouton étroit:'
                        ),

                        't432' => array(
                                'value' => 'Couleur de presse de bouton étroit:'
                        ),

                        't433' => array(
                                'value' => 'Couleur de frontière de bouton étroit:'
                        ),

                        't434' => array(
                                'value' => 'Couleur de flèche de bouton étroit:'
                        ),

                        't435' => array(
                                'value' => 'Réduisez au minimum la couleur de bouton:'
                        ),

                        't436' => array(
                                'value' => 'Réduisez au minimum la couleur de presse de bouton:'
                        ),

                        't437' => array(
                                'value' => 'Réduisez au minimum la couleur de frontière de bouton:'
                        ),

                        't438' => array(
                                'value' => 'Vérifiez la couleur:'
                        ),

                        't439' => array(
                                'value' => 'Nom de thème:'
                        ),

                        't440' => array(
                                'value' => 'Fond de dialogue:'
                        ),

                        't441' => array(
                                'value' => 'Fond d\'image:'
                        ),

                        't443' => array(
                                'value' => 'Montrez le fond d\'image:'
                        ),

                        't444' => array(
                                'value' => 'Transparent d\'interface utilisateurs:'
                        ),

                        't445' => array(
                                'value' => 'Couleur de titre de dialogue:'
                        ),

                        't446' => array(
                                'value' => 'Couleur de fond de dialogue:'
                        ),

                        't447' => array(
                                'value' => 'Couleur des textes de pièce:'
                        ),

                        't448' => array(
                                'value' => 'Couleur de fond de pièce:'
                        ),

                        't449' => array(
                                'value' => 'Couleur de fond de liste utilisateurs:'
                        ),

                        't450' => array(
                                'value' => 'Entrez dans la pièce informent la couleur:'
                        ),

                        't451' => array(
                                'value' => 'Couleur des textes de bouton:'
                        ),

                        't452' => array(
                                'value' => 'Couleur de bouton:'
                        ),

                        't453' => array(
                                'value' => 'Couleur de frontière de bouton :'
                        ),

                        't454' => array(
                                'value' => 'Couleur de fond de boîte d\'entrée:'
                        ),

                        't455' => array(
                                'value' => 'Couleur privée de fond de notation:'
                        ),

                        't456' => array(
                                'value' => 'Couleur publique de fond de notation:'
                        ),

                        't457' => array(
                                'value' => 'Couleur de frontière:'
                        ),

                        't458' => array(
                                'value' => 'Couleur des textes de corps:'
                        ),

                        't459' => array(
                                'value' => 'Couleur des textes de titre:'
                        ),

                        't460' => array(
                                'value' => 'Couleur de fond:'
                        ),

                        't461' => array(
                                'value' => 'Couleur recommandée d\'utilisateur:'
                        ),

                        't462' => array(
                                'value' => 'Couleur de bouton étroit:'
                        ),

                        't463' => array(
                                'value' => 'Couleur de presse de bouton étroit:'
                        ),

                        't464' => array(
                                'value' => 'Couleur de frontière de bouton étroit:'
                        ),

                        't465' => array(
                                'value' => 'Couleur de flèche de bouton étroit:'
                        ),

                        't466' => array(
                                'value' => 'Réduisez au minimum la couleur de bouton:'
                        ),

                        't467' => array(
                                'value' => 'Réduisez au minimum la couleur de presse de bouton:'
                        ),

                        't468' => array(
                                'value' => 'Réduisez au minimum la couleur de frontière de bouton:'
                        ),

                        't469' => array(
                                'value' => 'Vérifiez la couleur:'
                        ),

                        't470' => array(
                                'value' => 'Nom de thème:'
                        ),

                        't471' => array(
                                'value' => 'Fond de dialogue:'
                        ),

                        't472' => array(
                                'value' => 'Fond d\'image:'
                        ),

                        't474' => array(
                                'value' => 'Montrez le fond d\'image:'
                        ),

                        't475' => array(
                                'value' => 'Transparent d\'interface utilisateurs:'
                        ),

                        't476' => array(
                                'value' => 'Couleur de titre de dialogue:'
                        ),

                        't477' => array(
                                'value' => 'Couleur de fond de dialogue:'
                        ),

                        't478' => array(
                                'value' => 'Couleur des textes de pièce:'
                        ),

                        't479' => array(
                                'value' => 'Couleur de fond de pièce:'
                        ),

                        't480' => array(
                                'value' => 'Couleur de fond de liste utilisateurs:'
                        ),

                        't481' => array(
                                'value' => 'Entrez dans la pièce informent la couleur:'
                        ),

                        't482' => array(
                                'value' => 'Couleur des textes de bouton:'
                        ),

                        't483' => array(
                                'value' => 'Couleur de bouton:'
                        ),

                        't484' => array(
                                'value' => 'Couleur de bouton:'
                        ),

                        't485' => array(
                                'value' => 'Couleur de fond de boîte d\'entrée :'
                        ),

                        't486' => array(
                                'value' => 'Couleur privée de fond de notation:'
                        ),

                        't487' => array(
                                'value' => 'Couleur publique de fond de notation:'
                        ),

                        't488' => array(
                                'value' => 'Couleur de frontière:'
                        ),

                        't489' => array(
                                'value' => 'Couleur des textes de corps:'
                        ),

                        't490' => array(
                                'value' => 'Couleur des textes de titre:'
                        ),

                        't491' => array(
                                'value' => 'Couleur de fond:'
                        ),

                        't492' => array(
                                'value' => 'Couleur recommandée d\'utilisateur:'
                        ),

                        't493' => array(
                                'value' => 'Couleur de bouton étroit:'
                        ),

                        't494' => array(
                                'value' => 'Couleur de presse de bouton étroit:'
                        ),

                        't495' => array(
                                'value' => 'Couleur de frontière de bouton étroit:'
                        ),

                        't496' => array(
                                'value' => 'Couleur de flèche de bouton étroit:'
                        ),

                        't497' => array(
                                'value' => 'Réduisez au minimum la couleur de bouton:'
                        ),

                        't498' => array(
                                'value' => 'Réduisez au minimum la couleur de presse de bouton:'
                        ),

                        't499' => array(
                                'value' => 'Réduisez au minimum la couleur de frontière de bouton:'
                        ),

                        't500' => array(
                                'value' => 'Vérifiez la couleur:'
                        ),

                        't501' => array(
                                'value' => 'Nom de thème:'
                        ),

                        't502' => array(
                                'value' => 'Fond de dialogue:'
                        ),

                        't503' => array(
                                'value' => 'Fond d\'image:'
                        ),

                        't505' => array(
                                'value' => 'Montrez le fond d\'image:'
                        ),

                        't506' => array(
                                'value' => 'Transparent d\'interface utilisateurs:'
                        ),

                        't507' => array(
                                'value' => 'Couleur de titre de dialogue:'
                        ),

                        't508' => array(
                                'value' => 'Couleur de fond de dialogue:'
                        ),

                        't509' => array(
                                'value' => 'Couleur des textes de pièce:'
                        ),

                        't510' => array(
                                'value' => 'Couleur de fond de pièce:'
                        ),

                        't511' => array(
                                'value' => 'Couleur de fond de liste utilisateurs:'
                        ),

                        't512' => array(
                                'value' => 'Entrez dans la pièce informent la couleur:'
                        ),

                        't513' => array(
                                'value' => 'Couleur des textes de bouton:'
                        ),

                        't514' => array(
                                'value' => 'Couleur de bouton:'
                        ),

                        't515' => array(
                                'value' => 'Couleur de frontière de bouton:'
                        ),

                        't516' => array(
                                'value' => 'Couleur de fond de boîte d\'entrée:'
                        ),

                        't517' => array(
                                'value' => 'Couleur privée de fond de notation:'
                        ),

                        't518' => array(
                                'value' => 'Couleur publique de fond de notation:'
                        ),

                        't519' => array(
                                'value' => 'Couleur de frontière:'
                        ),

                        't520' => array(
                                'value' => 'Couleur des textes de corps:'
                        ),

                        't521' => array(
                                'value' => 'Couleur des textes de titre:'
                        ),

                        't522' => array(
                                'value' => 'Couleur de fond:'
                        ),

                        't523' => array(
                                'value' => 'Couleur recommandée d\'utilisateur:'
                        ),

                        't524' => array(
                                'value' => 'Couleur de bouton étroit:'
                        ),

                        't525' => array(
                                'value' => 'Couleur de presse de bouton étroit:'
                        ),

                        't526' => array(
                                'value' => 'Couleur de frontière de bouton étroit:'
                        ),

                        't527' => array(
                                'value' => 'Couleur de flèche de bouton étroit:'
                        ),

                        't528' => array(
                                'value' => 'Réduisez au minimum la couleur de bouton:'
                        ),

                        't529' => array(
                                'value' => 'Réduisez au minimum la couleur de presse de bouton:'
                        ),

                        't530' => array(
                                'value' => 'Réduisez au minimum la couleur de frontière de bouton:'
                        ),

                        't531' => array(
                                'value' => 'Vérifiez la couleur:'
                        ),

                        't532' => array(
                                'value' => 'Nom de thème:'
                        ),

                        't533' => array(
                                'value' => 'Fond de dialogue:'
                        ),

                        't534' => array(
                                'value' => 'Fond d\'image:'
                        ),

                        't536' => array(
                                'value' => 'Montrez le fond d\'image:'
                        ),

                        't537' => array(
                                'value' => 'Transparent d\'interface utilisateurs:'
                        ),

                        't538' => array(
                                'value' => 'Couleur de titre de dialogue:'
                        ),

                        't539' => array(
                                'value' => 'Couleur de fond de dialogue:'
                        ),

                        't540' => array(
                                'value' => 'Couleur des textes de pièce:'
                        ),

                        't541' => array(
                                'value' => 'Couleur de fond de pièce:'
                        ),

                        't542' => array(
                                'value' => 'Couleur de fond de liste utilisateurs:'
                        ),

                        't543' => array(
                                'value' => 'Entrez dans la pièce informent la couleur:'
                        ),

                        't544' => array(
                                'value' => 'Couleur des textes de bouton:'
                        ),

                        't545' => array(
                                'value' => 'Couleur de bouton:'
                        ),

                        't546' => array(
                                'value' => 'Couleur de frontière de bouton:'
                        ),

                        't547' => array(
                                'value' => 'Couleur de fond de boîte d\'entrée:'
                        ),

                        't548' => array(
                                'value' => 'Couleur privée de fond de notation:'
                        ),

                        't549' => array(
                                'value' => 'Couleur publique de fond de notation:'
                        ),

                        't550' => array(
                                'value' => 'Couleur de frontière:'
                        ),

                        't551' => array(
                                'value' => 'Couleur des textes de corps:'
                        ),

                        't552' => array(
                                'value' => 'Couleur des textes de titre:'
                        ),

                        't553' => array(
                                'value' => 'Couleur de fond:'
                        ),

                        't554' => array(
                                'value' => 'Couleur recommandée d\'utilisateur:'
                        ),

                        't555' => array(
                                'value' => 'Couleur de bouton étroit:'
                        ),

                        't556' => array(
                                'value' => 'Couleur de presse de bouton étroit:'
                        ),

                        't557' => array(
                                'value' => 'Couleur de frontière de bouton étroit:'
                        ),

                        't558' => array(
                                'value' => 'Couleur de flèche de bouton étroit:'
                        ),

                        't559' => array(
                                'value' => 'Réduisez au minimum la couleur de bouton:'
                        ),

                        't560' => array(
                                'value' => 'Réduisez au minimum la couleur de presse de bouton:'
                        ),

                        't561' => array(
                                'value' => 'Réduisez au minimum la couleur de frontière de bouton:'
                        ),

                        't562' => array(
                                'value' => 'Vérifiez la couleur:'
                        ),

                        't563' => array(
                                'value' => 'Nom de thème:'
                        ),

                        't564' => array(
                                'value' => 'Fond de dialogue:'
                        ),

                        't565' => array(
                                'value' => 'Fond d\'image:'
                        ),

                        't567' => array(
                                'value' => 'Montrez le fond d\'image:'
                        ),

                        't568' => array(
                                'value' => 'Transparent d\'interface utilisateurs:'
                        ),

                        't569' => array(
                                'value' => 'Couleur de titre de dialogue:'
                        ),

                        't570' => array(
                                'value' => 'Couleur de fond de dialogue:'
                        ),

                        't571' => array(
                                'value' => 'Couleur des textes de pièce:'
                        ),

                        't572' => array(
                                'value' => 'Couleur de fond de pièce:'
                        ),

                        't573' => array(
                                'value' => 'Couleur de fond de liste utilisateurs:'
                        ),

                        't574' => array(
                                'value' => 'Entrez dans la pièce informent la couleur:'
                        ),

                        't575' => array(
                                'value' => 'Couleur des textes de bouton:'
                        ),

                        't576' => array(
                                'value' => 'Couleur de bouton:'
                        ),

                        't577' => array(
                                'value' => 'Couleur de frontière de bouton:'
                        ),

                        't578' => array(
                                'value' => 'Couleur de fond de boîte d\'entrée:'
                        ),

                        't579' => array(
                                'value' => 'Couleur privée de fond de notation:'
                        ),

                        't580' => array(
                                'value' => 'Couleur publique de fond de notation:'
                        ),

                        't581' => array(
                                'value' => 'Couleur de frontière:'
                        ),

                        't582' => array(
                                'value' => 'Couleur des textes de corps:'
                        ),

                        't583' => array(
                                'value' => 'Couleur des textes de titre:'
                        ),

                        't584' => array(
                                'value' => 'Couleur de fond:'
                        ),

                        't585' => array(
                                'value' => 'Couleur recommandée d\'utilisateur:'
                        ),

                        't586' => array(
                                'value' => 'Couleur de bouton étroit:'
                        ),

                        't587' => array(
                                'value' => 'Couleur de presse de bouton étroit:'
                        ),

                        't588' => array(
                                'value' => 'Couleur de frontière de bouton étroit:'
                        ),

                        't589' => array(
                                'value' => 'Couleur de flèche de bouton étroit:'
                        ),

                        't590' => array(
                                'value' => 'Minimize Button Color:'
                        ),

                        't591' => array(
                                'value' => 'Réduisez au minimum la couleur de presse de bouton:'
                        ),

                        't592' => array(
                                'value' => 'Réduisez au minimum la couleur de frontière de bouton:'
                        ),

                        't593' => array(
                                'value' => 'Vérifiez la couleur:'
                        ),

                        't594' => array(
                                'value' => 'Nom de thème:'
                        ),

                        't595' => array(
                                'value' => 'Fond de dialogue:'
                        ),

                        't596' => array(
                                'value' => 'Fond d\'image:'
                        ),

                        't598' => array(
                                'value' => 'Montrez le fond d\'image:'
                        ),

                        't599' => array(
                                'value' => 'Transparent d\'interface utilisateurs:'
                        ),

                        't600' => array(
                                'value' => 'Couleur de titre de dialogue:'
                        ),

                        't601' => array(
                                'value' => 'Couleur de fond de dialogue:'
                        ),

                        't602' => array(
                                'value' => 'Couleur des textes de pièce:'
                        ),

                        't603' => array(
                                'value' => 'Couleur de fond de pièce:'
                        ),

                        't604' => array(
                                'value' => 'Couleur de fond de liste utilisateurs:'
                        ),

                        't605' => array(
                                'value' => 'Entrez dans la pièce informent la couleur:'
                        ),

                        't606' => array(
                                'value' => 'Couleur des textes de bouton:'
                        ),

                        't607' => array(
                                'value' => 'Couleur de bouton:'
                        ),

                        't608' => array(
                                'value' => 'Couleur de frontière de bouton:'
                        ),

                        't609' => array(
                                'value' => 'Couleur de fond de boîte d\'entrée:'
                        ),

                        't610' => array(
                                'value' => 'Couleur privée de fond de notation:'
                        ),

                        't611' => array(
                                'value' => 'Couleur publique de fond de notation:'
                        ),

                        't612' => array(
                                'value' => 'Couleur de frontière:'
                        ),

                        't613' => array(
                                'value' => 'Couleur des textes de corps:'
                        ),

                        't614' => array(
                                'value' => 'Couleur des textes de titre:'
                        ),

                        't615' => array(
                                'value' => 'Couleur de fond:'
                        ),

                        't616' => array(
                                'value' => 'Couleur recommandée d\'utilisateur:'
                        ),

                        't617' => array(
                                'value' => 'Couleur de bouton étroit:'
                        ),

                        't618' => array(
                                'value' => 'Couleur de presse de bouton étroit:'
                        ),

                        't619' => array(
                                'value' => 'Couleur de frontière de bouton étroit:'
                        ),

                        't620' => array(
                                'value' => 'Couleur de flèche de bouton étroit:'
                        ),

                        't621' => array(
                                'value' => 'Réduisez au minimum la couleur de bouton:'
                        ),

                        't622' => array(
                                'value' => 'Réduisez au minimum la couleur de presse de bouton:'
                        ),

                        't623' => array(
                                'value' => 'Réduisez au minimum la couleur de frontière de bouton:'
                        ),

                        't624' => array(
                                'value' => 'Vérifiez la couleur:'
                        ),

                        't1016' => array(
                                'value' => 'Fond de commandes'
                        ),

                        't1017' => array(
                                'value' => 'Titre'
                        ),

                        't1018' => array(
                                'value' => 'Frontière de rouleau'
                        ),

                        't1019' => array(
                                'value' => 'Article de liste utilisateurs'
                        ),

                        't1020' => array(
                                'value' => 'Presse de bouton'
                        ),

                        't1021' => array(
                                'value' => 'Fond de commandes'
                        ),

                        't1022' => array(
                                'value' => 'Titre'
                        ),

                        't1023' => array(
                                'value' => 'Fond de rouleau'
                        ),

                        't1024' => array(
                                'value' => 'Presse de fond de rouleau'
                        ),

                        't1025' => array(
                                'value' => 'Frontière de rouleau'
                        ),

                        't1026' => array(
                                'value' => 'Fond de Scroller'
                        ),

                        't1027' => array(
                                'value' => 'Article de liste utilisateurs'
                        ),

                        't1028' => array(
                                'value' => 'Fond de commandes'
                        ),

                        't1029' => array(
                                'value' => 'Titre'
                        ),

                        't1030' => array(
                                'value' => 'Fond de rouleau'
                        ),

                        't1031' => array(
                                'value' => 'Presse de fond de rouleau'
                        ),

                        't1032' => array(
                                'value' => 'Frontière de rouleau'
                        ),

                        't1033' => array(
                                'value' => 'Article de liste utilisateurs'
                        ),

                        't1034' => array(
                                'value' => 'Presse de bouton'
                        ),

                        't1035' => array(
                                'value' => 'Fond de commandes'
                        ),

                        't1036' => array(
                                'value' => 'Titre'
                        ),

                        't1037' => array(
                                'value' => 'Fond de rouleau'
                        ),

                        't1038' => array(
                                'value' => 'Presse de fond de rouleau'
                        ),

                        't1039' => array(
                                'value' => 'Frontière de rouleau'
                        ),

                        't1040' => array(
                                'value' => 'Fond de Scroller'
                        ),

                        't1041' => array(
                                'value' => 'Article de liste utilisateurs'
                        ),

                        't1042' => array(
                                'value' => 'Presse de bouton'
                        ),

                        't1043' => array(
                                'value' => 'Fond de commandes'
                        ),

                        't1044' => array(
                                'value' => 'Titre'
                        ),

                        't1045' => array(
                                'value' => 'Fond de rouleau'
                        ),

                        't1046' => array(
                                'value' => 'Presse de fond de rouleau'
                        ),

                        't1047' => array(
                                'value' => 'Frontière de rouleau'
                        ),

                        't1048' => array(
                                'value' => 'Fond de Scroller'
                        ),

                        't1049' => array(
                                'value' => 'Article de liste utilisateurs'
                        ),

                        't1050' => array(
                                'value' => 'Presse de bouton'
                        ),

                        't1051' => array(
                                'value' => 'Fond de commandes'
                        ),

                        't1052' => array(
                                'value' => 'Titre'
                        ),

                        't1053' => array(
                                'value' => 'Fond de rouleau'
                        ),

                        't1054' => array(
                                'value' => 'Presse de fond de rouleau'
                        ),

                        't1055' => array(
                                'value' => 'Frontière de rouleau'
                        ),

                        't1056' => array(
                                'value' => 'Fond de Scroller'
                        ),

                        't1057' => array(
                                'value' => 'Article de liste utilisateurs'
                        ),

                        't1058' => array(
                                'value' => 'Presse de bouton'
                        ),

                        't1059' => array(
                                'value' => 'Fond de commandes'
                        ),

                        't1060' => array(
                                'value' => 'Titre'
                        ),

                        't1061' => array(
                                'value' => 'Fond de rouleau'
                        ),

                        't1062' => array(
                                'value' => 'Presse de fond de rouleau'
                        ),

                        't1063' => array(
                                'value' => 'Frontière de rouleau'
                        ),

                        't1064' => array(
                                'value' => 'Fond de Scroller'
                        ),

                        't1065' => array(
                                'value' => 'Article de liste utilisateurs'
                        ),

                        't1066' => array(
                                'value' => 'Presse de bouton'
                        ),

                        't1067' => array(
                                'value' => 'Fond de commandes'
                        ),

                        't1068' => array(
                                'value' => 'Titre'
                        ),

                        't1069' => array(
                                'value' => 'Fond de rouleau'
                        ),

                        't1070' => array(
                                'value' => 'Presse de fond de rouleau'
                        ),

                        't1071' => array(
                                'value' => 'Frontière de rouleau'
                        ),

                        't1072' => array(
                                'value' => 'Fond de Scroller'
                        ),

                        't1073' => array(
                                'value' => 'Article de liste utilisateurs'
                        ),

                        't1074' => array(
                                'value' => 'Presse de bouton'
                        ),

                        't1075' => array(
                                'value' => 'Fond de commandes'
                        ),

                        't1076' => array(
                                'value' => 'Titre'
                        ),

                        't1077' => array(
                                'value' => 'Fond de rouleau'
                        ),

                        't1078' => array(
                                'value' => 'Presse de fond de rouleau'
                        ),

                        't1079' => array(
                                'value' => 'Frontière de rouleau'
                        ),

                        't1080' => array(
                                'value' => 'Fond de Scroller'
                        ),

                        't1081' => array(
                                'value' => 'Article de liste utilisateurs'
                        ),

                        't1082' => array(
                                'value' => 'Presse de bouton'
                        ),

                        't1083' => array(
                                'value' => 'Fond de commandes'
                        ),

                        't1084' => array(
                                'value' => 'Titre'
                        ),

                        't1085' => array(
                                'value' => 'Fond de rouleau'
                        ),

                        't1086' => array(
                                'value' => 'Presse de fond de rouleau'
                        ),

                        't1087' => array(
                                'value' => 'Frontière de rouleau'
                        ),

                        't1088' => array(
                                'value' => 'Fond de Scroller'
                        ),

                        't1089' => array(
                                'value' => 'Article de liste utilisateurs'
                        ),

                        't1090' => array(
                                'value' => 'Presse de bouton'
                        ),

                        't1091' => array(
                                'value' => 'Fond de commandes'
                        ),

                        't1092' => array(
                                'value' => 'Titre'
                        ),

                        't1093' => array(
                                'value' => 'Fond de rouleau'
                        ),

                        't1094' => array(
                                'value' => 'Presse de fond de rouleau'
                        ),

                        't1095' => array(
                                'value' => 'Frontière de rouleau'
                        ),

                        't1096' => array(
                                'value' => 'Fond de Scroller'
                        ),

                        't1097' => array(
                                'value' => 'Article de liste utilisateurs'
                        ),

                        't1113' => array(
                                'value' => 'Couleur de presse de bouton:'
                        ),

                        't1114' => array(
                                'value' => 'Le rouleau BG colorent:'
                        ),

                        't1118' => array(
                                'value' => 'Nom de thème:'
                        ),

                        't1119' => array(
                                'value' => 'Fond de dialogue:'
                        ),

                        't1120' => array(
                                'value' => 'Fond d\'image:'
                        ),

                        't1122' => array(
                                'value' => 'Montrez le fond d\'image:'
                        ),

                        't1123' => array(
                                'value' => 'Transparent d\'interface utilisateurs:'
                        ),

                        't1124' => array(
                                'value' => 'Couleur de titre de dialogue:'
                        ),

                        't1125' => array(
                                'value' => 'Couleur de fond de dialogue:'
                        ),

                        't1126' => array(
                                'value' => 'Couleur des textes de pièce:'
                        ),

                        't1127' => array(
                                'value' => 'Couleur de fond de pièce:'
                        ),

                        't1128' => array(
                                'value' => 'Couleur de fond de liste utilisateurs:'
                        ),

                        't1129' => array(
                                'value' => 'Entrez dans la pièce informent la couleur:'
                        ),

                        't1130' => array(
                                'value' => 'Couleur des textes de bouton:'
                        ),

                        't1131' => array(
                                'value' => 'Couleur de bouton:'
                        ),

                        't1132' => array(
                                'value' => 'Couleur de frontière de bouton:'
                        ),

                        't1133' => array(
                                'value' => 'Couleur de fond de boîte d\'entrée:'
                        ),

                        't1134' => array(
                                'value' => 'Couleur privée de fond de notation:'
                        ),

                        't1135' => array(
                                'value' => 'Couleur publique de fond de notation:'
                        ),

                        't1136' => array(
                                'value' => 'Couleur de frontière:'
                        ),

                        't1137' => array(
                                'value' => 'Couleur des textes de corps:'
                        ),

                        't1138' => array(
                                'value' => 'Couleur des textes de titre:'
                        ),

                        't1139' => array(
                                'value' => 'Couleur de fond:'
                        ),

                        't1140' => array(
                                'value' => 'Couleur recommandée d\'utilisateur:'
                        ),

                        't1141' => array(
                                'value' => 'Couleur de bouton étroit:'
                        ),

                        't1142' => array(
                                'value' => 'Couleur de presse de bouton étroit:'
                        ),

                        't1143' => array(
                                'value' => 'Couleur de frontière de bouton étroit:'
                        ),

                        't1144' => array(
                                'value' => 'Couleur de flèche de bouton étroit:'
                        ),

                        't1145' => array(
                                'value' => 'Réduisez au minimum la couleur de bouton:'
                        ),

                        't1146' => array(
                                'value' => 'Réduisez au minimum la couleur de presse de bouton:'
                        ),

                        't1147' => array(
                                'value' => 'Réduisez au minimum la couleur de frontière de bouton:'
                        ),

                        't1148' => array(
                                'value' => 'Vérifiez la couleur:'
                        ),

                        't1149' => array(
                                'value' => 'Presse de bouton'
                        ),

                        't1150' => array(
                                'value' => 'Fond de commandes'
                        ),

                        't1151' => array(
                                'value' => 'Titre'
                        ),

                        't1152' => array(
                                'value' => 'Fond de rouleau'
                        ),

                        't1153' => array(
                                'value' => 'Presse de fond de rouleau'
                        ),

                        't1154' => array(
                                'value' => 'Frontière de rouleau'
                        ),

                        't1155' => array(
                                'value' => 'Fond de Scroller'
                        ),

                        't1156' => array(
                                'value' => 'Article de liste utilisateurs'
                        ),

                        't1157' => array(
                                'value' => 'Nom de thème:'
                        ),

                        't1158' => array(
                                'value' => 'Fond de dialogue:'
                        ),

                        't1159' => array(
                                'value' => 'Fond d\'image:'
                        ),

                        't1161' => array(
                                'value' => 'Montrez le fond d\'image:'
                        ),

                        't1162' => array(
                                'value' => 'Montrez le fond d\'image:'
                        ),

                        't1163' => array(
                                'value' => 'Couleur de titre de dialogue:'
                        ),

                        't1164' => array(
                                'value' => 'Couleur de fond de dialogue:'
                        ),

                        't1165' => array(
                                'value' => 'Couleur des textes de pièce:'
                        ),

                        't1166' => array(
                                'value' => 'Couleur de fond de liste utilisateurs:'
                        ),

                        't1167' => array(
                                'value' => 'Couleur de fond de pièce:'
                        ),

                        't1168' => array(
                                'value' => 'Entrez dans la pièce informent la couleur:'
                        ),

                        't1169' => array(
                                'value' => 'Couleur des textes de bouton:'
                        ),

                        't1170' => array(
                                'value' => 'Couleur de bouton:'
                        ),

                        't1171' => array(
                                'value' => 'Couleur de presse de bouton:'
                        ),

                        't1172' => array(
                                'value' => 'Couleur de frontière de bouton:'
                        ),

                        't1173' => array(
                                'value' => 'Scroller BG colorent:'
                        ),

                        't1174' => array(
                                'value' => 'Couleur de fond de boîte d\'entrée:'
                        ),

                        't1175' => array(
                                'value' => 'Couleur privée de fond de notation:'
                        ),

                        't1176' => array(
                                'value' => 'Couleur publique de fond de notation:'
                        ),

                        't1177' => array(
                                'value' => 'Couleur de frontière:'
                        ),

                        't1178' => array(
                                'value' => 'Couleur des textes de corps:'
                        ),

                        't1179' => array(
                                'value' => 'Couleur des textes de titre:'
                        ),

                        't1180' => array(
                                'value' => 'Couleur de fond:'
                        ),

                        't1181' => array(
                                'value' => 'Couleur recommandée d\'utilisateur:'
                        ),

                        't1182' => array(
                                'value' => 'Couleur de bouton étroit:'
                        ),

                        't1183' => array(
                                'value' => 'Couleur de presse de bouton étroit:'
                        ),

                        't1184' => array(
                                'value' => 'Couleur de frontière de bouton étroit:'
                        ),

                        't1185' => array(
                                'value' => 'Couleur de flèche de bouton étroit:'
                        ),

                        't1186' => array(
                                'value' => 'Réduisez au minimum la couleur de bouton:'
                        ),

                        't1187' => array(
                                'value' => 'Réduisez au minimum la couleur de presse de bouton:'
                        ),

                        't1188' => array(
                                'value' => 'Réduisez au minimum la couleur de frontière de bouton:'
                        ),

                        't1189' => array(
                                'value' => 'Vérifiez la couleur:'
                        ),

                        't0' => 'Fond d\'image pour le thème:',
                        't1' => 'Téléchargement',
                        't2' => 'Ajoutez un nouveau thème',
                        't3' => 'Changez l\'arrangement pour:',
                        't4' => 'Ce thème',
                        't5' => 'Nouveau nom de thème:',
                        't6' => 'Ce thèmes',
                        't7' => 'Oui',
                        't8' => 'Non',
                        't9' => 'Cliquez sur ici pour prendre la couleur',
                        't10' => 'Vue',
                        't11' => 'Sauf des arrangements'
                ),

                'cnf_list' => array(
                        't0' => 'Oui',
                        't1' => 'Non',
                        't2' => 'Sauf des arrangements'
                ),

                'cnf_languages' => array(
                        't0' => 'Ordre',
                        't1' => 'Nom de fichier',
			't2' => 'Bump up'
                )
        );
?>
