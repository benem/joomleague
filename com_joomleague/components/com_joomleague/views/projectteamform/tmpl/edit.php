<?php
/**
 * Joomleague
 *
 * @copyright	Copyright (C) 2006-2015 joomleague.at. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @link		http://www.joomleague.at
 */
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

defined('_JEXEC') or die;

HTMLHelper::_('behavior.tabstate');
HTMLHelper::_('behavior.keepalive');
HTMLHelper::_('behavior.formvalidator');

Factory::getDocument()->addScriptDeclaration('
	Joomla.submitbutton = function(task)
	{
		if (task == "projectteamform.cancel" || document.formvalidator.isValid(document.getElementById("adminForm")))
		{
			Joomla.submitform(task, document.getElementById("adminForm"));
		}
	};
');
?>
<form action="<?php echo Route::_('index.php?option=com_joomleague&a_id=' . (int) $this->item->id); ?>" method="post" id="adminForm" name="adminForm" class="form-validate">
	<div class="btn-toolbar">
		<div class="btn-group">
			<button type="button" class="btn btn-primary" onclick="Joomla.submitbutton('projectteamform.save')">
				<span class="icon-ok"></span><?php echo Text::_('JSAVE') ?>
			</button>
		</div>
		<div class="btn-group">
			<button type="button" class="btn" onclick="Joomla.submitbutton('projectteamform.cancel')">
				<span class="icon-cancel"></span><?php echo Text::_('JCANCEL') ?>
			</button>
		</div>
	</div>
	
	<?php
	$p = 1;
	echo HTMLHelper::_('bootstrap.startTabSet','tabs',array('active' => 'panel1'));
	echo HTMLHelper::_('bootstrap.addTab','tabs','panel' . $p ++,Text::_('COM_JOOMLEAGUE_TABS_DETAILS',true));
	echo $this->loadTemplate('details');
	echo HTMLHelper::_('bootstrap.endTab');

	echo HTMLHelper::_('bootstrap.addTab','tabs','panel' . $p ++,Text::_('COM_JOOMLEAGUE_TABS_PICTURE',true));
	echo $this->loadTemplate('picture');
	echo HTMLHelper::_('bootstrap.endTab');

	echo HTMLHelper::_('bootstrap.addTab','tabs','panel' . $p ++,Text::_('COM_JOOMLEAGUE_TABS_DESCRIPTION',true));
	echo $this->loadTemplate('description');
	echo HTMLHelper::_('bootstrap.endTab');

	echo HTMLHelper::_('bootstrap.addTab','tabs','panel' . $p ++,Text::_('COM_JOOMLEAGUE_TABS_EXTENDED',true));
	echo $this->loadTemplate('extended');
	echo HTMLHelper::_('bootstrap.endTab');

	echo HTMLHelper::_('bootstrap.endTabSet');
	?>
	<div class="clearfix"></div>
	<input type="hidden" name="projectteam_id" value="<?php echo $this->item->id; ?>" />
	<input type="hidden" name="project_id" value="<?php echo $this->project->id; ?>" />
	<input type="hidden" name="task" value="" id='task' />
	<input type="hidden" name="return" value="<?php echo $this->return_page; ?>" />
	<?php echo HTMLHelper::_('form.token'); ?>
</form>
