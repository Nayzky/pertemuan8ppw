<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Image Gallery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            color: #333;
        }
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .image {
            border: 1px solid #ccc;
            padding: 10px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .image img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .image p {
            margin: 10px 0;
        }
        h2 {
            margin-top: 40px;
            color: #333;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        input[type="text"],
        input[type="file"],
        button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="file"] {
            cursor: pointer;
        }
        button {
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Image Gallery</h1>

    <div class="gallery">
        @foreach ($galleries as $gallery)
            <div class="image">
                <img src="{{ asset($gallery->image_url) }}" alt="{{ $gallery->title }}">
                <p>{{ $gallery->title }}</p>
                <p>{{ $gallery->description }}</p>
            </div>
        @endforeach
    </div>

    <h2>Upload Image</h2>
    <form action="/upload" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Image Title">
        <input type="text" name="description" placeholder="Image Description">
        <input type="file" name="image[]" multiple>
        <button type="submit">Upload</button>
    </form>
</body>
</html>