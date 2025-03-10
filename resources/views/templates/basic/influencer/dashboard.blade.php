@php
$kycContent = getContent('influencer_kyc.content', true);
@endphp
@extends($activeTemplate . 'layouts.master')
@section('content')
@if (authInfluencer()->kv == Status::KYC_UNVERIFIED)
<div class="alert alert-info" role="alert">
    <h4 class="alert-heading">@lang('KYC Verification required')</h4>
    <hr>
    <p class="mb-0">{{ __($kycContent->data_values->verification_content) }}
        <a href="{{ route('influencer.kyc.form') }}" class="text--base">@lang('Click Here to Verify')</a>
    </p>
</div>
@elseif(authInfluencer()->kv == Status::KYC_PENDING)
<div class="alert alert-warning" role="alert">
    <h4 class="alert-heading">@lang('KYC Verification pending')</h4>
    <hr>
    <p class="mb-0">{{ __($kycContent->data_values->pending_content) }}
        <a href="{{ route('influencer.kyc.data') }}" class="text--base">@lang('See KYC Data')</a>
    </p>
</div>
@endif
<div class="row justify-content-center gy-4">
    <!-- Current Balance -->
    <div class="col-xxl-4 col-md-4 col-sm-10">
        <!-- current Balance -->
        <div class="dashboard-widget widget--base">
            <div class="dashboard-widget__icon">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.66669 12V9.06667C6.66669 8.48 7.14669 8 7.73335 8H29.6C30.1867 8 30.6667 8.48 30.6667 9.06667V20.2667C30.6667 20.8533 30.1867 21.3333 29.6 21.3333H26.6667M3.73335 12H25.6C25.8829 12 26.1542 12.1124 26.3543 12.3124C26.5543 12.5125 26.6667 12.7838 26.6667 13.0667V24.2667C26.6667 24.5496 26.5543 24.8209 26.3543 25.0209C26.1542 25.221 25.8829 25.3333 25.6 25.3333H3.73335C3.45046 25.3333 3.17915 25.221 2.97911 25.0209C2.77907 24.8209 2.66669 24.5496 2.66669 24.2667V13.0667C2.66669 12.7838 2.77907 12.5125 2.97911 12.3124C3.17915 12.1124 3.45046 12 3.73335 12ZM16 18.6667C16 19.0203 15.8595 19.3594 15.6095 19.6095C15.3594 19.8595 15.0203 20 14.6667 20C14.3131 20 13.9739 19.8595 13.7239 19.6095C13.4738 19.3594 13.3334 19.0203 13.3334 18.6667C13.3334 18.313 13.4738 17.9739 13.7239 17.7239C13.9739 17.4738 14.3131 17.3333 14.6667 17.3333C15.0203 17.3333 15.3594 17.4738 15.6095 17.7239C15.8595 17.9739 16 18.313 16 18.6667Z" stroke="#1FAB89" stroke-width="1.5" stroke-miterlimit="10" stroke-linejoin="round"/>
                    </svg>
                    
            </div>
            <div class="dashboard-widget__content">
                <a href="" class="influencer-dashboard-links">
                    <p>@lang('Current Balance')</p>
                </a>
                <h4 class="title influencer-dashboard-titles">{{ showAmount($data['current_balance']) }}</h4>
            </div>
        </div>
    </div>

    <!-- Total Withdrawn -->
    <div class="col-xxl-4 col-md-4 col-sm-10">
        <div class="dashboard-widget widget--primary">
            <div class="dashboard-widget__icon">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.66667 28C5.93333 28 5.30578 27.7391 4.784 27.2173C4.26222 26.6956 4.00089 26.0676 4 25.3333V6.66667C4 5.93333 4.26133 5.30578 4.784 4.784C5.30667 4.26222 5.93422 4.00089 6.66667 4H25.3333C26.0667 4 26.6947 4.26133 27.2173 4.784C27.74 5.30667 28.0009 5.93422 28 6.66667V10H25.3333V6.66667H6.66667V25.3333H25.3333V22H28V25.3333C28 26.0667 27.7391 26.6947 27.2173 27.2173C26.6956 27.74 26.0676 28.0009 25.3333 28H6.66667ZM17.3333 22.6667C16.6 22.6667 15.9724 22.4058 15.4507 21.884C14.9289 21.3622 14.6676 20.7342 14.6667 20V12C14.6667 11.2667 14.928 10.6391 15.4507 10.1173C15.9733 9.59555 16.6009 9.33422 17.3333 9.33333H26.6667C27.4 9.33333 28.028 9.59467 28.5507 10.1173C29.0733 10.64 29.3342 11.2676 29.3333 12V20C29.3333 20.7333 29.0724 21.3613 28.5507 21.884C28.0289 22.4067 27.4009 22.6676 26.6667 22.6667H17.3333ZM26.6667 20V12H17.3333V20H26.6667ZM21.3333 18C21.8889 18 22.3613 17.8058 22.7507 17.4173C23.14 17.0289 23.3342 16.5564 23.3333 16C23.3324 15.4436 23.1382 14.9716 22.7507 14.584C22.3631 14.1964 21.8907 14.0018 21.3333 14C20.776 13.9982 20.304 14.1929 19.9173 14.584C19.5307 14.9751 19.336 15.4471 19.3333 16C19.3307 16.5529 19.5253 17.0253 19.9173 17.4173C20.3093 17.8093 20.7813 18.0036 21.3333 18Z" fill="#7166F0"/>
                    </svg>
                    
            </div>
            <div class="dashboard-widget__content">
                <a href="{{ route('influencer.withdraw.history') }}" class="influencer-dashboard-links"><p>@lang('Total Withdrawn')</p></a>
                <h4 class="title influencer-dashboard-titles">{{ showAmount($data['withdraw_balance']) }}</h4>
            </div>
        </div>
    </div>

    <!-- Total Transaction -->
    <div class="col-xxl-4 col-md-4 col-sm-10">
        <div class="dashboard-widget widget--secondary">
            <div class="dashboard-widget__icon">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_59_1055)">
                    <path d="M26.6667 18.6666C27.0065 18.667 27.3334 18.7972 27.5805 19.0304C27.8276 19.2637 27.9763 19.5826 27.9962 19.9218C28.0161 20.2611 27.9058 20.5952 27.6876 20.8558C27.4695 21.1164 27.1601 21.2838 26.8227 21.324L26.6667 21.3333H8.552L11.6093 24.3906C11.8485 24.6306 11.9873 24.9526 11.9976 25.2912C12.008 25.6298 11.889 25.9596 11.665 26.2137C11.441 26.4678 11.1286 26.6271 10.7914 26.6592C10.4541 26.6913 10.1173 26.5939 9.84934 26.3866L9.724 26.276L4.61734 21.1693C3.73067 20.284 4.29867 18.792 5.50134 18.6746L5.65467 18.6666H26.6667ZM20.3907 5.72398C20.6203 5.49441 20.9257 5.3565 21.2498 5.33613C21.5738 5.31575 21.8941 5.41431 22.1507 5.61331L22.276 5.72398L27.3827 10.8306C28.2693 11.716 27.7013 13.208 26.4987 13.3253L26.3453 13.3333H5.33334C4.9935 13.3329 4.66663 13.2028 4.41951 12.9695C4.1724 12.7362 4.02369 12.4174 4.00377 12.0781C3.98386 11.7389 4.09424 11.4048 4.31236 11.1442C4.53048 10.8836 4.83988 10.7161 5.17734 10.676L5.33334 10.6666H23.448L20.3907 7.60931C20.1407 7.35927 20.0003 7.0202 20.0003 6.66664C20.0003 6.31309 20.1407 5.97401 20.3907 5.72398Z" fill="#1877F2"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_59_1055">
                    <rect width="32" height="32" fill="white"/>
                    </clipPath>
                    </defs>
                    </svg>
                    
            </div>
            <div class="dashboard-widget__content">
                <a href="{{ route('influencer.transactions') }}" class="influencer-dashboard-links"><p>@lang('Total Transaction')</p></a>
                <h4 class="title influencer-dashboard-titles">{{ $data['total_transaction'] }}</h4>
            </div>
        </div>
    </div>

