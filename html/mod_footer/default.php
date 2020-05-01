<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_footer
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
$app = JFactory::getApplication();
$params_t = $app->getTemplate(true)->params;

$data = array(
	'designer_name' => $params_t->get('designername'),
	'designer_site' => $params_t->get('designersite')
);
?>

<div class="mod-footer">
	<div class="footer1"><?php echo $lineone; ?></div>
    <?php if ($data['designer_name'] != 'my_name' and $data['designer_site'] != 'http://my_site.de') : ?>
	    <?php echo JLayoutHelper::render('adhoc.copy', $data); ?>
    <?php else: ?>
        <div class="footer2"><?php echo Text::_('MOD_FOOTER_LINE2'); ?></div>
    <?php endif;?>
</div>
