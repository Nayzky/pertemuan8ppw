<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your head content here -->
</head>
<body>
    <div class="form-group">
        <label for="input-file">Current Image</label>
        <div>
            <img src="{{ asset('storage/posts_image/' . $gallery->picture) }}" alt="Current Image">
        </div>
    </div>

    <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this image?')">Delete</button>
    </form>
</body>
</html>
