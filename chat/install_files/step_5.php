<?php

import_request_variables( "P" );

$enc_types = array(		'none' => 'not encrypted (plain text)',
						'md5'  => 'md5',
						'mysql_pass' => 'MySQL Password Function',
					 );

$dbpref = '';
$errmsg = connectToDB('','','','', $dbpref);

function processUpdate()
{
	global $table_name, $user_fld, $pass_fld,
		   $profile_path, $admin_fld, $spy_fld, $user_id_fld,
		   $encode_type, $spy_value, $profile_path, $profile_arg, $admin_value,
		   $logoff, $moderator_value, $moderator_fld;

	//check spy
	if( $spy_fld != '' && trim($spy_value) == '')
	{
		$spy_fld = '_#_';
		$spy_value = '_#_';
	}

	//---

	//---
	$fname = './inc/cmses/defaultUsrExtCMS.php';
	if( ! file_exists($fname) ) return "File '$fname' not found.";
	if( ! is_writable($fname) ) return "File '$fname' not writable.";

	//all Ok process

	$fname = './inc/cmses/defaultUsrExtCMS.php';
	$ftmpl = './inc/cmses/defaultUsrExtCMS_tmpl.php';

	$contents = getConfigDataEXT($ftmpl);

	$old_val = array( '%users%',
					  '%login%',
					  '%id%',
					  '%password%',
					  '%roles%',
					  '%encode_type%',
					  '%spy_fld%',
					  '%spy_value%',
					  '%profile_path%',
					  '%profile_arg%',
					  '%admin_fld%',
					  '%admin_value%',
					  '%logoff%',
					  '%moderator_fld%',
					  '%moderator_value%',
					  );

	$new_val = array( $table_name,
					  $user_fld,
					  $user_id_fld,
					  $pass_fld,
					  $admin_fld,
					  $encode_type,
					  $spy_fld,
					  $spy_value,
					  $profile_path,
					  str_replace('{','{$',$profile_arg),
					  $admin_fld,
					  $admin_value,
					  $logoff,
					  $moderator_fld,
					  $moderator_value,
					  );

	if( $spy_value == '_#_' ) $spy_value = '';

	$contents = str_replace($old_val, $new_val, $contents);

	$res = writeConfigEXT($contents, $fname);

	if(!$res) return "<b>Could not write to '$fname' file</b>";

	return '';
}


if( isset($_POST['submit_btn']) && $_POST['submit_btn'] )
{
		$step = 6;

		//---
		$errmsg = processUpdate();
		//---

		//FOR TESTING

		//if( $errmsg == '') $errmsg = '*** defaultUsrExtCMS.php updated successful plese test your chat *** only for test ***';

		// sets admin, moderator, spy logins and passwords in existing table. artemK0
		$stmt = new Statement('SELECT * FROM '.$GLOBALS['fc_config']['db']['pref'].'users where instance_id = ?', 106);
		$rs = $stmt->process($_SESSION['session_inst']);
		$columns = '('.$user_fld.', '.$pass_fld.')';
		if($rs != null)
		{
			while($rec = $rs->next())
			{
				$rows = '("'.$rec['login'].'", "'.$rec['password'].'")';
				$sql = 'INSERT INTO '.$table_name.' '.$columns.' VALUES '.$rows;
				mysql_query($sql);
				$id = mysql_insert_id();
				switch($rec['roles'])
				{
					case 2:
						$sql = 'UPDATE '.$table_name.' SET '.$admin_fld.' = '.$admin_value.' WHERE '.$user_id_fld.' = '.$id;
						break;
					case 3:
						$sql = 'UPDATE '.$table_name.' SET '.$moderator_fld.' = '.$moderator_value.' WHERE '.$user_id_fld.' = '.$id;
						break;
					case 4:
						$sql = 'UPDATE '.$table_name.' SET '.$spy_fld.' = '.$spy_value.' WHERE '.$user_id_fld.' = '.$id;
						break;
					default:
						break;
				}
				mysql_query($sql);
			}
		}

		//-----------
		if( $errmsg == '')
			{
				//redirect_inst to step 3
				echo '<script language="JavaScript" type="text/javascript">
					<!--// redirect_inst
			  			window.location.href = "install.php?step='. $step .'";
					//-->
				 </script>
				';

				die;
			}
}
//----
//get tables
$res = db_get_array('SHOW TABLE STATUS');
$table_list = array();

foreach($res as $k=>$v)
{
	$table_list[$v['Name']] = $v['Name'];
}
//get fields
if( !isset($table_name) || $table_name == '') $table_name = $res[0]['Name'];

$res = db_get_array("SHOW FIELDS FROM `$table_name`", 'Field');
$field_list = array();
foreach($res as $k=>$v)
{
	$field_list[$k] = $v['Field'];
}

if( !$profile_path )
{
	$request = $_SERVER['SCRIPT_NAME'];
	$docroot = ( preg_match( '/\/(.+)\/.*/', $request, $matches ) ) ? '/'. $matches[1] .'/' : '/';
	$profile_path = 'http://' . $_SERVER['HTTP_HOST'] . $docroot . 'profile.php';
}

