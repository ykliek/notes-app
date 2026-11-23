@props(['name'])
@error($name)
    <p {{ $attributes->merge(['class' => 'error']) }} style="color:#c0392b;margin:4px 0">{{ $message }}</p>
@enderror
