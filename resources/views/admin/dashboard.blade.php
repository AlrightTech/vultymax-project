@extends('admin.layouts.app') @section('panel')

<div class="row gy-4">
    <div class="col-md-3 col-xxl-3 col-sm-6">
        <x-widget
            style="6"
            link="{{ route('admin.users.all') }}"
            icon="/assets/admin/images/Total Users.svg"
            title="Total Users"
            value="{{ $widget['total_users'] }}"
            bg="primary"
            class="border border-primary"
        />
    </div>
    <!-- dashboard-w1 end -->

    <div class="col-md-3 col-xxl-3 col-sm-6 border-2">
        <x-widget
            style="6"
            link="{{ route('admin.users.active') }}"
            icon="/assets/admin/images/Active Users.svg"
            title="Active Users"
            value="{{ $widget['verified_users'] }}"
            bg="success"
        />
    </div>
    <!-- dashboard-w1 end -->
    <div class="col-md-3 col-xxl-3 col-sm-6">
        <x-widget
            style="6"
            link="{{ route('admin.users.email.unverified') }}"
            icon="/assets/admin/images/unverified email.svg"
            title="Email Unverified Users"
            value="{{ $widget['email_unverified_users'] }}"
            bg="danger"
        />
    </div>
    <!-- dashboard-w1 end -->
    <div class="col-md-3 col-xxl-3 col-sm-6">
        <x-widget
            style="6"
            link="{{ route('admin.users.mobile.unverified') }}"
            icon="/assets/admin/images/mobile unverified email.svg"
            title="Mobile Unverified Users"
            value="{{ $widget['mobile_unverified_users'] }}"
            bg="warning"
        />
    </div>
    <!-- dashboard-w1 end -->
</div>
<!-- row end-->

<div class="row gy-4 mt-2">
    <div class="col-md-3 col-xxl-3 col-sm-6">
        <x-widget
            style="7"
            link="{{ route('admin.influencers.all') }}"
            title="Total Sponsees "
            icon="/assets/admin/images/Total Users.svg"
            value="{{ $widget['total_influencers'] }}"
            bg="success"
        />
    </div>
    <!-- dashboard-w1 end -->
    <div class="col-md-3 col-xxl-3 col-sm-6">
        <x-widget
            style="7"
            link="{{ route('admin.influencers.active') }}"
            title="Active Sponsees"
            icon="/assets/admin/images/Active Users.svg"
            value="{{ $widget['verified_influencers'] }}"
            bg="warning"
        />
    </div>
    <!-- dashboard-w1 end -->
    <div class="col-md-3 col-xxl-3 col-sm-6">
        <x-widget
            style="7"
            link="{{ route('admin.influencers.email.unverified') }}"
            title="Email Unverified Sponsees"
            icon="/assets/admin/images/unverified email.svg"
            value="{{ $widget['email_unverified_influencers'] }}"
            bg="danger"
        />
    </div>
    <!-- dashboard-w1 end -->
    <div class="col-md-3 col-xxl-3 col-sm-6">
        <x-widget
            style="7"
            link="{{ route('admin.influencers.mobile.unverified') }}"
            title="Mobile Unverified Sponsees"
            icon="/assets/admin/images/Mobile unverified blue.svg"
            value="{{ $widget['mobile_unverified_influencers'] }}"
            bg="primary"
            class="bg-primary"
        />
    </div>
    <!-- dashboard-w1 end -->
</div>
<!-- row end-->

