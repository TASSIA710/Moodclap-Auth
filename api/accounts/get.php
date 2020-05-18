<?php

$LIMIT = 20;
$ORDER_BY = 'AccountID';
$ORDER_DIR = ' DESC';
$RESPONSE->accounts = [];



$sql = 'SELECT * FROM moodclap_accounts, moodclap_groups WHERE moodclap_accounts.GroupID=moodclap_groups.GroupID ORDER BY moodclap_accounts.' . $ORDER_BY . $ORDER_DIR . ' LIMIT ' . $LIMIT . ';';
foreach (Database::query($sql) as $row) {
	$RESPONSE->accounts[count($RESPONSE->accounts)] = [
		'AccountID' => $row['AccountID'],
		'Username' => $row['Username'],
		'GroupID' => $row['GroupID'],
		'GroupName' => $row['GroupName'],
	];
}
