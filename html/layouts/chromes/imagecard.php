<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_custom
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$module  = $displayData['module'];
$params  = $displayData['params'];
$attribs = $displayData['attribs'];

$modulePos   = $module->position;
$moduleTag   = $params->get('module_tag', 'div');
$headerTag   = htmlspecialchars($params->get('header_tag', 'h4'));
$headerClass = htmlspecialchars($params->get('header_class', 'module-title'));
?>

<?php if ($module->content) : ?>
<div class="module <?php if ($params->get('moduleclass_sfx') != '') : ?><?php echo $params->get('moduleclass_sfx'); ?><?php endif; ?>">
	<?php if ($module->showtitle && $params->get('backgroundimage')) : ?>
            <div class="module-image-title">
                <img src="<?php echo $params->get('backgroundimage'); ?>">
                <div class="caption">
                    <h4 class="image-title"><?php echo $module->title; ?></h4>
                </div>
            </div>
	<?php endif; ?>
    <div class="module-body">
		<?php echo $module->content; ?>
    </div>
</div>
<?php endif; ?>