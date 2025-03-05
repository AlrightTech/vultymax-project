@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card table-custom-bg-radius">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive borderr-table">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>@lang('Influencer')</th>
                                    <th>@lang('Email-Phone')</th>
                                    <th>@lang('Country')</th>
                                    <th>@lang('Joined At')</th>
                                    <th>@lang('Balance')</th>
                                    <th>@lang('Complete Order')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($influencers as $influencer)
                                    <tr>
                                        <td>
                                            {{-- <span class="fw-bold">{{ $influencer->fullname }}</span> --}}
                                            <span class="sponse-name">{{ $influencer->fullname }}</span>
                                            <br>
                                            <span class="small sponse-small">
                                                <a
                                                    href="{{ route('admin.influencers.detail', $influencer->id) }}"><span>@</span>{{ $influencer->username }}</a>
                                            </span>
                                        </td>


                                        <td class="sn-nmbers">
                                            {{ $influencer->email }}<br>{{ $influencer->mobile }}
                                        </td>
                                        <td>
                                            <span class="sn-nmbers"
                                                title="{{ @$influencer->address->country }}">{{ $influencer->country_code }}</span>
                                        </td>



                                        <td class="sn-nmbers">
                                            {{ showDateTime($influencer->created_at) }} <br>
                                            {{ diffForHumans($influencer->created_at) }}
                                        </td>


                                        <td>
                                            <span class="sn-nmbers">
                                                {{ showAmount($influencer->balance) }}
                                            </span>
                                        </td>

                                        <td>
                                            <span class="sn-nmbers">{{ getAmount($influencer->completed_order) }}</span>
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.influencers.detail', $influencer->id) }}"
                                                class="btn btn-sm btn-outline--primary confirmationBtn detaill-txt">
                                                <i class="las la-desktop"></i> @lang('Details')
                                            </a>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                @if ($influencers->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($influencers) }}
                    </div>
                @endif
            </div>
        </div>


    </div>
@endsection



{{-- @push('breadcrumb-plugins')
    <div class="d-flex flex-wrap justify-content-end">
        <form action="" method="GET" class="form-inline">
            <div class="input-group justify-content-end">
                <input type="text" name="search" class="form-control bg--white border-0 navbar-search-field bg-white" placeholder="@lang('Search username')"
                    value="{{ request()->search }}">
                <button class="btn btn--primary input-group-text" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
@endpush --}}

@push('breadcrumb-plugins')
    <div class="d-flex flex-wrap justify-content-end">
        <form action="" method="GET" class="form-inline">
            <div class="input-group rounded-4 shadow-sm overflow-hidden" style="background: white;">
                <input type="text" name="search" class="form-control border-0 bg-white text-muted px-3"
                    placeholder="@lang('Search here...')" value="{{ request()->search }}">
                <button class="btn border-0 pe-3 bg-transparent shadow-none" type="submit">
                    <i class="fa fa-search text-muted"></i>
                </button>
            </div>
        </form>
    </div>
@endpush



{{-- @props(['placeholder' => 'Search...', 'btn' => 'btn--primary'])
    <div class="position-relative">
        <input type="search" name="search" class="form-control bg-white pe-5 border-0 navbar-search-field bg-white" id="searchInput" autocomplete="off"
            placeholder="Search here..." style="border-radius: 12px; height: 42px; width: 265px;">
        <svg viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg"
            class="position-absolute top-50 translate-middle-y end-0 me-2"
            width="20" height="20">
            <path d="M15.4204 14.3296L12.5646 11.4738C13.1546 10.5845 13.5 9.51969 13.5 8.375C13.5 5.27338 10.9766 2.75 7.875 2.75C4.77338 2.75 2.25 5.27338 2.25 8.375C2.25 11.4766 4.77338 14 7.875 14C9.01969 14 10.0845 13.6546 10.9738 13.0646L13.8296 15.9204C14.2684 16.3597 14.9816 16.3597 15.4204 15.9204C15.8597 15.4811 15.8597 14.7689 15.4204 14.3296ZM3.9375 8.375C3.9375 6.20375 5.70375 4.4375 7.875 4.4375C10.0462 4.4375 11.8125 6.20375 11.8125 8.375C11.8125 10.5462 10.0462 12.3125 7.875 12.3125C5.70375 12.3125 3.9375 10.5462 3.9375 8.375Z" fill="#6B7384" />
        </svg>
    </div> --}}

