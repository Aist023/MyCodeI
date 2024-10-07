<?= $this->extend('layouts/default.php') ?>

<?= $this->section('titel') ?>Home<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class='Block'>
        <div>
            <?php
                $strPrint='';
                if(isset($_COOKIE['User'])){
                    $strPrint.="<form action='' method='post'>
                        <div>
                            <h1>Привет: {$_COOKIE['User']}</h1>
                        </div>
                        <div>
                            <button type='submit' name='Ex_1_button' value='Log_Out'>Log Out</button>
                        </div>
                    </form>";
                }else{
                    $strPrint.="<form action='' method='post'>
                        <div>
                            <button type='submit' name='Ex_1_button' value='Registr'>Registr</button>
                        </div>
                        <div>
                            <button type='submit' name='Ex_1_button' value='Login'>Login</button>
                        </div>
                    </form>";
                }
                echo $strPrint;
            ?>
            <?php if (isset($tytel)) { echo $tytel; } ?>
        </div>
    </div>
    <div class='Block'>
        <div>
            <?php
                $strPrint='';
                $strPrint.="<form action='' method='post'>
                        <div>
                            <button type='submit' name='Ex_1_button' value='BookOpen'>BookOpen</button>
                        </div>
                    </form>";
                echo $strPrint;
            ?>
        </div>
    </div>
    <div class='Block'>
        <div>
            <?php
                $strPrint='';
                $strPrint.="<form action='' method='post'>
                        <div>
                            <button type='submit' name='Ex_1_button' value='Students'>Students</button>
                        </div>
                        <div>
                            <button type='submit' name='Ex_1_button' value='Courses'>Courses</button>
                        </div>
                    </form>";
                echo $strPrint;
            ?>
        </div>
    </div>
<?= $this->endSection() ?>