<div class="row gy-4 mt-2">
    <div class="col-md-3 col-xxl-3 col-sm-6">
        <x-widget
            style="7"
            link="{{ route('admin.influencers.all') }}"
            title="Total Brands "
            icon="/assets/admin/images/Total Users.svg"
            value="{{ $widget['total_influencers'] }}"
            bg="success"
        />
    </div>
    <!-- dashboard-w1 end -->
    <div class="col-md-3 col-xxl-3 col-sm-6">
        <x-widget
            style="7"
            link="{{ route('admin.influencers.active') }}"
            title="Active Brands"
            icon="/assets/admin/images/Active Users.svg"
            value="{{ $widget['verified_influencers'] }}"
            bg="warning"
        />
    </div>
    <!-- dashboard-w1 end -->
    <div class="col-md-3 col-xxl-3 col-sm-6">
        <x-widget
            style="7"
            link="{{ route('admin.influencers.email.unverified') }}"
            title="Email Unverified Brands"
            icon="/assets/admin/images/unverified email.svg"
            value="{{ $widget['email_unverified_influencers'] }}"
            bg="danger"
        />
    </div>
    <!-- dashboard-w1 end -->
    <div class="col-md-3 col-xxl-3 col-sm-6">
        <x-widget
            style="7"
            link="{{ route('admin.influencers.mobile.unverified') }}"
            title="Mobile Unverified Brands"
            icon="/assets/admin/images/Mobile unverified blue.svg"
            value="{{ $widget['mobile_unverified_influencers'] }}"
            bg="primary"
        />
    </div>
    <!-- dashboard-w1 end -->
</div>
<!-- row end-->

