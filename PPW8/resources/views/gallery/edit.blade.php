<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    @if($gallery)
    <div class="form-group">
        <label for="input-file">Current Image</label>
        <div>
            <img src="{{ asset('storage/posts_image/' . $gallery->picture) }}" alt="Current Image">
        </div>
    </div>

    <script src="{{ asset('lightbox2/dist/js/lightbox-plus-jquery.min.js') }}"></script>

    <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $gallery->title }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" rows="5" name="description">{{ $gallery->description }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="input-file">Choose file (Optional)</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="input-file" name="picture">
                <label class="custom-file-label" for="input-file">{{ $gallery->picture }}</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    @else
        <p>No data found.</p>
    @endif
</body>
</html>
