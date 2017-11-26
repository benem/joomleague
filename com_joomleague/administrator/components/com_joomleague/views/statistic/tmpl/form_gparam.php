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
<?php foreach ($this->form->getFieldsets('baseparams') as $fieldset): ?>
<fieldset class="adminform">
	<legend><?php echo JText::_($fieldset->label);?></legend>
	<?php foreach($this->form->getFieldset($fieldset->name) as $field): ?>
	<div class="control-group">
		<div class="control-label"><?php echo $field->label;?></div>
		<div class="controls"><?php echo $field->input;?></div>
	</div>
	<?php endforeach; ?>
</fieldset>
<?php endforeach; ?>