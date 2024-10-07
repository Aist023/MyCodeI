<?php

namespace App\Controllers;

use App\Models\CourseModel;

class CourseController extends BaseController
{
    public function indexGet(){
        $courseModel = new CourseModel();
        $arrCourse = $courseModel->findAll();
        return view('Course/index', ['course'=>$arrCourse]);
    }
    public function indexPost(){
        if($this->request->getPost('EXIT_FORM')=='EXIT_FORM'){
            return redirect()->to("/");
        }
        $courseModel = new CourseModel();
        $arrCourse = $courseModel->findAll();
        return view('Course/index', ['course'=>$arrCourse]);
    }
}