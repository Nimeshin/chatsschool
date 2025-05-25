<?php
declare(strict_types=1);

/**
 * Footer Template
 * 
 * @package SathyaSaiSchool
 */

if (!defined('ROOT_PATH')) {
    exit('Direct script access denied.');
}

require_once ROOT_PATH . 'includes/classes/Menu.php';
require_once ROOT_PATH . 'includes/classes/Footer.php';

use SathyaSaiSchool\Footer;

// Close main content
echo '</main>';

$footer = new Footer();
echo $footer->render();
?>

</body>
</html> 