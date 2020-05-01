<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.carcass
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;

/** @var JDocumentHtml $this */

$app  = Factory::getApplication();
$lang = $app->getLanguage();
$wa   = $this->getWebAssetManager();

// Detecting Active Variables
$option    = $app->input->getCmd('option', '');
$view      = $app->input->getCmd('view', '');
$layout    = $app->input->getCmd('layout', '');
$task      = $app->input->getCmd('task', '');
$itemid    = $app->input->getCmd('Itemid', '');
$sitename  = htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8');
$menu      = $app->getMenu()->getActive();
$pageclass = $menu->params->get('pageclass_sfx');
$tpath     = $this->baseurl . '/templates/' . $this->template;

// get template params
// logo
$logo         = $this->params->get('logo');
// header style
$headerbackground = $this->params->get('headerbackground');
// call to action
$buttontext     = $this->params->get('buttontext');
$buttonlink     = $this->params->get('buttonlink');

// Enable assets
$wa->enableAsset('template.carcass.base');
// meta data
$this->setMetaData('viewport', 'width=device-width, initial-scale=1');
?>

<!DOCTYPE html>

<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">

<head>

    <jdoc:include type="metas"/>
    <jdoc:include type="styles"/>
    <jdoc:include type="scripts"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="images/icons/apple-touch-icon.png">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- load css options -->
	<?php include_once('css/template.css.php'); ?>
</head>

<body class=" <?php echo $pageclass?>
              <?php echo $option . ' view-' . $view . ($layout ? ' layout-' . $layout : ' no-layout') . ($task ? ' task-' . $task : ' no-task'); ?>
              <?php echo ($itemid ? ' itemid-' . $itemid : '' ); ?>" role="document">

<header class="app-bar promote-layer" role="banner">
    <section class="app-bar-container">
	    <?php if ($this->countModules('nav')): ?>
            <button class="menu" aria-label="Navigation"></button>
	    <?php endif; ?>
        <h1 class="logo-text">
            <a href="<?php echo $this->baseurl ?>"><?php echo htmlspecialchars($sitename); ?></a>
        </h1>
	    <?php if ($this->countModules('sidebar')): ?>
            <button class="sidebar-menu" aria-label="Sidebar"></button>
	    <?php endif; ?>
    </section>
	<?php if (($buttontext) and ($buttonlink) and ($pageclass == "header-img")): ?>
        <section class="app-bar-call-to-action hide-on-tablet">
            <a href="<?php echo $this->baseurl ?>/<?php echo($buttonlink); ?>"
               class="call-to-action btn btn-primary btn-lg"><?php echo htmlspecialchars($buttontext); ?> <span
                        class="icon-arrow-forward"></span></a>
        </section>
	<?php endif; ?>
	<?php if (($headerbackground) and ($pageclass == "header-img" || $pageclass == "header-img cards" || $pageclass == "header-img modern")): ?>
        <a href="#navdrawer" class="go-down"><span class="icon-chevron-down"></span><p hidden>Navigation</p></a>
	<?php endif; ?>
</header>

<nav class="navdrawer-container promote-layer" id="navdrawer" role="navigation">
	<?php if ($logo): ?>
        <div class="logo-image">
            <a href="<?php echo $this->baseurl ?>">
                <img src="<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($logo); ?>"
                     alt="<?php echo htmlspecialchars($sitename); ?>"/>
            </a>
        </div>
	<?php else: ?>
        <h4>Navigation</h4>
	<?php endif; ?>
	<?php if ($this->countModules('nav')): ?>
        <jdoc:include type="modules" name="nav"/>
	<?php endif; ?>
	<?php if ($this->countModules('search')): ?>
        <div class="search-container">
            <jdoc:include type="modules" name="search" style=" none"/>
        </div>
	<?php endif; ?>
</nav>

<section class="layout block-group">
	<?php if ($this->countModules('slideshow')): ?>
        <section class="slider-container" role="complementary">
            <jdoc:include type="modules" name="slideshow" style="flickity"/>
        </section>
	<?php endif; ?>

    <?php if ($this->countModules('top_row')): ?>
        <section class="top" role="complementary">
            <jdoc:include type="modules" name="top_row" style="jduo"/>
        </section>
	<?php endif; ?>

    <section class="main-container">
        <main role="main">
            <section class="content">
                <jdoc:include type="message"/>
                <jdoc:include type="component"/>
            </section>
        </main>
        <?php if ($this->countModules('sidebar')): ?>
            <aside class="sidebar-container" role="complementary">
                <h4 class="sidebar-text">Sidebar</h4>
                <jdoc:include type="modules" name="sidebar" style="jduo"/>
            </aside>
		<?php endif; ?>
    </section>

	<?php if ($this->countModules('bottom_row')): ?>
        <section class="bottom" role="complementary">
            <jdoc:include type="modules" name="bottom_row" style="jduo"/>
        </section>
	<?php endif; ?>
</section>

<section class="footer-wrapper block-group">
	<?php if ($this->countModules('breadcrumbs')): ?>
        <section class="breadcrumbs-container block-group" role="navigation">
            <jdoc:include type="modules" name="breadcrumbs"style="none" />
        </section>
	<?php endif; ?>

	<?php if ($this->countModules('footer')): ?>
        <footer class="block-group" role="contentinfo">
            <jdoc:include type="modules" name="footer" style="footer"/>
        </footer>
	<?php endif; ?>
</section>

<!-- to top -->
<a href="#" class="go-top"><span class="icon-chevron-up"></span><p hidden>Top</p></a>

<jdoc:include type="modules" name="debug" style="none"/>

<!-- load scripts -->
<?php include_once('scripts/scripts.php'); ?>

<!-- double Tap to go by Osvaldas Valutis -->
<script type="text/javascript">
    jQuery('nav li:has(ul)').doubleTapToGo();
</script>

</body>
</html>
