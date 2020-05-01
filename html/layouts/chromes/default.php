<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.carcass
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

if ($module->content) : ?>
	<<?php echo $moduleTag; ?> class="<?php echo $modulePos; ?> card <?php echo htmlspecialchars($params->get('moduleclass_sfx')); ?>">
		<?php if ($module->showtitle && $headerClass !== 'module-title') : ?>
            <div class="<?php echo $headerClass; ?>">
                <<?php echo $headerTag; ?> class="title"><?php echo $module->title; ?></<?php echo $headerTag; ?>>
            </div>
		<?php endif; ?>
	<?php if ($module->showtitle && $headerClass === 'module-title') : ?>
        <div class="<?php echo $headerClass; ?>">
            <<?php echo $headerTag; ?> class="title"><?php echo $module->title; ?></<?php echo $headerTag; ?>>
        </div>
	<?php endif; ?>
    <div class="module-body">
		<?php echo $module->content; ?>
    </div>
    </<?php echo $moduleTag; ?>>
<?php endif; ?>
