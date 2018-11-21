<?php
/**
 * Created by PhpStorm.
 * User: 2gdaw05
 * Date: 14/11/2018
 * Time: 9:25
 */
include_once 'connection.php';


 function save($url)
{
    $conexion=connect();
    $consulta = $conexion->prepare('INSERT INTO archive (url)
                                        VALUES (:url)');
    $consulta->execute(array(
        ":url" => $url
    ));
    echo 'Su archivo ha sido subido.';
    $conexion = null;
    return true;
}




function getLastArchive()
{
    $conexion = connect();
    $consulta = $conexion->prepare('
            SELECT max(id) as id
            FROM archive
            ');
    $consulta->execute();
    $question = $consulta->fetchObject();

    $conexion=null;
    return $question;

}

function getAllByQuestion($id_question)
{
    $conexion = connect();
    $consulta = $conexion->prepare('
            SELECT id,url 
            FROM archive
            WHERE id_question=:id_question');
    $consulta->execute(array(":id_question" => $id_question));
    $archives = $consulta->fetchAll();

    $conexion=null;
    return $archives;

}



function update($question)
{

    $conexion= connect();
    try {
        $consulta = $conexion->prepare('
                UPDATE archive 
                SET  id_question = :id_question
                WHERE id_question IS null ');
        $consulta->execute(array(
            "id_question" => $question,
        ));
        //COMPROBAMOS QUE SE HA HECHO EL UPDATE
        $rows=$consulta->rowCount();
        if( $rows> -1) {
            echo "El archivo se ha modificadp correctamente.";
            return true;
        }
        else {
            echo 'La actualización de archivo no se ha podido realizar.<br>'
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

