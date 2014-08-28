<?php
session_start();
session_unset();
session_destroy();
?>
<script type="text/javascript">
alert('Terimakasih. Anda sudah keluar dari sistem.');
document.location = 'login.php'
</script>