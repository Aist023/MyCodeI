<?= $this->extend('layouts/default.php') ?>

<?= $this->section('titel') ?>Course<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class='Block'>
        <div>
            <form action="" method="post">
                <div class='Table'>
                    <?php
                        $strPrint='<div><table>';
                        $strPrint.="<tr>
                            <th>Course Name</th>
                            <th>Description</th>
                            <th>Triviality In Days</th>
                            <th>Vikladach</th></tr>";
                        if(isset($course)){
                            foreach($course as $item){
                                $strPrint.="<tr>";
                                $strPrint.="<td>{$item['CourseName']}</td>";
                                $strPrint.="<td>{$item['Description']}</td>";
                                $strPrint.="<td>{$item['TrivialityInDays']}</td>";
                                $strPrint.="<td>{$item['Vikladach']}</td>";
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