<div class="row mt-2 gy-4">
    <!-- Deposits card -->
    <div class="col-md-6 col-xxl-6">
        <div class="card h-100 bg-transparent">
            <div class="card-body">
                <h5 class="card-title">@lang('Deposits')</h5>
                <!-- Total Deposited -->
                <div class="widget-card-wrapper">
                    <div class="widget-card bg--success px-0 py-4">
                        <a
                            href="{{ route('admin.deposit.list') }}"
                            class="widget-card-link"
                        ></a>
                        <div class="widget-card-left ">
                            <div class="widget-card-icon">
                                <!-- <i class="fas fa-hand-holding-usd"></i> -->
                                <img src="/assets/admin/images/Total Deposited.svg" alt="total deposited icon">
                            </div>
                            <div class="widget-card-content">
                                <h6 class="widget-card-amount">
                                    {{
                                        showAmount(
                                            $deposit["total_deposit_amount"]
                                        )
                                    }}
                                </h6>
                                <p class="widget-card-title">
                                    @lang('Total Deposited')
                                </p>
                            </div>
                        </div>
                        <span class="widget-card-arrow">
                            <i class="las la-angle-right"></i>
                        </span>
                    </div>

                    <!-- Pending Deposits -->
                    <div class="widget-card bg--warning px-2 py-4">
                        <a
                            href="{{ route('admin.deposit.pending') }}"
                            class="widget-card-link"
                        ></a>
                        <div class="widget-card-left">
                            <div class="widget-card-icon">
                                <img src="/assets/admin/images/Pending Deposits.svg" alt="Pending Deposits icon">
                            </div>
                            <div class="widget-card-content">
                                <h6 class="widget-card-amount">
                                    {{ $deposit["total_deposit_pending"] }}
                                </h6>
                                <p class="widget-card-title">
                                    @lang('Pending Deposits')
                                </p>
                            </div>
                        </div>
                        <span class="widget-card-arrow">
                            <i class="las la-angle-right"></i>
                        </span>
                    </div>

                    <!-- Rejected Deposits -->
                    <div class="widget-card bg--danger px-0 py-4">
                        <a
                            href="{{ route('admin.deposit.rejected') }}"
                            class="widget-card-link"
                        ></a>
                        <div class="widget-card-left">
                            <div class="widget-card-icon">
                                <img src="/assets/admin/images/Rejected Deposits.svg" alt="Rejected Deposits icon">
                            </div>
                            <div class="widget-card-content">
                                <h6 class="widget-card-amount">
                                    {{ $deposit["total_deposit_rejected"] }}
                                </h6>
                                <p class="widget-card-title">
                                    @lang('Rejected Deposits')
                                </p>
                            </div>
                        </div>
                        <span class="widget-card-arrow">
                            <i class="las la-angle-right"></i>
                        </span>
                    </div>

                    <!-- Deposited Charge -->
                    <div class="widget-card px-2 py-4">
                        <a
                            href="{{ route('admin.deposit.list') }}"
                            class="widget-card-link"
                        ></a>
                        <div class="widget-card-left">
                            <div class="widget-card-icon">
                                <img src="/assets/admin/images/Deposited Charge.svg" alt="Deposited Charge icon" width="20px">
                            </div>
                            <div class="widget-card-content">
                                <h6 class="widget-card-amount">
                                    {{
                                        showAmount(
                                            $deposit["total_deposit_charge"]
                                        )
                                    }}
                                </h6>
                                <p class="widget-card-title">
                                    @lang('Deposited Charge')
                                </p>
                            </div>
                        </div>
                        <span class="widget-card-arrow">
                            <i class="las la-angle-right"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Withdrawals card -->
    <div class="col-md-6 col-xxl-6">
        <div class="card h-100 bg-transparent">
            <div class="card-body">
                <h5 class="card-title">@lang('Withdrawals')</h5>
                <div class="widget-card-wrapper">

                    <!-- Total withdrawals -->
                    <div class="widget-card bg--success px-0 py-4">
                        <a
                            href="{{ route('admin.withdraw.log') }}"
                            class="widget-card-link"
                        ></a>
                        <div class="widget-card-left">
                            <div class="widget-card-icon">
                                <img src="/assets/admin/images/Total withdrawn.svg" alt="Total withdrawn icon">
                            </div>
                            <div class="widget-card-content">
                                <h6 class="widget-card-amount">
                                    {{
                                        showAmount(
                                            $withdrawals[
                                                "total_withdraw_amount"
                                            ]
                                        )
                                    }}
                                </h6>
                                <p class="widget-card-title">
                                    @lang('Total Withdrawn')
                                </p>
                            </div>
                        </div>
                        <span class="widget-card-arrow">
                            <i class="las la-angle-right"></i>
                        </span>
                    </div>

                    <!-- Pending withdrawals -->
                    <div class="widget-card bg--warning px-2 py-4">
                        <a
                            href="{{ route('admin.withdraw.pending') }}"
                            class="widget-card-link"
                        ></a>
                        <div class="widget-card-left">
                            <div class="widget-card-icon">
                                <img src="/assets/admin/images/Pending Deposits.svg" alt="Pending Deposits icon">
                            </div>
                            <div class="widget-card-content">
                                <h6 class="widget-card-amount">
                                    {{ $withdrawals["total_withdraw_pending"] }}
                                </h6>
                                <p class="widget-card-title">
                                    @lang('Pending Withdrawals')
                                </p>
                            </div>
                        </div>
                        <span class="widget-card-arrow">
                            <i class="las la-angle-right"></i>
                        </span>
                    </div>

                    <!-- Rejected withdrawals -->
                    <div class="widget-card bg--danger px-0 py-2">
                        <a
                            href="{{ route('admin.withdraw.rejected') }}"
                            class="widget-card-link"
                        ></a>
                        <div class="widget-card-left">
                            <div class="widget-card-icon">
                                <img src="/assets/admin/images/Rejected Withdrawals.svg" alt="Rejected Withdrawals icon">
                            </div>
                            <div class="widget-card-content">
                                <h6 class="widget-card-amount">
                                    {{
                                        $withdrawals["total_withdraw_rejected"]
                                    }}
                                </h6>
                                <p class="widget-card-title">
                                    @lang('Rejected Withdrawals')
                                </p>
                            </div>
                        </div>
                        <span class="widget-card-arrow">
                            <i class="las la-angle-right"></i>
                        </span>
                    </div>

                    <!-- Withdrawals charge -->
                    <div class="widget-card px-2 py-4">
                        <a
                            href="{{ route('admin.withdraw.log') }}"
                            class="widget-card-link"
                        ></a>
                        <div class="widget-card-left">
                            <div class="widget-card-icon Withdrawal-Charge">
                                <img src="/assets/admin/images/Deposited Charge.svg" alt="Deposited Charge icon">
                            </div>
                            <div class="widget-card-content">
                                <h6 class="widget-card-amount">
                                    {{
                                        showAmount(
                                            $withdrawals[
                                                "total_withdraw_charge"
                                            ]
                                        )
                                    }}
                                </h6>
                                <p class="widget-card-title">
                                    @lang('Withdrawal Charge')
                                </p>
                            </div>
                        </div>
                        <span class="widget-card-arrow">
                            <i class="las la-angle-right"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row gy-4 mt-2">
    <div class="col-md-2 col-xxl-2 col-lg-2 col-sm-6">
        <x-widget
            style="5"
            link="{{ route('admin.order.index') }}"
            icon="/assets/admin/images/Total Deals.svg"
            title="Total Deals"
            value="{{ $data['total_order'] }}"
            bg="primary"
        />
    </div>
    <!-- dashboard-w1 end -->
    <div class="col-md-2 col-xxl-2 col-lg-2 col-sm-6">
        <x-widget
            style="5"
            link="{{ route('admin.order.pending') }}"
            icon="/assets/admin/images/Pending Deals.svg"
            title="Pending Deals"
            value="{{ $data['pending_order'] }}"
            bg="1"
        />
    </div>
    <!-- dashboard-w1 end -->
    <div class="col-md-2 col-xxl-2 col-lg-2 col-sm-6">
        <x-widget
            style="5"
            link="{{ route('admin.order.jobDone') }}"
            icon="/assets/admin/images/Completed Deals.svg"
            title="Completed Deals"
            value="{{ $data['delivered_order'] }}"
            bg="2"
        />
    </div>
    <!-- dashboard-w1 end -->
    <div class="col-md-2 col-xxl-2 col-lg-2 col-sm-6">
        <x-widget
            style="5"
            link="{{ route('admin.order.completed') }}"
            icon="/assets/admin/images/Successful Deals.svg"
            title="Successful Deals"
            value="{{ $data['completed_order'] }}"
            bg="3"
        />
    </div>
    <!-- dashboard-w1 end -->
    <div class=" col-md-2 col-xxl-2 col-lg-2 col-sm-6">
        <x-widget
            style="5"
            link="{{ route('admin.order.reported') }}"
            icon="/assets/admin/images/Reported Deals.svg"
            title="Reported Deals"
            value="{{ $data['reported_order'] }}"
            bg="4"
        />
    </div>
    <!-- dashboard-w1 end -->
    <div class="col-md-2 col-xxl-2 col-lg-2 col-sm-6">
        <x-widget
            style="5"
            link="{{ route('admin.order.cancelled') }}"
            icon="/assets/admin/images/Cancelled Deals.svg"
            title="Cancelled Deals"
            value="{{ $data['cancelled_order'] }}"
            bg="5"
        />
    </div>
    <!-- dashboard-w1 end -->
