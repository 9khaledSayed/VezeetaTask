@extends('layouts.master')

@push('styles')
    <style>
        /*table,thead, tbody { display: block; }*/

        /*tbody {*/
        /*    height: 200px;       !* Just for the demo          *!*/
        /*    overflow-y: auto;    !* Trigger vertical scroll    *!*/
        /*    overflow-x: hidden;  !* Hide the horizontal scroll *!*/
        /*}*/
        .cursor-pointer{
            cursor: pointer;
        }
    </style>
@endpush

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
        @foreach($doctors as $doctor)
        <div class="col-lg-12">
            <div class="kt-portlet">
                <div class="kt-portlet__body">
                    <div class="kt-widget kt-widget--user-profile-3">
                        <div class="kt-widget__top row">
                            <div class="kt-widget__pic kt-widget__pic   --danger kt-font-danger kt-font-boldest kt-font-light kt-hidden col-lg-1">
                                JM
                            </div>
                            <div class="kt-widget__content col-lg-6">
                                <div class="kt-widget__head">
                                    <a href="#" class="kt-widget__username">
                                        {{$doctor->name}}
                                        <i class="flaticon2-correct kt-font-success"></i>
                                    </a>
                                </div>
                                <div class="kt-widget__subhead">
                                    <a href="#"><i class="flaticon2-new-email"></i>{{$doctor->email}}</a>
                                    <a href="#"><i class="flaticon2-calendar-3"></i>{{$doctor->specialization}} </a>
                                    <a href="#"><i class="flaticon2-placeholder"></i>{{$doctor->address}}</a>
                                    <a href="#"><i class="fa fa-money-bill"></i>{{$doctor->price}} EGP</a>
                                </div>
                                <div class="kt-widget__info">
                                    <div class="kt-widget__desc">
                                        I am ambitious and driven. I thrive on challenge and constantly set goals for myself, so I have something to strive toward.
                                        <br>I’m not comfortable with settling, and I’m always looking for an opportunity to do better and achieve greatness.
                                        <br>In my previous role, I was promoted three times in less than two years.
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-6 ">
                                <div class="row d-flex justify-content-center" >
                                    <div class="d-flex align-items-center">
                                        <a href="/doctors/{{$doctor->id}}/appointments" id="previous{{$doctor->id}}" class="input-group-prepend previous" data-previousDate="{{$doctor->initialCards()[0]['date_value']}}">
                                            <span class="input-group-text btn">
                                                <i class="fa fa fa-arrow-alt-circle-left kt-font-brand"></i>
                                            </span>
                                        </a>
                                    </div>

                                    <div class="col-lg-8 row " id="cards_{{$doctor->id}}">
                                        @foreach($doctor->initialCards() as $card)
                                        <div class="col-lg-4">
                                            <table class="table table-bordered table-hover text-center">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th>{{$card['date_format']}}</th>
                                                </tr>
                                                </thead>
                                                <tbody class="appointments-body">
                                                @forelse($card['appointments_list'] as $appointments)
                                                    <tr class="cursor-pointer">
                                                        <td class="time_item" data-date="{{$card['date_value']}}" data-doctorID="{{$doctor->id}}"
                                                        @if(!$appointments['available']) style="text-decoration: line-through; color: #aaa" @endif
                                                        >{{$appointments['interval']}}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td>There is no appointments</td>
                                                    </tr>
                                                @endforelse

                                                </tbody>
                                                <tfoot class="cursor-pointer">
                                                <tr class="more">
                                                    <th>more</th>
                                                </tr>
                                                </tfoot>

                                            </table>
                                        </div>
                                        @endforeach
                                    </div>


                                    <div class="d-flex align-items-center">
                                        <a href="/doctors/{{$doctor->id}}/appointments" class="input-group-prepend next" id="next{{$doctor->id}}"  data-nextDate="{{$doctor->initialCards()[2]['date_value']}}">
                                            <span class="input-group-text btn">
                                                <i class="fa fa fa-arrow-alt-circle-right kt-font-brand"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

@endsection

@push('scripts')
    <script src="{{asset('js/slider.js')}}" type="text/javascript"></script>
@endpush
