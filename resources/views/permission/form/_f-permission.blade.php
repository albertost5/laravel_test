@csrf

<div class="form-group">
    <label for="name">Name</label>
    <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $p->name) }}">
    @error('name')
        <small class="text-danger">{{ $message }}</small>
        <br />
    @enderror
</div>

</br>

<div class="form-group">
    <label for="roles">Choose one or multiples roles:</label>
    </br>
    <select class="custom-select" size="4" name="roles[]" multiple>
        @foreach ($roles as $r)
            <option value={{ $r->id }}>{{ $r->name }}</option>
        @endforeach  
    </select>
</div>

<button class="btn btn-primary" type="submit">Send</button>
