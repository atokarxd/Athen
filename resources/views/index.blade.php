<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel fun</title>
</head>
<body>
    <div>
        @if(session()->has('message'))
            <div>
                {{session('message')}}
            </div>
        @endif
    </div>
    <h1> All Task List </h1>
    
    <div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Costumer ID</th>
                <th>Worker ID</th>
                <th>Description</th>
                <th>Type</th>
                <th>Status</th>
                <th>GPS Coordinate</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->costumer_id }}</td>
                    <td>{{ $task->worker_id }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->type }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->coordinate }}</td>
                    <td><a href={{route('task.edit', ['task' => $task])}}>Edit</a></td>
                    <td>
                        <form action="{{ route('task.destroy', $task->id) }}" method="POST">
                            @csrf
                            @method("delete")
                            <input type="submit" value="destroy">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

</body>
</html>