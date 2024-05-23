<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>CREATE POST PAGE</h1>
    <form action="{{route('post.store')}}" method="post">
        <label for="title">Title</label>
        <input type="text"name="title"><br>
        <label for="body">Body</label>
        <input type="textarea"name="body"><br>
        <label for="category">Category</label>
        <input type="number"name="category_id"><br>
        <label for="user">User_id</label>
        <input type="number"name="user_id"><br>
        <input type="button" name="submit" value="submit">
    </form>
</body>
</html>