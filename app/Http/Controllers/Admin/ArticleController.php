<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use Exception;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Prophecy\Call\Call;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy("id", "DESC")->get();

        return view('admin.articles.index', compact("articles"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            "name" => "required",
            "review" => "required|min:50",
            "read_time" => "required",
            "cat_id" => "required",
            "image" => "required",

        ]);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v)->withInput($request->all());
        }

        if ($request->image) {

            $image = $request->file("image");
            $fileName = time() . $image->getClientOriginalName();
            $image->move(public_path() . "/image", $fileName);
        }
        try {
            $article = new Article();
            $article->name = filter_var($request->name, FILTER_SANITIZE_STRING);
            $article->review = filter_var($request->review,FILTER_SANITIZE_STRING);
            $article->read_time = filter_var($request->read_time, FILTER_SANITIZE_STRING);
            $article->cat_id = filter_var($request->cat_id,FILTER_SANITIZE_NUMBER_INT);
            $article->image = $fileName;
            $article->save();
            return redirect()->route("admin.article.index")->with(["msg" => "Created Success!"])->withInput($request->all());
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        return view('admin.articles.edit', compact("article", 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $v = Validator::make($request->all(), [
            "name" => "required",
            "review" => "required|min:50",
            "read_time" => "required",
            "cat_id" => "required",

        ]);
        if($v->fails()){
            return redirect()->back()->withErrors($v)->withInput($request->all());
        }

        try{
            $art = Article::findOrFail($id);
            if($request->image){

                unlink(public_path() . "/image//" . $art->image);
                $image = $request->file("image");
                $fileName = time() . $image->getClientOriginalName();
                $image->move(public_path() . "/image", $fileName);
                $art->image = $fileName;
            }

        $art->name = filter_var($request->name, FILTER_SANITIZE_STRING);
        $art->read_time= filter_var($request->read_time, FILTER_SANITIZE_STRING);
        $art->review = filter_var($request->review, FILTER_SANITIZE_STRING);
        $art->cat_id = filter_var($request->cat_id, FILTER_SANITIZE_NUMBER_INT);
        $art->save();
        return redirect()->route('admin.article.index')->with(["msg" => "Updated Success!"]);
       }catch(Exception $e){
           return $e->getMessage();
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        try {
            if (!empty($article->image)) {
                unlink(public_path() . "/image//" . $article->image);
            }
            $article->delete();
            return redirect()->route("admin.article.index")->with(["msg" => "Delete Success!"]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
