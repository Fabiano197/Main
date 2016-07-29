<?php

function message_preview($name, $timestamp, $message, $image){

?>
<li class="message-preview">
    <a href="#">
        <div class="media">
            <span class="pull-left">
                <img class="media-object" src="<?php echo $image; ?>" alt="">
            </span>
			<div class="media-body">
				<h5 class="media-heading"><strong><?php echo $name; ?></strong>
				</h5>
				<p class="small text-muted"><i class="fa fa-clock-o"></i> <?php echo $timestamp; ?></p>
				<p><?php echo $message; ?></p>
			</div>
        </div>
    </a>
</li>

<?php
}

function message_alert($alert_name, $badge_caption, $alert_type){
?>
<li>
    <a href="#"><?php echo $alert_name; ?> <span class="label label-<?php echo $alert_type; ?>"><?php echo $badge_caption; ?></span></a>
</li>
<?php
}
?>