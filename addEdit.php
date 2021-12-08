
<?php
@include('./estilos.php');
//start session
session_start();

//get session data
$sessData = !empty($_SESSION['sessData']) ? $_SESSION['sessData'] : '';

//get user data
if (!empty($_GET['id'])) {
    include 'DB.class.php';
    $db = new DB();
    $conditions['where'] = array(
        'id' => $_GET['id'],
    );
    $conditions['return_type'] = 'single';
    $userData = $db->getRows('users', $conditions);
}

$actionLabel = !empty($_GET['id']) ? 'Edit' : 'Add';

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
            <div class="panel-heading"><?php echo $actionLabel; ?> User <a href="index.php" class="glyphicon glyphicon-arrow-left"></a></div>
            <div class="panel-body">
                <form method="post" action="userAction.php" class="form">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo !empty($userData['name']) ? $userData['name'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="<?php echo !empty($userData['email']) ? $userData['email'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone" value="<?php echo !empty($userData['phone']) ? $userData['phone'] : ''; ?>">
                    </div>
                    <input type="hidden" name="id" value="<?php echo !empty($userData['id']) ? $userData['id'] : ''; ?>">
                    <input type="submit" name="userSubmit" class="btn btn-success" value="SUBMIT" />
                </form>
            </div>
        </div>
    </div>
</div>