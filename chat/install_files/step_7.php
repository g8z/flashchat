<?php

include INST_DIR . 'header.php';

?>

<TR>
	<TD colspan="2"></TD>
</TR>
<TR>
	<TD colspan="2" class="subtitle">Step 7: Installing bot knowledge bases</TD>
</TR>
<TR>
	<TD colspan="2" class="normal">
	<p>Please wait while the knowledge bases are loaded. This procedure can take a few minutes.
	</p>
	</TD>
</TR>


<?php if($errmsg != '') echo '<tr><td colspan="2" class="error_border"><font color="red">' . @$errmsg . '</font></td></tr>'; ?>

	<TR >
		<TD colspan="2" >
			<TABLE  class="body_table1" border="0" cellspacing="0" width="100%">

				<TR>

					<TD valign="top">
					<?php flush(); ?>
					<iframe application="Loader" title="Loader" scrolling="yes" frameborder="0" marginwidth="0" hspace="0" name="Loader"
	          			align="left" id="Loader" src="./temp/bot/programe/src/botinst/botloader.php"  width="100%" height="600">
	  				</iframe>
					</TD>
				</TR>

<script type="text/javascript">
<!--

//window.scrollTo(1,10000);

// -->
</script>

<?php

include INST_DIR . 'footer.php';

?>