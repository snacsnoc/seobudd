<?php
$nonce = wp_create_nonce('keyword-density-nonce');
?>
<div class='wrap'>
    <div id="icon-options-general" class="icon32"></div> <h2>Keyword density</h2>
    <p>
    <form action='' method='POST' id='keyword-density'>
        <ul>
            <li><label for="url">URL<span></span>: </label>    
                <input type='text' name='url'  id='url' value='<?php
if (isset($_POST['url'])) {
    echo $_POST['url'];
} else {
    echo site_url();
}
?>' size="40" />
            </li>
            <input type='submit' name='action' id='go' value='Go!' class='button-primary' />

        </ul>
    </form>

</p>

<?php
if (isset($_POST['url'])) {
    if (!wp_verify_nonce($nonce, 'keyword-density-nonce')) {
        die("Invalid token, please submit again.");
    }
    //Include and instantiate the class
    require 'classes/KeywordDensity.php';

    $KeywordDensity = new KeywordDensity();

    //Sanitize the URL
    $url = filter_var($_POST['url'], FILTER_SANITIZE_URL);

    $keywords = $KeywordDensity->getDensity($url);
    if ($keywords) {
        ?>
        <table class="widefat">
            <thead>
                <tr>
                    <th>Keyword</th>
                    <th>Count</th>
                    <th>Percent</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Keyword</th>
                    <th>Count</th>
                    <th>Percent</th>
                </tr>
            </tfoot>
            <tbody>
                <?php for ($x = 1; $x < count($keywords); $x++) { ?>
                    <tr>
                        <td><?php echo $keywords[$x]['keyword']; ?></td>
                        <td><?php echo $keywords[$x]['count']; ?></td>
                        <td><?php echo $keywords[$x]['percent']; ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <?php
    } else {
        echo "<b>No results</b>";
    }
}
?>
</div>