@extends($activeTemplate . 'layouts.master')
@section('content')
<form action="" class="d-flex flex-wrap justify-content-end ms-auto table--form mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control form--control" value="{{ request()->search }}" placeholder="@lang('Search by Influencer')">
        <button class="input-group-text bg--base text-white border-0 px-4"><i class="las la-search"></i></button>
    </div>
</form>
<table class="table table--responsive--lg rounded-pill">
    <thead>
        <tr>
            <th>Sponsorship ID</th>
            <th>Sponsee</th>
            <th class="text-center">Amount | Delivery</th>
            <th>Status</th>
            <th>@lang('Action')</th>
        </tr>
    </thead>
    <tbody>
        @forelse($favorites as $favorite)
        <tr>
            <td >
                <span class="fw-bold">
                    <a href="{{ route('influencer.profile', [slug($favorite->influencer->username), $favorite->influencer_id]) }}">{{ __(@$favorite->influencer->username) }}
                    </a>
                </span>
            </td>

            <td>
                <p class="text--warning">
                    @php
                    echo showRatings($favorite->influencer->rating);
                    @endphp
                    ({{ getAmount(@$favorite->influencer->reviews_count) }})
                </p>
            </td>

            <td class="text-center">
                <span>{{ getAmount(@$favorite->influencer->completed_order )}}</span>
            </td>

            <td >
                <span>{{ showDateTime(@$favorite->influencer->created_at) }}</span>
            </td>

            <td >
                <div>
                    <a href="{{ route('influencer.profile', [slug($favorite->influencer->username), $favorite->influencer_id]) }}" class="btn btn--sm btn--outline-base">
                        <i class="las la-external-link-alt"></i> @lang('Profile')
                    </a>

                    <button type="button" class="btn btn--sm btn--outline-danger confirmationBtn" data-action="{{ route('user.favorite.remove', $favorite->id) }}" data-question="Are you sure to remove this influencer?" data-btn_class="btn btn--base btn--md">
                        <i class="la la-times"></i> @lang('Remove')
                    </button>

                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td class="justify-content-center text-center" colspan="100%">
                <i class="la la-4x la-frown"></i>
                <br>
                {{ __($emptyMessage) }}
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

@if ($favorites->hasPages())
<div class=" py-4">
    {{ paginateLinks($favorites) }}
</div>
@endif

<x-confirmation-modal frontendClass="true" />
@endsection
