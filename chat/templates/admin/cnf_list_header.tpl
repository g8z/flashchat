<FORM action="cnf_config.php" method="post" enctype="multipart/form-data" name="cnf_form" onsubmit="javascript:sbmt();">
<input type="Hidden" name="module" value="{$module}">
<input type="hidden" name="js" value="">

<table border="0" {if $module=='msg'}width="500"{else}width="700"{/if}>