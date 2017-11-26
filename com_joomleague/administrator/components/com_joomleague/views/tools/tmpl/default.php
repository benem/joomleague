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
<?php
	$p=1;
	echo JHtml::_('bootstrap.startTabSet', 'tabs', array('active' => 'panel1'));
	echo JHtml::_('bootstrap.addTab', 'tabs', 'panel'.$p++,'<span class="icon-database"></span>'.JText::_('COM_JOOMLEAGUE_TABS_TOOLS_TABLES', true));
?>
<form action="<?php echo $this->request_url; ?>" method="post" id="adminForm" name="adminForm">
<fieldset class="form-horizontal">
	<p class="alert alert-info">Here you can perfom several Table actions.</p>
</fieldset>
<table class="table tools table-hover">
	<thead>
		<tr>
			<th class="center">Select</th>
			<th>Table</th>
			<th class="center">CSV</th>
			<th class="center">SQL</th>
			<th class="center">Truncate</th>
		</tr>
	</thead>
	<tbody>
	<?php 
		$n = count($this->tables);
		foreach ($this->tables as $i => $row) :
	?>
		<tr class="j-main-container">

			<td class="center"><?php echo JHtml::_('grid.id', $i, $row); ?></td>
			<td><?php echo $row; ?></td>
			<td class="center">
				<a class="exportcsv" id="csvexport" onclick="return listItemTask(<?php echo '\'cb'.$i.'\'' ?>,'tools.exporttablecsv')" href="javascript:void(0)"><?php echo JHtml::_('image', 'com_joomleague/export_excel.png',null, NULL, true); ?></a>
			</td>
			<td class="center">
				<a class="exportsql" id="sqlexport" onclick="return listItemTask(<?php echo '\'cb'.$i.'\'' ?>,'tools.exporttablesql')" href="javascript:void(0)"><?php echo JHtml::_('image', 'com_joomleague/sql.png', null, NULL, true); ?></a>
			</td>
			<td class="center">
				<a class="truncate" id="truncate" onclick="return listItemTask(<?php echo '\'cb'.$i.'\''; ?>,'tools.truncate')" href="javascript:void(0)"><?php echo JHtml::_('image', 'com_joomleague/truncate.png', null, NULL, true); ?></a>
			</td>
		</tr>
	
	<?php endforeach; ?>
	</tbody>
	<tfoot><tr><td class="col-md-11"></td></tr></tfoot>
</table>
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
</form>
<?php  
	echo JHtml::_('bootstrap.endTab'); 
	
	echo JHtml::_('bootstrap.addTab', 'tabs', 'panel'.$p++,'<span class="icon-database"></span>'.JText::_('COM_JOOMLEAGUE_TABS_TOOLS_DB', true));
	echo $this->loadTemplate('db');
	echo JHtml::_('bootstrap.endTab');
	echo JHtml::_('bootstrap.addTab', 'tabs', 'panel'.$p++,'<span class="icon-database"></span>'.JText::_('COM_JOOMLEAGUE_TABS_TOOLS_OTHER', true));
	echo $this->loadTemplate('other');
	echo JHtml::_('bootstrap.endTab');

	echo JHtml::_('bootstrap.endTabSet');
	?>
