<?php
require_once 'classes/CheckStats.php';
$CheckStats = new CheckStats();

$stats = $CheckStats->getStats();

$alexa_stats = $CheckStats->getAlexaStats();
?>
<div class='wrap'>
<h2>Social media</h2>
<table class="widefat">
    <thead>
        <tr>
            <th>Service</th>
            <th>Mentions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Twitter</td>
            <td><?php echo $stats->Twitter_Mentions_Total(); ?></td>
        </tr>
        <tr>
            <td>Facebook</td>
            <td><?php echo $stats->Facebook_Mentions_Total(); ?></td>
        </tr>
    </tbody>
</table>
<h2>Alexa</h2>
<table class="widefat">
    <thead>
        <tr>
            <th>Metric</th>
            <th>Stat</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Country rank</td>
            <td><?php echo $alexa_stats['DATA']['ALEXA']['Alexa_Country_Rank']; ?></td>
        </tr>
        <tr>
            <td>Average load time</td>
            <td><?php echo $alexa_stats['DATA']['ALEXA']['Alexa_Avg_Load_Time']; ?></td>
        </tr>
    </tbody>
</table>
<?php
//Check if there is data 
if ($alexa_stats['DATA']['ALEXA']['Alexa_Search_Visits_Changes']['Increase'] !== "No Data available.") {
    ?>
    <h2>Alexa search visit traffic changes</h2>
    <table class="widefat">
        <thead>
            <tr>
                <th>Keyword</th>
                <th>Percent change</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Keyword</th>
                <th>Percent change</th>
            </tr>
        </tfoot>
        <tbody>
    <?php for ($x = 0; $x < count($alexa_stats['DATA']['ALEXA']['Alexa_Search_Visits_Changes']['Increase']); $x++) { ?>
                <tr>
                    <td><?php echo $alexa_stats['DATA']['ALEXA']['Alexa_Search_Visits_Changes']['Increase'][$x]['Keyword']; ?></td>
                    <td><?php echo $alexa_stats['DATA']['ALEXA']['Alexa_Search_Visits_Changes']['Increase'][$x]['Change in Percent']; ?></td>
                </tr>
    <?php } ?>
            <?php for ($x = 0; $x < count($alexa_stats['DATA']['ALEXA']['Alexa_Search_Visits_Changes']['Decline']); ++$x) { ?>
                <tr>
                    <td><?php echo $alexa_stats['DATA']['ALEXA']['Alexa_Search_Visits_Changes']['Decline'][$x]['Keyword']; ?></td>
                    <td>-<?php echo $alexa_stats['DATA']['ALEXA']['Alexa_Search_Visits_Changes']['Decline'][$x]['Change in Percent']; ?></td>
                </tr>
    <?php } ?>    
        </tbody>
    </table>

<?php } ?>
</div>