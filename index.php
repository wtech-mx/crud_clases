
<?php
//start session
session_start();
include('./estilos.php');
//get session data
$sessData = !empty($_SESSION['sessData']) ? $_SESSION['sessData'] : '';

//load and initialize database class
require_once 'DB.class.php';
$db = new DB();

//get users from database
$users = $db->getRows('cporte_tvehiculos', array('order_by' => 'id DESC'));

//get status message from session
if (!empty($sessData['status']['msg'])) {
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>

<div class="container">
    <?php if (!empty($statusMsg) && ($statusMsgType == 'success')) { ?>
        <div class="alert alert-success"><?php echo $statusMsg; ?></div>
    <?php } elseif (!empty($statusMsg) && ($statusMsgType == 'error')) { ?>
        <div class="alert alert-danger"><?php echo $statusMsg; ?></div>
    <?php } ?>
    <div class="row">
        <div class="panel panel-default users-content">
            <div class="panel-heading">Users <a href="addEdit.php" class="glyphicon glyphicon-plus"></a></div>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th></th>
						<th class='text-center'>Placa</th>
						<th class='text-center'>Año </th>
						<th class='text-center'>Tipo </th>
						<th class='text-center'>Permiso SCT</th>
						<th class='text-center'># Permiso</th>
						<th class='text-center'>Aseguradora resp. civil</th>
                        <th class='text-center'># Poliza resp. civil</th>
						<th class='text-center'>Aseguradora de la carga</th>
						<th class='text-center'># Póliza de la carga</th>
						<th class='text-center'>Aseguradora del medio ambiente</th>
						<th class='text-center'># Póliza medio ambiente</th>
						<th class='text-center'>Prima del seguro</th>
						<th></th>
                    </tr>
                </thead>
                <tbody id="userData">
                    <?php if (!empty($users)) : $count = 0;
                        foreach ($users as $user) : $count++; ?>
                            <tr>
                                <td><?php echo '#' . $count; ?></td>
                                <td><?php echo $user['placa']; ?></td>
                                <td><?php echo $user['anio']; ?></td>
                                <td><?php echo $user['tipo']; ?></td>
                                <td><?php echo $user['permisosct']; ?></td>
                                <td><?php echo $user['numeropermisosct']; ?></td>
                                <td><?php echo $user['nombreaseguradoraresponsabilidadcivil']; ?></td>
                                <td><?php echo $user['numeropolizaresponsabilidadcivil']; ?></td>
                                <td><?php echo $user['nombreaseguradoracarga']; ?></td>
                                <td><?php echo $user['numeropolizacarga']; ?></td>
                                <td><?php echo $user['nombreaseguradoramedioambiente']; ?></td>
                                <td><?php echo $user['numeropolizamedioambiente']; ?></td>
                                <td><?php echo $user['primaseguro']; ?></td>
                                <td>
                                    <a href="addEdit.php?id=<?php echo $user['id']; ?>" class="glyphicon glyphicon-edit"></a>
                                    <a href="userAction.php?action_type=delete&id=<?php echo $user['id']; ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
                                </td>
                            </tr>
                        <?php endforeach;
                    else : ?>
                        <tr>
                            <td colspan="5">No user(s) found......</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>