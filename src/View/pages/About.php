<h1>Test about</h1>

<?php use App\src\model\Database\DatabaseConnexion;

$db = new DatabaseConnexion();
$dbPDO = $db->getPDO();

$sql = 'SELECT * FROM test';
$req = $dbPDO->prepare($sql);
$req->execute();
$result = $req->fetchAll(PDO::FETCH_ASSOC);
echo $result[0]['test'];