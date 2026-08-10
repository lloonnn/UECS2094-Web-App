<?php

$members = [
    '<b>Tham Mun Fatt</b>',
    'Tan Chin Tiong',
    'Apple Tiong',
    'Tiong Na Na',
    'Sam Sung'
];

echo "<ul>";
foreach($members as $member){
    echo "<li>" .htmlspecialchars($member). "</li>";
}

echo "</ul>";
?>

