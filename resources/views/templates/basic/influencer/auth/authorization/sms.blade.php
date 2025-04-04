@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <section class="pt-80 pb-80">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="verification-code-wrapper">
                    <div class="verification-area">
                        <h5 class="pb-3 text-center border-bottom">@lang('Verify Mobile Number')</h5>
                        <form action="{{ route('influencer.verify.mobile') }}" method="POST" class="submit-form">
                            @csrf
                            <p class="verification-text">@lang('A 6 digit verification code sent to your mobile number') :
                                +{{ showMobileNumber(authInfluencer()->mobileNumber) }}</p>
                            @include($activeTemplate . 'partials.verification_code')
                            <div class="mb-3">
                                <button type="submit" class="btn btn--base w-100">@lang('Submit')</button>
                            </div>
                            <div class="form-group">
                                <p>
                                    @lang('If you don\'t get any code'), <span class="countdown-wrapper">@lang('try again after') <span
                                            id="countdown" class="fw-bold">--</span> @lang('seconds')</span> <a
                                        href="{{ route('influnecer.send.verify.code', 'sms') }}" class="try-again-link d-none">
                                        @lang('Try again')</a>
                                </p>
                                <a href="{{ route('influnecer.logout') }}">@lang('Logout')</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endsection
    @push('script')
        <script>

            var distance =Number("{{authInfluencer()->ver_code_send_at->addMinutes(2)->timestamp-time()}}");
            var x = setInterval(function() {
                distance--;
                document.getElementById("countdown").innerHTML = distance;
                if (distance <= 0) {
                    clearInterval(x);
                    document.querySelector('.countdown-wrapper').classList.add('d-none');
                    document.querySelector('.try-again-link').classList.remove('d-none');
                }
            }, 1000);

        </script>
    @endpush
