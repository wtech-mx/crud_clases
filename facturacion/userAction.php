<?php
//start session
session_start();

//load and initialize database class
require_once '../DB.class.php';
$db = new DB();

$tblName = 'facturacion';

//set default redirect url
$redirectURL = 'index.php';

if (isset($_POST['userSubmit'])) {
    if (!empty($_POST['rfc'])) {
        if (!empty($_POST['id'])) {
            //update data
            $userData = array(
                'rfc' => $_POST['rfc'],
                'nombre_razon' => $_POST['nombre_razon'],
                'curp' => $_POST['curp'],
                'tax_id' => $_POST['tax_id'],
                'no_licencia' => $_POST['no_licencia']
            );
            $condition = array('id' => $_POST['id']);
            $update = $db->update($tblName, $userData, $condition);
            if ($update) {
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'User data has been updated successfully.';
            } else {
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Some problem occurred, please try again.';

                //set redirect url
                $redirectURL = 'addEdit.php';
            }
        } else {
            //insert data
            $userData = array(
                'rfc' => $_POST['rfc'],
                'nombre_razon' => $_POST['nombre_razon'],
                'curp' => $_POST['curp'],
                'tax_id' => $_POST['tax_id'],
                'no_licencia' => $_POST['no_licencia']
            );
            $insert = $db->insert($tblName, $userData);
            if ($insert) {
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'User data has been added successfully.';
            } else {
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Some problem occurred, please try again.';

                //set redirect url
                $redirectURL = 'addEdit.php';
            }
        }
    } else {
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'All fields are mandatory, please fill all the fields.';

        //set redirect url
        $redirectURL = 'addEdit.php';
    }

    //store status into the session
    $_SESSION['sessData'] = $sessData;

    //redirect to the list page
    header("Location:" . $redirectURL);
} elseif (($_REQUEST['action_type'] == 'delete') && !empty($_GET['id'])) {
    //delete data
    $condition = array('id' => $_GET['id']);
    $delete = $db->delete($tblName, $condition);
    if ($delete) {
        $sessData['status']['type'] = 'success';
        $sessData['status']['msg'] = 'User data has been deleted successfully.';
    } else {
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'Some problem occurred, please try again.';
    }

    //store status into the session
    $_SESSION['sessData'] = $sessData;

    //redirect to the list page
    header("Location:" . $redirectURL);
}
exit();
