@extends($activeTemplate . 'layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="" class="d-flex flex-wrap justify-content-end ms-auto table--form mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control form--control" value="{{ request()->search }}"
                        placeholder="@lang('Search by transactions')">
                    <button class="input-group-text bg--base text-white border-0 px-4"><i class="las la-search"></i></button>
                </div>
            </form>
            <table class="table table--responsive--lg rounded-pill">
                <thead>
                    <tr>
                        <th>@lang('Gateway | Transaction')</th>
                        <th>@lang('Initiated')</th>
                        <th>@lang('Amount')</th>
                        <th>@lang('Conversion')</th>
                        <th>@lang('Status')</th>
                        <th>@lang('Details')</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($deposits as $deposit)
                        <tr>
                            <td>
                                <div>
                                    <span class="text--base">{{ __($deposit->gateway?->name) }}</span>
                                    <br>
                                    <small> {{ $deposit->trx }} </small>
                                </div>
                            </td>

                            <td >
                                {{ showDateTime($deposit->created_at) }}<br>{{ diffForHumans($deposit->created_at) }}
                            </td>
                            <td >
                                <div>
                                    {{ showAmount($deposit->amount) }} + <span
                                        class="text-danger" title="@lang('charge')">{{ showAmount($deposit->charge) }}
                                    </span>
                                    <br>
                                    <strong title="@lang('Amount with charge')">
                                        {{ showAmount($deposit->amount + $deposit->charge) }} {{ __(gs("cur_text")) }}
                                    </strong>
                                </div>
                            </td>
                            <td>
                                <div>
                                    1 {{ __(gs("cur_text")) }} = {{ showAmount($deposit->rate) }}
                                    {{ __($deposit->method_currency) }}
                                    <br>
                                    <strong>{{ showAmount($deposit->final_amo) }}
                                        {{ __($deposit->method_currency) }}</strong>
                                </div>
                            </td>
                            <td >
                                @php echo $deposit->statusBadge @endphp
                            </td>
                            @php
                                $details = $deposit->detail != null ? json_encode($deposit->detail) : null;
                            @endphp

                            <td >
                                <button type="button"
                                    class="btn btn--sm btn--outline-base @if ($deposit->method_code >= 1000) detailBtn @else disabled @endif"
                                    @if ($deposit->method_code >= 1000) data-info="{{ $details }}" @endif
                                    @if ($deposit->status == 3) data-admin_feedback="{{ $deposit->admin_feedback }}" @endif>
                                    <i class="la la-desktop"></i>  @lang('Detail')
                                </button>
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
        </div>

        {{-- APPROVE MODAL --}}
        <div id="detailModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">@lang('Details')</h5>
                        <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="las la-times"></i>
                        </span>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group-flush userData mb-2">
                        </ul>
                        <div class="feedback"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script')
    <script>
        (function($) {
            "use strict";
            $('.detailBtn').on('click', function() {
                var modal = $('#detailModal');

                var userData = $(this).data('info');
                var html = '';
                if (userData) {
                    userData.forEach(element => {
                        if (element.type != 'file') {
                            html += `
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>${element.name}</span>
                                <span">${element.value}</span>
                            </li>`;
                        }
                    });
                }

                modal.find('.userData').html(html);

                if ($(this).data('admin_feedback') != undefined) {
                    var adminFeedback = `
                        <div class="my-3">
                            <strong>@lang('Admin Feedback')</strong>
                            <p>${$(this).data('admin_feedback')}</p>
                        </div>
                    `;
                } else {
                    var adminFeedback = '';
                }

                modal.find('.feedback').html(adminFeedback);


                modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush
