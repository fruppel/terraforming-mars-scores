@php
$size = isset($fullwidth) && $fullwidth === true
    ? 'is-12'
    : 'is-5-tablet is-4-desktop is-4-widescreen';
$heroClass = isset($hasTable) && $hasTable === true ? 'has-table' : '';
@endphp
<section class="hero has-background-dark is-fullheight-with-navbar {{ $heroClass }}">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-centered">
                <div class="column {{ $size }}">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</section>
