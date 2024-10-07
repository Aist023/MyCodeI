<?= $this->extend('layouts/default.php') ?>

<?= $this->section('titel') ?>Students table<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class='Block'>
        <div>
            <form action="" method="post">
                <div class='Table'>
                    <?php
                        $strPrint='<div><table>';
                        $strPrint.="<tr>
                            <th>Student Name</th>
                            <th>Student Surname</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Date Of Birth</th>
                            <th>Button</th></tr>";
                        if(isset($student)){
                            foreach($student as $item){
                                $strPrint.="<tr>";
                                $strPrint.="<td>{$item['StudentName']}</td>";
                                $strPrint.="<td>{$item['StudentSurname']}</td>";
                                $strPrint.="<td>{$item['Email']}</td>";
                                $strPrint.="<td>{$item['Phone']}</td>";
                                $strPrint.="<td>{$item['DateOfBirth']}</td>";
                                $strPrint.="<td><button type='submit' name='StudentID' value='{$item['ID']}'>Open Student</button></td>";
                                $strPrint.="</tr>";
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