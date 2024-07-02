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
<h1> Edit your costumer {{$costumer -> fullName}} </h1>

<form action="{{ route('costumers.update', $costumer->id) }}" method="POST">
    @csrf
    @method('PUT')
    <fieldset>
        <label for="fullName"> Full Name </label>
        <input type="text" name="fullName" id="fullName" value="{{$costumer -> fullName}}">
        <label for="email"> E-mail </label>
        <input type="email" name="email" id="email" value="{{$costumer -> email}}"">
        <label for="phone"> Phone Number</label>
        <input type="text" name="phone" id="phone" value="{{$costumer -> phone}}">
        <input type="text" name="coordinate" id="coordinate" value="{{$costumer -> coordinate}}">
        <button type="submit">Update</button>
    </fieldset>
</form>

