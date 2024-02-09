<?php
// disable direct access to this file. This file is only to be accessed by include statements
if (realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {

           header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
           die( header( 'location: /error.php' ) );
       }


define("Admin", "1");
define("Moderator", "2");

?>