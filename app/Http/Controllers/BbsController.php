<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bbs\Post;
use App\bbs\PostMethod;

class BbsController extends Controller
{
    public function login()
    {
        return view('bbs/login');
    }

    public function auth()
    {
        $id = $_POST['id'];
        $password = $_POST['password'];
    
        if ($id === 'id' && $password === 'password') {
            return redirect('/input');
        } else {
            return redirect('/login');
        }
    }

    public function input()
    {
        return view('bbs/input');
    }

    public function list()
    {
        $postMethod = new PostMethod();
        $fileName = __FILE__;
    
        $list = $postMethod->list();
        return view('bbs/list', ['list' => $list]);
    }

    public function save()
    {
        date_default_timezone_set('Asia/Tokyo');
        $fileName = date('Y-m-d H:i:s');
        $name = $_POST['name'];
        $title = $_POST['title'];
        $content = $_POST['content'];

        $postMethod = new PostMethod;
        $post = new Post;
        $post->name = $name;
        $post->title = $title;
        $post->content = $content;
        $postMethod->save($post);

        return view('bbs/save');
    }
}
