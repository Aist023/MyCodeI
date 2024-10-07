<?= $this->extend('layouts/default.php') ?>

<?= $this->section('titel') ?>Add Book<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class='Block'>
        <div>
        <h2><?php echo (isset($_POST['BookID'])&&$_POST['BookID']>-1)?'Update Book':((isset($book['ID'])&&$book['ID']>-1)?'Update Book':'Add Book'); ?></h2>
            <form action="/PHP/MyCodeI_1/Book/BookForm" method="post">
                <input type="text" name="BookID" value='<?php echo isset($_POST['BookID'])?$_POST['BookID']:(isset($book)?$book['ID']:'-1'); ?>' hidden>
                <div>
                    <label for="BookName">Book Name: </label>
                    <input type="text" name="BookName" placeholder="BookName" value='<?php echo isset($_POST['BookName'])?$_POST['BookName']:(isset($book)?$book['BookName']:''); ?>'>
                </div>
                <div>
                    <label for="Author">Author: </label>
                    <input type="text" name="Author" placeholder="Author" value='<?php echo isset($_POST['Author'])?$_POST['Author']:(isset($book)?$book['Author']:''); ?>'>
                </div>
                <div>
                    <label for="YearOfPublication">YearOfPublication: </label>
                    <input type="number" name="YearOfPublication" placeholder="YearOfPublication" value='<?php echo isset($_POST['YearOfPublication'])?$_POST['YearOfPublication']:(isset($book)?$book['YearOfPublication']:''); ?>'>
                </div>
                <div>
                    <label for="Genre">Genre: </label>
                    <input type="text" name="Genre" placeholder="Genre" value='<?php echo isset($_POST['Genre'])?$_POST['Genre']:(isset($book)?$book['Genre']:''); ?>'>
                </div>
                <div><p style='color: red; <?php echo (isset($ErrorCode)&&$ErrorCode==1)?'':'display: none;';?>'>Fill in all fields</p></div>
                <div>
                    <button type='submit'><?php echo (isset($_POST['BookID'])&&$_POST['BookID']>-1)?'Update Book':((isset($book['ID'])&&$book['ID']>-1)?'Update Book':'Add Book'); ?></button>
                    <button type='submit' name='EXIT_FORM' value='EXIT_FORM'>EXIT</button>
                </div>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>