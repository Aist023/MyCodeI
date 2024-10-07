<?= $this->extend('layouts/default.php') ?>

<?= $this->section('titel') ?>Student<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class='Block'>
        <div>
            <form action="/PHP/MyCodeI_1/Student/cabinet" method="post">
                <input type="text" name="StudentID" value='<?php echo isset($_POST['StudentID'])?$_POST['StudentID']:(isset($StudentID)?$StudentID:'-1'); ?>' hidden>
                <div>
                    <div>
                        <h2>Average Bal: <?php echo (isset($AveBal)?$AveBal:'-') ?></h2>
                    </div>
                    <div>
                        <div>
                            <select name="Filter_Signed">
                                <option value="Signed" <?php echo (isset($_POST['Filter_Signed'])&&$_POST['Filter_Signed']=='Signed')?'selected':''; ?>>Signed</option>
                                <option value="Not_Signed" <?php echo (isset($_POST['Filter_Signed'])&&$_POST['Filter_Signed']=='Not_Signed')?'selected':''; ?>>Not Signed</option>
                            </select>
                        </div>
                        <div><button type='submit' name='Filter' value='Filter'>Filter</button></div>
                    </div>
                </div>
                <div class='Table'>
                    <?php
                        $strPrint='<div><table>';
                        $strPrint.="<tr>";
                        if(isset($typeTable)&&$typeTable=='Not_Signed'){
                            $strPrint.="<th>Course Name</th>
                            <th>Description</th>
                            <th>Triviality In Days</th>
                            <th>Vikladach</th>
                            <th>Button</th>";
                        }else{
                            $strPrint.="<th>Student Name</th>
                            <th>Course Name</th>
                            <th>Vikladach</th>
                            <th>Grade</th>
                            <th>Button</th>";
                        }
                        $strPrint.="</tr>";
                        if(isset($arr)){
                            if(isset($typeTable)&&$typeTable=='Not_Signed'){
                                foreach($arr as $item){
                                    $strPrint.="<tr>";
                                    $strPrint.="<td>{$item['CourseName']}</td>";
                                    $strPrint.="<td>{$item['Description']}</td>";
                                    $strPrint.="<td>{$item['TrivialityInDays']}</td>";
                                    $strPrint.="<td>{$item['Vikladach']}</td>";
                                    $strPrint.="<td><button type='submit' name='CourseID' value='{$item['ID']}'>Subscribe</button></td>";
                                    $strPrint.="</tr>";
                                }
                            }else{
                                foreach($arr as $item){
                                    $strPrint.="<tr>";
                                    $strPrint.="<td>{$item['StudentName']}</td>";
                                    $strPrint.="<td>{$item['CourseName']}</td>";
                                    $strPrint.="<td>{$item['Vikladach']}</td>";
                                    $strPrint.="<td>{$item['Grade']}</td>";
                                    $strPrint.="<td><button type='submit' name='EnrollmentsID' value='{$item['ID']}'>Сhange Grade</button></td>";
                                    $strPrint.="</tr>";
                                }
                            }
                        }
                        $strPrint.='</table></div>';
                        echo $strPrint;
                    ?>
                </div>
                <div><button type='submit' name='EXIT_FORM' value='EXIT_FORM'>EXIT</button></div>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>