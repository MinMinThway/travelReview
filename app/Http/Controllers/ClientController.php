<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Comment;
use App\LikeDislike;
use App\Mail\ContactMail;
use App\User;
use Dotenv\Result\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ClientController extends Controller
{
    function index()
    {
        $articles = Article::orderBy('id', 'desc')->paginate(3);
        return view('client.index', compact("articles"));
    }

    function article()
    {
        $articles = Article::orderBy('id', 'desc')->paginate(4);
        $categories = Category::all();

        return view('client.article', compact("articles", "categories"));
    }

    function search($key = null)
    {
        $key = filter_var($key, FILTER_SANITIZE_STRING);
        $articles = Article::where("name", "LIKE", "%$key%")->paginate(4);
        $categories = Category::all();
        return view('client.article', compact("articles", "categories"));
    }
    function category($name){;
        if($name){
            $cat = Category::where("name", $name)->firstOrFail();
            $articles = Article::where("cat_id",$cat->id)->paginate(3);
        }
        $categories = Category::all();
        return view('client.article', compact("articles", "categories", "cat"));
    }
    function articleDetail($id){
        $article = Article::findOrFail($id);
        return view("client.article-detail", compact("article"));
    }



    function contact(){
        return view('client.contact');
    }

  function indexComment($id){
      $data = Comment::select("*")
      ->where("article_id", $id)
      ->OrderBy("id", "desc")
      ->get();
      $user = User::all();
      return response()->json(["success" => true, "data" => $data, "user" => $user]);
  }

  function storeComment(Request $request){
    $cmt = new Comment();
    $cmt->article_id = $request->article_id;
    $cmt->user_id = $request->user_id;
    $cmt->comments = $request->comments;
    $cmt->save();

  return response()->json(["success" => true, "data" => null]);

    }

    function likeShow($id){
        $data = LikeDislike::select("*")
        ->where(["status" => 1, "article_id" => $id])
        ->get();
        return response()->json(["success" => true, "data" => $data]);
    }




    function likeDislikes(Request $request){
         $like = new LikeDislike();
         $like->article_id = $request->article_id;
         $like->user_id = $request->user_id;
         $like->status = $request->status;
         $like->save();
        return response()->json(["success" => true, "data" => null]);
    }


    function mail(Request $request){
        $input = $request->all();

        Mail::send('welcome', array(

            'name' => $input['name'],

            'email' => $input['email'],

            'subject' => $input['subject'],

            'messages' => $input['message'],

        ), function($message) use ($request){

            $message->from($request->email);

            $message->to('minthway668@gmail.com', 'Admin')->subject($request->get('subject'));

        });

        return redirect()->back()->with(['success' => 'Contact Form Submit Successfully']);

    }

    // function mail(Request $request){
    //    $data = [
    //        'name' => $request->name,
    //        'email' => $request->email,
    //        'subject' => $request->subject,
    //    ];
    //    Mail::to('minthway668@gmail.com')->send(new ContactMail($data));
    // }

}