</div>
<!-- row end-->



<div class="row gy-4 mt-2">
    <div class="col-xxl-3 col-sm-3">
        <x-widget
            style="6"
            link="{{ route('admin.service.index') }}"
            title="Total Sponsorships"
            icon="/assets/admin/images/Total users.svg"
            value="{{ $data['total_service'] }}"
            bg="success"
            outline="true"
        />
    </div>
    <!-- dashboard-w1 end -->
    <div class="col-xxl-3 col-sm-3">
        <x-widget
            style="6"
            link="{{ route('admin.service.pending') }}"
            title="Pending Sponsorships"
            icon="/assets/admin/images/Pending Sponsorships.png"
            value="{{ $data['pending_service'] }}"
            bg="warning"
            outline="true"
        />
    </div>
    <!-- dashboard-w1 end -->
    <div class="col-xxl-3 col-sm-3">
        <x-widget
            style="6"
            link="{{ route('admin.service.approved') }}"
            title="Approved Sponsorships"
            icon="/assets/admin/images/Approved Sponsorships.svg"
            value="{{ $data['approved_service'] }}"
            bg="danger"
            outline="true"
        />
    </div>
    <!-- dashboard-w1 end -->
    <div class="col-xxl-3 col-sm-3">
        <x-widget
            style="6"
            link="{{ route('admin.service.rejected') }}"
            title="Rejected Sponsorships"
            icon="/assets/admin/images/Rejected Sponsorships.svg"
            value="{{ $data['rejected_service'] }}"
            bg="primary"
            outline="true"
        />
    </div>
    <!-- dashboard-w1 end -->
