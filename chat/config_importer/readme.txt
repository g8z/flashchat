1.copy inc/config.php and inc/badwords.php to config_importer folder
2.upload config_importer folder to the flash chat 5 chat/ folder
3.call config_importer/import_config.php with the browser

PS:
====
 This cript will remove all the config values in the fresh flashchat5 installation and populate data with the 
flash chat 4 config and badwords file(which are uploaded to the import_config_folder).
So this script should be called immediately after installation.
(ie before changing any config values in the flashchat 5 nstallation through 
the 'configuration module'of admin panel and creating any new instance)