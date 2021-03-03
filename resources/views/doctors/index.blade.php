@extends('layouts.app')


@section('content')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    {{__('Make Reservation')}}
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            </div>
            <div class="kt-subheader__toolbar">
                <a href="/" class="btn btn-secondary">
                    {{__('Back To Home')}}
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="kt-portlet">
                <div class="kt-portlet__body">
                    <div class="kt-widget kt-widget--user-profile-3">
                        <div class="kt-widget__top">
                            <div class="kt-widget__media kt-hidden-">
                                <img width="110" height="110" src="{{ asset('storage/avatars/' . $doctor->photo) ?? asset('assets/media/users/100_1.jpg')}}" alt="image">
                            </div>
                            <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
                                JM
                            </div>
                            <div class="kt-widget__content" >
                                <div class="kt-widget__head">
                                    <a href="#" class="kt-widget__username">
                                        {{$doctor->name}}
                                        <i class="flaticon2-correct kt-font-success"></i>
                                    </a>
                                    <div class="kt-widget__action">
                                        <a href="{{route('reservations.index')}}" class="btn btn-outline-brand btn-elevate btn-pill d-flex align-items-center"><i class="flaticon-layers"></i> All Reservations</a>
                                    </div>
                                </div>
                                <div class="kt-widget__subhead">
                                    <a href="#"><i class="flaticon2-new-email"></i>{{$doctor->email}}</a>
                                    <a href="#"><i class="flaticon2-calendar-3"></i>{{$doctor->specialization}} </a>
                                    <a href="#"><i class="flaticon2-placeholder"></i>{{$doctor->address}}</a>
                                </div>
                                <div class="kt-widget__info">
                                    <div class="kt-widget__desc">
                                        I am ambitious and driven. I thrive on challenge and constantly set goals for myself, so I have something to strive toward.
                                        <br>I’m not comfortable with settling, and I’m always looking for an opportunity to do better and achieve greatness.
                                        <br>In my previous role, I was promoted three times in less than two years.
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="kt-portlet" id="kt_portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="flaticon-map-location"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            Choose Day
                        </h3>
                    </div>
                    {{--                    <div class="kt-portlet__head-toolbar">--}}
                    {{--                        <a href="#" class="btn btn-brand btn-elevate">--}}
                    {{--                            <i class="la la-plus"></i>--}}
                    {{--                            Add Event--}}
                    {{--                        </a>--}}
                    {{--                    </div>--}}
                </div>
                <div class="kt-portlet__body">
                    <div id="kt_calendar"></div>
                </div>
            </div>
            <!--begin::Modal-->
            <div class="modal fade" id="kt_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body" style="position: relative;height: 400px;overflow: auto;display: block;">
                            <table class="table table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                    <th>Time</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody id="intervalBody">

                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary m-auto" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--end::Modal-->
        </div>

    </div>

@endsection

@push('scripts')
    <script src="{{asset('assets/js/pages/components/calendar/basic_v2.js')}}" type="text/javascript"></script>
@endpush
