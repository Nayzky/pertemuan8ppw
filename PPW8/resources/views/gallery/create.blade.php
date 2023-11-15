<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Your custom styles here */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f5;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: 20px;
        }

        .card-header {
            text-align: center;
            background-color: #6b6bff;
            border-bottom: none;
            font-size: 1.5rem;
            font-weight: bold;
            color: #ffffff;
            border-radius: 10px 10px 0 0;
            padding: 15px;
        }

        .form-control {
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .custom-file-input {
            cursor: pointer;
        }

        .custom-file-label {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            padding-left: 10px;
        }

        .btn-primary {
            background-color: #6b6bff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #4d4dff;
        }

        .btn-primary:focus {
            box-shadow: 0 0 0 0.2rem rgba(107, 107, 255, 0.5);
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-header">Upload Image</div>
        <div class="card-body">
            <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                    @error('title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" rows="5" name="description"></textarea>
                    @error('description')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="input-file">Choose file</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="input-file" name="picture">
                        <label class="custom-file-label" for="input-file">Select file</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>
