@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h1> Create Costumer </h1>

<form action="{{ route('costumer.store') }}" method="POST">
    @csrf
    <fieldset>
        <label for="fullName"> Full Name </label>
        <input type="text" name="fullName" id="fullName">
        <label for="email"> E-mail </label>
        <input type="email" name="email" id="email">
        <label for="phone"> Phone Number</label>
        <input type="text" name="phone" id="phone">
        <input type="text" name="coordinate" id="coordinate">
        <button type="submit">Save</button>
    </fieldset>
</form>

