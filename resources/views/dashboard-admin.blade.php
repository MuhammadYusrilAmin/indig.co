@extends('layouts.master')
@section('title') @lang('translation.incomes') @endsection
@section('content')

@component('components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Incomes @endslot
@endcomponent
<div class="row project-wrapper">
    <div class="col-xxl-8">
        <div class="row">
            <div class="col-xl-4">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-primary text-primary rounded-2 fs-2">
                                    <i data-feather="briefcase" class="text-primary"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden ms-3">
                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3">Active Incomes</p>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="825">0</span></h4>
                                    <span class="badge badge-soft-danger fs-12"><i class="ri-arrow-down-s-line fs-13 align-middle me-1"></i>5.02 %</span>
                                </div>
                                <p class="text-muted text-truncate mb-0">Incomes this month</p>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div>
            </div><!-- end col -->

            <div class="col-xl-4">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-primary text-primary rounded-2 fs-2">
                                    <i data-feather="award" class="text-primary"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <p class="text-uppercase fw-medium text-muted mb-3">New Leads</p>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="7522">0</span></h4>
                                    <span class="badge badge-soft-success fs-12"><i class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>3.58 %</span>
                                </div>
                                <p class="text-muted mb-0">Leads this month</p>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div>
            </div><!-- end col -->

            <div class="col-xl-4">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-primary text-primary rounded-2 fs-2">
                                    <i data-feather="clock" class="text-primary"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden ms-3">
                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3">Total Hours</p>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="168">0</span>h <span class="counter-value" data-target="40">0</span>m</h4>
                                    <span class="badge badge-soft-danger fs-12"><i class="ri-arrow-down-s-line fs-13 align-middle me-1"></i>10.35 %</span>
                                </div>
                                <p class="text-muted text-truncate mb-0">Work this month</p>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div>
            </div><!-- end col -->
        </div><!-- end row -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0 align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Incomes Overview</h4>
                        <div>
                            <button type="button" class="btn btn-soft-secondary btn-sm">
                                ALL
                            </button>
                            <button type="button" class="btn btn-soft-secondary btn-sm">
                                1M
                            </button>
                            <button type="button" class="btn btn-soft-secondary btn-sm">
                                6M
                            </button>
                            <button type="button" class="btn btn-soft-primary btn-sm">
                                1Y
                            </button>
                        </div>
                    </div><!-- end card header -->

                    <div class="card-header p-0 border-0 bg-soft-light">
                        <div class="row g-0 text-center">
                            <div class="col-6 col-sm-3">
                                <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="9851">0</span></h5>
                                    <p class="text-muted mb-0">Number of Incomes</p>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-6 col-sm-3">
                                <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="1026">0</span></h5>
                                    <p class="text-muted mb-0">Active Incomes</p>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-6 col-sm-3">
                                <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1">$<span class="counter-value" data-target="228.89">0</span>k</h5>
                                    <p class="text-muted mb-0">Revenue</p>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-6 col-sm-3">
                                <div class="p-3 border border-dashed border-start-0 border-end-0">
                                    <h5 class="mb-1 text-success"><span class="counter-value" data-target="10589">0</span>h</h5>
                                    <p class="text-muted mb-0">Working Hours</p>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body p-0 pb-2">
                        <div>
                            <div id="Incomes-overview-chart" data-colors='["--vz-primary", "--vz-primary-rgb, 0.1", "--vz-primary-rgb, 0.50"]' class="apex-charts" dir="ltr"></div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end col -->

    <div class="col-xxl-4">
        <div class="card">
            <div class="card-header border-0">
                <h4 class="card-title mb-0">Upcoming Schedules</h4>
            </div><!-- end cardheader -->
            <div class="card-body pt-0">
                <div class="upcoming-scheduled">
                    <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" data-deafult-date="today" data-inline-date="true">
                </div>

                <h6 class="text-uppercase fw-semibold mt-4 mb-3 text-muted">Events:</h6>
                <div class="mini-stats-wid d-flex align-items-center mt-3">
                    <div class="flex-shrink-0 avatar-sm">
                        <span class="mini-stat-icon avatar-title rounded-circle text-primary bg-soft-primary fs-4">
                            09
                        </span>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-1">Development planning</h6>
                        <p class="text-muted mb-0">iTest Factory </p>
                    </div>
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">9:20 <span class="text-uppercase">am</span></p>
                    </div>
                </div><!-- end -->
                <div class="mini-stats-wid d-flex align-items-center mt-3">
                    <div class="flex-shrink-0 avatar-sm">
                        <span class="mini-stat-icon avatar-title rounded-circle text-primary bg-soft-primary fs-4">
                            12
                        </span>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-1">Design new UI and check sales</h6>
                        <p class="text-muted mb-0">Meta4Systems</p>
                    </div>
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">11:30 <span class="text-uppercase">am</span></p>
                    </div>
                </div><!-- end -->
                <div class="mini-stats-wid d-flex align-items-center mt-3">
                    <div class="flex-shrink-0 avatar-sm">
                        <span class="mini-stat-icon avatar-title rounded-circle text-primary bg-soft-primary fs-4">
                            25
                        </span>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-1">Weekly catch-up </h6>
                        <p class="text-muted mb-0">Nesta Technologies</p>
                    </div>
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">02:00 <span class="text-uppercase">pm</span></p>
                    </div>
                </div><!-- end -->
                <div class="mini-stats-wid d-flex align-items-center mt-3">
                    <div class="flex-shrink-0 avatar-sm">
                        <span class="mini-stat-icon avatar-title rounded-circle text-primary bg-soft-primary fs-4">
                            27
                        </span>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-1">James Bangs (Client) Meeting</h6>
                        <p class="text-muted mb-0">Nesta Technologies</p>
                    </div>
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">03:45 <span class="text-uppercase">pm</span></p>
                    </div>
                </div><!-- end -->

                <div class="mt-3 text-center">
                    <a href="javascript:void(0);" class="text-muted text-decoration-underline">View all Events</a>
                </div>

            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-xxl">
        <div class="card card-height-100">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Team Members</h4>
                <div class="flex-shrink-0">
                    <div class="dropdown card-header-dropdown">
                        <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fw-semibold text-uppercase fs-12">Sort by: </span><span class="text-muted">Last 30 Days<i class="mdi mdi-chevron-down ms-1"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Today</a>
                            <a class="dropdown-item" href="#">Yesterday</a>
                            <a class="dropdown-item" href="#">Last 7 Days</a>
                            <a class="dropdown-item" href="#">Last 30 Days</a>
                            <a class="dropdown-item" href="#">This Month</a>
                            <a class="dropdown-item" href="#">Last Month</a>
                        </div>
                    </div>
                </div>
            </div><!-- end card header -->

            <div class="card-body">

                <div class="table-responsive table-card">
                    <table class="table table-borderless table-nowrap align-middle mb-0">
                        <thead class="table-light text-muted">
                            <tr>
                                <th scope="col">Member</th>
                                <th scope="col">Hours</th>
                                <th scope="col">Tasks</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="d-flex">
                                    <img src="{{ URL::asset('assets/images/users/avatar-1.jpg') }}" alt="" class="avatar-xs rounded-3 me-2">
                                    <div>
                                        <h5 class="fs-13 mb-0">Donald Risher</h5>
                                        <p class="fs-12 mb-0 text-muted">Product Manager</p>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="mb-0">110h : <span class="text-muted">150h</span></h6>
                                </td>
                                <td>
                                    258
                                </td>
                                <td style="width:5%;">
                                    <div id="radialBar_chart_1" data-colors='["--vz-primary"]' data-chart-series="50" class="apex-charts" dir="ltr"></div>
                                </td>
                            </tr><!-- end tr -->
                            <tr>
                                <td class="d-flex">
                                    <img src="{{ URL::asset('assets/images/users/avatar-2.jpg') }}" alt="" class="avatar-xs rounded-3 me-2">
                                    <div>
                                        <h5 class="fs-13 mb-0">Jansh Brown</h5>
                                        <p class="fs-12 mb-0 text-muted">Lead Developer</p>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="mb-0">83h : <span class="text-muted">150h</span></h6>
                                </td>
                                <td>
                                    105
                                </td>
                                <td>
                                    <div id="radialBar_chart_2" data-colors='["--vz-primary"]' data-chart-series="45" class="apex-charts" dir="ltr"></div>
                                </td>
                            </tr><!-- end tr -->
                            <tr>
                                <td class="d-flex">
                                    <img src="{{ URL::asset('assets/images/users/avatar-7.jpg') }}" alt="" class="avatar-xs rounded-3 me-2">
                                    <div>
                                        <h5 class="fs-13 mb-0">Carroll Adams</h5>
                                        <p class="fs-12 mb-0 text-muted">Lead Designer</p>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="mb-0">58h : <span class="text-muted">150h</span></h6>
                                </td>
                                <td>
                                    75
                                </td>
                                <td>
                                    <div id="radialBar_chart_3" data-colors='["--vz-primary"]' data-chart-series="75" class="apex-charts" dir="ltr"></div>
                                </td>
                            </tr><!-- end tr -->
                            <tr>
                                <td class="d-flex">
                                    <img src="{{ URL::asset('assets/images/users/avatar-4.jpg') }}" alt="" class="avatar-xs rounded-3 me-2">
                                    <div>
                                        <h5 class="fs-13 mb-0">William Pinto</h5>
                                        <p class="fs-12 mb-0 text-muted">UI/UX Designer</p>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="mb-0">96h : <span class="text-muted">150h</span></h6>
                                </td>
                                <td>
                                    85
                                </td>
                                <td>
                                    <div id="radialBar_chart_4" data-colors='["--vz-primary"]' data-chart-series="25" class="apex-charts" dir="ltr"></div>
                                </td>
                            </tr><!-- end tr -->
                            <tr>
                                <td class="d-flex">
                                    <img src="{{ URL::asset('assets/images/users/avatar-6.jpg') }}" alt="" class="avatar-xs rounded-3 me-2">
                                    <div>
                                        <h5 class="fs-13 mb-0">Garry Fournier</h5>
                                        <p class="fs-12 mb-0 text-muted">Web Designer</p>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="mb-0">76h : <span class="text-muted">150h</span></h6>
                                </td>
                                <td>
                                    69
                                </td>
                                <td>
                                    <div id="radialBar_chart_5" data-colors='["--vz-primary"]' data-chart-series="60" class="apex-charts" dir="ltr"></div>
                                </td>
                            </tr><!-- end tr -->
                            <tr>
                                <td class="d-flex">
                                    <img src="{{ URL::asset('assets/images/users/avatar-5.jpg') }}" alt="" class="avatar-xs rounded-3 me-2">
                                    <div>
                                        <h5 class="fs-13 mb-0">Susan Denton</h5>
                                        <p class="fs-12 mb-0 text-muted">Lead Designer</p>
                                    </div>
                                </td>

                                <td>
                                    <h6 class="mb-0">123h : <span class="text-muted">150h</span></h6>
                                </td>
                                <td>
                                    658
                                </td>
                                <td>
                                    <div id="radialBar_chart_6" data-colors='["--vz-primary"]' data-chart-series="85" class="apex-charts" dir="ltr"></div>
                                </td>
                            </tr><!-- end tr -->
                            <tr>
                                <td class="d-flex">
                                    <img src="{{ URL::asset('assets/images/users/avatar-3.jpg') }}" alt="" class="avatar-xs rounded-3 me-2">
                                    <div>
                                        <h5 class="fs-13 mb-0">Joseph Jackson</h5>
                                        <p class="fs-12 mb-0 text-muted">React Developer</p>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="mb-0">117h : <span class="text-muted">150h</span></h6>
                                </td>
                                <td>
                                    125
                                </td>
                                <td>
                                    <div id="radialBar_chart_7" data-colors='["--vz-primary"]' data-chart-series="70" class="apex-charts" dir="ltr"></div>
                                </td>
                            </tr><!-- end tr -->
                        </tbody><!-- end tbody -->
                    </table><!-- end table -->
                </div>
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xxl col-lg-6">
        <div class="card card-height-100">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Chat</h4>
                <div class="flex-shrink-0">
                    <div class="dropdown card-header-dropdown">
                        <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted"><i class="ri-settings-4-line align-middle me-1"></i>Setting <i class="mdi mdi-chevron-down ms-1"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#"><i class="ri-user-2-fill align-bottom text-muted me-2"></i> View Profile</a>
                            <a class="dropdown-item" href="#"><i class="ri-inbox-archive-line align-bottom text-muted me-2"></i> Archive</a>
                            <a class="dropdown-item" href="#"><i class="ri-mic-off-line align-bottom text-muted me-2"></i> Muted</a>
                            <a class="dropdown-item" href="#"><i class="ri-delete-bin-5-line align-bottom text-muted me-2"></i> Delete</a>
                        </div>
                    </div>
                </div>
            </div><!-- end card header -->

            <div class="card-body p-0">
                <div class="chat-conversation p-3" data-simplebar style="height: 400px;">
                    <ul class="list-unstyled chat-conversation-list chat-sm" id="users-conversation">
                        <li class="chat-list left">
                            <div class="conversation-list">
                                <div class="chat-avatar">
                                    <img src="{{ URL::asset('assets/images/users/avatar-2.jpg') }}" alt="">
                                </div>
                                <div class="user-chat-content">
                                    <div class="ctext-wrap">
                                        <div class="ctext-wrap-content">
                                            <p class="mb-0 ctext-content">Good morning 😊</p>
                                        </div>
                                        <div class="dropdown align-self-start message-box-drop">
                                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#"><i class="ri-reply-line me-2 text-muted align-bottom"></i>Reply</a>
                                                <a class="dropdown-item" href="#"><i class="ri-share-line me-2 text-muted align-bottom"></i>Forward</a>
                                                <a class="dropdown-item" href="#"><i class="ri-file-copy-line me-2 text-muted align-bottom"></i>Copy</a>
                                                <a class="dropdown-item" href="#"><i class="ri-bookmark-line me-2 text-muted align-bottom"></i>Bookmark</a>
                                                <a class="dropdown-item delete-item" href="#"><i class="ri-delete-bin-5-line me-2 text-muted align-bottom"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="conversation-name"><small class="text-muted time">09:07 am</small> <span class="text-success check-message-icon"><i class="ri-check-double-line align-bottom"></i></span></div>
                                </div>
                            </div>
                        </li>
                        <!-- chat-list -->

                        <li class="chat-list right">
                            <div class="conversation-list">
                                <div class="user-chat-content">
                                    <div class="ctext-wrap">
                                        <div class="ctext-wrap-content">
                                            <p class="mb-0 ctext-content">Good morning, How are you? What about our next meeting?</p>
                                        </div>
                                        <div class="dropdown align-self-start message-box-drop">
                                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#"><i class="ri-reply-line me-2 text-muted align-bottom"></i>Reply</a>
                                                <a class="dropdown-item" href="#"><i class="ri-share-line me-2 text-muted align-bottom"></i>Forward</a>
                                                <a class="dropdown-item" href="#"><i class="ri-file-copy-line me-2 text-muted align-bottom"></i>Copy</a>
                                                <a class="dropdown-item" href="#"><i class="ri-bookmark-line me-2 text-muted align-bottom"></i>Bookmark</a>
                                                <a class="dropdown-item delete-item" href="#"><i class="ri-delete-bin-5-line me-2 text-muted align-bottom"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="conversation-name"><small class="text-muted time">09:08 am</small> <span class="text-success check-message-icon"><i class="ri-check-double-line align-bottom"></i></span></div>
                                </div>
                            </div>
                        </li>
                        <!-- chat-list -->

                        <li class="chat-list left">
                            <div class="conversation-list">
                                <div class="chat-avatar">
                                    <img src="{{ URL::asset('assets/images/users/avatar-2.jpg') }}" alt="">
                                </div>
                                <div class="user-chat-content">
                                    <div class="ctext-wrap">
                                        <div class="ctext-wrap-content">
                                            <p class="mb-0 ctext-content">Yeah everything is fine. Our next meeting tomorrow at 10.00 AM</p>
                                        </div>
                                        <div class="dropdown align-self-start message-box-drop">
                                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#"><i class="ri-reply-line me-2 text-muted align-bottom"></i>Reply</a>
                                                <a class="dropdown-item" href="#"><i class="ri-share-line me-2 text-muted align-bottom"></i>Forward</a>
                                                <a class="dropdown-item" href="#"><i class="ri-file-copy-line me-2 text-muted align-bottom"></i>Copy</a>
                                                <a class="dropdown-item" href="#"><i class="ri-bookmark-line me-2 text-muted align-bottom"></i>Bookmark</a>
                                                <a class="dropdown-item delete-item" href="#"><i class="ri-delete-bin-5-line me-2 text-muted align-bottom"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ctext-wrap">
                                        <div class="ctext-wrap-content">
                                            <p class="mb-0 ctext-content">Hey, I'm going to meet a friend of mine at the department store. I have to buy some presents for my parents 🎁.</p>
                                        </div>
                                        <div class="dropdown align-self-start message-box-drop">
                                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#"><i class="ri-reply-line me-2 text-muted align-bottom"></i>Reply</a>
                                                <a class="dropdown-item" href="#"><i class="ri-share-line me-2 text-muted align-bottom"></i>Forward</a>
                                                <a class="dropdown-item" href="#"><i class="ri-file-copy-line me-2 text-muted align-bottom"></i>Copy</a>
                                                <a class="dropdown-item" href="#"><i class="ri-bookmark-line me-2 text-muted align-bottom"></i>Bookmark</a>
                                                <a class="dropdown-item delete-item" href="#"><i class="ri-delete-bin-5-line me-2 text-muted align-bottom"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="conversation-name"><small class="text-muted time">09:10 am</small> <span class="text-success check-message-icon"><i class="ri-check-double-line align-bottom"></i></span></div>
                                </div>
                            </div>
                        </li>
                        <!-- chat-list -->

                        <li class="chat-list right">
                            <div class="conversation-list">
                                <div class="user-chat-content">
                                    <div class="ctext-wrap">
                                        <div class="ctext-wrap-content">
                                            <p class="mb-0 ctext-content">Wow that's great</p>
                                        </div>
                                        <div class="dropdown align-self-start message-box-drop">
                                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#"><i class="ri-reply-line me-2 text-muted align-bottom"></i>Reply</a>
                                                <a class="dropdown-item" href="#"><i class="ri-share-line me-2 text-muted align-bottom"></i>Forward</a>
                                                <a class="dropdown-item" href="#"><i class="ri-file-copy-line me-2 text-muted align-bottom"></i>Copy</a>
                                                <a class="dropdown-item" href="#"><i class="ri-bookmark-line me-2 text-muted align-bottom"></i>Bookmark</a>
                                                <a class="dropdown-item delete-item" href="#"><i class="ri-delete-bin-5-line me-2 text-muted align-bottom"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="conversation-name"><small class="text-muted time">09:12 am</small> <span class="text-success check-message-icon"><i class="ri-check-double-line align-bottom"></i></span></div>
                                </div>
                            </div>
                        </li>
                        <!-- chat-list -->

                        <li class="chat-list left">
                            <div class="conversation-list">
                                <div class="chat-avatar">
                                    <img src="{{ URL::asset('assets/images/users/avatar-2.jpg') }}" alt="">
                                </div>
                                <div class="user-chat-content">
                                    <div class="ctext-wrap">
                                        <div class="message-img mb-0">
                                            <div class="message-img-list">
                                                <div>
                                                    <a class="popup-img d-inline-block" href="assets/images/small/img-1.jpg">
                                                        <img src="{{ URL::asset('assets/images/small/img-1.jpg') }}" alt="" class="rounded border">
                                                    </a>
                                                </div>
                                                <div class="message-img-link">
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item dropdown">
                                                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="ri-more-fill"></i>
                                                            </a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="assets/images/small/img-1.jpg" download=""><i class="ri-download-2-line me-2 text-muted align-bottom"></i>Download</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-reply-line me-2 text-muted align-bottom"></i>Reply</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-share-line me-2 text-muted align-bottom"></i>Forward</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-bookmark-line me-2 text-muted align-bottom"></i>Bookmark</a>
                                                                <a class="dropdown-item delete-item" href="#"><i class="ri-delete-bin-5-line me-2 text-muted align-bottom"></i>Delete</a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="message-img-list">
                                                <div>
                                                    <a class="popup-img d-inline-block" href="assets/images/small/img-2.jpg">
                                                        <img src="{{ URL::asset('assets/images/small/img-2.jpg') }}" alt="" class="rounded border">
                                                    </a>
                                                </div>
                                                <div class="message-img-link">
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item dropdown">
                                                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="ri-more-fill"></i>
                                                            </a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="assets/images/small/img-2.jpg" download=""><i class="ri-download-2-line me-2 text-muted align-bottom"></i>Download</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-reply-line me-2 text-muted align-bottom"></i>Reply</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-share-line me-2 text-muted align-bottom"></i>Forward</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-bookmark-line me-2 text-muted align-bottom"></i>Bookmark</a>
                                                                <a class="dropdown-item delete-item" href="#"><i class="ri-delete-bin-5-line me-2 text-muted align-bottom"></i>Delete</a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="conversation-name"><small class="text-muted time">09:30 am</small> <span class="text-success check-message-icon"><i class="ri-check-double-line align-bottom"></i></span></div>
                                </div>
                            </div>
                        </li>
                        <!-- chat-list -->
                    </ul>
                </div>
                <div class="border-top border-top-dashed">
                    <div class="row g-2 mx-3 mt-2 mb-3">
                        <div class="col">
                            <div class="position-relative">
                                <input type="text" class="form-control border-light bg-light" placeholder="Enter Message...">
                            </div>
                        </div><!-- end col -->
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary"><span class="d-none d-sm-inline-block me-2">Send</span> <i class="mdi mdi-send float-end"></i></button>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div>
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->
@endsection
@section('script')
<!-- apexcharts -->
<script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<script src="{{ URL::asset('/assets/js/pages/dashboard-Incomes.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection