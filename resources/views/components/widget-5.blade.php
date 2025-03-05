@props([
    'link' => null,
    'title' => null,
    'value' => null,
    'icon' => '',
    'bg' => 'primary',
    'class' => null
])

<div class="widget-six bg--white p-2 rounded-2 box-shadow3  {{$class}}">
    <div class="widget-six__top">
                <img src="{{ asset($icon) }}" alt="icon" class="b-radius--5 border border-danger" style="width: 30px; height: 30px;">
        <p>{{ __($title) }}</p>
    </div>
    <div class="widget-six__bottom mt-3">
        <h4 class="widget-six__number">{{ $value }}</h4>
        <a href="{{ $link }}" class="widget-six__btn"><span class="text--small">@lang('View All')</span><i class="las la-arrow-right"></i></a>
    </div>
</div>
