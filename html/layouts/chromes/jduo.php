<?php

/**
 * @copyright	JDuo responsive template © 2014 adhocgraFX / Johannes Hock - All Rights Reserved.
 * @license		GNU/GPL
 **/
/**
 * joomskeleton, joomfluid, joomflex, jduo, pasodoble, carcass module chrome
 **/


// No direct access.
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
    <<?php echo $moduleTag; ?> class="<?php echo $modulePos; ?> module <?php echo htmlspecialchars($params->get('moduleclass_sfx')); ?>">
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
