@csrf

<div class="form-group">
    <label for="name">Name</label>
    <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $r->name) }}">
    @error('name')
        <small class="text-danger">{{ $message }}</small>
        <br />
    @enderror
</div>

</br>

<div class="form-group">
    <label for="users">Choose one or multiples users:</label>
    </br>
    <select class="custom-select" size="4" name="users[]" multiple>
        @foreach ($users as $u)
            <option value={{ $u->id }}>{{ $u->username }}</option>
        @endforeach  
    </select>
</div>

<button class="btn btn-primary" type="submit">Send</button>
