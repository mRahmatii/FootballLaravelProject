$(document).ready(function () {

    $('body').on('click','.delete', function (e) {

        e.preventDefault();
        Id = $(this).closest('tr').attr('data-id');

        swal({
            title: "آیا از حدف این رکورد اطمینان دارید؟",
            text: "درصورتیکه این رکورد را حذف کنید دیگر به آن دسترسی نخواهید داشت",
            icon: "warning",
            buttons: ["کنسل", "بله"],
            dangerMode: true,

        }).then(function (result) {
            if(result){
                $.ajax({
                    url: base_url() + "admin/teams/destroy",
                    type: "DELETE",
                    dataType: "JSON",
                    data: {
                        id: Id,
                    },
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success: function (data) {

                        if (data.status){
                            swal(data.message, {icon: "success"});
                            var row = $('tr[data-id="' + Id + '"]');
                            row.fadeOut().remove();
                        } else
                        {
                            swal(data.message, {icon: "error"});
                        }
                    },
                })
            }

        })
    });

    var typingTimer;                //timer identifier
    var doneTypingInterval = 1000;  //time in ms, 5 second for example
    var $input = $('#search');

//on keyup, start the countdown
    $input.on('keyup', function () {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(doneTyping, doneTypingInterval);
    });

//on keydown, clear the countdown
    $input.on('keydown', function () {
        clearTimeout(typingTimer);
    });

//user is "finished typing," do something
    function doneTyping() {

        var text = $('#search').val();
        var limit = $("select[name='limit']").val();

        $.ajax({
            url: base_url()+"admin/teams",
            type: 'GET',
            dataType: 'json',
            data: {
                limit:$('select[name="limit"]').val(),
                text : $('#search').val(),
            },

            beforeSend: function () {
                $(' .loading ').show();
            },
            complete: function () {
                $('.loading ').hide();
            },
            success: function (res) {
                $('#allDataUpdate').html(res.body);
            }
        });
    }

    $("select[name='limit']").on('change', function () {

        limit = $(this).val();
        var text = $('#search').val();
        $.ajax({
            url: base_url()+"admin/teams",
            type: 'GET',
            dataType: 'json',
            data: {
                limit:$('select[name="limit"]').val(),
                text : $('#search').val(),
            },
            beforeSend: function () {
                $(' .loading ').show();
            },
            complete: function () {
                $(' .loading ').hide();
            },
            success: function (res) {

                $('#allDataUpdate').html(res.body);
            }
        });
    });


});
