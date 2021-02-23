"use strict";

var KTCalendarBasic = function() {



    return {
        //main function to initiate the module
        init: function() {
            var todayDate = moment().startOf('day');
            var YM = todayDate.format('YYYY-MM');
            var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
            var TODAY = todayDate.format('YYYY-MM-DD');
            var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

            var calendarEl = document.getElementById('kt_calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],

                isRTL: KTUtil.isRTL(),
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },

                height: 800,
                contentHeight: 780,
                aspectRatio: 3,  // see: https://fullcalendar.io/docs/aspectRatio

                nowIndicator: true,
                now: TODAY + 'T09:25:00', // just for demo

                views: {
                    dayGridMonth: { buttonText: 'month' },
                    timeGridWeek: { buttonText: 'week' },
                    timeGridDay: { buttonText: 'day' }
                },

                defaultView: 'dayGridMonth',
                defaultDate: TODAY,

                editable: false,
                eventLimit: true, // allow "more" link when too many events
                navLinks: true,
                events: [
                    {
                        title: '',
                        start: YM + '-01',
                        description: '',
                    },
                ],

                eventRender: function(info) {
                    var element = $(info.el);

                    if (info.event.extendedProps && info.event.extendedProps.description) {
                        if (element.hasClass('fc-day-grid-event')) {
                            element.data('content', info.event.extendedProps.description);
                            element.data('placement', 'top');
                            KTApp.initPopover(element);
                        } else if (element.hasClass('fc-time-grid-event')) {
                            element.find('.fc-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
                        } else if (element.find('.fc-list-item-title').lenght !== 0) {
                            element.find('.fc-list-item-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
                        }
                    }

                    var eventDay = $(".fc-day");

                    $.each( eventDay, function( key, value ) {
                        value.innerHTML = "<button class='btn-primary d-flex justify-content-center'>Click Here</button>";
                    });
                },
                dateClick: function(info) {

                    viewAppointmentIntervalModal(info.dateStr)

                },


            });

            calendar.render();
        }
    };
}();

jQuery(document).ready(function() {
    KTCalendarBasic.init();



    $(document).on('click', 'td' ,function () {
        if($(this).parent().parent().attr('id') === 'intervalBody'){
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url:'/reservations',
                method : 'post',
                data: {
                   'time' : $(this).text(),
                   'date' : $("#modalTitle").text(),
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
                        viewAppointmentIntervalModal($("#modalTitle").text())
                        swal.fire({
                            title: "Done!",
                            type: 'success',
                            buttonsStyling: false,
                            confirmButtonText: "OK",
                            confirmButtonClass: "btn btn-sm btn-bold btn-brand",
                        });
                    }

                }
            });
        }
    })
});

function viewAppointmentIntervalModal(dateStr){
    swal.fire({
        title: 'Loading...',
        onOpen: function () {
            swal.showLoading();
        }
    });
    $.ajax({
        url : '/appointments',
        method : 'get',
        data : {
            'date' : dateStr
        },
        success : function (response) {
            var intervalBody = $("#intervalBody");
            intervalBody.empty()
            $.each(response , function (key, value) {
                var status = value.available ? 'available' : 'unavailable'
                var statusClass = value.available ? 'success' : 'danger'
                intervalBody.append('\
                               <tr>\
                                   <td class=".intervalCel">'+ value.interval + '</td>\
                                   <td class="kt-font-' + statusClass + '">' + status + '</td>\
                               </tr>\
                               ');
            });
            swal.close();
            $("#kt_modal_1").modal('show');
            $("#modalTitle").text(dateStr)
        },
        error : function (res) {
            console.log('error');
        }
    })

}
