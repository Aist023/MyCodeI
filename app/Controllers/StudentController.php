<?php

namespace App\Controllers;

use App\Models\StudentModel;
use App\Models\CourseModel;
use App\Models\EnrollmentModel;

class StudentController extends BaseController
{
    public function indexGet(){
        $studentModel = new StudentModel();
        $arrStudent = $studentModel->findAll();
        return view('Student/index', ['student'=>$arrStudent]);
    }
    public function indexPost(){
        if($this->request->getPost('EXIT_FORM')=='EXIT_FORM'){
            return redirect()->to("/");
        }
        if($this->request->getPost('StudentID')!=''){
            return redirect()->to("/Student/cabinet/".$this->request->getPost('StudentID'));
        }
        $studentModel = new StudentModel();
        $arrStudent = $studentModel->findAll();
        return view('Student/index', ['student'=>$arrStudent]);
    }

    public function StudentFormIDGet($id){
        $AveBal=0;$count=0;
        $enrollmentModel = new EnrollmentModel();
        $arrGrade = $enrollmentModel->select('Enrollments.Grade')->join('Students', 'Enrollments.StudentID = Students.ID')->where('Students.ID',$id)->findAll();
        foreach($arrGrade as $item){
            if($item['Grade']!=null){
                $AveBal+=$item['Grade'];
                $count++;
            }
        }
        $AveBal=$AveBal/$count;

        $enrollmentModel = new EnrollmentModel();
        $arrEnrollment = $enrollmentModel->select('Enrollments.ID, Students.StudentName, Courses.CourseName, Courses.Vikladach, Enrollments.Grade')
        ->join('Students', 'Enrollments.StudentID = Students.ID')->join('Courses', 'Enrollments.CourseID = Courses.ID')->where('Students.ID',$id)->findAll();

        return view('Student/StudentForm', ['AveBal'=>$AveBal,'typeTable'=>'Signed','arr'=>$arrEnrollment,'StudentID'=>$id]);
    }
    public function StudentFormPost(){
        $ID=0;
        $type='Signed';
        if($this->request->getPost('StudentID')){$ID=$this->request->getPost('StudentID');}else{return redirect()->to("/Student");};

        if($this->request->getPost('EXIT_FORM')=='EXIT_FORM'){
            return redirect()->to("/Student");
        }elseif($this->request->getPost('CourseID')!=''){
            $EnrollmentObject=[
                'StudentID'=>$ID,
                'CourseID'=>$this->request->getPost('CourseID'),
            ];
            $enrollmentModel = new EnrollmentModel();
            $enrollmentModel->insert($EnrollmentObject);
        }elseif($this->request->getPost('EnrollmentsID')!=''){
            return redirect()->to("/Student/grade/".$this->request->getPost('EnrollmentsID'));
        }

        $arr=[];
        $AveBal=0;$count=0;
        $enrollmentModel = new EnrollmentModel();
        $arrGrade = $enrollmentModel->select('Enrollments.Grade')->join('Students', 'Enrollments.StudentID = Students.ID')->where('Students.ID',$ID)->findAll();
        foreach($arrGrade as $item){
            if($item['Grade']!=null){
                $AveBal+=$item['Grade'];
                $count++;
            }
        }
        $AveBal=$AveBal/$count;
        if($this->request->getPost('Filter_Signed')=='Signed'){
            $enrollmentModel = new EnrollmentModel();
            $arr = $enrollmentModel->select('Enrollments.ID, Students.StudentName, Courses.CourseName, Courses.Vikladach, Enrollments.Grade')
            ->join('Students', 'Enrollments.StudentID = Students.ID')->join('Courses', 'Enrollments.CourseID = Courses.ID')->where('Students.ID',$ID)->findAll();
            $type='Signed';
        }elseif($this->request->getPost('Filter_Signed')=='Not_Signed'){
            $courseModel = new CourseModel();
            $arr = $courseModel->select('Courses.*')->join('Enrollments', 'Enrollments.CourseID = Courses.ID AND Enrollments.StudentID = '.$ID, 'left')
            ->where('Enrollments.StudentID', null)->findAll();
            $type='Not_Signed';
        }
        return view('Student/StudentForm', ['AveBal'=>$AveBal,'typeTable'=>$type,'arr'=>$arr,'StudentID'=>$ID]);
    }

    public function StudentGradeIDGet($id){
        $EGrade=0;
        $enrollmentModel = new EnrollmentModel();
        $enrollment = $enrollmentModel->where('ID',$id)->first();
        if($enrollment && $enrollment['Grade']!==NULL){
            $EGrade=$enrollment['Grade'];
        }
        return view('Student/StudentGrade', ['EGrade'=>$EGrade,'EnrollmentsID'=>$id]);
    }
    public function StudentGradePost(){
        $ID=0;
        $EGrade=0;
        if($this->request->getPost('EnrollmentsID')){$ID=$this->request->getPost('EnrollmentsID');}else{return redirect()->to("/Student");};

        if($this->request->getPost('EXIT_FORM')=='EXIT_FORM'){
            $enrollmentModel = new EnrollmentModel();
            $enrollment = $enrollmentModel->where('ID',$ID)->first();
            if($enrollment){
                return redirect()->to("/Student/cabinet/".$enrollment['ID']);
            }else{
                return redirect()->to("/Student");
            }
        }

        if($this->request->getPost('Save')=='Save'&&($this->request->getPost('EGrade')>=0&&$this->request->getPost('EGrade')<=12)){
            $enrollmentModel = new EnrollmentModel();
            $EnrollmentObject;
            if($this->request->getPost('EGrade')==0){
                $EnrollmentObject=[
                    'Grade'=>NULL,
                ];
            }else{
                $EnrollmentObject=[
                    'Grade'=>$this->request->getPost('EGrade'),
                ];
            }
            $enrollmentModel->update($ID,$EnrollmentObject);
            $enrollment = $enrollmentModel->where('ID',$ID)->first();
            if($enrollment){
                return redirect()->to("/Student/cabinet/".$enrollment['ID']);
            }else{
                return redirect()->to("/Student");
            }
        }

        $enrollmentModel = new EnrollmentModel();
        $enrollment = $enrollmentModel->where('ID',$ID)->first();
        if($enrollment && $enrollment['Grade']!==NULL){
            $EGrade=$enrollment['Grade'];
        }
        return view('Student/StudentGrade', ['EGrade'=>$EGrade,'EnrollmentsID'=>$ID]);
    }
}