</div>

<div class="row justify-content-center gy-4 mt-3">

    <!-- Total Sponsorships -->
    <div class="col-xxl-4 col-md-4 col-sm-10">
        <div class="dashboard-widget widget--info">
            <div class="dashboard-widget__icon">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.6667 12C10.2889 12 9.97245 11.872 9.71734 11.616C9.46223 11.36 9.33423 11.0435 9.33334 10.6666C9.33245 10.2898 9.46045 9.97331 9.71734 9.71731C9.97423 9.46131 10.2907 9.33331 10.6667 9.33331H26.6667C27.0445 9.33331 27.3613 9.46131 27.6173 9.71731C27.8733 9.97331 28.0009 10.2898 28 10.6666C27.9991 11.0435 27.8711 11.3604 27.616 11.6173C27.3609 11.8742 27.0445 12.0018 26.6667 12H10.6667ZM10.6667 17.3333C10.2889 17.3333 9.97245 17.2053 9.71734 16.9493C9.46223 16.6933 9.33423 16.3769 9.33334 16C9.33245 15.6231 9.46045 15.3066 9.71734 15.0506C9.97423 14.7946 10.2907 14.6666 10.6667 14.6666H26.6667C27.0445 14.6666 27.3613 14.7946 27.6173 15.0506C27.8733 15.3066 28.0009 15.6231 28 16C27.9991 16.3769 27.8711 16.6938 27.616 16.9506C27.3609 17.2075 27.0445 17.3351 26.6667 17.3333H10.6667ZM10.6667 22.6666C10.2889 22.6666 9.97245 22.5386 9.71734 22.2826C9.46223 22.0266 9.33423 21.7102 9.33334 21.3333C9.33245 20.9564 9.46045 20.64 9.71734 20.384C9.97423 20.128 10.2907 20 10.6667 20H26.6667C27.0445 20 27.3613 20.128 27.6173 20.384C27.8733 20.64 28.0009 20.9564 28 21.3333C27.9991 21.7102 27.8711 22.0271 27.616 22.284C27.3609 22.5409 27.0445 22.6684 26.6667 22.6666H10.6667ZM5.33334 12C4.95556 12 4.63912 11.872 4.384 11.616C4.12889 11.36 4.00089 11.0435 4 10.6666C3.99912 10.2898 4.12712 9.97331 4.384 9.71731C4.64089 9.46131 4.95734 9.33331 5.33334 9.33331C5.70934 9.33331 6.02623 9.46131 6.284 9.71731C6.54178 9.97331 6.66934 10.2898 6.66667 10.6666C6.664 11.0435 6.536 11.3604 6.28267 11.6173C6.02934 11.8742 5.71289 12.0018 5.33334 12ZM5.33334 17.3333C4.95556 17.3333 4.63912 17.2053 4.384 16.9493C4.12889 16.6933 4.00089 16.3769 4 16C3.99912 15.6231 4.12712 15.3066 4.384 15.0506C4.64089 14.7946 4.95734 14.6666 5.33334 14.6666C5.70934 14.6666 6.02623 14.7946 6.284 15.0506C6.54178 15.3066 6.66934 15.6231 6.66667 16C6.664 16.3769 6.536 16.6938 6.28267 16.9506C6.02934 17.2075 5.71289 17.3351 5.33334 17.3333ZM5.33334 22.6666C4.95556 22.6666 4.63912 22.5386 4.384 22.2826C4.12889 22.0266 4.00089 21.7102 4 21.3333C3.99912 20.9564 4.12712 20.64 4.384 20.384C4.64089 20.128 4.95734 20 5.33334 20C5.70934 20 6.02623 20.128 6.284 20.384C6.54178 20.64 6.66934 20.9564 6.66667 21.3333C6.664 21.7102 6.536 22.0271 6.28267 22.284C6.02934 22.5409 5.71289 22.6684 5.33334 22.6666Z" fill="#D6249F"/>
                    </svg>
                    
            </div>
            <div class="dashboard-widget__content">
              <a href="{{ route('influencer.hiring.index') }}" class="influencer-dashboard-links"><p>@lang('Total <br> Sponsorships')</p></a>
                <h4 class="title influencer-dashboard-titles">{{ $data['total_hiring'] }}</h4>
            </div>
        </div>
    </div>

    <!-- Secured Sponsorships -->
    <div class="col-xxl-4 col-md-4 col-sm-10">
        <div class="dashboard-widget widget--purple">
            <div class="dashboard-widget__icon">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.3333 5.33333H26.6667C27.0203 5.33333 27.3594 5.47381 27.6095 5.72386C27.8595 5.97391 28 6.31304 28 6.66667C28 7.02029 27.8595 7.35943 27.6095 7.60948C27.3594 7.85952 27.0203 8 26.6667 8H13.3333C12.9797 8 12.6406 7.85952 12.3905 7.60948C12.1405 7.35943 12 7.02029 12 6.66667C12 6.31304 12.1405 5.97391 12.3905 5.72386C12.6406 5.47381 12.9797 5.33333 13.3333 5.33333ZM13.3333 14.6667H26.6667C27.0203 14.6667 27.3594 14.8071 27.6095 15.0572C27.8595 15.3072 28 15.6464 28 16C28 16.3536 27.8595 16.6928 27.6095 16.9428C27.3594 17.1929 27.0203 17.3333 26.6667 17.3333H13.3333C12.9797 17.3333 12.6406 17.1929 12.3905 16.9428C12.1405 16.6928 12 16.3536 12 16C12 15.6464 12.1405 15.3072 12.3905 15.0572C12.6406 14.8071 12.9797 14.6667 13.3333 14.6667ZM13.3333 24H26.6667C27.0203 24 27.3594 24.1405 27.6095 24.3905C27.8595 24.6406 28 24.9797 28 25.3333C28 25.687 27.8595 26.0261 27.6095 26.2761C27.3594 26.5262 27.0203 26.6667 26.6667 26.6667H13.3333C12.9797 26.6667 12.6406 26.5262 12.3905 26.2761C12.1405 26.0261 12 25.687 12 25.3333C12 24.9797 12.1405 24.6406 12.3905 24.3905C12.6406 24.1405 12.9797 24 13.3333 24ZM5.99999 5.33333C5.82318 5.33333 5.65361 5.2631 5.52859 5.13807C5.40357 5.01305 5.33333 4.84348 5.33333 4.66667C5.33333 4.48986 5.40357 4.32029 5.52859 4.19526C5.65361 4.07024 5.82318 4 5.99999 4H7.33333C7.70666 4 7.99999 4.29333 7.99999 4.66667V8.66667C7.99999 8.84348 7.92976 9.01305 7.80473 9.13807C7.67971 9.2631 7.51014 9.33333 7.33333 9.33333C7.15652 9.33333 6.98695 9.2631 6.86192 9.13807C6.7369 9.01305 6.66666 8.84348 6.66666 8.66667V5.35333L5.99999 5.33333ZM5.99999 13.3333H8.66666C9.03999 13.3333 9.33333 13.6267 9.33333 14V14.6667L7.06666 17.3333H8.66666C9.03999 17.3333 9.33333 17.6267 9.33333 18C9.33333 18.3733 9.03466 18.6667 8.66666 18.6667H5.99999C5.62666 18.6667 5.33333 18.3733 5.33333 18V17.3333L7.59999 14.6667H5.99999C5.62666 14.6667 5.33333 14.3733 5.33333 14C5.33333 13.6267 5.59866 13.3333 5.99999 13.3333ZM8.66666 28H5.99999C5.82318 28 5.65361 27.9298 5.52859 27.8047C5.40357 27.6797 5.33333 27.5101 5.33333 27.3333C5.33333 27.1565 5.40357 26.987 5.52859 26.8619C5.65361 26.7369 5.82318 26.6667 5.99999 26.6667H7.99999V26H5.99999C5.82318 26 5.65361 25.9298 5.52859 25.8047C5.40357 25.6797 5.33333 25.5101 5.33333 25.3333C5.33333 25.1565 5.40357 24.987 5.52859 24.8619C5.65361 24.7369 5.82318 24.6667 5.99999 24.6667H7.99999V24H5.99999C5.82318 24 5.65361 23.9298 5.52859 23.8047C5.40357 23.6797 5.33333 23.5101 5.33333 23.3333C5.33333 23.1565 5.40357 22.987 5.52859 22.8619C5.65361 22.7369 5.82318 22.6667 5.99999 22.6667H8.66666C8.84347 22.6667 9.01304 22.7369 9.13807 22.8619C9.26309 22.987 9.33333 23.1565 9.33333 23.3333V27.3333C9.33333 27.5101 9.26309 27.6797 9.13807 27.8047C9.01304 27.9298 8.84347 28 8.66666 28Z" fill="#4634FF"/>
                    </svg>
                    
            </div>
            <div class="dashboard-widget__content">
               <a href="{{ route('influencer.service.order.index') }}" class="influencer-dashboard-links"><p>@lang('Secured Sponsorships')</p></a>
                <h4 class="title influencer-dashboard-titles">{{ $data['total_order'] }}</h4>
            </div>
        </div>
    </div>

    <!-- Pending Sponsorships -->
    <div class="col-xxl-4 col-md-4 col-sm-10">
        <div class="dashboard-widget widget--warning">
            <div class="dashboard-widget__icon">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 12C9.06087 12 10.0783 11.5786 10.8284 10.8284C11.5786 10.0783 12 9.06087 12 8M8 12C6.93913 12 5.92172 11.5786 5.17157 10.8284C4.42143 10.0783 4 9.06087 4 8M8 12V16M12 8C12 6.93913 11.5786 5.92172 10.8284 5.17157C10.0783 4.42143 9.06087 4 8 4M12 8H16M8 4C6.93913 4 5.92172 4.42143 5.17157 5.17157C4.42143 5.92172 4 6.93913 4 8M8 4V0M4 8H0M2.66667 2.66667L5.33333 5.33333M10.6667 10.6667L13.3333 13.3333M13.3333 2.66667L10.6667 5.33333M5.33333 10.6667L2.66667 13.3333M24 16C25.0609 16 26.0783 15.5786 26.8284 14.8284C27.5786 14.0783 28 13.0609 28 12M24 16C22.9391 16 21.9217 15.5786 21.1716 14.8284C20.4214 14.0783 20 13.0609 20 12M24 16V20M28 12C28 10.9391 27.5786 9.92172 26.8284 9.17157C26.0783 8.42143 25.0609 8 24 8M28 12H32M24 8C22.9391 8 21.9217 8.42143 21.1716 9.17157C20.4214 9.92172 20 10.9391 20 12M24 8V4M20 12H16M18.6667 6.66667L21.3333 9.33333M26.6667 14.6667L29.3333 17.3333M29.3333 6.66667L26.6667 9.33333M21.3333 14.6667L18.6667 17.3333M12 28C13.0609 28 14.0783 27.5786 14.8284 26.8284C15.5786 26.0783 16 25.0609 16 24M12 28C10.9391 28 9.92172 27.5786 9.17157 26.8284C8.42143 26.0783 8 25.0609 8 24M12 28V32M16 24C16 22.9391 15.5786 21.9217 14.8284 21.1716C14.0783 20.4214 13.0609 20 12 20M16 24H20M12 20C10.9391 20 9.92172 20.4214 9.17157 21.1716C8.42143 21.9217 8 22.9391 8 24M12 20V16M8 24H4M6.66667 18.6667L9.33333 21.3333M14.6667 26.6667L17.3333 29.3333M17.3333 18.6667L14.6667 21.3333M9.33333 26.6667L6.66667 29.3333" stroke="#FF9F43" stroke-width="2"/>
                    </svg>
                    
            </div>
            <div class="dashboard-widget__content">
               <a href="{{ route('influencer.service.all') }}" class="influencer-dashboard-links"><p>@lang('Pending Sponsorships')</p></a>
                <h4 class="title influencer-dashboard-titles">{{ $data['total_service'] }}</h4>
            </div>
        </div>
    </div>
