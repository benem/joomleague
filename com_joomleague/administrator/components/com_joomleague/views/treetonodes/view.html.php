<?php
/**
 * Joomleague
 *
 * @copyright	Copyright (C) 2006-2015 joomleague.at. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @link		http://www.joomleague.at
 */
defined('_JEXEC') or die;


/**
 * HTML View class
 */
class JoomleagueViewTreetonodes extends JLGView
{
	protected $items;
	protected $pagination;
	protected $state;

	public function display($tpl = null)
	{
		$app = JFactory::getApplication();
		if($this->getLayout() == 'default')
		{
			$this->_displayDefault($tpl);
			return;
		}
		parent::display($tpl);
	}


	function _displayDefault($tpl)
	{
		$app = JFactory::getApplication();
		$jinput = $app->input;
		$option = $jinput->getCmd('option');
		$db = JFactory::getDbo();
		$uri = JUri::getInstance();
		$project_id = $app->getUserState($option.'project');
		$treeto_id = $app->getUserState($option.'treeto_id');

		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');
		$this->state = $this->get('State');

		$model = $this->getModel();

		$mdlProject = JModelLegacy::getInstance('project','JoomleagueModel');
		$project = $mdlProject->getItem($project_id);

		$mdlTreeto = JModelLegacy::getInstance('treeto','JoomleagueModel');
		$treeto = $mdlTreeto->getItem($treeto_id);

		// build the html options for teams
		$team_id[] = JHtml::_('select.option','0',JText::_('COM_JOOMLEAGUE_GLOBAL_SELECT_TEAM'));
		if($projectteams = $model->getProjectTeamsOptions())
		{
			$team_id = array_merge($team_id,$projectteams);
		}
		$lists['team'] = $team_id;
		unset($team_id);

		$style = 'style="background-color: #dddddd; ';
		$style .= 'border: 0px solid white;';
		$style .= 'font-weight: normal; ';
		$style .= 'font-size: 8pt; ';
		$style .= 'width: 150px; ';
		$style .= 'font-family: verdana; ';
		$style .= 'text-align: center;"';
		$path = '/media/com_joomleague/treebracket/onwhite/';

		// build the html radio for adding into new round / exist round
		$createYesNo = array(
				0 => JText::_('COM_JOOMLEAGUE_GLOBAL_NO'),
				1 => JText::_('COM_JOOMLEAGUE_GLOBAL_YES')
		);
		$createLeftRight = array(
				0 => JText::_('L'),
				1 => JText::_('R')
		);
		$ynOptions = array();
		$lrOptions = array();
		foreach($createYesNo as $key=>$value)
		{
			$ynOptions[] = JHtmlSelect::option($key,$value);
		}
		foreach($createLeftRight as $key=>$value)
		{
			$lrOptions[] = JHtmlSelect::option($key,$value);
		}
		$lists['addToRound'] = JHtmlSelect::radiolist($ynOptions,'addToRound','class="inputbox"','value','text',1);
		// build the html radio for auto publish new matches
		$lists['autoPublish'] = JHtmlSelect::radiolist($ynOptions,'autoPublish','class="inputbox"','value','text',0);
		// build the html radio for Left or Right redepth
		$lists['LRreDepth'] = JHtmlSelect::radiolist($lrOptions,'LRreDepth','class="inputbox"','value','text',0);
		// build the html radio for create new treeto
		$lists['createNewTreeto'] = JHtmlSelect::radiolist($ynOptions,'createNewTreeto','class="inputbox"','value','text',1);

		$this->lists = $lists;
		// @todo fix!
		// $this->roundcode',$roundcode);
		$this->style = $style;
		$this->path = $path;
		$this->project = $project;
		$this->treeto = $treeto;

		$this->request_url = $uri->toString();

		$this->addToolbar();
		parent::display($tpl);
	}
	
	protected function addToolbar()
	{
		JToolBarHelper::title(JText::_('COM_JOOMLEAGUE_ADMIN_TREETONODES_TITLE'));
		$isleafed = $this->treeto->leafed;
		if($isleafed == 1)
		{
			JLToolBarHelper::apply('treetonodes.saveshort',JText::_('COM_JOOMLEAGUE_ADMIN_TREETONODES_SAVE_APPLY'),false);
			JLToolBarHelper::custom('treetonodes.removenode','delete.png','delete_f2.png',JText::_('COM_JOOMLEAGUE_ADMIN_TREETONODES_DELETE_ALL'),false);
		}
		elseif($isleafed)
		{
			JLToolBarHelper::apply('treetonodes.saveshortleaf',JText::_('COM_JOOMLEAGUE_ADMIN_TREETONODES_TEST_SHOW'),false);
			if($isleafed == 3)
			{
				JLToolBarHelper::apply('treetonodes.savefinishleaf',JText::_('COM_JOOMLEAGUE_ADMIN_TREETONODES_SAVE_LEAF'),false);
			}
		JLToolBarHelper::custom('treetonodes.removenode','delete.png','delete_f2.png',JText::_('COM_JOOMLEAGUE_ADMIN_TREETONODES_DELETE'),false);
		}
		JToolBarHelper::help('screen.joomleague',true);
	}
}
