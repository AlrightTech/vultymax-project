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
                                <th>@lang('Sponsorship ID')</th>
                                <th>@lang('User')</th>
                                <th>@lang('Influencer')</th>
                                <th>@lang('Amount')</th>
                                <th>@lang('Delivery Date')</th>
                                @if(request()->routeIs('admin.hiring.index'))
                                <th>@lang('Status')</th>
                                @endif
                                <th>@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($hirings as $hiring)
                                <tr>
                                    <td >
                                        <span class="sponse-name">{{ $hiring->hiring_no }}</span>
                                    </td>

                                    <td >
                                        <span class="small sponse-small">
                                            <a href="{{ route('admin.users.detail', $hiring->user_id) }}"><span>@</span>{{ @$hiring->user->username }}</a>
                                        </span>
                                    </td>

                                    <td >
                                        <span class="small">
                                            <a href="{{ route('admin.influencers.detail', $hiring->influencer_id) }}"><span>@</span>{{ @$hiring->influencer->username }}</a>
                                        </span>
                                    </td>

                                    <td >
                                        <span class="fw-bold">{{ showAmount($hiring->amount) }}</span>
                                    </td>

                                    <td >
                                        <span>{{ showDateTime($hiring->delivery_date) }}</span>
                                    </td>
                                    @if(request()->routeIs('admin.hiring.index'))
                                    <td>
                                        @php echo $hiring->statusBadge @endphp
                                    </td>
                                    @endif

                                    <td >
                                        <a href="{{ route('admin.hiring.detail', $hiring->id) }}" class="btn btn-sm btn-outline--primary">
                                            <i class="las la-desktop"></i> @lang('Details')
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
                @if ($hirings->hasPages())
                <div class="card-footer py-4">
                    {{ paginateLinks($hirings) }}
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection



@push('breadcrumb-plugins')
    <div class="d-flex flex-wrap justify-content-end">
        <form action="" method="GET" class="form-inline">
            <div class="input-group justify-content-end">
                <input type="text" name="search" class="form-control bg--white searchh-hiring" placeholder="@lang('Search influencer or category')" value="{{ request()->search }}">
                <button class="btn input-group-text searchh-hiring1" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
@endpush
