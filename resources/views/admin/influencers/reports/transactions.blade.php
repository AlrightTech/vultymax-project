@extends('admin.layouts.app')

@section('panel')
<div class="row">
    <div class="col-lg-12">
        <div class="show-filter mb-3 text-end">
            <button type="button" class="btn btn-outline--primary showFilterBtn btn-sm"><i class="las la-filter"></i> @lang('Filter')</button>
        </div>
        <div class="card responsive-filter-card mb-4 table-custom-bg-radius" style="box-shadow: 0px 0px 5.95px 0px #00000014;">
            <div class="card-body">
                <form action="">
                    <div class="d-flex flex-wrap gap-4">
                        <div class="flex-grow-1">
                            <label class="transactin-labels">@lang('TRX/Username')</label>
                            <input type="text" name="search" value="{{ request()->search }}" class="form-control all-option-clr">
                        </div>
                        <div class="flex-grow-1">
                            <label class="transactin-labels">@lang('Type')</label>
                            <select name="type" class="form-control all-option-clr" style="color: #444444 !important;">
                                <option value="">@lang('All')</option>
                                <option value="+" @selected(request()->type == '+')>@lang('Plus')</option>
                                <option value="-" @selected(request()->type == '-')>@lang('Minus')</option>
                            </select>
                        </div>
                        <div class="flex-grow-1">
                            <label class="transactin-labels">@lang('Remark')</label>
                            <select class="form-control all-option-clr" name="remark">
                                <option value="">@lang('Any')</option>
                                @foreach($remarks as $remark)
                                <option value="{{ $remark->remark }}" @selected(request()->remark == $remark->remark)>{{ __(keyToTitle($remark->remark)) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex-grow-1">
                            <label class="transactin-labels">@lang('Date')</label>
                            <input name="date" type="text" data-range="true" data-multiple-dates-separator=" - " data-language="en" class="datepicker-here form-control all-option-clr" data-position='bottom right' placeholder="@lang('Start date - End date')" autocomplete="off" value="{{ request()->date }}">
                        </div>
                        <div class="flex-grow-1 align-self-end">
                            <button class="btn btn--primary w-100 h-45" style="border-radius: 5px !important; height: 40px !important;"><i class="fas fa-filter"></i> @lang('Filter')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card table-custom-bg-radius ">
            <div class="card-body p-0">
                <div class="table-responsive--sm table-responsive borderr-table">
                    <table class="table table--light style--two">
                        <thead>
                            <tr>
                                <th>@lang('Influencer')</th>
                                <th>@lang('TRX')</th>
                                <th>@lang('Transacted')</th>
                                <th>@lang('Amount')</th>
                                <th>@lang('Post Balance')</th>
                                <th>@lang('Details')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($transactions as $trx)
                                <tr>
                                    <td>
                                        <span class="fw-bold">{{ @$trx->influencer->fullname }}</span>
                                        <br>
                                        <span class="small"> <a href="{{ appendQuery('search',@$trx->influencer->username) }}"><span>@</span>{{ @$trx->influencer->username }}</a> </span>
                                    </td>

                                    <td >
                                        <strong>{{ $trx->trx }}</strong>
                                    </td>

                                    <td >
                                        {{ showDateTime($trx->created_at) }}<br>{{ diffForHumans($trx->created_at) }}
                                    </td>

                                    <td  class="budget">
                                        <span class="fw-bold @if($trx->trx_type == '+')text--success @else text--danger @endif">
                                            {{ $trx->trx_type }} {{showAmount($trx->amount)}}
                                        </span>
                                    </td>

                                    <td  class="budget">
                                        {{ showAmount($trx->post_balance) }}
                                    </td>

                                    <td >{{ __($trx->details) }}</td>
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
        @if($transactions->hasPages())
        <div class="card-footer py-4">
            {{ paginateLinks($transactions) }}
        </div>
        @endif
    </div><!-- card end -->
</div>
</div>

@endsection

@push('script-lib')
<script src="{{ asset('assets/global/js/datepicker.min.js') }}"></script>
<script src="{{ asset('assets/global/js/datepicker.en.js') }}"></script>
@endpush
@push('script')
  <script>
    (function($){
        "use strict";
        if(!$('.datepicker-here').val()){
            $('.datepicker-here').datepicker();
        }
    })(jQuery)
  </script>
@endpush
