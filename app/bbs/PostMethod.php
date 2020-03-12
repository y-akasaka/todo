<?php
namespace App\bbs;

use App\bbs\Post;

class PostMethod
{
    public function save($post)
    {
        $post->fileName = date('Y-m-d H:i:s');
        $fp = fopen("/Applications/MAMP/htdocs/BBS/bbsContents/{$post->fileName}.txt", 'w+');
        fwrite($fp, "{$post->name}|");
        fwrite($fp, "{$post->title}|");
        fwrite($fp, $post->content);
        fclose($fp);
    }

    public function list()
    {
        $fileLists = glob("/Applications/MAMP/htdocs/BBS/bbsContents/*");
        $data = [];
        for ($fileNumber = 0; $fileNumber < count($fileLists); $fileNumber++) {
            $fileContents = file_get_contents($fileLists[$fileNumber], '.txt');
            $fields = explode('|', "{$fileContents}");
    
            $post = new Post();
            $post->name = $fields[0];
            $post->title = $fields[1];
            $post->content = $fields[2];
            $data[] = $post;
        }
        return $data;
    }

    public function delete($fileName)
    {
        unlink($fileName);
    }
}