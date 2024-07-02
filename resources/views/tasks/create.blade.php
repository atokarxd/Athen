@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div>
    @if(session()->has('message'))
        <div>
            {{session('message')}}
        </div>
    @endif
</div>

<h1> Create New Task </h1>

<form method="post" action="{{ route('task.store') }}">
    @csrf
    @method('POST')
    <label for="costumer_id"> Costumer ID </label>
    <input type="text" name="costumer_id" id="costumer_id"><br>
    <label for="worker_id"> Worker ID </label>
    <input type="text" name="worker_id" id="worker_id"><br>
    <label for="description"> Description </label>
    <input type="text" name="description" id="description"><br>
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
    <input type="text" name="coordinate" id="coordinate"><br>
    <button type="submit" id="submit">Create</button>
</form>