if( !$profile_arg ) $profile_arg = '?user={...}';

if( !$logoff )
{
   $logoff = 'false';
}

//----
include INST_DIR . 'header.php';
?>

<TR>
	<TD colspan="2"></TD>
</TR>
<TR>
	<TD colspan="2" class="subtitle">Step 5: Integrating FlashChat with an existing user database</TD>
</TR>
<TR>
	<TD colspan="2" class="normal">
	<p>You have specified that FlashChat should draw from an existing user database. This will configure the "/inc/cmses/defaultCMS.php" file so that only your existing users are allowed to login to FlashChat.
	</p>
	<p>Please complete the options below so that FlashChat knows how to retrieve user information from your database:
	</p>
	</TD>
</TR>


<?php if($errmsg != '') echo '<tr><td colspan="2" class="error_border"><font color="red">' . @$errmsg . '</font></td></tr>'; ?>

<FORM action="install.php?step=5" method="post" align="center" name="installInfo">
	<TR>
		<TD>&nbsp;</TD>
		<TD align="right">
			<INPUT type="submit" name="submit_btn" value="Continue >>" onClick="javascript:return fieldsAreValid('spy_fld spy_value');">
		</TD>
	</TR>
	<TR >
		<TD colspan="2" >
			<TABLE  class="body_table" border="0" cellspacing="10">

				<TR>
					<TD width="10%" nowrap align="right">Table containing user names and passwords:</TD>
					<TD> <?php echo htmlSelect("table_name", $table_list, $table_name, 'onChange="installInfo.submit();"'); ?></TD>
				</TR>
				<TR>
					<TD nowrap align="right">User "ID" field:	</TD>
					<TD> <?php echo htmlSelect("user_id_fld", $field_list, $user_id_fld, 'onChange="addUserID(this,profile_arg);"'); ?> (this should be a unique, primary key field)</TD>
				</TR>
				<TR>
					<TD nowrap align="right">Username field:	</TD>
					<TD> <?php echo htmlSelect("user_fld", $field_list, $user_fld); ?></TD>
				</TR>
				<TR>
					<TD nowrap align="right">Password field:	</TD>
					<TD> <?php echo htmlSelect("pass_fld", $field_list, $pass_fld); ?></TD>
				</TR>
				<TR>
					<TD colspan="2">
						If the password in this table and field are encrypted, which of the following encryption types is used?

						<?php
						    echo htmlSelect("encode_type", $enc_types, $encode_type);
						?>

					</TD>

				</TR>
				<TR>
					<td colspan="2">
					Full URL path to profile.php (or similar file):<br>
					<INPUT type="text" size="91" name="profile_path" value="<?php echo $profile_path ?>">.<br>
					This is the file that FlashChat will attempt to access when a user's profile is requested from the FlashChat interface.
					</td>
				</TR>

				<TR>
					<td colspan="2">
					URL string for user profile information, relative to this path. The user name or id should be enclosed in {}, and should indicate the field name that FlashChat should use when passing the information to the profile PHP file:<br>
					<INPUT type="text" size="91" name="profile_arg" value="<?php echo $profile_arg ?>"><br>
					For example: ?user={user_id}
					</td>
				</TR>

				<TR>
					<td colspan="2">
						<p>FlashChat needs to know how administrators, moderators and spies are determined in your user database.<br>
							Please complete the following (field = value)
						</p>
						A user is an administrator if the following is true...<br>
						<?php echo htmlSelect("admin_fld", $field_list, $admin_fld); ?> = <INPUT type="text" size="41" name="admin_value" value="<?php echo $admin_value ?>"><br>

						A user is a moderator if the following is true...<br>
						<?php echo htmlSelect("moderator_fld", $field_list, $admin_fld); ?> = <INPUT type="text" size="41" name="moderator_value" value="<?php echo $moderator_value ?>"><br>

						(optional) A user is a spy if the following is true...<br>
						<?php echo htmlSelect("spy_fld", $field_list, $spy_fld); ?> = <INPUT type="text" size="41" name="spy_value" value="<?php echo $spy_value ?>"><br>
					</td>
				</TR>

				<TR>
					<td colspan="2">
						When a user logs out of FlashChat, which of the following should occur?<br>
						<INPUT type="radio" name="logoff" value="false" <?php if($logoff == 'false')echo 'CHECKED' ;?> >The user should remain logged-in to my system.<br>
						<INPUT type="radio" name="logoff" value="true"  <?php if($logoff == 'true') echo 'CHECKED' ;?>>The user should be logged-out of my system.
					</td>
				</TR>

			</TABLE>
		</td>
		</tr>
	<TR>
		<TD>&nbsp;</TD>
		<TD align="right">
			<INPUT type="submit" name="submit_btn" value="Continue >>" onClick="javascript:return fieldsAreValid('spy_fld spy_value');">
		</TD>
	</TR>

	<tr>
	<td colspan="2">
	&nbsp;
	</td>
	</tr>


	<script type="text/javascript">
		addUserID(document.installInfo.user_id_fld, document.installInfo.profile_arg);
	</script>

<?php
include INST_DIR . 'footer.php';
?>