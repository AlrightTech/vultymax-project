@extends($activeTemplate . 'layouts.master')
@section('content')
<div class="d-flex justify-content-between align-items-center position-relative mb-4 flex-wrap gap-4">
    <span class="filter-toggle btn btn--base btn--sm h-100 d-none"> <i class="i las la-bars"></i></span>

    <div class="d-flex justify-content-between flex-wrap gap-3">

        <div class="d-flex align-items-start flex-wrap gap-2">
            <a class="btn btn--outline-custom {{ menuActive('influencer.service.order.index') }}" aria-current="page" href="{{ route('influencer.service.order.index') }}">@lang('All')</a>
            <a class="btn btn--outline-custom {{ menuActive('influencer.service.order.pending') }}" href="{{ route('influencer.service.order.pending') }}">@lang('Pending') ({{ $pendingOrder??0 }})</a>
            <a class="btn btn--outline-custom {{ menuActive('influencer.service.order.inprogress') }}" href="{{ route('influencer.service.order.inprogress') }}">@lang('In progressed')</a>
            <a class="btn btn--outline-custom {{ menuActive('influencer.service.order.completed') }}" href="{{ route('influencer.service.order.completed') }}">@lang('Completed')</a>
            <a class="btn btn--outline-custom {{ menuActive('influencer.service.order.reported') }}" href="{{ route('influencer.service.order.reported') }}">@lang('Reported')</a>
            <a class="btn btn--outline-custom {{ menuActive('influencer.service.order.cancelled') }}" href="{{ route('influencer.service.order.cancelled') }}">@lang('Cancelled')</a>
        </div>

        <form action="" class="ms-auto service-search-form">
            <div class="input-group">
                <input type="text" name="search" class="form-control form--control searchh-hiring" value="{{ request()->search }}" placeholder="@lang('Search here')">
                <button class="input-group-text bg--base border-0 text-white px-4 searchh-hiring1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.5605 18.4395L16.7528 14.6318C17.5395 13.446 18 12.0262 18 10.5C18 6.3645 14.6355 3 10.5 3C6.3645 3 3 6.3645 3 10.5C3 14.6355 6.3645 18 10.5 18C12.0262 18 13.446 17.5395 14.6318 16.7528L18.4395 20.5605C19.0245 21.1462 19.9755 21.1462 20.5605 20.5605C21.1462 19.9748 21.1462 19.0252 20.5605 18.4395ZM5.25 10.5C5.25 7.605 7.605 5.25 10.5 5.25C13.395 5.25 15.75 7.605 15.75 10.5C15.75 13.395 13.395 15.75 10.5 15.75C7.605 15.75 5.25 13.395 5.25 10.5Z" fill="white"/>
                        </svg>
                        
                </button>
            </div>
        </form>
    </div>

</div>
<div class="row mt-2">

    <div class="col-lg-12">
        <table class="table--responsive--lg table">
            <thead>
                <tr>
                    <th>@lang('Order Number')</th>
                    <th>@lang('Client/Username')</th>
                    <th class="text-center">@lang('Amount | Delivery')</th>
                    @if (request()->routeIs('influencer.service.order.index'))
                    <th>@lang('Status')</th>
                    @endif
                    <th>@lang('Action')</th>
                </tr>
            </thead>
            <tbody>

                @forelse($orders as $order)
                <tr>
                    <td>
                        <span>{{ $order->order_no }}</span>
                    </td>

                    <td >
                        <span class="fw-bold">{{ __(@$order->user->username) }}</span>
                    </td>

                    <td>
                        <div>
                            <span class="fw-bold">{{ showAmount($order->amount) }}</span> <br>
                            {{ $order->delivery_date }}
                        </div>
                    </td>

                    @if (request()->routeIs('influencer.service.order.index'))
                    <td >
                        @php echo $order->statusBadge @endphp
                    </td>
                    @endif

                    <td >
                        <div class="d-flex flex-wrap gap-2 justify-content-end">
                            <a href="{{ route('influencer.service.order.detail',$order->id) }}" class="btn btn--sm btn--outline-base">
                                <i class="las la-desktop"></i> @lang('Detail')
                            </a>
                            <a href="{{ route('influencer.service.order.conversation.view',$order->id) }}" class="btn btn--sm btn--outline-info">
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
        @if ($orders->hasPages())
        <div class=" py-4">
            {{ paginateLinks($orders) }}
        </div>
        @endif
    </div>
</div>
@endsection
