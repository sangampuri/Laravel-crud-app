<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{ url('/uploads') }}" enctype="multipart/form-data">
            @csrf
            <label for="file">
                Upload an image
                <input type="file"  name="images" id="file">
            </label>
            <button id="" type="submit">Upload</button>
    </form>
</body>
</html>