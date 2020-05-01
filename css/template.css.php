<?php
header('Content-type: text/css');

// get template params

$headerbackground = $this->params->get('headerbackground');
$buttontext = $this->params->get('buttontext');

?>

<style type="text/css">
    @media screen and (min-width: 47em) {

        <?php if ($headerbackground): ?>
            .header-img .app-bar {
                background: url(<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($headerbackground);?>);
                background-size: cover;
                height: 100vh;
            }
            <?php if ($buttontext): ?>
                .header-img .app-bar-container {
                    height: 60vh;
                }
                .header-img .app-bar-call-to-action {
                    height: 30vh;
                }
            <?php else : ?>
                .header-img .app-bar-container {
                    height: 90vh;
                }
            <?php endif; ?>
        <?php endif; ?>
    }
</style>