<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
/** @var JDocumentError $this */

if (!isset($this->error))
{
	$this->error = JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
	$this->debug = false;
}

$app = JFactory::getApplication();
$tpath  = $this->baseurl . '/templates/' . $this->template;

// get template params
$sitename  = htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8');

// meta data
$this->setMetaData('viewport', 'width=device-width, initial-scale=1');
?>

<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Carcass RWD Joomla! template</title>

    <!-- Custom styles for this template -->
    <link href="<?php echo $tpath; ?>/css/template.css" rel="stylesheet">

    <title><?php echo $this->error->getCode(); ?>
        - <?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></title>

	<?php if ($app->get('debug_lang', '0') == '1' || $app->get('debug', '0') == '1') : ?>
        <link href="<?php echo JUri::root(true); ?>/media/cms/css/debug.css" rel="stylesheet"/>
	<?php endif; ?>
    <!--[if lt IE 9]>
    <script src="<?php echo JUri::root(true); ?>/media/jui/js/html5.js"></script><![endif]-->
</head>

<body>
<header class="app-bar promote-layer" role="banner">
    <section class="app-bar-container">
        <h1 class="logo-text">
            <a href="<?php echo $this->baseurl ?>"><?php echo htmlspecialchars($sitename); ?></a>
        </h1>
    </section>
</header>

<section class="layout block-group">
    <section class="main-container">
        <main role="main">
            <section class="content">
            <article>
                <h1>
                    <?php echo $this->error->getCode(); ?> <?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?>
                </h1>
                <h2>
                    <?php if ($this->error->getCode() == '404'): ?>
                        Leider haben wir diese Seite nicht gefunden.
		            <?php endif; ?>
                    Am Besten gehen wir zurück zur:
                    <a href="<?php echo JUri::root(true); ?>/index.php"
                        title="<?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?>"><?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?>
                    </a>
                </h2>

                <br>
                <p><?php echo JText::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?></p>

            </article>
            </section>
        </main>
    </section>
</section>

</body>
</html>
