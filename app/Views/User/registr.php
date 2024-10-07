<?= $this->extend('layouts/default.php') ?>

<?= $this->section('titel') ?>Registr<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class='Block'>
        <div>
            <h2>Registr</h2>
            <form action="" method="post">
                <div>
                    <p style='color: red; <?php echo (isset($ErrorCode)&&$ErrorCode==1)?'':'display: none;';?>'>Login is too short</p>
                    <p style='color: red; <?php echo (isset($ErrorCode)&&$ErrorCode==5)?'':'display: none;';?>'>there is already such a user</p>
                    <label for="Login">Login: </label>
                    <input type="text" name="Login" placeholder="Login" value='<?php echo isset($_POST['Login'])?$_POST['Login']:''; ?>'>
                </div>
                <div>
                    <p style='color: red; <?php echo(isset($ErrorCode)&&$ErrorCode==2)?'':'display: none;';?>'>Password is too short</p>
                    <label for="Password">Password: </label>
                    <input type="password" name="Password" placeholder="Password" value='<?php echo isset($_POST['Password'])?$_POST['Password']:''; ?>'>
                </div>
                <div>
                    <p style='color: red; <?php echo(isset($ErrorCode)&&$ErrorCode==3)?'':'display: none;';?>'>Repeat Password != Password</p>
                    <label for="Repeat_Password">Repeat Password: </label>
                    <input type="password" name="Repeat_Password" placeholder="Repeat Password" value='<?php echo isset($_POST['Repeat_Password'])?$_POST['Repeat_Password']:''; ?>'>
                </div>
                <div>
                    <label for="Name">Name: </label>
                    <input type="text" name="Name" placeholder="Name" value='<?php echo isset($_POST['Name'])?$_POST['Name']:''; ?>'>
                </div>
                <div>
                    <label for="Surname">Surname: </label>
                    <input type="text" name="Surname" placeholder="Surname" value='<?php echo isset($_POST['Surname'])?$_POST['Surname']:''; ?>'>
                </div>
                <div>
                    <label for="Country">Country: </label>
                    <input type="text" name="Country" placeholder="Country" value='<?php echo isset($_POST['Country'])?$_POST['Country']:''; ?>'>
                </div>
                <div>
                    <label for="City">City: </label>
                    <input type="text" name="City" placeholder="City" value='<?php echo isset($_POST['City'])?$_POST['City']:''; ?>'>
                </div>
                <div><p style='color: red; <?php echo (isset($ErrorCode)&&$ErrorCode==4)?'':'display: none;';?>'>Fill in all fields</p></div>
                <div>
                    <button type='submit'>Registr</button>
                    <button type='submit' name='EXIT_FORM' value='EXIT_FORM'>EXIT</button>
                </div>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>