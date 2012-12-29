<?php

/**
 * @Author Pasindu De Silav
 * @license  GNU Affero General Public License http://www.gnu.org/licenses/ 
 * 
 * 
 *	This has the database details
 */

if (strlen(session_id()) < 1) {
    session_start();
}
$dbhost = "localhost"; // this will ususally be 'localhost', but can sometimes differ
$dbname = "vatwa"; // the name of the database that you are going to use for this project
$dbuser = "root"; // the username that you created, or were given, to access your database
$dbpass = ""; // the password that you created, or were given, to access your database

mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());
?>