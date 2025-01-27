<!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
@props(['name'])

@error($name)
<p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
@enderror
