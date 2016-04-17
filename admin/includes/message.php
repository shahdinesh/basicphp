<?php
if(isset($success)){
?>
<!-- Message OK -->		
<div class="msg msg-ok">
    <p><strong><font size="+1" color="#00FF00"><?php echo $success; ?>!!!</font></strong></p>
</div>
<!-- End Message OK -->		
<?php
}elseif(isset($error)){
?>
<!-- Message Error -->
<div class="msg msg-error">
    <p><strong><font size="+2" color="#00CC00"><?php echo $error; ?>!!!</font></strong></p>
</div>
<!-- End Message Error -->
<?php
}
?>
<br />