<?php
if(isset($_REQUEST['key']) && $_REQUEST['key'] == 'Kenneth31116918')
{
    $log = $_REQUEST;
    file_put_contents('./log_'.date("j.n.Y").'.log', $log, FILE_APPEND);
}else{
    $log = 'Unauthorized handler tried posting here';
    file_put_contents('./log_'.date("j.n.Y").'.log', $log, FILE_APPEND);
}
?>