
@push('scripts')
@endpush

<div class="hero-media">
    @foreach(['clinic_view.jpg', 'CT_scanner.jpg', 'endoscope.jpg', 'fundus-camera.jpg'] as $i => $filename)
    <div class="hero-slide" role="img" aria-label="クリニックイメージ {{ $i + 1 }}">
        <img src="{{ asset('images/slideshow/' . $filename) }}" alt="クリニック外観・院内イメージ {{ $i + 1 }}" />
    </div>
    @endforeach
</div>
