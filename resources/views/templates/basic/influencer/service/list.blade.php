@extends($activeTemplate . 'layouts.master')
@section('content')
<div class="d-flex justify-content-between align-items-center position-relative mb-4 flex-wrap gap-4">

    <div class="d-flex align-items-start flex-wrap gap-2">
        <a class="btn btn--outline-custom {{ menuActive('influencer.service.all') }}" aria-current="page" href="{{ route('influencer.service.all') }}">@lang('All')</a>
        <a class="btn btn--outline-custom {{ menuActive('influencer.service.pending') }}" href="{{ route('influencer.service.pending') }}">@lang('Pending')</a>
        <a class="btn btn--outline-custom {{ menuActive('influencer.service.approved') }}" href="{{ route('influencer.service.approved') }}">@lang('Approved')</a>
        <a class="btn btn--outline-custom {{ menuActive('influencer.service.rejected') }}" href="{{ route('influencer.service.rejected') }}">@lang('Rejected')</a>
    </div>
    <form action="" class="service-search-form flex-fill">
        <div class="input-group">
            <input type="text" name="search" class="form-control form--control" value="{{ request()->search }}" placeholder="@lang('Title / Category')">
            <button class="input-group-text bg--base border-0 px-4 text-white"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20.5605 18.4395L16.7528 14.6318C17.5395 13.446 18 12.0262 18 10.5C18 6.3645 14.6355 3 10.5 3C6.3645 3 3 6.3645 3 10.5C3 14.6355 6.3645 18 10.5 18C12.0262 18 13.446 17.5395 14.6318 16.7528L18.4395 20.5605C19.0245 21.1462 19.9755 21.1462 20.5605 20.5605C21.1462 19.9748 21.1462 19.0252 20.5605 18.4395ZM5.25 10.5C5.25 7.605 7.605 5.25 10.5 5.25C13.395 5.25 15.75 7.605 15.75 10.5C15.75 13.395 13.395 15.75 10.5 15.75C7.605 15.75 5.25 13.395 5.25 10.5Z" fill="white"/>
                </svg>
                </button>
        </div>
    </form>
</div>

<div class="row">
    <div class="col-lg-12">
        <table class="table--responsive--lg table ronded-2">
            <thead>
                <tr>
                    <th>@lang('Title')</th>
                    <th>@lang('Category | Price')</th>
                    <th>@lang('Sponsorships')</th>
                    @if(request()->routeIs('influencer.service.all'))
                    <th>@lang('Status')</th>
                    @endif
                    <th>@lang('Action')</th>
                </tr>
            </thead>
            <tbody >
                @forelse($services as $service)
                <tr>
                    <td class="AllServices-table-Titles">
                        {{ __(strLimit($service->title, 60)) }}
                    </td>

                    <td class="AllServices-table-category">
                        <div>
                            <span>{{ __(@$service->category->name) }}</span><br>
                            <span class="fw-bold AllServices-table-Category-usd">{{ showAmount(@$service->price) }}</span>
                        </div>
                    </td>

                    <td class="AllServices-table-Totals">
                        <div>
                            <span> @lang('Total') : {{ getAmount($service->total_order_count) }}</span><br>
                            <!-- <span> @lang('Done') : {{ getAmount($service->complete_order_count) }}</span><br> -->
                        </div>
                    </td>
                    @if(request()->routeIs('influencer.service.all'))
                    <td>
                        <div class="">
                            @php echo $service->statusBadge @endphp
                            @if ($service->status == 2)
                            <button type="button" class="btn btn--sm btn--outline-warning detailBtn" data-admin_feedback="{{ $service->admin_feedback }}"><i class="la la-info"></i></button>
                            @endif
                        </div>
                    </td>
                    @endif
                    <td>
                        <div class="d-flex flex-wrap gap-2 justify-content-end">
                            <a href="{{ route('influencer.service.edit', $service->id) }}" class="btn btn--sm btn--outline-base @if ($service->status == 2) disabled @endif">
                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.33333 13.1667H4.28333L10.8 6.65L9.85 5.7L3.33333 12.2167V13.1667ZM2 14.5V11.6667L10.8 2.88333C10.9333 2.76111 11.0807 2.66667 11.242 2.6C11.4033 2.53333 11.5727 2.5 11.75 2.5C11.9273 2.5 12.0996 2.53333 12.2667 2.6C12.4338 2.66667 12.5782 2.76667 12.7 2.9L13.6167 3.83333C13.75 3.95556 13.8473 4.1 13.9087 4.26667C13.97 4.43333 14.0004 4.6 14 4.76667C14 4.94444 13.9696 5.114 13.9087 5.27533C13.8478 5.43667 13.7504 5.58378 13.6167 5.71667L4.83333 14.5H2ZM10.3167 6.18333L9.85 5.7L10.8 6.65L10.3167 6.18333Z" fill="#FF1618"/>
                                    </svg>
                                     @lang('Edit')
                            </a>

                            <a href="{{ route('influencer.service.orders', $service->id) }}" class="btn btn--sm btn--outline-gray @if ($service->status != 1) disabled @endif">
                                <i class="las la-list-ul"></i> @lang('Orders')
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
        @if ($services->hasPages())
                <div class=" py-4">
                    {{ paginateLinks($services) }}
                </div>
                @endif

    </div>
</div>
<div id="detailModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('Reason of Rejection')</h5>
                <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </span>
            </div>
            <div class="modal-body">
                <p class="modal-detail"></p>
            </div>
        </div>
    </div>
</div>
<x-confirmation-modal frontendClass="true" />
@endsection

@push('style')
<style>
    .nav-link {
        color: rgb(var(--base));
    }

    .nav-tabs .nav-link:focus,
    .nav-tabs .nav-link:hover {
        border-color: rgb(var(--base)) rgb(var(--base)) rgb(var(--base));
        color: rgb(var(--base));
        isolation: isolate;
    }
</style>
@endpush

@push('script')
<script>
    (function($) {
            "use strict";
            $('.detailBtn').on('click', function() {
                var modal = $('#detailModal');
                modal.find('.modal-detail').text($(this).data('admin_feedback'));
                modal.modal('show');
            });

        })(jQuery);
</script>
@endpush
