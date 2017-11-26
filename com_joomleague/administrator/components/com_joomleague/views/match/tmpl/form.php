<?php
/**
 * Joomleague
 *
 * @copyright	Copyright (C) 2005-2016 joomleague.at. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @link		http://www.joomleague.at
 * 
 * @author		Marco Vaninetti <martizva@tiscali.it>
 */
use Joomla\CMS\Factory;

defined('_JEXEC') or die;
?>
<div id="matchdetails">
	<form
		action="<?php echo JRoute::_('index.php?option=com_joomleague&layout=form&id='.(int)$this->item->id); ?>"
		method="post" id="adminForm" name="adminForm" class="form-validate">
		<!-- Score Table START -->
	<?php
	// focus matchreport tab when the match was already played
	$activeTab = 'matchpreview';
	if (! empty ( $this->item->match_date )) {
		$now = new DateTime ( 'now', new DateTimeZone ( $this->item->timezone ) );
		$matchStart = new DateTime ( $this->item->match_date->toSql (), new DateTimeZone ( $this->item->timezone ) );
		if ($matchStart < $now) {
			$activeTab = 'matchreport';
		}
	}
	$selector = 'match';
	echo JHtml::_ ( 'bootstrap.startTabSet', $selector, array (
			'active' => $activeTab 
	) );
	
	echo JHtml::_ ( 'bootstrap.addTab', $selector, 'matchpreview', JText::_ ( 'COM_JOOMLEAGUE_TABS_MATCHPREVIEW' ) );
	echo $this->loadTemplate ( 'matchpreview' );
	echo JHtml::_ ( 'bootstrap.endTab' );
	
	echo JHtml::_ ( 'bootstrap.addTab', $selector, 'matchdetailsTab', JText::_ ( 'COM_JOOMLEAGUE_TABS_MATCHDETAILS' ) );
	echo $this->loadTemplate ( 'matchdetails' );
	echo JHtml::_ ( 'bootstrap.endTab' );
	
	echo JHtml::_ ( 'bootstrap.addTab', $selector, 'scoredetails', JText::_ ( 'COM_JOOMLEAGUE_TABS_SCOREDETAILS' ) );
	echo $this->loadTemplate ( 'scoredetails' );
	echo JHtml::_ ( 'bootstrap.endTab' );
	
	echo JHtml::_ ( 'bootstrap.addTab', $selector, 'altdecision', JText::_ ( 'COM_JOOMLEAGUE_TABS_ALTDECISION' ) );
	echo $this->loadTemplate ( 'altdecision' );
	echo JHtml::_ ( 'bootstrap.endTab' );
	
	echo JHtml::_ ( 'bootstrap.addTab', $selector, 'matchreport', JText::_ ( 'COM_JOOMLEAGUE_TABS_MATCHREPORT' ) );
	echo $this->loadTemplate ( 'matchreport' );
	echo JHtml::_ ( 'bootstrap.endTab' );
	
	echo JHtml::_ ( 'bootstrap.addTab', $selector, 'matchrelation', JText::_ ( 'COM_JOOMLEAGUE_TABS_MATCHRELATION' ) );
	echo $this->loadTemplate ( 'matchrelation' );
	echo JHtml::_ ( 'bootstrap.endTab' );
	
	echo JHtml::_ ( 'bootstrap.addTab', $selector, 'matchextended', JText::_ ( 'COM_JOOMLEAGUE_TABS_EXTENDED' ) );
	echo $this->loadTemplate ( 'matchextended' );
	echo JHtml::_ ( 'bootstrap.endTab' );
	
	if (Factory::getUser ()->authorise ( 'core.admin', 'com_joomleague' ) || Factory::getUser ()->authorise ( 'core.admin', 'com_joomleague.project.' . ( int ) $this->project->id ) || Factory::getUser ()->authorise ( 'core.admin', 'com_joomleague.match' . ( int ) $this->item->id )) {
		echo JHtml::_ ( 'bootstrap.addTab', $selector, 'permissions', JText::_ ( 'JCONFIG_PERMISSIONS_LABEL' ) );
		echo $this->loadTemplate ( 'permissions' );
		echo JHtml::_ ( 'bootstrap.endTab' );
	}
	
	echo JHtml::_ ( 'bootstrap.endTabSet' );
	?>
	<!-- input details --> 
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="close" id="close" value="0" />
	<input type="hidden" name="cid[]" value="<?php echo $this->item->id; ?>" />
	<?php echo JHtml::_('form.token'); ?>
</form>
</div>