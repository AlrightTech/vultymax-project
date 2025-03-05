@extends('admin.layouts.app')

@section('panel')
    <div class="row justify-content-center">
        @if (request()->routeIs('admin.withdraw.log') || request()->routeIs('admin.withdraw.method') || request()->routeIs('admin.users.withdrawals') || request()->routeIs('admin.users.withdrawals.method'))
            <div class="col-xxl-4 col-sm-6 mb-2">
                <x-widget
                    style="6"
                    link="{{ route('admin.withdraw.approved') }}"
                    icon="las la-money-bill-wave-alt"
                    title="Approved Withdrawals"
                    value="{{ showAmount($successful) }}"
                    bg="success"
                />
            </div>
            <div class="col-xxl-4 col-sm-6 mb-2">
                <x-widget
                    style="6"
                    link="{{ route('admin.withdraw.pending') }}"
                    icon="fas fa-spinner"
                    title="Pending Withdrawals"
                    value="{{ showAmount($pending) }}"
                    bg="warning"
                />
            </div>
            <div class="col-xxl-4 col-sm-6 mb-2">
                <x-widget
                    style="6"
                    link="{{ route('admin.withdraw.rejected') }}"
                    icon="las la-time"
                    title="Rejected Withdrawals"
                    value="{{ showAmount($rejected) }}"
                    bg="danger"
                />
            </div>
        @endif
        <div class="col-lg-12 mt-4">
            <div class="card table-custom-bg-radius">
                <div class="card-body p-0">

                    <div class="table-responsive--sm table-responsive borderr-table">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>@lang('Gateway | Transaction')</th>
                                    <th>@lang('Initiated')</th>
                                    <th>@lang('Influencer')</th>
                                    <th>@lang('Amount')</th>
                                    <th>@lang('Conversion')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse($withdrawals as $withdraw)
                                    @php
                                        $details = $withdraw->withdraw_information != null ? json_encode($withdraw->withdraw_information) : null;
                                    @endphp
                                    <tr>
                                        <td >
                                            <div>
                                                <a href="{{ appendQuery('method', @$withdraw->method->id) }}" class="fw-blod"> {{ __(@$withdraw->method->name) }}</a>
                                                <small>{{ $withdraw->trx }}</small>
                                            </div>
                                        </td>
                                        <td >
                                            {{ showDateTime($withdraw->created_at) }} <br> {{ diffForHumans($withdraw->created_at) }}
                                        </td>

                                        <td >
                                            <span class="fw-bold">{{ $withdraw->influencer->fullname }}</span>
                                            <br>
                                            <span class="small"> <a href="{{ appendQuery('search', @$withdraw->influencer->username) }}"><span>@</span>{{ $withdraw->influencer->username }}</a> </span>
                                        </td>


                                        <td >
                                            {{ showAmount($withdraw->amount) }} - <span class="text-danger" title="@lang('charge')">{{ showAmount($withdraw->charge) }} </span>
                                            <br>
                                            <strong title="@lang('Amount after charge')">
                                                {{ showAmount($withdraw->amount - $withdraw->charge) }}
                                            </strong>

                                        </td>

                                        <td>
                                            1 {{ __(gs("cur_text")) }} = {{ showAmount($withdraw->rate) }} {{ __($withdraw->currency) }}
                                            <br>
                                            <strong>{{ showAmount($withdraw->final_amount) }} {{ __($withdraw->currency) }}</strong>
                                        </td>



                                        <td >
                                            @php echo $withdraw->statusBadge @endphp
                                        </td>
                                        <td >
                                            <a href="{{ route('admin.withdraw.details', $withdraw->id) }}" class="btn btn-sm btn-outline--primary ms-1">
                                                <i class="la la-desktop"></i> @lang('Details')
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
                @if ($withdrawals->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($withdrawals) }}
                    </div>
                @endif
            </div><!-- card end -->
        </div>
    </div>
@endsection



@push('breadcrumb-plugins')
    <form action="" method="GET">
        <div class="form-inline float-sm-end mb-2 ms-0 ms-xl-2 ms-lg-0">
            <div class="input-group">
                <input type="text" name="search" class="form-control bg--white searchh-hiring" placeholder="@lang('Trx number/Username')" value="{{ request()->search }}">
                <button class="btn btn--primary input-group-text searchh-hiring1" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
        <div class="form-inline float-sm-end">
            <div class="input-group">
                <input name="date" type="text" data-range="true" data-multiple-dates-separator=" - " data-language="en" class="datepicker-here form-control bg--white searchh-hiring" data-position='bottom right' placeholder="@lang('Start Date - End date')" autocomplete="off" value="{{ request()->date }}">
                <input type="hidden" name="method" value="{{ @$method->id }}">
                <button class="btn btn--primary input-group-text searchh-hiring1" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
@endpush
@push('script-lib')
<script src="{{ asset('assets/global/js/datepicker.min.js') }}"></script>
<script src="{{ asset('assets/global/js/datepicker.en.js') }}"></script>
@endpush
@push('script')
    <script>
        (function($) {
            'use strict';
            if (!$('.datepicker-here').val()) {
                $('.datepicker-here').datepicker();
            }
        })(jQuery)
    </script>
@endpush
