<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Image</title>
</head>
<body>
    <h1>Upload Image</h1>

    @if ($errors->any())
        <div>
            <strong>Whoops!</strong> There was a problem with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/upload" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title" placeholder="Image Title">
    <input type="text" name="description" placeholder="Image Description">
    <input type="file" name="image[]" multiple>
    <button type="submit">Upload</button>
</form>

</body>
</html>
