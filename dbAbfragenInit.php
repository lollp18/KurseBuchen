<?php

class DB {
    public $response =[];

    public function connect() {

        try {
            $datasource = "mysql:host=localhost;dbname=kurse";
            return new PDO($datasource, "root", "");
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
            die();
        }
    }


public function GetAllKurse() {

        try {
            header('Content-Type: application/json');
$sql='SELECT * FROM Kurse';
$statement=$this->connect()->prepare($sql);
$inserted= $statement->execute();

if ($inserted) {
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($data);
} else {
    $response["massage"]= "GetAllKurse fehlgeschlagen";
}
} catch (PDOException $exc) {
            echo $exc->getTraceAsString();
            die();
        }
    

}


public function Registriren($Schülername,$stufe,$email,$Passwort) {

    try {
       
$sql="INSERT INTO schüler (Schülername, stufe, email, Passwort) VALUES (?,?,?,?)";
$st=$this->connect()->prepare($sql);


$inserted = $st->execute([$Schülername,$stufe,$email,$Passwort]);

if ($inserted) {

    header('Content-type: application/json');
    echo json_encode("User Erstelt");


} else {

    header('Content-type: application/json');
    echo json_encode("Registriren fehlgeschlagen");

}
    } catch (PDOException $exc) {
        echo $exc->getTraceAsString();
        die();
    }
}

}





?>