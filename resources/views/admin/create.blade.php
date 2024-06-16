<!doctype html>
<html>
<head>
    <title>Login Form</title>
    <style type="text/css">
        .error-message { color: red; }
    </style>
</head>

<body>
    <form method="post" action="/admin/create">
        @csrf
        <p>Title<br>
            <input type="text" name="title" value=""><br>
            <span class="error-message">{{ $errors->first('title') }}</span></p>

        <p>Description<br>
            <textarea rows="5" cols="40" name="description"></textarea><br>
            <span class="error-message">{{ $errors->first('description') }}</span></p>

        <p><button type="submit">Submit</button></p>
    </form>
</body>
</html>