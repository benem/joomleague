<?php
/**
 * Joomleague
 *
 * @copyright	Copyright (C) 2006-2015 joomleague.at. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @link		http://www.joomleague.at
 */
defined('_JEXEC') or die;

JHtml::_('behavior.formvalidator');

JFactory::getDocument()->addScriptDeclaration('
	Joomla.submitbutton = function(task)
	{
		if (task == "teamstaff.cancel" || document.formvalidator.isValid(document.getElementById("adminForm")))
		{
			Joomla.submitform(task, document.getElementById("adminForm"));
		}
	};
');
?>
<form action="<?php echo JRoute::_('index.php?option=com_joomleague&layout=form&id='.(int)$this->item->id); ?>" method="post" id="adminForm" name="adminForm" class="form-validate">
	<?php
	$p = 1;
	echo JHtml::_('bootstrap.startTabSet','tabs',array('active' => 'panel1'));
	echo JHtml::_('bootstrap.addTab','tabs','panel'.$p++,JText::_('COM_JOOMLEAGUE_TABS_DETAILS',true));
	echo $this->loadTemplate('details');
	echo JHtml::_('bootstrap.endTab');

	echo JHtml::_('bootstrap.addTab','tabs','panel'.$p++,JText::_('COM_JOOMLEAGUE_TABS_PICTURE',true));
	echo $this->loadTemplate('picture');
	echo JHtml::_('bootstrap.endTab');

	echo JHtml::_('bootstrap.addTab','tabs','panel'.$p++,JText::_('COM_JOOMLEAGUE_TABS_DESCRIPTION',true));
	echo $this->loadTemplate('description');
	echo JHtml::_('bootstrap.endTab');

	echo JHtml::_('bootstrap.addTab','tabs','panel'.$p++,JText::_('COM_JOOMLEAGUE_TABS_EXTENDED',true));
	//echo $this->loadTemplate('extended');
	echo JHtml::_('bootstrap.endTab');

	if(JFactory::getUser()->authorise('core.admin','com_joomleague') || JFactory::getUser()->authorise('core.admin','com_joomleague.team_staff'))
	{
		echo JHtml::_('bootstrap.addTab','tabs','panel'.$p ++,JText::_('JCONFIG_PERMISSIONS_LABEL',true));
		echo $this->loadTemplate('permissions');
		echo JHtml::_('bootstrap.endTab');
	}

	echo JHtml::_('bootstrap.endTabSet');
	?>
	<!-- Input files -->
	<input type="hidden" name="project_id" value="<?php echo $this->project->id; ?>" />
	<input type="hidden" name="team" value="<?php echo $this->projectteam->id; ?>" />
	<input type="hidden" name="cid[]" value="<?php echo $this->item->id; ?>" />
	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
</form>
