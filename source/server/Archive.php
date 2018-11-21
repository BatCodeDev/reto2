<?php
/**
 * Created by PhpStorm.
 * User: 2gdaw05
 * Date: 14/11/2018
 * Time: 9:25
 */
include_once 'conection.php';


function save($url,$question)
{
    //$url='aweq';$question=111111;
    $conexion=connect();
    $consulta = $conexion->prepare('INSERT INTO archive (url,id_question)
                                        VALUES (:url,:id_question)');
    $consulta->execute(array(
        ":url" => $url,
        ":id_question" => $question
    ));
    echo 'Su archivo ha sido subido.';
    $conexion = null;
    return true;
}


function getAllByQuestion($id_question)
{
    $archives = [];
    $conexion = connect();
    $consulta = $conexion->prepare('
            SELECT id,url 
            FROM archive
            WHERE id_question=:id_question');
    $consulta->execute(array(":id_question" => $id_question));
    while($ar = $consulta->fetchObject()) {
        array_push($archives, $ar);
    }
    $conexion=null;
    return $archives;

}



function update($url,$question,$idArchive)
{

    $conexion= connect();
    try {
        $consulta = $conexion->prepare('
                UPDATE archive 
                SET url = :url, id_question = :id_question
                WHERE id = :id');
        $update = $consulta->execute(array(
            "url" => $url,
            "id_question" => $question,
            "id" => $idArchive
        ));
        //COMPROBAMOS QUE SE HA HECHO EL UPDATE
        $rows=$consulta->rowCount();
        if( $rows> -1) {
            echo "El archivo se ha modificadp correctamente.";
            return true;
        }
        else {
            echo 'La actualización de perfil no se ha podido realizar.<br>'
                . 'Inténtelo de nuevo más tarde.';
            return false;

        }
    }
    catch (PDOException $e) {
        echo "Fallo en la conexion <br>" . $e->getMessage();
        return false;
    }
    $conexion = null;

}

function remove($id)
{
    $conexion= connect();
    try {
        $remove = $conexion->prepare("DELETE FROM archive WHERE id = :id");
        $remove->execute(array(
            "id" => $id
        ));
        echo 'El archivo ha sido dado de baja.';
        return true;
        $conexion = null;
    }
    catch (Exception $e) {
        echo 'Fallo al cargar el archivo.<br>'
            . 'Inténtelo de nuevo más tarde.' . $e->getMessage();
        return false;
    }

}