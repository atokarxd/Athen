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
<h1> Edit your worker: {{$worker -> firstName}} {{$worker -> lastName}} </h1>

<form action="{{ route('workers.update', $worker->id) }}" method="POST">
    @csrf
    @method('PUT')
    <fieldset>
        <label for="firstName"> First name </label>
        <input type="text" name="firstName" id="firstName" value="{{$worker -> firstName}}">
        <label for="lastName"> Last name </label>
        <input type="text" name="lastName" id="lastName" value="{{$worker -> lastName}}"">
        <label for="email"> E-mail </label>
        <input type="email" name="email" id="email" value="{{$worker -> email}}">
        <input type="text" name="coordinate" id="coordinate" value="{{$worker -> coordinate}}">
        <button type="submit">Update</button>
    </fieldset>
</form>

