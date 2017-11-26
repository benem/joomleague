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
 * AJAX View class
 */
class JoomleagueViewTeamPlayer extends JLGView
{

	/**
	 * view AJAX display method
	 *
	 * @return void
	 *
	 */
	function display($tpl = null)
	{
		$app = JFactory::getApplication();
		$jinput = $app->input;
		$pid = $jinput->get('p');
		
		// Get some data from the model
		$db = JFactory::getDbo();
		
		$db->setQuery(
				"	SELECT	pl.id AS value,
									concat(pl.firstname, ' \'', pl.nickname, '\' ', pl.lastname, ' (', pl.birthday, ')') AS pid
							FROM #__joomleague_team_player AS plt
							INNER JOIN #__joomleague_project_team AS pt ON pt.id = plt.projectteam_id
							INNER JOIN #__joomleague_person AS pl ON pl.id=plt.person_id
							WHERE pt.project_id='" . $pid . "' AND pl.published = '1' ORDER BY pl.lastname");
		
		$dropdrowlistoptions = JHtml::_('select.options',$db->loadObjectList(),'value','pid');
		
		echo $dropdrowlistoptions;
	}
}
