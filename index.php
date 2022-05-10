<?php
function adminer_object() {
    // required to run any plugin
    include_once "./plugins/plugin.php";
    
    // autoloader
    foreach (glob("plugins/*.php") as $filename) {
        include_once "./$filename";
    }
    
    // enable extra drivers just by including them
    //~ include "./plugins/drivers/simpledb.php";
    
    $plugins = array(
        // specify enabled plugins here
	new AdminerDumpBz2(),
        new AdminerDumpJson(),
        new AdminerDumpZip(),
        new AdminerLoginPasswordLess(""),
        new AdminerSqlLog(),
        new AdminerTablesFilter(),
	new AdminerDisplayForeignKeyName(),
	new AdminerForeignSystem(),
	new AdminerEditForeign(),
	new AdminerEnumOption(),
	new AdminerEnumTypes(),
	new AdminerDumpAlter(),
	new AdminerTablesHistory()
    );
    
    /* It is possible to combine customization and plugins:
    class AdminerCustomization extends AdminerPlugin {
    }
    return new AdminerCustomization($plugins);
    */
    
    $adminer_plugins = new AdminerPlugin($plugins);
    return $adminer_plugins;
}
// include original Adminer or Adminer Editor
include "./adminer-4.8.1.php";
?>