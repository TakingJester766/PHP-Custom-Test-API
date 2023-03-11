<?php 

require_once './config.php';
class API {
    function Select() {
        $db = new Connect;
        $users = array();
        $data = $db->prepare('SELECT * FROM users ORDER BY id');
        $data->execute();
        while($outputData = $data->fetch(PDO::FETCH_ASSOC)) {
            $users[$outputData['id']] = array(
                'id' => $outputData['id'],
                'name' => $outputData['name'],
                'age' => $outputData['age'],
            );
        }
        return json_encode($users);
    }
}

$API = new API;

header('Content-Type: application/json');

echo $API->Select();


?>