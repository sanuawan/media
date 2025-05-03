<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media Form</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            justify-content: center;
        
        }
        .main_container{
            color:#333;
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #555;
        }
        
        input[type="text"],
        input[type="file"] {
            width: 20%;
            padding: 8px 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        input[type="submit"] {
            margin-top: 20px;
            width: 20%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }
        a {
            margin: 10px;
            text-decoration: none;
            background: #007BFF;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            width:30px;
        }

        a:hover {
            background:rgb(21, 143, 42);
        }
        .alert{
            padding:10px;
            margin:20px;
            /* border:1px solid black; */
            font-size:25px;
            color: #155724;
        }

    </style>
</head>
<body>
    <div class="main_container">
        <div style="display: flex; justify-content: center;">
            <a href="{{ route('Sanaullah.user') }}">Form</a>
            <a href="{{ route('Sanaullah.list') }}">List</a>
        </div>
        <h2>This is Media Page</h2>

        @if(session('success'))
            <div class="alert">
                {{ session ('success') }}
            </div>
        @endif

        <form action="{{ route('user.post') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="fname">First Name</label>
            <input type="text" name="fname" id="fname">
            <label for="lname">Last Name</label>
            <input type="text" name="lname" id="lname">
            <label for="image">Upload the Image</label>
            <input type="file" name="image" id="image">
            <label for="video">Upload the Video</label>
            <input type="file" name="video" id="video">
            <label for="audio">Upload the Audio</label>
            <input type="file" name="audio" id="audio"><br>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>