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
{{--                            <div class="kt-widget__media kt-hidden- col-lg-1">--}}
{{--                                <img width="110" height="110" src="{{ asset('storage/avatars/' . $doctor->photo) ?? asset('assets/media/users/100_1.jpg')}}" alt="image">--}}
{{--                            </div>--}}
                            <div class="kt-widget__pic kt-widget__pic   --danger kt-font-danger kt-font-boldest kt-font-light kt-hidden col-lg-1">
                                JM
                            </div>
                            <div class="kt-widget__content col-lg-6">
                                <div class="kt-widget__head">
                                    <a href="#" class="kt-widget__username">
                                        {{$doctor->name}}
                                        <i class="flaticon2-correct kt-font-success"></i>
                                    </a>
{{--                                    <div class="kt-widget__action">--}}
{{--                                        <a href="{{route('reservations.index')}}" class="btn btn-outline-brand btn-elevate btn-pill d-flex align-items-center"><i class="flaticon-layers"></i> All Reservations</a>--}}
{{--                                    </div>--}}
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
    <script>
        $(function () {

            $(".next").click(function (e) {
                e.preventDefault();
                console.log('clicked Next')

                var nextDate = $(this).attr('data-nextDate');
                var url = $(this).attr('href');

                $.ajax({
                    'method': 'get',
                    'url': url,
                    data: {
                        'next_to' : nextDate
                    },
                    success:function (res) {
                        if(res.length > 0){
                            var appointments = ''
                            var cards = '';
                            $.each(res,function (key, card) {
                                // prepare cards
                                if(card.appointments_list.length > 0){
                                    $.each(card.appointments_list, function (key, value) {
                                        var style = (!value.available)? 'text-decoration: line-through; color: #aaa' : '';
                                        appointments += '<tr class="cursor-pointer">\
                                                        <td class="time_item" data-date="' + card.date_value + '" data-doctorID="' + card.doctor_id + '"\
                                                        style="' + style + '">'+ value.interval +'</td>\
                                                    </tr>';
                                    })
                                }else{
                                    appointments = '<tr >\
                                        <td>There is no appointments</td>\
                                    </tr>';
                                }

                                cards += '\<div class="col-lg-4">\
                                    <table class="table table-bordered table-hover text-center">\
                                        <thead class="thead-light">\
                                        <tr>\
                                            <th>' + card.date_format + '</th>\
                                        </tr>\
                                        </thead>\
                                        <tbody class="appointments-body">\
                                        ' + appointments + '\
                                        </tbody>\
                                    </table>\
                                </div>';
                                    appointments = '';
                            })

                            $("#cards_" + res[0].doctor_id).html(cards);

                            $("#previous" + res[0].doctor_id).attr('data-previousDate', res[0].date_value)
                            $("#next" + res[0].doctor_id).attr('data-nextDate', res[2].date_value)
                        }


                    },
                    error:function (err) {
                        console.log('error')
                    }
                })
            })

            $(".previous").click(function (e) {
                e.preventDefault();
                console.log('clicked previous')

                var previousDate = $(this).attr('data-previousDate');
                var url = $(this).attr('href');

                $.ajax({
                    'method': 'get',
                    'url': url,
                    data: {
                        'previous_to' : previousDate
                    },
                    success:function (res) {
                        if(res.length > 0){
                            var appointments = ''
                            var cards = '';
                            $.each(res,function (key, card) {
                                // prepare cards
                                if(card.appointments_list.length > 0){
                                    $.each(card.appointments_list, function (key, value) {
                                        var style = (!value.available)? 'text-decoration: line-through; color: #aaa' : '';
                                        appointments += '<tr class="cursor-pointer">\
                                                        <td class="time_item" data-date="' + card.date_value + '" data-doctorID="' + card.doctor_id + '"\
                                                        style="' + style + '">'+ value.interval +'</td>\
                                                    </tr>';
                                    })
                                }else{
                                    appointments = '<tr >\
                                        <td>There is no appointments</td>\
                                    </tr>';
                                }

                                cards += '\<div class="col-lg-4">\
                                    <table class="table table-bordered table-hover text-center">\
                                        <thead class="thead-light">\
                                        <tr>\
                                            <th>' + card.date_format + '</th>\
                                        </tr>\
                                        </thead>\
                                        <tbody class="appointments-body">\
                                        ' + appointments + '\
                                        </tbody>\
                                    </table>\
                                </div>';
                                appointments = '';
                            })

                            $("#cards_" + res[0].doctor_id).html(cards);

                            $("#previous" + res[0].doctor_id).attr('data-previousDate', res[0].date_value)
                            $("#next" + res[0].doctor_id).attr('data-nextDate', res[2].date_value)
                        }


                    },
                    error:function (err) {
                        console.log('error')
                    }
                });


            });

            $(document).on('click', '.time_item' ,function () {
                console.log()
                var timeItem = $(this);
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url:'/reservations',
                    method : 'post',
                    data: {
                        'time' : $(this).text(),
                        'date' : $(this).attr('data-date'),
                        'doctor_id' : $(this).attr('data-doctorID'),
                    },
                    success:function (res) {
                        if(res.statue === '0'){
                            swal.fire({
                                title: "This Time Already Taken!",
                                type: 'error',
                                buttonsStyling: false,
                                confirmButtonText: "OK",
                                confirmButtonClass: "btn btn-sm btn-bold btn-brand",
                            });
                        }else{
                            swal.fire({
                                title: "Done!",
                                type: 'success',
                                buttonsStyling: false,
                                confirmButtonText: "OK",
                                confirmButtonClass: "btn btn-sm btn-bold btn-brand",
                            });
                            timeItem.css({
                                'color':'#aaa',
                                'text-decoration':'line-through',
                            })

                        }

                    },

                });
            })


            $(document).on('click', '.more' ,function () {
                var table = $(this).parents('table:first');
                table.find('.appointments-body tr:nth-child(n+7)').css('display', 'revert')
                $(this).html('<th>hide</th>');
                $(this).attr('class','hide');
            })
            $(document).on('click', '.hide' ,function () {
                console.log('Hide Clicked')
                var table = $(this).parents('table:first');
                table.find('.appointments-body tr:nth-child(n+7)').css('display', 'none')
                $(this).html('<th>more</th>');
                $(this).attr('class','more');
            })
        })
    </script>
@endpush
