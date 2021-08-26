<?php 


if(empty($_SESSION['info']['admin_id']) && empty($_SESSION['info']['s_id']) &&  empty($_SESSION['info']['p_id']))
{

  ?><script>

          window.location = 'login.php?err=Session has been expired';
          </script>
          <?php
    exit;
}
?>


