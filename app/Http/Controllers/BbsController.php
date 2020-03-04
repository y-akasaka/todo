<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BbsController extends Controller
{
    public function login()
    {
        echo "<!DOCTYPE html>
        <html>
        <head>
            <title>掲示板</title>
        </head>
        <body>
            <form action=\"/auth\" method=\"post\">
                ID:<input type=\"text\" name=\"id\">
                PW:<input type=\"text\" name=\"password\">
                <button type=\"submit\">ログイン</button>
            </form>
        </body>
        </html>";;
    }

    public function auth()
    {
        $id = $_POST['id'];
        $password = $_POST['password'];
    
        if ($id === 'id' && $password === 'password') {
            //書き込み画面へ遷移する
            return redirect('/input');
        } else {
            //もう一度ログイン画面を表示する
            return redirect('/login');
        }
    }

    public function input()
    {
        echo '<!DOCTYPE html>
        <head>
            <title>掲示板</title>
        </head>
        <body>
            <form action="/save" method="post">
            ニックネーム:<input type="text" name="name">
            タイトル:<input type="text" name="title">
            本文:<input type="text" name="content">
            <button type="submit">送信</button>
            </form>
        </body>
        </html>';
    }

    public function list()
    {
        $postMethod = new PostMethod();
        $fileName = __FILE__;
    
        $list = $postMethod->list();
        foreach ($list as $item) {
            echo "{$item->name}<br/>";
            echo "{$item->title}<br/>";
            echo "{$item->content}";
    
            echo "<form action=\"/delete\" method=\"POST\">
            <input type=\"text\" name=\"fileName\" value=\"{$fileName}\">
            <button type=\"submit\">削除</button></form>";
    
            echo '----------------------------------------<br/>';
        };
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

        echo '<!DOCTYPE html>
            <html>
            <head>
            </head>
            <body>
                <p>書き込み内容を保存しました</p>
            </body>
            </html>';
    }
}
