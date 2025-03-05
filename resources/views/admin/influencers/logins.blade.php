@extends('admin.layouts.app')

@section('panel')
    <div class="row">

        <div class="col-lg-12">
            <div class="card table-custom-bg-radius">
                <div class="card-body p-0">

                    <div class="table-responsive--sm table-responsive borderr-table">
                        <table class="table table--light style--two">
                            <thead>
                            <tr>
                                <th>@lang('User')</th>
                                <th>@lang('Login at')</th>
                                <th>@lang('IP')</th>
                                <th>@lang('Location')</th>
                                <th>@lang('Browser | OS')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($loginLogs as $log)
                                <tr>

                                    <td >
                                        <span class="sponse-name">{{ @$log->user->fullname }}</span>
                                        <br>
                                        <span class="small sponse-small"> <a href="{{ route('admin.users.detail', $log->user_id) }}"><span>@</span>{{ @$log->user->username }}</a> </span>
                                    </td>

                                    <td class="sn-nmbers">
                                        {{showDateTime($log->created_at) }} <br> {{diffForHumans($log->created_at) }}
                                    </td>

                                    <td >
                                        <span class="small sponse-small">
                                        <a href="{{route('admin.report.login.ipHistory',[$log->user_ip])}}">{{ $log->user_ip }}</a>
                                        </span>
                                    </td>

                                    <td class="sn-nmbers">{{ __($log->city) }} <br> {{ __($log->country) }}</td>
                                    <td class="sn-nmbers">
                                        {{ __($log->browser) }} <br> {{ __($log->os) }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                @if($loginLogs->hasPages())
                <div class="card-footer py-4">
                    {{ paginateLinks($loginLogs) }}
                </div>
                @endif
            </div><!-- card end -->
        </div>


    </div>
@endsection

