<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index(){
        return view('exam.index');
    }
    public function create(){
        return view('exam.create');
    }
    public function store(Request $request){
        $post=\request()->except('_token');
        dd($post);

    }

}
