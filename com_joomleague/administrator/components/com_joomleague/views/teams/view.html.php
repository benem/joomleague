<?php
/**
 * Joomleague
 *
 * @copyright	Copyright (C) 2006-2015 joomleague.at. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @link		http://www.joomleague.at
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die;

jimport('joomla.filesystem.file');

/**
 * HTML View class
 */
class JoomleagueViewTeams extends JLGView
{
	protected $items;
	protected $pagination;
	protected $state;

	public function display($tpl = null)
	{
		$app 	= JFactory::getApplication();
		$jinput = $app->input;
		$option = $jinput->getCmd('option');
		$params = JComponentHelper::getParams($option);
		$uri 	= JUri::getInstance();

		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');
		$this->state = $this->get('State');

		$this->user = JFactory::getUser();
		$this->config = JFactory::getConfig();
		$this->component_params = $params;

		$this->filterForm = $this->get('FilterForm');
		$this->activeFilters = $this->get('ActiveFilters');

		$this->addToolbar();
		parent::display($tpl);
	}
	
	/**
	* Add the page title and toolbar
	*/
	protected function addToolbar()
	{ 
		// Set toolbar items for the page
		JToolBarHelper::title(JText::_('COM_JOOMLEAGUE_ADMIN_TEAMS_TITLE'),'jl-Teams');
		JLToolBarHelper::addNew('team.add');
		JLToolBarHelper::custom('teams.copysave','copy.png','copy_f2.png','COM_JOOMLEAGUE_GLOBAL_COPY',true);
		JLToolBarHelper::custom('teams.import','upload','upload','COM_JOOMLEAGUE_GLOBAL_CSV_IMPORT',false);
		JLToolBarHelper::archiveList('teams.export','COM_JOOMLEAGUE_GLOBAL_XML_EXPORT');
		JLToolBarHelper::deleteList('COM_JOOMLEAGUE_GLOBAL_CONFIRM_DELETE','teams.delete');
		JToolBarHelper::divider();
		JToolBarHelper::help('screen.joomleague',true);
	}
}
