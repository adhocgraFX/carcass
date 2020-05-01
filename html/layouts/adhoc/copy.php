<?php defined('_JEXEC') or die;

// get params
$date = JFactory::getDate();
$cur_year = JHtml::_('date', $date, 'Y');
?>

<p class="copy">Design: Copyright &copy; <?php echo $cur_year ;?>
    <a href="<?php echo $displayData['designer_site'] ;?>" target="_blank"> <?php echo $displayData['designer_name'] ;?></a>
    All Rights Reserved
</p>
