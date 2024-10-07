<?php

namespace App\Controllers;

class UserController extends BaseController{
    public function loginGet()
    {
        $ErrorCode=0;
        return view('User/login',['ErrorCode'=>$ErrorCode]);
    }
    public function loginPost()
    {
        $ErrorCode = 0;
        if($this->request->getPost('EXIT_FORM')==='EXIT_FORM'){return redirect()->to('/');}

        if ($this->request->getPost('Login')&&$this->request->getPost('Password')) {
            $db = \Config\Database::connect();
            $builder = $db->table('Users');

            $result = $builder->where('UserLogin', $this->request->getPost('Login'))->where('UserPassword', $this->request->getPost('Password'))->get()->getRow();

            if($result!=null){
                setcookie('User', $result->UserLogin);
                return redirect()->to('/');
            }else{
                $ErrorCode = 1;
            }
        }else{
            $ErrorCode = 1;
        }

        return view('User/login', ['ErrorCode' => $ErrorCode]);
    }

    public function registrGet()
    {
        $ErrorCode=0;
        return view('User/registr',['ErrorCode'=>$ErrorCode]);
    }
    public function registrPost()
    {
        $ErrorCode = 0;
        if($this->request->getPost('EXIT_FORM')==='EXIT_FORM'){return redirect()->to('/');}

        if(strlen($this->request->getPost('Login'))<3){$ErrorCode=1;}
        elseif(strlen($this->request->getPost('Password'))<3){$ErrorCode=2;}
        elseif($this->request->getPost('Password')!=$this->request->getPost('Repeat_Password')){$ErrorCode=3;}
        elseif($this->request->getPost('Login')!=''&&$this->request->getPost('Password')!=''&&$this->request->getPost('Name')!=''&&$this->request->getPost('Surname')!=''&&$this->request->getPost('Country')!=''&&$this->request->getPost('City')!=''){
            $db = \Config\Database::connect();
            $builder = $db->table('Users');
            $result = $builder->where('UserLogin', $this->request->getPost('Login'))->get()->getRow();
            if($result==null){
                $date=[
                    'UserLogin'=>$this->request->getPost('Login'),
                    'UserPassword'=>$this->request->getPost('Password'),
                    'UserName'=>$this->request->getPost('Name'),
                    'UserSurname'=>$this->request->getPost('Surname'),
                    'Country'=>$this->request->getPost('Country'),
                    'City'=>$this->request->getPost('City'),
                ];
                $builder->insert($date);
                // КУКИ
                return redirect()->to('/');
            }else{$ErrorCode=5;}
        }else{$ErrorCode=4;}
        return view('User/registr',['ErrorCode'=>$ErrorCode]);
    }
}