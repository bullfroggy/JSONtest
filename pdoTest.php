<?php
try {
	$handler = new PDO('mysql:host=127.0.0.1;dbname=gamelist', 'jeremy', 'Oopsies!2');
	$handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e) {
	echo $e->getMessage();
	die('Connection to DB failed');
}

class Pop {
	public $name, $beaten, $physical, $release_date;
	
	public function __construct() {
		$this->name = "{$this->name} posted: {$this->release_date}";
	}
}

echo '<form type="submit">';
echo '<input type="text">';

$sql = "select * from all_games where name = :name";
$query = $handler->prepare($sql);

$query->execute(array(
	':name' => $name
));

?>