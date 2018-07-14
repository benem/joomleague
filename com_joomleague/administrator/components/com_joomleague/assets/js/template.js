/**
 * Joomleague
 *
 * @copyright	Copyright (C) 2005-2016 joomleague.at. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @link		http://www.joomleague.at
 */

Joomla.submitbutton = function(task) {
	var res = true;
	var validator = document.formvalidator;
	var form = jQuery('#adminForm');
	if (task == 'template.cancel') {
		Joomla.submitform(task);
		return;
	}

	// do field validation
	if (validator.validate(form)) {
		Joomla.submitform(task);
		res = false;
		}
	if (res) {
		Joomla.submitform(task);
	} else {
		return false;
	}
