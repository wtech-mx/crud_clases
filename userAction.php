<?php
//start session
session_start();

//load and initialize database class
require_once 'DB.class.php';
$db = new DB();

$tblName = 'cporte_tvehiculos';

//set default redirect url
$redirectURL = 'index.php';

if(isset($_POST['userSubmit'])){
    if(!empty($_POST['placa'])){
        if(!empty($_POST['id'])){
            //update data
            $userData = array(
                'placa' => $_POST['placa'],
                'anio' => $_POST['anio'],
                'tipo' => $_POST['tipo'],
                'permisosct' => $_POST['permisosct'],
                'numeropermisosct' => $_POST['numeropermisosct'],
                'nombreaseguradoraresponsabilidadcivil' => $_POST['nombreaseguradoraresponsabilidadcivil'],
                'numeropolizaresponsabilidadcivil' => $_POST['numeropolizaresponsabilidadcivil'],
                'nombreaseguradoracarga' => $_POST['nombreaseguradoracarga'],
                'numeropolizacarga' => $_POST['numeropolizacarga'],
                'nombreaseguradoramedioambiente' => $_POST['nombreaseguradoramedioambiente'],
                'numeropolizamedioambiente' => $_POST['numeropolizamedioambiente'],
                'primaseguro' => $_POST['primaseguro']
            );
            $condition = array('id' => $_POST['id']);
            $update = $db->update($tblName, $userData, $condition);
            if($update){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'User data has been updated successfully.';
            }else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Some problem occurred, please try again.';
                
                //set redirect url
                $redirectURL = 'addEdit.php';
            }
        }else{
            //insert data
            $userData = array(
                'placa' => $_POST['placa'],
                'anio' => $_POST['anio'],
                'tipo' => $_POST['tipo'],
                'permisosct' => $_POST['permisosct'],
                'numeropermisosct' => $_POST['numeropermisosct'],
                'nombreaseguradoraresponsabilidadcivil' => $_POST['nombreaseguradoraresponsabilidadcivil'],
                'numeropolizaresponsabilidadcivil' => $_POST['numeropolizaresponsabilidadcivil'],
                'nombreaseguradoracarga' => $_POST['nombreaseguradoracarga'],
                'numeropolizacarga' => $_POST['numeropolizacarga'],
                'nombreaseguradoramedioambiente' => $_POST['nombreaseguradoramedioambiente'],
                'numeropolizamedioambiente' => $_POST['numeropolizamedioambiente'],
                'primaseguro' => $_POST['primaseguro']
            );
            $insert = $db->insert($tblName, $userData);
            if($insert){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'User data has been added successfully.';
            }else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Some problem occurred, please try again.';
                
                //set redirect url
                $redirectURL = 'addEdit.php';
            }
        }
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'All fields are mandatory, please fill all the fields.';
        
        //set redirect url
        $redirectURL = 'addEdit.php';
    }
    
    //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
}elseif(($_REQUEST['action_type'] == 'delete') && !empty($_GET['id'])){
    //delete data
    $condition = array('id' => $_GET['id']);
    $delete = $db->delete($tblName, $condition);
    if($delete){
        $sessData['status']['type'] = 'success';
        $sessData['status']['msg'] = 'User data has been deleted successfully.';
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'Some problem occurred, please try again.';
    }
    
    //store status into the session
    $_SESSION['sessData'] = $sessData;

    //redirect to the list page
    header("Location:".$redirectURL);
}
exit();
