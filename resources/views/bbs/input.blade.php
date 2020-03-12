<!DOCTYPE html>
<html>
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
</html>