<?php

$now = new DateTime('now', new DateTimeZone('UTC'));
echo $now->format("Y-m-d H:i:s");

$now->modify("+4Week");
echo "<br />";
echo $now->format("Y-m-d H:i:s");
echo "<br />";
echo $now->getTimestamp();
echo "<br />";
$now->setTimezone(new DateTimeZone("Asia/Tokyo"));
echo $now->format("Y-m-d H:i:s");

echo "<br />";
echo $now->format("Y/m/d H:i:s");
?>