</div>
<!-- row end-->


<div class="row gy-4 mt-2">
    <div class="col-md-2 col-xxl-2 col-lg-2 col-sm-6">
        <x-widget
            style="5"
            link="{{ route('admin.order.index') }}"
            icon="/assets/admin/images/Total Deals.svg"
            title="Total Deals"
            value="{{ $data['total_order'] }}"
            bg="primary"
        />
    </div>
    <!-- dashboard-w1 end -->
    <div class="col-md-2 col-xxl-2 col-lg-2 col-sm-6">
        <x-widget
            style="5"
            link="{{ route('admin.order.pending') }}"
            icon="/assets/admin/images/Pending Deals.svg"
            title="Pending Deals"
            value="{{ $data['pending_order'] }}"
            bg="1"
        />
    </div>
    <!-- dashboard-w1 end -->
    <div class="col-md-2 col-xxl-2 col-lg-2 col-sm-6">
        <x-widget
            style="5"
            link="{{ route('admin.order.jobDone') }}"
            icon="/assets/admin/images/Completed Deals.svg"
            title="Completed Deals"
            value="{{ $data['delivered_order'] }}"
            bg="2"
        />
    </div>
    <!-- dashboard-w1 end -->
    <div class="col-md-2 col-xxl-2 col-lg-2 col-sm-6">
        <x-widget
            style="5"
            link="{{ route('admin.order.completed') }}"
            icon="/assets/admin/images/Successful Deals.svg"
            title="Successful Deals"
            value="{{ $data['completed_order'] }}"
            bg="3"
        />
    </div>
    <!-- dashboard-w1 end -->
    <div class=" col-md-2 col-xxl-2 col-lg-2 col-sm-6">
        <x-widget
            style="5"
            link="{{ route('admin.order.reported') }}"
            icon="/assets/admin/images/Reported Deals.svg"
            title="Reported Deals"
            value="{{ $data['reported_order'] }}"
            bg="4"
        />
    </div>
    <!-- dashboard-w1 end -->
    <div class="col-md-2 col-xxl-2 col-lg-2 col-sm-6">
        <x-widget
            style="5"
            link="{{ route('admin.order.cancelled') }}"
            icon="/assets/admin/images/Cancelled Deals.svg"
            title="Cancelled Deals"
            value="{{ $data['cancelled_order'] }}"
            bg="5"
        />
    </div>
    <!-- dashboard-w1 end -->
</div>


<!-- row end-->

<div class="row mb-none-30 mt-30">
    <div class="col-xl-6 mb-30">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap justify-content-between">
                    <h5 class="card-title">
                        @lang('Deposit & Withdraw Report')
                    </h5>

                    <div
                        id="dwDatePicker"
                        class="border p-1 cursor-pointer rounded"
                    >
                        <i class="la la-calendar"></i>&nbsp; <span></span>
                        <i class="la la-caret-down"></i>
                    </div>
                </div>
                <div id="dwChartArea"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 mb-30">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap justify-content-between">
                    <h5 class="card-title">@lang('Transactions Report')</h5>

                    <div
                        id="trxDatePicker"
                        class="border p-1 cursor-pointer rounded"
                    >
                        <i class="la la-calendar"></i>&nbsp; <span></span>
                        <i class="la la-caret-down"></i>
                    </div>
                </div>

                <div id="transactionChartArea"></div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-none-30 mt-5">
    <div class="col-xl-4 col-lg-6 mb-30">
        <div class="card overflow-hidden">
            <div class="card-body">
                <h5 class="card-title">
                    @lang('Login By Browser') (@lang('Last 30 days'))
                </h5>
                <canvas id="userBrowserChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 mb-30">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    @lang('Login By OS') (@lang('Last 30 days'))
                </h5>
                <canvas id="userOsChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 mb-30">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    @lang('Login By Country') (@lang('Last 30 days'))
                </h5>
                <canvas id="userCountryChart"></canvas>
            </div>
        </div>
    </div>
</div>

