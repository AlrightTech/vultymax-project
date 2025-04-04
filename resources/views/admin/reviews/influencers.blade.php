@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card table-custom-bg-radius ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive borderr-table">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>@lang('Hiring Number')</th>
                                    <th>@lang('Reviewer')</th>
                                    <th>@lang('Influencer')</th>
                                    <th>@lang('Rating')</th>
                                    <th>@lang('Created At')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($reviews as $review)
                                    <tr>
                                        <td class="sponse-name">
                                            <span >
                                                <a href="{{ route('admin.hiring.detail', $review->hiring_id) }}">{{ @$review->hiring->hiring_no }}</a>
                                            </span>
                                        </td>

                                        <td>
                                            <span class="sponse-name">
                                                {{ __(@$review->user->fullname) }}<br>
                                                <a href="{{ route('admin.users.detail', $review->user_id) }}">
                                                    <span class="small sponse-small">@</span>{{ @$review->user->username }}
                                                </a>
                                            </span>
                                        </td>

                                        <td class="sponse-name">
                                            <span class="sponse-name">
                                                {{ __(@$review->influencer->fullname) }}<br>
                                                <a class="sponse-small" href="{{ route('admin.influencers.detail', $review->influencer_id) }}">
                                                    <span class="sponse-small">@</span>{{ @$review->influencer->username }}
                                                </a>
                                            </span>
                                        </td>

                                        <td >
                                            <span class="sn-nmbers">{{ $review->star }} @lang('star')</span>
                                        </td>

                                        <td d>
                                            <span class="sn-nmbers">{{ showDateTime($review->created_at) }} <br> {{ diffForHumans($review->created_at) }}</span>
                                        </td>

                                        <td >
                                            <button type="button" class="btn btn-sm btn-outline--info viewBtn"
                                                data-review="{{ $review->review }}">
                                                <i class="las la-desktop"></i> @lang('View')
                                            </button>
                                            <a href="#" class="btn btn-sm btn-outline--danger confirmationBtn" data-action="{{ route('admin.reviews.influencer.delete',$review->id) }}" data-question="@lang('Are you sure remove this review?')" data-btn_class="btn btn--primary">
                                                <i class="las la-desktop"></i> @lang('Delete')
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @if ($reviews->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($reviews) }}
                    </div>
                @endif
            </div>
        </div>


    </div>

    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@lang('Review')</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="las la-times"></i></button>
                </div>
                <div class="modal-body">
                    <p class="modal-detail"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--dark w-100" data-bs-dismiss="modal">@lang('Close')</button>
                </div>
            </div>
        </div>
    </div>
    <x-confirmation-modal />
@endsection

@push('breadcrumb-plugins')
    <div class="d-flex flex-wrap justify-content-end">
        <form action="" method="GET" class="form-inline">
            <div class="input-group justify-content-end">
                <input type="text" name="search" class="form-control bg--white searchh-hiring" placeholder="@lang('Search here')"
                    value="{{ request()->search }}">
                <button class="btn btn--primary input-group-text searchh-hiring1" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
@endpush

@push('script')
    <script>
        (function($) {
            "use strict";
            $('.viewBtn').on('click', function() {
                var modal = $('#viewModal');
                modal.find('.modal-detail').text($(this).data('review'));
                modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush
