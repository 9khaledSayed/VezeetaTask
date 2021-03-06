$(function () {

    $(".next").click(function (e) {
        e.preventDefault();

        var ajaxData = {
            'next_to' : $(this).attr('data-nextDate')
        }
        moveSlider(ajaxData , $(this).attr('href'));
    })

    $(".previous").click(function (e) {
        e.preventDefault();

        var ajaxData = {
            'previous_to' : $(this).attr('data-previousDate')
        }
        moveSlider(ajaxData , $(this).attr('href'));
    });

    $(document).on('click', '.time_item' ,function () {

        var timeItem = $(this);

        swal.fire({
            buttonsStyling: false,

            html: "Are you sure to choosing this time?",
            type: "info",

            confirmButtonText: "Yes, sure!",
            confirmButtonClass: "btn btn-sm btn-bold btn-brand",

            showCancelButton: true,
            cancelButtonText: "No, cancel",
            cancelButtonClass: "btn btn-sm btn-bold btn-default"

        }).then(function (result) {
            if (result.value) {
                swal.fire({
                    title: 'Loading...',
                    onOpen: function () {
                        swal.showLoading();
                    }
                });
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url:'/reservations',
                    method : 'post',
                    data: {
                        'time' : timeItem.text(),
                        'date' : timeItem.attr('data-date'),
                        'doctor_id' : timeItem.attr('data-doctorID'),
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
            }
        });


    })


    $(document).on('click', '.more' ,function () {
        var table = $(this).parents('table:first');
        table.find(".appointments-body tr:nth-child(n+7)").css('display', 'revert')
        $(this).html('<th>hide</th>');
        $(this).attr('class','hide');
    })

    $(document).on('click', '.hide' ,function () {

        var table = $(this).parents('table:first');
        table.find('.appointments-body tr:nth-child(n+7)').css('display', 'none')
        $(this).html('<th>more</th>');
        $(this).attr('class','more');
    })


    function moveSlider(data, url) {
        $.ajax({
            'method': 'get',
            'url': url,
            data: data,
            success:function (res) {
                if(res.length > 0){
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
                                appointments = '\
                                    <tr>\
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
                                        <tfoot class="cursor-pointer">\
                                            <tr class="more">\
                                                <th>more</th>\
                                            </tr>\
                                        </tfoot>\
                                    </table>\
                                </div>';
                            appointments = '';
                        })

                        $("#cards_" + res[0].doctor_id).html(cards);

                        $("#previous" + res[0].doctor_id).attr('data-previousDate', res[0].date_value)
                        $("#next" + res[0].doctor_id).attr('data-nextDate', res[2].date_value)
                    }
                }


            },
            error:function (err) {
                console.log('error')
            }
        })
    }
})
