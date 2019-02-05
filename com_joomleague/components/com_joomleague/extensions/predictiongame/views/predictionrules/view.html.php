<?php
/**
* @copyright	Copyright (C) 2007-2012 JoomLeague.net. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
 
// Check to ensure this file is included in Joomla!
use Joomla\CMS\Factory;
use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Language\Text;

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

/**
 * Joomleague Component prediction View
 *
 * @author	Kurt Norgaz
 * @package	JoomLeague
 * @since	1.5.100628
 */
class JoomleagueViewPredictionRules extends JLGView
{
	function display($tpl=null)
	{
    $app = Factory::getApplication();
// Get a refrence of the page instance in joomla
    $document	= Factory::getDocument();
    $model	= $this->getModel();
    $option 	= $app->input->getCmd('option');
    $optiontext = strtoupper($app->input->getCmd('option').'_');
    $this->optiontext = $optiontext ;
    
		$this->predictionGame = $model->getPredictionGame();

		if (isset($this->predictionGame))
		{
			$config		= $model->getPredictionTemplateConfig($this->getName());
			$overallConfig	= $model->getPredictionOverallConfig();

			$this->model = $model;
			$this->config = array_merge($overallConfig,$config);
			$configavatar = $model->getPredictionTemplateConfig('predictionusers');
			$this->configavatar = $configavatar;
			$this->predictionMember = $model->getPredictionMember($configavatar);
			$this->predictionProjectS = $model->getPredictionProjectS();
			$this->actJoomlaUser = Factory::getUser();
			//echo '<br /><pre>~'.print_r($this,true).'~</pre><br />';
			$this->show_debug_info = ComponentHelper::getParams('com_joomleague')->get('show_debug_info',0);
			// Set page title
			$pageTitle = Text::_('COM_JOOMLEAGUE_PRED_USERS_TITLE'); // 'Tippspiel Regeln'

			$document->setTitle($pageTitle);

			parent::display($tpl);
		}
		else
		{
			$app->enqueueMessage(500,Text::_('COM_JOOMLEAGUE_PRED_PREDICTION_NOT_EXISTING'),'notice');
		}
	}

}
?>