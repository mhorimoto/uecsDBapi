<?php

$s = @$_GET['s'];
$e = @$_GET['e'];
$l = @$_GET['l'];

if ($l<1) {
    $l = 100;
}
if (($s==null)&&($e==null)) {
    $b = time();
    $e = date('Y-m-d H:i:s',$b);
    $s = date('Y-m-d H:i:s',($b-86400)); // 1日前
}

$dsn = 'uri:file:///var/www/etc/uecsdbconnect';

try {
    $dbh = new PDO($dsn);
} catch(PDOException $x) {
    echo 'Connection Failed: ',$x->getMessage();
}

$sql = "SELECT DISTINCT ip FROM t_data WHERE tod>=:start AND tod<=:end ORDER BY ip LIMIT :limit";
$sth = $dbh->prepare($sql);
$sth->execute(array(':start'=>$s,':end'=>$e,':limit'=>$l));
$iplist = $sth->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($iplist);
exit;
?>
