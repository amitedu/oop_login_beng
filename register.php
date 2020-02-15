
<?php 
    include 'inc/header.php'; 
    include 'lib/User.php';

?>
<?php
    $user = new User();
    $name = $username = $email = '';
    $userReg = array('name' => '', 'username' => '', 'email' => '', 'password' => '');

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register']))
    {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $userReg = $user->userregister($_POST);
        print_r($userReg);
    }
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h2>User Register</h2>
    </div>
   
    <div class="panel-body">
        <form action="" method="post">
            <div style="max-width: 500px; margin: 0 auto">
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="<?= htmlspecialchars($name); ?>"/>
                    <div style="color: red;"><?= $userReg['name']; ?></div>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" value="<?= htmlspecialchars($username); ?>"/>
                    <div style="color: red;"><?= $userReg['username']; ?></div>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="text" id="email" name="email" class="form-control" value="<?= htmlspecialchars($email); ?>"/>
                    <div style="color: red;"><?= $userReg['email']; ?></div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" id="password" name="password" class="form-control">
                    <div style="color: red;"><?= $userReg['password']; ?></div>
                </div>
                <button type="submit" name="register" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>

</div>


<?php include 'inc/footer.php'; ?>
