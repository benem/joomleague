<?php
/**
 * Joomleague
 *
 * @copyright	Copyright (C) 2006-2015 joomleague.at. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @link		http://www.joomleague.at
 */
defined('_JEXEC') or die;
?>
<fieldset class="form-vertical">
	<legend>
		<?php 
		echo JText::sprintf('COM_JOOMLEAGUE_LEGEND_P_TEAM_DESCRIPTION','<i>'.$this->item->name.'</i>','<i>'.$this->project->name.'</i>');
		?>
	</legend>
	<?php
	echo $this->form->renderField('info');
	echo $this->form->renderField('notes');
	?>
</fieldset>