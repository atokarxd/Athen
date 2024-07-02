<div>
    @if(session()->has('message'))
        <div>
            {{session('message')}}
        </div>
    @endif
</div>
<h1> Worker Index </h1>

<div>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>E-Mail</th>
            <th>Coordinate</th>
            <th>Edit</th>
            <th>SoftDelete</th>
        </tr>
        @foreach($workers as $worker)
            <tr>
                <td>{{ $worker->id }}</td>
                <td>{{ $worker->firstName }}</td>
                <td>{{ $worker->lastName }}</td>
                <td>{{ $worker->email }}</td>
                <td>{{ $worker->coordinate }}</td>
                <td><a href={{route('worker.edit', ['worker' => $worker])}}>Edit</a></td>
                <td>
                    <form action="{{ route('worker.destroy', $worker->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="destroy">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>