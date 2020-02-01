$(function () {
    // alert($('#content').data('title'));
    $('.selectpicker').select2();

    $(":file").filestyle({
        buttonText: " انتخاب فایل",
        input: false,
        buttonName: "btn-custom",
        badge: false
    });

    $(":file").on('change', function () {
        readURL(this, $(this).closest('.input-file'));
    });


    function readURL(input,parent)
    {
        if(input.files && input.files[0])
        {
            var reader=new FileReader();

            reader.onload=function(e)
            {
                parent.find('.pic-preview').attr('src',e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    });