</div>


<!-- Sponsorship Status -->
<div class="row d-flex justify-content-center">
    <div class="col-md-6">
        <div class="job__completed my-4">
            <div class="job__completed-header d-flex align-items-center justify-content-between">
                <h5>@lang('Sponsorship Status')</h5>
            </div>
            <div class="job__completed-body">
                <div id="orderChart"></div>
            </div>
        </div>
    </div>

    <!-- Sponsorship Status -->
    <div class="col-md-6">
        <div class="job__completed my-4">
            <div class="job__completed-header d-flex align-items-center justify-content-between">
                <h5>@lang('Sponsorship Status')</h5>
            </div>
            <div class="job__completed-body">
                <div id="hiringChart"></div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
<script>
    $(document).ready(function() {
            var options = {
                series: [
                    {{ $data['pending_order'] }},
                    {{ $data['completed_order'] }},
                    {{ $data['inprogress_order'] }},
                    {{ $data['cancelled_order'] }},
                    {{ $data['job_done_order'] }},
                    {{ $data['reported_order'] }},
                    {{ $data['rejected_order'] }}
                ],
                chart: {
                width: 380,
                type: 'pie',
                },
                labels: [
                    `Pending ({{ @$data['pending_order'] }})`,
                    `Completed ({{ @$data['completed_order'] }})`,
                    `Inprogress ({{ @$data['inprogress_order'] }})`,
                    `Cancelled ({{ @$data['cancelled_order'] }})`,
                    `Job Done ({{ @$data['job_done_order'] }})`,
                    `Reported ({{ @$data['reported_order'] }})`,
                    `Rejected ({{ @$data['rejected_order'] }})`
                ],
                colors: [
                    "#868e96",
                    "#28c76f",
                    "#4634ff",
                    "#071251",
                    "#1e9ff2",
                    "#ff9f43",
                    "#ea5455"
                ],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var chart = new ApexCharts(document.querySelector("#orderChart"), options);
            chart.render();

            var options = {
                series: [
                    {{ $data['pending_hiring'] }},
                    {{ $data['completed_hiring'] }},
                    {{ $data['inprogress_hiring'] }},
                    {{ $data['cancelled_hiring'] }},
                    {{ $data['job_done_hiring'] }},
                    {{ $data['reported_hiring'] }},
                    {{ $data['rejected_hiring'] }}
                ],
                chart: {
                width: 380,
                type: 'pie',
                },
                labels: [
                    `Pending ({{ @$data['pending_hiring'] }})`,
                    `Completed ({{ @$data['completed_hiring'] }})`,
                    `Inprogress ({{ @$data['inprogress_hiring'] }})`,
                    `Cancelled ({{ @$data['cancelled_hiring'] }})`,
                    `Job Done ({{ @$data['job_done_hiring'] }})`,
                    `Reported ({{ @$data['reported_hiring'] }})`,
                    `Rejected ({{ @$data['rejected_hiring'] }})`
                ],
                colors: [
                    "#868e96",
                    "#28c76f",
                    "#4634ff",
                    "#071251",
                    "#1e9ff2",
                    "#ff9f43",
                    "#ea5455"
                ],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var chart = new ApexCharts(document.querySelector("#hiringChart"), options);
            chart.render();

        });
</script>
@endpush
