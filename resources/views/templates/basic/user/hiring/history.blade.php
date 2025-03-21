@extends($activeTemplate . 'layouts.master')
@section('content')
<form action="" class="d-flex flex-wrap justify-content-end ms-auto table--form mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control form--control" value="{{ request()->search }}" placeholder="@lang('Hiring No / Influencer')">
        <button class="input-group-text bg--base text-white border-0 px-4"><i class="las la-search"></i></button>
    </div>
</form>
<table class="table--responsive--lg table ">
    <thead>
        <tr>
            <th>Sponsorship ID</th>
            <th>@lang('Influencer')</th>
            <th class="text-center">@lang('Amount | Delivery')</th>
            <th>@lang('Status')</th>
            <th>@lang('Action')</th>
        </tr>
    </thead>
    <tbody>
        @forelse($hirings as $hiring)
        <tr>
            <td >
                {{ $hiring->hiring_no }}</span>
            </td>

            <td>
                <span class="fw-bold">
                    <a href="{{ route('influencer.profile', [slug($hiring->influencer->username), $hiring->influencer_id]) }}" class="text--base">{{ __(@$hiring->influencer->username) }} </a>
                </span>
            </td>

            <td  class="text-center">
                <div>
                    <span class="fw-bold">{{ showAmount($hiring->amount) }}</span><br>
                    {{ $hiring->delivery_date }}
                </div>
            </td>

            <td >
                @php echo $hiring->statusBadge @endphp
            </td>

            <td >
                <div class="d-flex flex-wrap gap-1 justify-content-end">
                    @if ($hiring->status == Status::HIRING_COMPLETED)
                        <a href="{{ route('user.review.influencer', $hiring->id) }}" class="btn btn--sm btn--outline-warning">
                            <i class="las la-star"></i> @lang('Review')
                        </a>
                    @else
                        <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" data-placement="top" title="@lang('You can review it after the hiring is completed.')">
                            <button type="button" class="btn btn--sm btn--outline-warning disabled"><i class="las la-star"></i> @lang('Review')</button>
                        </span>
                    @endif

                    <a href="{{ route('user.hiring.detail',$hiring->id) }}" class="btn btn--sm btn--outline-base">
                        <i class="la la-desktop"></i> @lang('Detail')
                    </a>

                    <a href="{{ route('user.hiring.conversation.view',$hiring->id) }}" class="btn btn--sm btn--outline-info">
                        <i class="las la-sms"></i> @lang('Chat')
                    </a>
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

@if ($hirings->hasPages())
<div class=" py-4">
    {{ paginateLinks($hirings) }}
</div>
@endif

@endsection
