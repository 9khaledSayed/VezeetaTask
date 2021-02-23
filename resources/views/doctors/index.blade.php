@extends('layouts.app')


@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__body">
            <div class="kt-widget kt-widget--user-profile-3">
                <div class="kt-widget__top">
                    <div class="kt-widget__media kt-hidden-">
                        <img src="assets/media/users/100_1.jpg" alt="image">
                    </div>
                    <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
                        JM
                    </div>
                    <div class="kt-widget__content">
                        <div class="kt-widget__head">
                            <a href="#" class="kt-widget__username">
                                Jason Muller
                                <i class="flaticon2-correct kt-font-success"></i>
                            </a>
                            <div class="kt-widget__action">
                                <a href="{{route('reservations.create')}}" class="btn btn-brand btn-sm btn-upper">Make Reservation</a>
                            </div>
                        </div>
                        <div class="kt-widget__subhead">
                            <a href="#"><i class="flaticon2-new-email"></i>jason@siastudio.com</a>
                            <a href="#"><i class="flaticon2-calendar-3"></i>PR Manager </a>
                            <a href="#"><i class="flaticon2-placeholder"></i>Melbourne</a>
                        </div>
                        <div class="kt-widget__info">
                            <div class="kt-widget__desc">
                                I distinguish three main text objektive could be merely to inform people.
                                <br> A second could be persuade people.You want people to bay objective
                            </div>
                            <div class="kt-widget__progress">
                                <div class="kt-widget__text">
                                    Progress
                                </div>
                                <div class="progress" style="height: 5px;width: 100%;">
                                    <div class="progress-bar kt-bg-success" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="kt-widget__stats">
                                    78%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
