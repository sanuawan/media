<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: #f4f4f4;
        }

        table {
            width: 90%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #e9e9e9;
        }

        img {
            width: 300px;
            max-height: 200px;
            object-fit: cover;
        }
        
        video {
            width: 300px;
            max-height: 200px;
            object-fit: cover;
        }

        audio {
            width: 200px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
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
    </style>
</head>
<body>
    <div style="display: flex; justify-content: center;">
        <a href="{{ route('Sanaullah.user') }}">Form</a>
        <a href="{{ route('Sanaullah.list') }}">List</a>
    </div>
    <h2>Record Of Users</h2>
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Image</th>
            <th>Video</th>
            <th>Audio</th>
            <th>Action</th>
            <th>Action</th>
        </tr>
        @foreach($list as $item)
        <tr>
            <td>{{ $item->fname }}</td>
            <td>{{ $item->lname }}</td>
            <td>
                @if($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" alt="Image">
                @endif
            </td>
            <td>
                @if($item->video)
                    <video controls>
                        <source src="{{ asset('storage/' . $item->video) }}">
                    </video>
                @endif
            </td>
            <td>
                @if($item->audio)
                    <audio controls>
                        <source src="{{ asset('storage/' . $item->audio) }}">
                    </audio>
                @endif
            </td>
            <td>
                <form action="{{route('user.edit')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <input type="submit" value="Edit">
                </form>
            </td>
            <td>
                <form action="{{route('user.delete')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
