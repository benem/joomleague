<?php
use Joomla\CMS\Language\Text;

defined('_JEXEC') or die; ?>
<!-- START of match timeline -->

<script type="text/javascript">
jQuery(document).ready(function() {
  JQuery('[data-toggle="tooltip"]').tooltip()
})
function gotoevent(row) {
        var t=document.getElementById('event-' + row)
        t.scrollIntoView()
    }
</script>
<h2><?php echo Text::_('COM_JOOMLEAGUE_MATCHREPORT_TIMELINE'); ?></h2>
<table id="timeline">
	<tr>
		<?php
		if ($this->team1->logo_small == '')
		{
			echo '<td width="140">';
			echo $this->team1->name;
		}
		else
		{
			echo '<td width="40">';
			echo JoomleagueModelProject::getClubIconHtml($this->team1,1);
		}
		?>
		</td>
		<td id="timeline-top">
			<div id="timelinetop">
			<?php
			echo $this->showSubstitution_Timelines1();
			echo $this->showEvents_Timelines1();
			?>
			</div>
		</td>
	</tr>
	<tr>
		<?php
		if ($this->team2->logo_small == '')
		{
			echo '<td width="140">';
			echo $this->team2->name;
		}
		else
		{
			echo '<td width="40">';
			echo JoomleagueModelProject::getClubIconHtml($this->team2,1);
		}
		?>
		</td>
		<td id="timeline-bottom">
			<div id="timelinebottom">
			<?php
			echo $this->showSubstitution_Timelines2();
			echo $this->showEvents_Timelines2();
			?>
			</div>
	</tr>

</table>

<!-- END of match timeline -->
