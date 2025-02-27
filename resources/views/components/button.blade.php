<button {{ $attributes->merge(['class' => 'btn btn-primary']) }}>
    {{ $slot }} <!-- Slot akan memuat konten yang diteruskan -->
</button>
