<?php

	try {
		$pdo = new PDO('sqlite:twitstatus.sqlite3');
	} catch (PDOException $e) {
		print $e->GetMessage();
	}
/*
table|MIKO|MIKO|2|CREATE TABLE MIKO
(id INTEGER, name TEXT, hp INTEGER, shp INTEGER, atk INTEGER, def INTEGER, shri INTEGER, spd INTEGER, dex INTEGER,
type TEXT, skillNum INTEGER, skill_1 TEXT, skill_2 TEXT, skill_3 TEXT, skill_4 TEXT)
*/

	$sql = "SELECT tbl_name FROM sqlite_master WHERE type='table';";
	try {
		$res = $pdo->query($sql);
	} catch (PDOException $e) {

                print $e->GetMessage();
        }

	$TableCreateFlug = true;
	foreach ($res as $table) {
		foreach ($table as $table_name) {
			print $table_name . "\n";
			if (!strcmp($table_name, 'no_name')) {
				$TableCreateFlug = false;
			}
		}
		if($TableCreateFlug == false) {
			break;
		}
	}
	
	if ($TableCreateFlug == true) {
		print "Create Table.\n";
		/*
		echo <<< EOM
			Create Table <br />
			EOM;
		*/

		$sql = "CREATE TABLE no_name
			(id INTEGER, hp INTEGER, shp INTEGER,
			atk INTEGER, def INTEGER, shri INTEGER, spd INTEGER, dex INTEGER, skillNum INTEGER,
			type TEXT, name TEXT, skill_1 TEXT, skill_2 TEXT, skill_3 TEXT, skill_4 TEXT);";

		$pdo->query($sql);
	}

	$sql = "INSERT INTO no_name(id, hp, shp, atk, def, shri, spd, dex, skillNum, type, name, skill_1, skill_2, skill_3, skill_4)
	 VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

	$stmt = $pdo->prepare($sql);

	if ($stmt == false) {
		print "error\n";
		exit(1);
	}

	$status_int = array("id"=> 0, "hp"=> 0, "shp"=> 0, "atk"=> 0, "def"=> 0,"shri"=> 0, "spd"=> 0, "dex"=> 0, "skillNum"=> 0);
	$status_txt = array( "type"=> 'nonoe', "name"=>'no_name', "skill_1"=> 'none', "skill_2"=> 'none', "skill_3"=> 'none', "skill_4"=> 'none');

	$cnt = 0;
	foreach ($status_int as $key=>$value) {
		print  $key  . " = " . $value .  "\n";
		$stmt->bindValue($cnt, $value, PDO::PARAM_INT);
		$cnt++;
	}
	foreach ($status_txt as $key=>$value) {
		print $key . " = " . $value . "\n";
		$stmt->bindValue($cnt, $value, PDO::PARAM_STR);
		$cnt++;
	}

	$stmt->execute();

	$sql = "SELECT * FROM no_name";
	$stmt = $pdo->query($sql);
	$res = $stmt->fetch();

	print $res['id'] ."\n";
	print $res['name'] . "\n";



