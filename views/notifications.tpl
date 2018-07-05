<?php if ( @$result_success != '' ) { ?> 
<div class="success"><?=$result_success?></div>
<?php } ?>

<?php if ( @$result_info != '' ) { ?> 
<div class="info-notification"><?=$result_info?></div>
<?php } ?>

<?php if ( @$result_error != '' ) { ?> 
<div class="error"><?=$result_error?></div>
<?php } ?>