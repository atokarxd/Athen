<div>
    @if(session()->has('message'))
        <div>
            {{session('message')}}
        </div>
    @endif
</div>
<h1> Costumer Index </h1>

<div>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>E-Mail</th>
            <th>Phone</th>
            <th>Coordinate</th>
            <th>Edit</th>
            <th>SoftDelete</th>
        </tr>
        @foreach($costumers as $costumer)
            <tr>
                <td>{{ $costumer->id }}</td>
                <td>{{ $costumer->fullName }}</td>
                <td>{{ $costumer->email }}</td>
                <td>{{ $costumer->phone }}</td>
                <td>{{ $costumer->coordinate }}</td>
                <td><a href={{route('costumer.edit', ['costumer' => $costumer])}}>Edit</a></td>
                <td>
                    <form action="{{ route('costumer.destroy', $costumer->id) }}" method="POST">
                        @csrf
                        @method("delete")
                        <input type="submit" value="destroy">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>