
<?php
	dl ("pdo_sqlite.so");

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

	$sql = "SELECT * FROM sqlite_master WHERE type='table'";

	$res = $pdo->query($sql);

	$flug = true;
	foreach ($res as $table_name) {
		if (!strcmp($table_name, "no_name")) {
			$flug = false;
		}
	}

	if ($flug) {
		$sql = "CREATE TABLE no_name(id INTEGER, name TEXT, hp INTEGER, shp INTEGER,
			atk INTEGER, def INTEGER, shri INTEGER, spd INTEGER, dex INTEGER,type TEXT,
			skillNum INTEGER, skill_1 TEXT, skill_2 TEXT, skill_3 TEXT, skill_4 TEXT);";

		$pdo->query($sql);
	}

	$sql = "INSERT INTO no_name(id, name, hp, shp, atk, def, shri, spd, dex, type, skillNum, skill_1, skill_2, skill_3, skill_4)
	 VALUES(:id, :name, :hp, :shp, :atk, :def, :shri, :spd, :dex, :type, :skillNum, :skill_1, :skill_2, :skill_3, :skill_4);";

	$stmt = $pdo->prepare($sql);
	
$id	= 0;
$name	= 'no_name';
$hp	= 0;
$shp	= 0;

$atk	= 0;
$def	= 0;
$shri	= 0;
$spd	= 0;
$dex	= 0;

$type	= 'none';
$skillNum = 0;
$skill_1 = 'none';
$skill_2 = 'none';
$skill_3 = 'none';
$skill_4 = 'none';

	$stmt->bindValue(':id', $id, PDO::PARAM_INT);
	$stmt->bindValue(':name', $name, PDO::PARAM_STR);
	$stmt->bindValue(':hp', $hp, PDO::PARAM_INT);
	$stmt->bindValue(':shp', $shp, PDO::PARAM_INT);
	$stmt->bindValue(':atk', $atk, PDO::PARAM_INT);
	$stmt->bindValue(':def', $def, PDO::PARAM_INT);
	$stmt->bindValue(':shri', $shri, PDO::PARAM_INT);
	$stmt->bindValue(':spd', $spd, PDO::PARAM_INT);
	$stmt->bindValue(':dex', $dex, PDO::PARAM_INT);
	$stmt->bindValue(':type', $type, PDO::PARAM_STR);
	$stmt->bindValue(':skillNum', $skillNum, PDO::PARAM_INT);
	$stmt->bindValue(':skill_1', $skill_1, PDO::PARAM_STR);
	$stmt->bindValue(':skill_2', $skill_2, PDO::PARAM_STR);
	$stmt->bindValue(':skill_3', $skill_3, PDO::PARAM_STR);
	$stmt->bindValue(':skill_4', $skill_4, PDO::PARAM_STR);

	$stmt->execute();


	$sql = "SELECT * FROM no_name";

	$st = $pdo->query($sql);

	$res = $st->fetch();

	print $res['id'] . "\n";
	print $res['name'] . "\n";
 





