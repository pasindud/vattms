
<?php 

/**
 * @Author Pasindu De Silva
 * @license  GNU Affero General Public License http://www.gnu.org/licenses/ 
 *
 * 
 *		This will process the log out the redirect to the index page
 */
 
include "base.php"; $_SESSION = array(); session_destroy(); ?>
<meta http-equiv="refresh" content="0;index.php">