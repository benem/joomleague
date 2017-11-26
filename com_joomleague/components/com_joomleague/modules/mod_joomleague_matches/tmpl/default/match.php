<?php 
/**
 * Joomleague
 * @subpackage	Module-Matches
 *
 * @copyright	Copyright (C) 2006-2015 joomleague.at. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @link		http://www.joomleague.at
 */
defined('_JEXEC') or die;
?>

<div id="modJLML<?php echo $module->id.'_row'.$cnt;?>" class="<?php echo $styleclass;?> jlmlmatchholder">
<!--jlml-mod<?php echo $module->id.'nr'.$cnt;?> start-->
  <?php
if ($heading != $lastheading) {
?><div class="contentheading">
      <?php echo $heading;?>
    </div>
  <?php
}
  if ($show_pheading) {
?><div class="<?php echo $params->get('heading_style');?>">
      <?php echo $pheading;?>
    </div>
<?php
}
?><table>
    <tr class="<?php echo $styleclass;?>">   
      <td colspan="3">
      <?php
      if (!empty($match['location'])) echo '<span style="white-space:nowrap;">'.$match['location'].'</span> ';
      echo ' <span style="white-space:nowrap;">'.$match['date'].'</span> '
      .' <span style="white-space:nowrap;">'.$match['time'].'</span> ';
      if (isset($match['meeting'])) echo' <span style="white-space:nowrap;">'.$match['meeting'].'</span> ';
      ?>

      </td>
    </tr>
    <tr class="<?php echo $styleclass;?>">
      <td class="jlmlteamcol">
      <?php
    if (!empty($match['hometeam']['logo'])) {
      echo '<img src="'.$match['hometeam']['logo']['src'].'" alt="'.$match['hometeam']['logo']['alt'].'" title="'.$match['hometeam']['logo']['alt'].'" '.$match['hometeam']['logo']['append'].' />';
      ?><br />
      <?php
    }
      if($params->get('show_names') == 1) { echo $match['hometeam']['name']; }
      if (!empty($match['homeover'])) echo $match['homeover'];
      ?>
      </td>
      <td class="jlmlResults">
        <span class="jlmlResults">
    <?php
      echo $match['result']; 
    ?>
      </span>
    <?php
      if ($match['reportlink'] OR $match['statisticlink'] OR $match['nextmatchlink']) {  ?>
      <span class="jlmlMatchLinks">
    <?php
      if ($match['reportlink']) { echo $match['reportlink']; }
      if ($match['statisticlink']) { echo $match['statisticlink']; }
      if ($match['nextmatchlink']) { echo $match['nextmatchlink']; }
    ?>
      </span>
    <?php } ?>
  </td>
  <td class="jlmlteamcol">
      <?php
    if (!empty($match['awayteam']['logo'])) {
      echo '<img src="'.$match['awayteam']['logo']['src'].'" alt="'.$match['awayteam']['logo']['alt'].'" title="'.$match['awayteam']['logo']['alt'].'" '.$match['awayteam']['logo']['append'].' />';
      ?><br />
      <?php
    }
      if($params->get('show_names') == 1) { echo $match['awayteam']['name']; }
      if (!empty($match['awayover'])) echo $match['awayover'];
      ?>
    </td>
 </tr>
 <?php
  if (!empty($match['partresults'])) {?>
    <tr class="<?php echo $styleclass;?>">
      <td colspan="3"><?php echo $match['partresults'];?>

      </td>
    </tr>
      <?php
    }
  ?>
  <?php
  if (($params->get('show_referee') == 1 && !empty($match['referee'])) OR ($params->get('show_spectators') == 1 && !empty($match['spectators']))) { ?>
    <tr class="<?php echo $styleclass;?>">
      <td colspan="3">
      <?php 
      echo $match['referee'] . ' '. $match['spectators'];
      ?>
      </td>
    </tr>
<?php
}
  if (!empty($match['notice'])) { ?>
    <tr class="<?php echo $styleclass;?>">
      <td colspan="3">
      <?php 
      echo $match['notice'];
      ?>
    </td>
  </tr>

<?php
}
?>
</table>
<?php
if ($match['ajax']) echo $match['ajax'];
$limit = (int) $params->get("limit"); 
if($limit>1) {
?>
<hr style="width:100%;display:block;clear:both;margin-top:10px;" />
<?php } ?>
<!--jlml-mod<?php echo $module->id.'nr'.$cnt;?> end-->
</div>
<?php
 if($ajax && $ajaxmod==$module->id){ exit(); } ?>