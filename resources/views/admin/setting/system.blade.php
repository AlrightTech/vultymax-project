@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group position-relative mb-0">
                                <div class="system-search-icon">
                                    {{-- <i class="las la-search"></i> --}}
                                    <svg width="12" height="13" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.4204 12.3296L10.5646 9.47381C11.1546 8.5845 11.5 7.51969 11.5 6.375C11.5 3.27338 8.97663 0.75 5.875 0.75C2.77338 0.75 0.25 3.27338 0.25 6.375C0.25 9.47663 2.77338 12 5.875 12C7.01969 12 8.0845 11.6546 8.97381 11.0646L11.8296 13.9204C12.2684 14.3597 12.9816 14.3597 13.4204 13.9204C13.8597 13.4811 13.8597 12.7689 13.4204 12.3296ZM1.9375 6.375C1.9375 4.20375 3.70375 2.4375 5.875 2.4375C8.04625 2.4375 9.8125 4.20375 9.8125 6.375C9.8125 8.54625 8.04625 10.3125 5.875 10.3125C3.70375 10.3125 1.9375 8.54625 1.9375 6.375Z" fill="#6B7384"/>
                                    </svg>
                                </div>
                                <input class="form-control searchInput" type="search" placeholder="@lang('Search here')">

                                {{-- <input class="form-control searchInput" type="search" placeholder="@lang('Search')..."> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row gy-4">
                <div class="col-12">
                    <div class="emptyArea"></div>
                </div>
                @foreach ($settings as $key => $setting)
                    <div class="col-xxl-4 col-md-6 {{ $key }} searchItems">
                        @php
                            $params = null;
                            if (@$setting->params) {
                                foreach ($setting->params as $paramVal) {
                                    $params[] = array_values((array) $paramVal)[0];
                                }
                            }
                        @endphp
                        <x-widget style="2" link="{{ route($setting->route_name, $params) }}"
                            icon="{{ $setting->icon }}" heading="{{ $setting->title }}"
                            subheading="{{ $setting->subtitle }}" cover_cursor=1 icon_style="fill" color="primary" />
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('assets/admin/js/highlighter22.js') }}"></script>
@endpush

@push('script')
    <script>
        (function($) {
            "use strict";
            var settingsData = @json($settings);
            // Function to filter settings based on search query
            function filterSettings(query) {
                let filteredSettings = [];
                for (var key in settingsData) {
                    if (settingsData.hasOwnProperty(key)) {
                        var setting = settingsData[key];
                        // Check if the query matches keyword, title, or subtitle
                        var keywordMatch = setting.keyword.some(function(keyword) {
                            return keyword.toLowerCase().includes(query.toLowerCase());
                        });
                        var titleMatch = setting.title.toLowerCase().includes(query.toLowerCase());
                        var subtitleMatch = setting.subtitle.toLowerCase().includes(query.toLowerCase());

                        // If any match is found, add the setting to filtered settings
                        if (keywordMatch || titleMatch || subtitleMatch) {
                            filteredSettings[key] = setting;
                        }
                    }
                }
                return filteredSettings;
            }

            function isEmpty(obj) {
                return Object.keys(obj).length === 0;
            }

            // Function to render filtered settings
            function renderSettings(filteredSettings, query) {
                $('.searchItems').addClass('d-none');
                $('.emptyArea').html('');
                if (isEmpty(filteredSettings)) {
                    $('.emptyArea').html(`<div class="col-12 searchItems text-center mt-4"><div class="card">
                                <div class="card-body">
                                    <div class="empty-search text-center">
                                        <img src="{{ getImage('assets/images/empty_list.png') }}" alt="empty">
                                        <h5 class="text-muted">@lang('No search result found.')</h5>
                                    </div>
                                </div>
                            </div>
                        </div>`);
                } else {
                    for (const key in filteredSettings) {
                        if (Object.hasOwnProperty.call(filteredSettings, key)) {
                            const element = filteredSettings[key];
                            var setting = element;
                            $(`.searchItems.${key}`).removeClass('d-none');
                        }
                    }
                }
            }


            $('.searchInput').on('input', function() {
                var query = $(this).val().trim();
                var filteredData = filterSettings(query);
                renderSettings(filteredData, query);
            });

            $('.searchInput').highlighter22({
                targets: [".widget-two__content h3", ".widget-two__content p"],
            });

        })(jQuery);
    </script>
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
