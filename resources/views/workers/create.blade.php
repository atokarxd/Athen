<div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<h1> Create Worker </h1>

<form action="{{ route('worker.store') }}" method="POST">
    @csrf
    <fieldset>
        <label for="firstName"> First name </label>
        <input type="text" name="firstName" id="firstName">
        <label for="lastName"> Last name </label>
        <input type="text" name="lastName" id="lastName">
        <label for="email"> E-Mail </label>
        <input type="email" name="email" id="email">
        <input type="text" name="coordinate" id="coordinate">
        <button type="submit">Save</button>
    </fieldset>
</form>

