@php
$sidenav = json_decode($sidenav);

$settings = file_get_contents(resource_path('views/admin/setting/settings.json'));
$settings = json_decode($settings);

$routesData = [];
foreach (\Illuminate\Support\Facades\Route::getRoutes() as $route) {
$name = $route->getName();
if (strpos($name, 'admin') !== false) {
$routeData = [
$name => url($route->uri()),
];

$routesData[] = $routeData;
}
}
@endphp

<!-- navbar-wrapper start -->
<nav class="navbar-wrapper bg--dark d-flex flex-wrap">
    <div class="navbar__left">
        <button type="button" class="res-sidebar-open-btn me-3"><i class="las la-bars"></i></button>
        <form class="navbar-search position-relative">
            <input type="search" name="#0" class="navbar-search-field bg-white " id="searchInput" autocomplete="off"
                placeholder="@lang('Search here...')">
            <svg viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg" class="position-absolute Dashboard-SearchIcon">
                <path d="M15.4204 14.3296L12.5646 11.4738C13.1546 10.5845 13.5 9.51969 13.5 8.375C13.5 5.27338 10.9766 2.75 7.875 2.75C4.77338 2.75 2.25 5.27338 2.25 8.375C2.25 11.4766 4.77338 14 7.875 14C9.01969 14 10.0845 13.6546 10.9738 13.0646L13.8296 15.9204C14.2684 16.3597 14.9816 16.3597 15.4204 15.9204C15.8597 15.4811 15.8597 14.7689 15.4204 14.3296ZM3.9375 8.375C3.9375 6.20375 5.70375 4.4375 7.875 4.4375C10.0462 4.4375 11.8125 6.20375 11.8125 8.375C11.8125 10.5462 10.0462 12.3125 7.875 12.3125C5.70375 12.3125 3.9375 10.5462 3.9375 8.375Z" fill="#6B7384" />
            </svg>

            <ul class="search-list"></ul>
        </form>
    </div>
    <div class="navbar__right">
        <ul class="navbar__action-list">
            <!-- @if(version_compare(gs('available_version'),systemDetails()['version'],'>'))
            <li><button type="button" class="primary--layer" data-bs-toggle="tooltip" data-bs-placement="bottom" title="@lang('Update Available')"><a href="{{ route('admin.system.update') }}" class="primary--layer"><i class="las la-download text--warning"></i></a> </button></li>
            @endif -->
            <!-- <li>
                <button type="button" class="primary--layer" data-bs-toggle="tooltip" data-bs-placement="bottom" title="@lang('Visit Website')">
                    <a href="{{ route('home') }}" target="_blank"><i class="las la-globe"></i></a>
                </button>
            </li> -->

            <!-- top navbar notifications icon -->
            <li class="dropdown bg-white rounded-3 p-2">
                <button type="button" class="primary--layer notification-bell" data-bs-toggle="dropdown" data-display="static"
                    aria-haspopup="true" aria-expanded="false">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="@lang('Unread Notifications')">
                        <!-- <i class="las la-bell @if($adminNotificationCount > 0) icon-left-right @endif " style="filter:invert(1);"></i> -->
                        <svg width="25" height="25" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.4488 12.3699C14.0202 11.9878 13.645 11.5498 13.3332 11.0677C12.9929 10.4022 12.7889 9.67535 12.7332 8.92992V6.73436C12.7362 5.56352 12.3115 4.43191 11.5389 3.55213C10.7663 2.67235 9.69909 2.10497 8.53769 1.95658V1.38325C8.53769 1.22589 8.47518 1.07497 8.36391 0.9637C8.25264 0.852429 8.10172 0.789917 7.94436 0.789917C7.787 0.789917 7.63608 0.852429 7.52481 0.9637C7.41354 1.07497 7.35103 1.22589 7.35103 1.38325V1.96547C6.20003 2.12455 5.14568 2.69536 4.38326 3.57219C3.62084 4.44901 3.20202 5.57243 3.20436 6.73436V8.92992C3.14869 9.67535 2.9447 10.4022 2.60436 11.0677C2.29808 11.5487 1.92889 11.9867 1.50658 12.3699C1.45917 12.4116 1.42118 12.4628 1.39512 12.5203C1.36907 12.5778 1.35555 12.6401 1.35547 12.7032V13.3077C1.35547 13.4256 1.40229 13.5386 1.48564 13.622C1.56899 13.7053 1.68204 13.7521 1.79991 13.7521H14.1555C14.2733 13.7521 14.3864 13.7053 14.4697 13.622C14.5531 13.5386 14.5999 13.4256 14.5999 13.3077V12.7032C14.5998 12.6401 14.5863 12.5778 14.5603 12.5203C14.5342 12.4628 14.4962 12.4116 14.4488 12.3699ZM2.27991 12.8632C2.69343 12.4638 3.05751 12.0161 3.36436 11.5299C3.79307 10.7261 4.04322 9.83926 4.09769 8.92992V6.73436C4.08006 6.21349 4.16744 5.69439 4.3546 5.20799C4.54176 4.72159 4.8249 4.27782 5.18713 3.90312C5.54937 3.52841 5.98331 3.23044 6.46311 3.02693C6.9429 2.82342 7.45874 2.71854 7.97991 2.71854C8.50108 2.71854 9.01693 2.82342 9.49672 3.02693C9.97652 3.23044 10.4105 3.52841 10.7727 3.90312C11.1349 4.27782 11.4181 4.72159 11.6052 5.20799C11.7924 5.69439 11.8798 6.21349 11.8621 6.73436V8.92992C11.9166 9.83926 12.1668 10.7261 12.5955 11.5299C12.9023 12.0161 13.2664 12.4638 13.6799 12.8632H2.27991Z" fill="#6B7384" />
                            <path d="M7.9997 15.235C8.27968 15.2286 8.54835 15.1233 8.75819 14.9379C8.96804 14.7524 9.10554 14.4987 9.14637 14.2217H6.80859C6.85058 14.5063 6.99452 14.7659 7.21362 14.9523C7.43272 15.1387 7.71207 15.2392 7.9997 15.235Z" fill="#6B7384" />
                        </svg>

                    </span>
                    @if($adminNotificationCount > 0)
                    <span class="notification-count">{{ $adminNotificationCount <= 9 ? $adminNotificationCount : '9+'}}</span>
                    @endif
                </button>
                <div class="dropdown-menu dropdown-menu--md p-0 border-0 box--shadow1 dropdown-menu-right">
                    <div class="dropdown-menu__header">
                        <span class="caption">@lang('Notification')</span>
                        @if($adminNotificationCount > 0)
                        <p>@lang('You have') {{ $adminNotificationCount }} @lang('unread notification')</p>
                        @endif
                    </div>
                    <div class="dropdown-menu__body @if(blank($adminNotifications)) d-flex justify-content-center align-items-center @endif">
                        @forelse($adminNotifications as $notification)
                        <a href="{{ route('admin.notification.read',$notification->id) }}"
                            class="dropdown-menu__item">
                            <div class="navbar-notifi">
                                <div class="navbar-notifi__right">
                                    <h6 class="notifi__title">{{ __($notification->title) }}</h6>
                                    <span class="time"><i class="far fa-clock"></i>
                                        {{ diffForHumans($notification->created_at) }}</span>
                                </div>
                            </div>
                        </a>
                        @empty
                        <div class="empty-notification text-center">
                            <img src="{{ getImage('assets/images/empty_list.png') }}" alt="empty">
                            <p class="mt-3">@lang('No unread notification found')</p>
                        </div>
                        @endforelse
                    </div>
                    <div class="dropdown-menu__footer">
                        <a href="{{ route('admin.notifications') }}"
                            class="view-all-message">@lang('View all notifications')</a>
                    </div>
                </div>
            </li>


            <!-- <li>
                <button type="button" class="primary--layer" data-bs-toggle="tooltip" data-bs-placement="bottom" title="@lang('System Setting')">
                    <a href="{{ route('admin.setting.system') }}"><i class="las la-wrench"></i></a>
                </button>
            </li>
            <li class="dropdown d-flex profile-dropdown">
                <button type="button" data-bs-toggle="dropdown" data-display="static" aria-haspopup="true"
                    aria-expanded="false">
                    <span class="navbar-user">
                        <span class="navbar-user__thumb"><img src="{{ getImage(getFilePath('adminProfile').'/'. auth()->guard('admin')->user()->image,getFileSize('adminProfile'))}}" alt="image"></span>
                        <span class="navbar-user__info">
                            <span class="navbar-user__name">{{ auth()->guard('admin')->user()->username }}</span>
                        </span>
                        <span class="icon"><i class="las la-chevron-circle-down"></i></span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu--sm p-0 border-0 box--shadow1 dropdown-menu-right">
                    <a href="{{ route('admin.profile') }}"
                        class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                        <i class="dropdown-menu__icon las la-user-circle"></i>
                        <span class="dropdown-menu__caption">@lang('Profile')</span>
                    </a>

                    <a href="{{ route('admin.password') }}"
                        class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                        <i class="dropdown-menu__icon las la-key"></i>
                        <span class="dropdown-menu__caption">@lang('Password')</span>
                    </a>

                    <a href="{{ route('admin.logout') }}" class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                        <i class="dropdown-menu__icon las la-sign-out-alt"></i>
                        <span class="dropdown-menu__caption">@lang('Logout')</span>
                    </a>
                </div>
                <button type="button" class="breadcrumb-nav-open ms-2 d-none">
                    <i class="las la-sliders-h"></i>
                </button>
            </li> -->
        </ul>
    </div>
</nav>
<!-- navbar-wrapper end -->

@push('script')
<script>
    "use strict";
    var routes = @json($routesData);
    var settingsData = Object.assign({}, @json($settings), @json($sidenav));

    $('.navbar__action-list .dropdown-menu').on('click', function(event) {
        event.stopPropagation();
    });
</script>
<script src="{{ asset('assets/admin/js/search.js') }}"></script>
<script>
    "use strict";

    function getEmptyMessage() {
        return `<li class="text-muted">
                <div class="empty-search text-center">
                    <img src="{{ getImage('assets/images/empty_list.png') }}" alt="empty">
                    <p class="text-muted">No search result found</p>
                </div>
            </li>`
    }
</script>
@endpush