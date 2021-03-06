<?php
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

/**
 * Joomleague
 *
 * @copyright	Copyright (C) 2006-2015 joomleague.at. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @link		http://www.joomleague.at
 */
defined('_JEXEC') or die;

HTMLHelper::_('bootstrap.tooltip');
jimport('joomla.html.pane');

JLToolBarHelper::title(Text::_('COM_JOOMLEAGUE_ADMIN_TREETOMATCH_TITLE'));
// JLToolBarHelper::save();
JLToolBarHelper::custom('treetomatches.editlist','upload.png','upload_f2.png',Text::_('COM_JOOMLEAGUE_ADMIN_TREETOMATCH_BUTTON_ASSIGN'),false);
JLToolBarHelper::back('Back','index.php?option=com_joomleague&view=treetonodes');
JLToolBarHelper::help('screen.joomleague',true);
$colspan = 9;
?>

<fieldset class="adminform">
	<legend><?php echo Text::sprintf('COM_JOOMLEAGUE_ADMIN_MATCHES_TITLE','<i>'.$this->node->node.'</i>','<i>'.$this->project->name.'</i>'); ?></legend>
	<!-- Start games list -->
	<form action="<?php echo $this->request_url; ?>" method="post" id='adminForm' name="adminForm">
		<table class="table table-striped" id="treetomatchList">
			<thead>
				<tr>
					<th width="5" style="vertical-align: top;"><?php echo count($this->items).'/'.$this->pagination->total; ?></th>
					<th width="20" style="vertical-align: top;"><?php echo Text::_('COM_JOOMLEAGUE_ADMIN_MATCHES_MATCHNR'); ?></th>
					<th width="20" style="vertical-align: top;"><?php echo Text::_('COM_JOOMLEAGUE_ADMIN_ROUNDS_ROUND_NR'); ?></th>
					<th class="title" nowrap="nowrap" style="vertical-align: top;"><?php echo Text::_('COM_JOOMLEAGUE_ADMIN_MATCHES_HOME_TEAM'); ?></th>
					<th style="text-align: center; vertical-align: top;"><?php echo Text::_('COM_JOOMLEAGUE_ADMIN_MATCHES_RESULT'); ?></th>
					<th class="title" nowrap="nowrap" style="vertical-align: top;"><?php echo Text::_('COM_JOOMLEAGUE_ADMIN_MATCHES_AWAY_TEAM'); ?></th>
					<th width="1%" nowrap="nowrap" style="vertical-align: top;"><?php echo Text::_('COM_JOOMLEAGUE_GLOBAL_ID'); ?></th>
				</tr>
			</thead>
			<tbody>
			<?php
			$n = count($this->items);
			foreach($this->items as $i=>$row):
				$checked = HTMLHelper::_('grid.checkedout',$row,$i,'mid');
				$published = HTMLHelper::_('grid.published',$row,$i,'tick.png','publish_x.png','treetomatches.');
			?>
				<tr class="row<?php echo $i % 2; ?>">
					<td class="center"><?php echo $checked;?></td>
					<td class="center" nowrap="nowrap"><?php echo $row->match_number;?></td>
					<td class="center" class="nowrap"><?php echo $row->roundcode;?></td>
					<td class="center" class="nowrap"><?php echo $row->projectteam1;?></td>
					<td class="center"><?php echo $row->projectteam1result;echo ' : ';echo $row->projectteam2result;?></td>
					<td class="center" class="nowrap"><?php echo $row->projectteam2;?></td>
					<td class="center"><?php echo $row->mid;?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="<?php echo $colspan; ?>"><?php echo $this->pagination->getListFooter(); ?></td>
				</tr>
			</tfoot>
		</table>
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="act" value="" />
		<input type="hidden" name="task" value="" id="task" />
		<?php echo HTMLHelper::_('form.token'); ?>
	</form>
</fieldset>