<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        //créer session
        $request->session()->put('username','Dorine');
        $username = $request->session()->get('username');
        $bool = $request->session()->has('username');
        // dd($username, $bool);
        $titre= 'Ici';
        $ip= $request->ip();
        $method= $request->method();
        $path = $request->path();
        $url = $request->url();
        return view('home', compact('titre','path','ip','url','method'));
    }
    public function blogAdd(){
        return view('blog/add');
    }
    public function aboutUs(){
        return response(view('blog.aboutus'))->cookie('prenom', 'Pipolin');
    }
    public function contact($name){
        return view('contact.add', ['nom'=>$name]);
    }
}
