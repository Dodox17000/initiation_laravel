<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categories;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function search(Request $request){
        $search = $request->input("recherche");
        $articles = Article::where("titre","like","%$search%")->get();
        return view('article.list', compact("articles"));
    }
    public function add(Request $request){
        // return view('article.add');
        //persist
        // $article = new Article();
        // $article->titre='Formation Python';
        // $article->contenu='Tout ce qu\'il y a à savoir sur Python';
        // $article->save();
        // $contenu='';$titre='';
        //validation
        if($request->method() =="POST"){
            $request->validate([
                "titre"=>['required',"min:5","max:250"],
                "contenu"=>['required',"min:5","max:250"],
            ]);
            $titre = $request->input("titre");
            $contenu = $request->input("contenu");
            $category = $request->input("category");
            $article = new Article();
            $article->titre=$titre;
            $article->contenu=$contenu;
            $article->category_id=$category;
            $article->save();
            return redirect()->route("article_detail", ["id"=>$article->id])
            ->with('success','l\'article a bien été enregistré');
            // return redirect()->route("home",["id"=>12]);
        }
        $categories=Categories::all();
        return view('article.add', compact('categories'));
    }
    //détail d'un article
    public function detail($id){
        $article= Article::findOrFail($id);
        return view('article.detail', compact("article"));
    }
    //lister les articles
    public function list(){
        $articles= Article::all();
        return view('article.list', compact("articles"));
    }
    //effacer un article
    public function delete($id){
        $article=Article::find($id);
        $article->delete();
        return redirect()->route('article_list');
    }
    //éditer un article
    public function edit(Request $request, $id){
        $article=Article::find($id);
        if($request->method() =="POST"){
            $article->titre=$request->input("titre");
            $article->contenu=$request->input("contenu");
            $article->save();
            return redirect()->route("article_detail", ["id"=>$article->id]);
        }
        // $article->remove();
        return view('article.edit', compact( "article"));
    }
}
