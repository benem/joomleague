<?php
/**
 * Joomleague
 *
 * @copyright	Copyright (C) 2006-2015 joomleague.at. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @link		http://www.joomleague.at
 */
defined ( '_JEXEC' ) or die ();
foreach ( $this->extended->getFieldsets () as $fieldset ) {
	?>
<fieldset class="adminform">
	<legend><?php echo JText::_($fieldset->name); ?></legend>
	<?php
	$fields = $this->extended->getFieldset ( $fieldset->name );
	
	if (! count ( $fields )) {
		echo JText::_ ( 'COM_JOOMLEAGUE_GLOBAL_NO_PARAMS' );
	}
	
	foreach ( $fields as $field ) {
		?>
	<div class="control-group">
		<div class="control-label"><?php echo $field->label;?></div>
		<div class="controls"><?php echo $field->input;?></div>
	</div>
    <?php
	}
	?>
	</fieldset>
<?php
}
?>