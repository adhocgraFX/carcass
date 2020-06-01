<?php
// get template params
// analytics
$analytics    = $this->params->get('analytics');
// cookies
$c_accept     = $this->params->get('acceptcookie');
$c_infotext   = $this->params->get('cookieinfotext');
$c_buttontext = $this->params->get('cookiebuttontext');
$c_linktext   = $this->params->get('cookielinktext');
$c_link       = $this->params->get('cookielink');
// slideshow slider
$slider       = $this->params->get('slideshow');
// code display
$prism       = $this->params->get('js-prism');
?>

<!-- cookie info -->
<?php if ($c_accept == 1) : ?>

	<?php if(isset($_POST['set_cookie'])):
		if($_POST['set_cookie']==1)
			setcookie("acceptcookie", "yes", time()+3600*24*365, "/");
		?>
	<?php endif; ?>

	<div id="accept-cookie-container" class="box clouds" style="display:none;position:fixed;bottom:-1em;font-size:.75em;width:100%;text-align:center;z-index:99999">
		<p><?php echo htmlspecialchars($c_infotext); ?>
			<?php if (($c_linktext != "Cookie link caption") and ($c_link != "http://my_site.de")): ?>
				<a href="<?php echo htmlspecialchars($c_link); ?>">
					<?php echo htmlspecialchars($c_linktext); ?></a>
			<?php endif; ?></p>
		<button id="accept" class="btn btn-primary"><?php echo htmlspecialchars($c_buttontext); ?></button>
	</div>

	<script type="text/javascript">
        jQuery(document).ready(function () {

            function setCookie(c_name,value,exdays)
            {
                var exdate=new Date();
                exdate.setDate(exdate.getDate() + exdays);
                var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString()) + "; path=/";
                document.cookie=c_name + "=" + c_value;
            }

            function readCookie(name) {
                var nameEQ = name + "=";
                var ca = document.cookie.split(';');
                for(var i=0;i < ca.length;i++) {
                    var c = ca[i];
                    while (c.charAt(0)==' ') c = c.substring(1,c.length);
                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
                }
                return null;
            }

            var $ca_container = jQuery('#accept-cookie-container');
            var $ca_accept = jQuery('#accept');
            var acceptcookie = readCookie('acceptcookie');
            if(!(acceptcookie == "yes")){

                $ca_container.delay(1000).slideDown('slow');

                $ca_accept.click(function(){
                    setCookie("acceptcookie","yes",365);
                    jQuery.post('<?php echo JURI::current(); ?>', 'set_cookie=1', function(){});
                    $ca_container.slideUp('slow');
                });
            }
        });
	</script>
<?php endif; ?>

<!-- script für nav -->
<?php if ($this->countModules('nav')): ?>
	<script type="text/javascript" src="<?php echo $tpath . '/scripts/nav.js'; ?>"></script>
<?php endif; ?>

<!-- script für aside -->
<?php if ($this->countModules('sidebar')): ?>
	<script type="text/javascript" src="<?php echo $tpath . '/scripts/sidebar.js'; ?>"></script>
<?php endif; ?>

<!-- go to top plus sticky nav plus double tap to go-->
<script type="text/javascript" src="<?php echo $tpath . '/scripts/plugins.js'; ?>"></script>

<!-- google analytics code asynchron + anonym -->
<?php if ($analytics != "UA-XXXXX-X"): ?>
	<script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', '<?php echo htmlspecialchars($analytics); ?>']);
        _gaq.push(['_gat._anonymizeIp']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
	</script>
<?php endif; ?>

<!-- script für flickity -->
<?php if ($slider): ?>
	<script type="text/javascript" src="<?php echo $tpath . '/scripts/flickity.js'; ?>"></script>
<?php endif; ?>

<!-- script für prism -->
<?php if ($prism): ?>
	<script type="text/javascript" src="<?php echo $tpath . '/scripts/prism.js'; ?>"></script>
<?php endif; ?>