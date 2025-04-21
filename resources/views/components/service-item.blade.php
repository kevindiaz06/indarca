<!-- Service Item Component -->
@props(['icon', 'title', 'description', 'delay' => 100])

<div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="{{ $delay }}">
    <div class="service-item position-relative">
        <div class="icon bg-dark rounded-circle d-flex align-items-center justify-content-center mb-3 icon-animate">
            <i class="bi bi-{{ $icon }} text-danger fs-3"></i>
        </div>
        <h4>{{ $title }}</h4>
        <p>{{ $description }}</p>
    </div>
</div><!-- End Service Item -->
