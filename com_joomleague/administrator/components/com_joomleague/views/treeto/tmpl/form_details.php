<?php
/**
 * Joomleague
 *
 * @copyright	Copyright (C) 2006-2015 joomleague.at. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @link		http://www.joomleague.at
 */
use Joomla\CMS\Language\Text;

defined('_JEXEC') or die;
?>
<fieldset class="adminform">
	<legend><?php echo Text::_('COM_JOOMLEAGUE_ADMIN_TREETO_TITLE2'); ?></legend>
		<?php foreach ($this->form->getFieldset('details') as $field): ?>
		<div class="control-group">
		<div class="control-label"><?php echo $field->label;?></div>
		<div class="controls"><?php echo $field->input;?></div>
	</div>			
    	<?php endforeach; ?>
</fieldset>