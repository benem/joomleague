<?php
/**
 * Joomleague
 *
 * @copyright	Copyright (C) 2006-2015 joomleague.at. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @link		http://www.joomleague.at
 */
use Joomla\CMS\Factory;
use Joomla\CMS\Filesystem\Path;
use Joomla\CMS\Form\FormField;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

defined('_JEXEC') or die;

class JFormFieldPageTitleFormat extends FormField
{
	protected $type = 'pagetitleformat';

	function getInput() {
		$lang = Factory::getLanguage();
		$extension = "com_joomleague";
		$source = Path::clean(JPATH_ADMINISTRATOR . '/components/' . $extension);
		$lang->load($extension, JPATH_ADMINISTRATOR, null, false, false)
		||	$lang->load($extension, $source, null, false, false)
		||	$lang->load($extension, JPATH_ADMINISTRATOR, $lang->getDefault(), false, false)
		||	$lang->load($extension, $source, $lang->getDefault(), false, false);
		
		$mitems = array();
		$mitems[] = HTMLHelper::_('select.option', 0, Text::_('COM_JOOMLEAGUE_FES_PARAM_PAGE_TITLE_PROJECT'));
		$mitems[] = HTMLHelper::_('select.option', 1, Text::_('COM_JOOMLEAGUE_FES_PARAM_PAGE_TITLE_PROJECT_LEAGUE'));
		$mitems[] = HTMLHelper::_('select.option', 2, Text::_('COM_JOOMLEAGUE_FES_PARAM_PAGE_TITLE_PROJECT_LEAGUE_SEASON'));
		$mitems[] = HTMLHelper::_('select.option', 3, Text::_('COM_JOOMLEAGUE_FES_PARAM_PAGE_TITLE_PROJECT_SEASON'));
		$mitems[] = HTMLHelper::_('select.option', 4, Text::_('COM_JOOMLEAGUE_FES_PARAM_PAGE_TITLE_LEAGUE'));
		$mitems[] = HTMLHelper::_('select.option', 5, Text::_('COM_JOOMLEAGUE_FES_PARAM_PAGE_TITLE_LEAGUE_SEASON'));
		$mitems[] = HTMLHelper::_('select.option', 6, Text::_('COM_JOOMLEAGUE_FES_PARAM_PAGE_TITLE_SEASON'));
		$mitems[] = HTMLHelper::_('select.option', 7, Text::_('COM_JOOMLEAGUE_FES_PARAM_PAGE_TITLE_NONE'));
		
		$output= HTMLHelper::_('select.genericlist',  $mitems,
							$this->name,
							'class="inputbox" size="1"', 
							'value', 'text', $this->value, $this->id);
		return $output;
	}
}
