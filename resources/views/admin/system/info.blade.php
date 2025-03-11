@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-xl-12">
            <div class="card mb-3 border-raius10">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group position-relative mb-0">
                                <div class="system-search-icon">
                                    <svg width="12" height="13" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.4204 12.3296L10.5646 9.47381C11.1546 8.5845 11.5 7.51969 11.5 6.375C11.5 3.27338 8.97663 0.75 5.875 0.75C2.77338 0.75 0.25 3.27338 0.25 6.375C0.25 9.47663 2.77338 12 5.875 12C7.01969 12 8.0845 11.6546 8.97381 11.0646L11.8296 13.9204C12.2684 14.3597 12.9816 14.3597 13.4204 13.9204C13.8597 13.4811 13.8597 12.7689 13.4204 12.3296ZM1.9375 6.375C1.9375 4.20375 3.70375 2.4375 5.875 2.4375C8.04625 2.4375 9.8125 4.20375 9.8125 6.375C9.8125 8.54625 8.04625 10.3125 5.875 10.3125C3.70375 10.3125 1.9375 8.54625 1.9375 6.375Z" fill="#6B7384"/>
                                    </svg>

                                    {{-- <i class="las la-search"></i> --}}
                                </div>
                                <input class="form-control searchInput" type="search" placeholder="@lang('Search here')">

                                {{-- <input class="form-control searchInput" type="search" placeholder="@lang('Search here')..."> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-raius10 border-0" style="box-shadow: 0px 0px 5.95px 0px #00000014 ;">
              <div class="card-body p-0">
                <ul class="list-group border-raius10">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap spans-clr">
                    <span>{{ keyToTitle(systemDetails()['name']) }} @lang('Version')</span>
                    <span class="vrsoin">{{ systemDetails()['version'] }}</span>
                  </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap spans-clr">
                        <span>@lang('ViserAdmin Version')</span>
                        <span class="vrsoin">{{ systemDetails()['build_version'] }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap spans-clr">
                        <span>@lang('Laravel Version')</span>
                        <span class="vrsoin">{{ $laravelVersion }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap spans-clr">
                        <span>@lang('Timezone')</span>
                        <span class="vrsoin">{{ @$timeZone }}</span>
                    </li>
                </ul>
              </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
<style>
  .list-group-item span{
    font-size: 22px !important;
    padding: 8px 0px
  }
</style>
@endpush

@push('style')
    <style>
        .system-search-icon {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            aspect-ratio: 1;
            padding: 5px;
            display: grid;
            place-items: center;
            color: #888;
        }

        .system-search-icon~.form-control {
            padding-left: 45px;
        }

        .widget-seven .widget-seven__content-amount {
            font-size: 22px;
        }

        .widget-seven .widget-seven__content-subheading {
            font-weight: normal;
        }

        .empty-search img {
            width: 120px;
            margin-bottom: 15px;
        }

        a.item-link:focus,
        a.item-link:hover {
            background: #4634ff38;
        }
    </style>
@endpush
