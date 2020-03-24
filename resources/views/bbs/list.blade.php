<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        @foreach ($list as $item)
            <p>{{basename($item->fileName, '.txt')}}</p>
            <p>{{$item->name}}</p>
            <p>{{$item->title}}</p>
            <p>{{$item->content}}</p>
            <form action="/show" method="get">
            <input type="hidden" name="task" value="{{basename($item->fileName, '.txt')}}">
                <button type="submit">詳細画面</button>
            </form>
            <hr>
        @endforeach

</body>
</html>