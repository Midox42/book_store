@props([
    'name' => 'required'
])

@error($name)
        <div class="text-danger">{{ $message }}</div>
@enderror