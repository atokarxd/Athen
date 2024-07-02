<div>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<h1> Edit Task </h1>

<form method="post" action="{{ route('tasks.update', $task->id) }}">
    @csrf
    @method('PUT')
    <label for="description"> Description </label>
    <input type="text" name="description" id="description" value="{{$task->description}}"><br>
    <label for="type"> Type </label>
    <select name="type" id="type">
        <option value="fault">Fault</option>
        <option value="investment">Investment</option>
        <option value="other">Other</option>
    </select>
    <label for="status"> Status </label>
    <select name="status" id="status">
        <option value="inprogress">Inprogress</option>
        <option value="done">Done</option>
        <option value="failed">Failed</option>
    </select><br>
    <label for="coordinate"> Coordinate </label>
    <input type="text" name="coordinate" id="coordinate" value="{{$task->coordinate}}"><br>
    <button type="submit" id="submit">Save</button>
</form>