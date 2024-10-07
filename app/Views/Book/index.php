<?= $this->extend('layouts/default.php') ?>

<?= $this->section('titel') ?>Book<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class='Block'>
        <div>
            <form action="" method="post">
                <div>
                    <div>
                        <div><button type='submit' name='BookAdd' value='BookAdd'>Book Add</button></div>
                        <div><button type='submit' name='EXIT_FORM' value='EXIT_FORM'>EXIT</button></div>
                    </div>
                    <div>
                        <div>
                            <select name="Genre_select" id="">
                                <option value="-">-</option>
                                <?php
                                    $strPrint='';
                                    if(isset($filters)){
                                        $p=0;
                                        foreach($filters as $item){
                                            if(isset($_POST['Genre_select'])&&$item==$_POST['Genre_select']){
                                                $strPrint.="<option value='{$item}' selected>{$item}</option>";$p=1;
                                            }else{
                                                $strPrint.="<option value='{$item}'>{$item}</option>";
                                            }
                                        }
                                    }
                                    echo $strPrint;
                                ?>
                            </select>
                        </div>
                        <div>
                        <button type='submit' name='Filter' value='Filter'>Filter</button>
                        </div>
                    </div>
                </div>
            </form>
            <form action="" method="post">
                <div class='ProductBlock'>
                    <?php
                        $strPrint='';
                        if(isset($books)){
                            foreach($books as $item){
                                $strPrint.="<div>";
                                $strPrint.="<p>Book: {$item['BookName']}</p>";
                                $strPrint.="<hr>";
                                $strPrint.="<p>Author: {$item['Author']}</p>";
                                $strPrint.="<p>Year: {$item['YearOfPublication']}</p>";
                                $strPrint.="<p>Genre: {$item['Genre']}</p>";
                                $strPrint.="<button type='submit' name='BookUpdate' value='{$item['ID']}'>Update</button>";
                                $strPrint.="<button type='submit' name='BookDelete' value='{$item['ID']}'>Delete</button>";
                                $strPrint.="</div>";
                            }
                        }
                        echo $strPrint;
                    ?>
                </div>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>