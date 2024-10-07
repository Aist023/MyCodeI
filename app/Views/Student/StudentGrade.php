<?= $this->extend('layouts/default.php') ?>

<?= $this->section('titel') ?>Student Grade<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class='Block'>
        <div>
            <form action="/PHP/MyCodeI_1/Student/grade" method="post">
                <input type="text" name="EnrollmentsID" value='<?php echo isset($_POST['EnrollmentsID'])?$_POST['EnrollmentsID']:(isset($EnrollmentsID)?$EnrollmentsID:'-1'); ?>' hidden>
                <div>
                    <label for="EGrade">Оцените работу студента: </label>
                    <select name="EGrade">
                        <option value="0" <?php echo (isset($_POST['EGrade'])&&$_POST['EGrade']=='0')?'selected':((isset($EGrade)&&$EGrade=='0')?'selected':''); ?>>Null</option>
                        <option value="1" <?php echo (isset($_POST['EGrade'])&&$_POST['EGrade']=='1')?'selected':((isset($EGrade)&&$EGrade=='1')?'selected':''); ?>>1</option>
                        <option value="2" <?php echo (isset($_POST['EGrade'])&&$_POST['EGrade']=='2')?'selected':((isset($EGrade)&&$EGrade=='2')?'selected':''); ?>>2</option>
                        <option value="3" <?php echo (isset($_POST['EGrade'])&&$_POST['EGrade']=='3')?'selected':((isset($EGrade)&&$EGrade=='3')?'selected':''); ?>>3</option>
                        <option value="4" <?php echo (isset($_POST['EGrade'])&&$_POST['EGrade']=='4')?'selected':((isset($EGrade)&&$EGrade=='4')?'selected':''); ?>>4</option>
                        <option value="5" <?php echo (isset($_POST['EGrade'])&&$_POST['EGrade']=='5')?'selected':((isset($EGrade)&&$EGrade=='5')?'selected':''); ?>>5</option>
                        <option value="6" <?php echo (isset($_POST['EGrade'])&&$_POST['EGrade']=='6')?'selected':((isset($EGrade)&&$EGrade=='6')?'selected':''); ?>>6</option>
                        <option value="7" <?php echo (isset($_POST['EGrade'])&&$_POST['EGrade']=='7')?'selected':((isset($EGrade)&&$EGrade=='7')?'selected':''); ?>>7</option>
                        <option value="8" <?php echo (isset($_POST['EGrade'])&&$_POST['EGrade']=='8')?'selected':((isset($EGrade)&&$EGrade=='8')?'selected':''); ?>>8</option>
                        <option value="9" <?php echo (isset($_POST['EGrade'])&&$_POST['EGrade']=='9')?'selected':((isset($EGrade)&&$EGrade=='9')?'selected':''); ?>>9</option>
                        <option value="10" <?php echo (isset($_POST['EGrade'])&&$_POST['EGrade']=='10')?'selected':((isset($EGrade)&&$EGrade=='10')?'selected':''); ?>>10</option>
                        <option value="11" <?php echo (isset($_POST['EGrade'])&&$_POST['EGrade']=='11')?'selected':((isset($EGrade)&&$EGrade=='11')?'selected':''); ?>>11</option>
                        <option value="12" <?php echo (isset($_POST['EGrade'])&&$_POST['EGrade']=='12')?'selected':((isset($EGrade)&&$EGrade=='12')?'selected':''); ?>>12</option>
                    </select>
                </div>
                <div>
                    <div><button type='submit' name='Save' value='Save'>Save</button></div>
                    <div><button type='submit' name='EXIT_FORM' value='EXIT_FORM'>EXIT</button></div>
                </div>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>