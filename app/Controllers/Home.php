<?php
// http://localhost:88/PHP/MyCodeI_1
namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('Home/index');
    }

    public function clikcButton(){
        //die($this->request->getPost('Ex_1_button'));
        if ($this->request->getPost('Ex_1_button')) {
            switch ($this->request->getPost('Ex_1_button')) {
                case 'Login':{return redirect()->to('/User/login');}break;
                case 'Registr':{return redirect()->to('/User/registr');}break;
                case 'Log_Out':{}break;
                case 'BookOpen':{return redirect()->to('/Book');}break;
                case 'Students':{return redirect()->to('/Student');}break;
                case 'Courses':{return redirect()->to('/Course');}break;
                return view('Home/index', ['tytel'=>$this->request->getPost('Ex_1_button')]);
            }
        }
        return view('Home/index');
    }

}
