<?= $this->extend('layouts/default.php') ?>

<?= $this->section('titel') ?>Login<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class='Block'>
        <div>
            <h2>Login</h2>
            <form action="" method="post">
                <div>
                    <label for="Login">Login: </label>
                    <input type="text" name="Login" placeholder="Login" value='<?php echo isset($_POST['Login'])?$_POST['Login']:''; ?>'>
                </div>
                <div>
                    <label for="Password">Password: </label>
                    <input type="password" name="Password" placeholder="Password" value='<?php echo isset($_POST['Password'])?$_POST['Password']:''; ?>'>
                </div>
                <p style='color: red; <?php echo (isset($ErrorCode)&&$ErrorCode==1)?'':'display: none;';?>'>Error Login and Password</p>
                <div>
                    <button type='submit'>Login</button>
                    <button type='submit' name='EXIT_FORM' value='EXIT_FORM'>EXIT</button>
                </div>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>