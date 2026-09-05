@session('success')
    <p class="text-green-500 text-sm mt-1">{{ $value }}</p>
@endsession
@error('general')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
@enderror