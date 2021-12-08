<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<?php
//start session
session_start();

//get session data
$sessData = !empty($_SESSION['sessData']) ? $_SESSION['sessData'] : '';

//load and initialize database class
require_once 'DB.class.php';
$db = new DB();

//get users from database
$users = $db->getRows('users', array('order_by' => 'id DESC'));

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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="userData">
                    <?php if (!empty($users)) : $count = 0;
                        foreach ($users as $user) : $count++; ?>
                            <tr>
                                <td><?php echo '#' . $count; ?></td>
                                <td><?php echo $user['name']; ?></td>
                                <td><?php echo $user['email']; ?></td>
                                <td>
                                    <<?php echo $user['phone']; ?>< /td>
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