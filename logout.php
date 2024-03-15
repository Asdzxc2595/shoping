<?php
session_start();
session_destroy();
echo "
<script>
alert('กำลังออกจากระบบ...');
window.location.replace('loginform.php');
</script>
";
?>