@extends($activeTemplate . 'layouts.master')
@section('content')
@php
$kycContent = getContent('influencer_kyc.content', true);
@endphp
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card custom--card">
                <div class="card-body">
                    @if (authInfluencer()->kv == Status::KYC_UNVERIFIED)
                    <div class="alert alert-info" role="alert">
                        <h4 class="alert-heading">@lang('KYC Verification')</h4> 
                    </div>
                    @endif
                    <form action="{{ route('influencer.kyc.submit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <x-viser-form identifier="act" identifierValue="influencer_kyc"></x-viser-form>
                        </div>
                        <button type="submit" class="btn btn--base w-100">@lang('Submit')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
