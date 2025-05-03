<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media Form</title>
</head>
<body>
    <div class="main_container">
        <h2>This is Media Page</h2>
        <form action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $list->id }}">

            <label for="fname">First Name</label>
            <input type="text" name="fname" id="fname" value="{{ $list->fname }}"><br>

            <label for="lname">Last Name</label>
            <input type="text" name="lname" id="lname" value="{{ $list->lname }}"><br><br>

            <!-- Image preview -->
            @if($list->image)
                <p>Current Image:</p>
                <img src="{{ asset('storage/' . $list->image) }}" width="150"><br>
            @endif
            <label for="image">Upload a New Image</label>
            <input type="file" name="image" id="image"><br><br>

            <!-- Video preview -->
            @if($list->video)
                <p>Current Video:</p>
                <video width="200" controls>
                    <source src="{{ asset('storage/' . $list->video) }}">
                </video><br>
            @endif
            <label for="video">Upload a New Video</label>
            <input type="file" name="video" id="video"><br><br>

            <!-- Audio preview -->
            @if($list->audio)
                <p>Current Audio:</p>
                <audio controls>
                    <source src="{{ asset('storage/' . $list->audio) }}">
                </audio><br>
            @endif
            <label for="audio">Upload a New Audio</label>
            <input type="file" name="audio" id="audio"><br><br>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