@endsection @push('script-lib')
<script src="{{ asset('assets/admin/js/vendor/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/vendor/chart.js.2.8.0.js') }}"></script>
<script src="{{ asset('assets/admin/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/daterangepicker.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/charts.js') }}"></script>
@endpush @push('style-lib')
<link
    rel="stylesheet"
    type="text/css"
    href="{{ asset('assets/admin/css/daterangepicker.css') }}"
/>
@endpush @push('script')
<script>
    "use strict";

    const start = moment().subtract(14, 'days');
    const end = moment();

    const dateRangeOptions = {
        startDate: start,
        endDate: end,
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 15 Days': [moment().subtract(14, 'days'), moment()],
            'Last 30 Days': [moment().subtract(30, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
            'Last 6 Months': [moment().subtract(6, 'months').startOf('month'), moment().endOf('month')],
            'This Year': [moment().startOf('year'), moment().endOf('year')],
        },
        maxDate: moment()
    }

    const changeDatePickerText = (element, startDate, endDate) => {
        $(element).html(startDate.format('MMMM D, YYYY') + ' - ' + endDate.format('MMMM D, YYYY'));
    }

    let dwChart = barChart(
        document.querySelector("#dwChartArea"),
        @json(__(gs('cur_text'))),
        [{
                name: 'Deposited',
                data: []
            },
            {
                name: 'Withdrawn',
                data: []
            }
        ],
        [],
    );

    let trxChart = lineChart(
        document.querySelector("#transactionChartArea"),
        [{
                name: "Plus Transactions",
                data: []
            },
            {
                name: "Minus Transactions",
                data: []
            }
        ],
        []
    );


    const depositWithdrawChart = (startDate, endDate) => {

        const data = {
            start_date: startDate.format('YYYY-MM-DD'),
            end_date: endDate.format('YYYY-MM-DD')
        }

        const url = @json(route('admin.chart.deposit.withdraw'));

        $.get(url, data,
            function(data, status) {
                if (status == 'success') {
                    dwChart.updateSeries(data.data);
                    dwChart.updateOptions({
                        xaxis: {
                            categories: data.created_on,
                        }
                    });
                }
            }
        );
    }

    const transactionChart = (startDate, endDate) => {

        const data = {
            start_date: startDate.format('YYYY-MM-DD'),
            end_date: endDate.format('YYYY-MM-DD')
        }

        const url = @json(route('admin.chart.transaction'));


        $.get(url, data,
            function(data, status) {
                if (status == 'success') {


                    trxChart.updateSeries(data.data);
                    trxChart.updateOptions({
                        xaxis: {
                            categories: data.created_on,
                        }
                    });
                }
            }
        );
    }



    $('#dwDatePicker').daterangepicker(dateRangeOptions, (start, end) => changeDatePickerText('#dwDatePicker span', start, end));
    $('#trxDatePicker').daterangepicker(dateRangeOptions, (start, end) => changeDatePickerText('#trxDatePicker span', start, end));

    changeDatePickerText('#dwDatePicker span', start, end);
    changeDatePickerText('#trxDatePicker span', start, end);

    depositWithdrawChart(start, end);
    transactionChart(start, end);

    $('#dwDatePicker').on('apply.daterangepicker', (event, picker) => depositWithdrawChart(picker.startDate, picker.endDate));
    $('#trxDatePicker').on('apply.daterangepicker', (event, picker) => transactionChart(picker.startDate, picker.endDate));

    piChart(
        document.getElementById('userBrowserChart'),
        @json(@$chart['user_browser_counter']->keys()),
        @json(@$chart['user_browser_counter']->flatten())
    );

    piChart(
        document.getElementById('userOsChart'),
        @json(@$chart['user_os_counter']->keys()),
        @json(@$chart['user_os_counter']->flatten())
    );

    piChart(
        document.getElementById('userCountryChart'),
        @json(@$chart['user_country_counter']->keys()),
        @json(@$chart['user_country_counter']->flatten())
    );
</script>
@endpush @push('style')
<style>
    .apexcharts-menu {
        min-width: 120px !important;
    }
</style>
@endpush
