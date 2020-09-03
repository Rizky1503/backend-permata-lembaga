<?php

namespace Modules\Master\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class MasterController extends Controller
{
    public function __construct()
    {
        $this->title = 'Bank Soal';        
    }

    public function index(){
        $this->breadcrumbs = [
           ['url' => '', 'title' =>'Master'],
           ['url' => '', 'title' =>'Bank Soal'],
        ];

        return view('master::index')->with([
              'page' => $this,
        ]); 
    }

    public function load(Request $request){
        $meta = array(
            "page"      => 1, 
            "pages"     => 1, 
            "perpage"   => 10, 
            "total"     => 4,
            "sort"      => $request->sort ? $request->sort : "asc",
            "field"     => $request->field ? $request->field : "No"
        );

        $result1 = array('No' => 1, 'BankSoal' => 'Bank Soal 1', 'Total'=>'70');
        $result2 = array('No' => 2, 'BankSoal' => 'Bank Soal 2', 'Total'=>'90');
        $result3 = array('No' => 3, 'BankSoal' => 'Bank Soal 3', 'Total'=>'120');
        $result4 = array('No' => 4, 'BankSoal' => 'Bank Soal 4', 'Total'=>'150');

        $result = array("meta"=>$meta, "data"=> array($result1, $result2, $result3, $result4) );
        $data = json_encode($result);
        return $data;
    }

    public function mataPelajaran(Request $request){
       $this->breadcrumbs = [
          ['url' => '', 'title' =>'Master'],
          ['url' => '', 'title' =>'Bank Soal'],
          ['url' => '', 'title' =>$request->jurusan],
       ];

       return view('master::matapelajaran')->with([
             'page' => $this,
             'jurusan' => $request->jurusan
       ]);  
    }

    public function loadMataPelajaran(Request $request){
        $meta = array(
            "page"      => 1, 
            "pages"     => 1, 
            "perpage"   => 10, 
            "total"     => 4,
            "sort"      => $request->sort ? $request->sort : "asc",
            "field"     => $request->field ? $request->field : "No"
        );

        $result1 = array('No' => 1, 'matpel' => 'Matematika', 'Total'=>'15');
        $result2 = array('No' => 2, 'matpel' => 'Bahasa Indonesia', 'Total'=>'10');
        $result3 = array('No' => 3, 'matpel' => 'Bahasa Inggris', 'Total'=>'25');
        $result4 = array('No' => 4, 'matpel' => 'Kimia', 'Total'=>'20');
        $result5 = array('No' => 5, 'matpel' => 'Ekonomi', 'Total'=>'10');

        $result = array("meta"=>$meta, "data"=> array($result1, $result2, $result3, $result4, $result5) );
        $data = json_encode($result);
        return $data;
    }

    public function Upload(Request $request){
       $this->breadcrumbs = [
          ['url' => '', 'title' =>'Master'],
          ['url' => '', 'title' =>'Bank Soal'],
          ['url' => '', 'title' =>$request->jurusan],
          ['url' => '', 'title' =>$request->matpel],
       ];

       return view('master::upload')->with([
            'page' => $this,
            'jurusan' => $request->jurusan,
            'matpel' => $request->matpel
       ]);   
    }

    public function loadSoal(Request $request){
        $meta = array(
            "page"      => 1, 
            "pages"     => 1, 
            "perpage"   => 10, 
            "total"     => 5,
            "sort"      => $request->sort ? $request->sort : "asc",
            "field"     => $request->field ? $request->field : "No"
        );

        $result1 = array('No' => 1, 'Soal' => 'Soal 1', 'Jawaban'=>'A');
        $result2 = array('No' => 2, 'Soal' => 'Soal 2', 'Jawaban'=>'A');
        $result3 = array('No' => 3, 'Soal' => 'Soal 3', 'Jawaban'=>'C');
        $result4 = array('No' => 4, 'Soal' => 'Soal 4', 'Jawaban'=>'D');
        $result5 = array('No' => 5, 'Soal' => 'Soal 5', 'Jawaban'=>'A');
       

        $result = array("meta"=>$meta, "data"=> array($result1, $result2, $result3, $result4, $result5) );
        $data = json_encode($result);
        return $data;
    }
}
