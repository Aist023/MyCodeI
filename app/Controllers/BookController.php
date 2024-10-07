<?php

namespace App\Controllers;

use App\Models\BookModel;

class BookController extends BaseController
{
    public function indexGet(){
        $bookModel = new BookModel();
        $arrBook = $bookModel->findAll();

        $filters = array_unique($bookModel->findColumn("Genre"));
        return view('Book/index', ['books'=>$arrBook,'filters'=>$filters]);
    }
    public function indexPost(){
        if($this->request->getPost('BookAdd')){
            return redirect()->to("/Book/BookForm");
        }elseif($this->request->getPost('BookUpdate')){
            return redirect()->to("/Book/BookForm/".$this->request->getPost('BookUpdate'));
        }elseif($this->request->getPost('BookDelete')){
            $bookModel = new BookModel();
            $bookModel->delete($this->request->getPost('BookDelete'));
        }elseif($this->request->getPost('EXIT_FORM')=='EXIT_FORM'){
            return redirect()->to("/");
        }
        $bookModel = new BookModel();
        $arrBook = $bookModel->findAll();
        if($this->request->getPost('Filter')=='Filter'){
            if($this->request->getPost('Genre_select')!='-'){
                $arrBook = $bookModel->where('Genre',$this->request->getPost('Genre_select'))->findAll();
            }
        }
        
        $filters = array_unique($bookModel->findColumn("Genre"));
        return view('Book/index', ['books'=>$arrBook,'filters'=>$filters]);
    }

    public function BookFormGet(){
        return view('Book/BookForm');
    }
    public function BookFormIDGet($id){
        $bookModel = new BookModel();
        $Book = $bookModel->find($id);
        if($Book==null){return redirect()->to("/Book");}
        return view('Book/BookForm', ['book'=>$Book]);
    }
    public function BookFormPost(){
        if($this->request->getPost('EXIT_FORM')=='EXIT_FORM'){return redirect()->to("/Book");}
        if(!$this->request->getPost('BookID')){return redirect()->to("/Book");}
        $ErrorCode=0;
        if($this->request->getPost('BookName')&&$this->request->getPost('Author')&&$this->request->getPost('YearOfPublication')&&$this->request->getPost('Genre')){
            $bookModel = new BookModel();
            $book=[
                'BookName'=>$this->request->getPost('BookName'),
                'Author'=>$this->request->getPost('Author'),
                'YearOfPublication'=>$this->request->getPost('YearOfPublication'),
                'Genre'=>$this->request->getPost('Genre'),
            ];
            if($this->request->getPost('BookID')==-1){
                $bookModel->insert($book);
            }elseif($this->request->getPost('BookID')>0){
                $bookModel->update($this->request->getPost('BookID'),$book);
            }
            return redirect()->to("/Book");
        }else{
            $ErrorCode=1;
        }
        return view('Book/BookForm',['ErrorCode'=>$ErrorCode]);
    }
}