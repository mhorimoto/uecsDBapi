<?php

$s = @$_GET['s'];
$e = @$_GET['e'];
$l = @$_GET['l'];
$r = @$_GET['r'];
$i = @$_GET['i'];

if ($i==null) {
    exit;
}

if ($l<1) {
    $l = 100;
}
if (($s==null)&&($e==null)) {
    $b = time();
    $e = date('Y-m-d H:i:s',$b);
    $s = date('Y-m-d H:i:s',($b-86400)); // 1日前
}
if ($r==null) {
    $o = "";
} else {
    $o = "DESC";
}
$dsn = 'uri:file:///var/www/etc/uecsdbconnect';

try {
    $dbh = new PDO($dsn);
} catch(PDOException $x) {
    echo 'Connection Failed: ',$x->getMessage();
}

$sql = sprintf("SELECT tod,ccmtype,room,region,ord,priority,value,ip,serialid FROM t_data WHERE ip=:ip AND tod>=:start AND tod<=:end ORDER BY tod %s LIMIT :limit",$o);
$sth = $dbh->prepare($sql);
$sth->execute(array(':start'=>$s,':end'=>$e,':limit'=>$l,':ip'=>$i));
$dat = $sth->fetchAll(PDO::FETCH_ASSOC);
//printf("<p>s=%s<br>",$s);
//printf("e=%s<br>",$e);
//printf("l=%s<br>",$l);
//printf("o=%s<br>",$o);
//printf("SQL=%s</p>",$sql);
echo json_encode($dat);
exit;
?>
