@extends('admin.layouts.app')
@section('panel')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    @if ($influencer->kyc_data)
                        <ul class="list-group">
                            @foreach ($influencer->kyc_data as $val)
                                @continue(!$val->value)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ __($val->name) }}
                                    <span>
                                        @if ($val->type == 'checkbox')
                                            {{ implode(',', $val->value) }}
                                        @elseif($val->type == 'file')
                                            @if ($val->value)
                                                <a
                                                    href="{{ route('admin.download.attachment', encrypt(getFilePath('verify') . '/' . $val->value)) }}"><i
                                                        class="fa fa-file"></i> @lang('Attachment') </a>
                                            @else
                                                @lang('No File')
                                            @endif
                                        @else
                                            <p>{{ __($val->value) }}</p>
                                        @endif
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <h5 class="text-center">@lang('KYC data not found')</h5>
                    @endif

                    @if ($influencer->kv == 2)
                        <div class="d-flex flex-wrap justify-content-end mt-3">
                            <button class="btn btn-outline--danger me-3 confirmationBtn" data-question="@lang('Are you sure to reject this documents?')"
                                data-action="{{ route('admin.influencers.kyc.reject', $influencer->id) }}"
                                data-btn_class="btn btn--primary btn--md"><i
                                    class="las la-ban"></i>@lang('Reject')</button>
                            <button class="btn btn-outline--success confirmationBtn" data-question="@lang('Are you sure to approve this documents?')"
                                data-action="{{ route('admin.influencers.kyc.approve', $influencer->id) }}"
                                data-btn_class="btn btn--primary btn--md"><i
                                    class="las la-check"></i>@lang('Approve')</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <x-confirmation-modal />
@endsection
