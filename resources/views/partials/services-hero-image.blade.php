@if(isset($service) && $service && $service->photo)
<div class="max-w-5xl mx-auto px-4 sm:px-6 -mt-6 mb-10">
    <div class="service-hero-img glass-card" style="padding: 0;">
        <img src="{{ asset('storage/'.$service->photo) }}"
             alt="{{ $service->service_name }} services in Nepal — {{ $personal->brand_name ?? 'Nabaraj Acharya' }}"
             loading="lazy">
    </div>
</div>
@endif
