<span class="text-danger-custom error-text name_error"></span>

<script>
    (function($){
        $(".form_subscribe_ajax").on('submit', function(e){
            e.preventDefault();
            $('#loader').show();
            var form = this;
            $.ajax({
                url:$(form).attr('action'),
                method:$(form).attr('method'),
                data:new FormData(form),
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){
                    $(form).find('span.error-text').text('');
                },
                success:function(data)
                {
                    $('#loader').hide();
                    if(data.code == 0)
                    {
                        $.each(data.error_message, function(prefix, val) {
                            $(form).find('span.'+prefix+'_error').text(val[0]);
                        });
                    }
                    else if(data.code == 1)
                    {
                        $(form)[0].reset();
                        iziToast.success({
                            title: '',
                            position: 'topRight',
                            message: data.success_message,
                        });
                    }
                    
                }
            });
        });
    })(jQuery);
</script>
<div id="loader"></div>



#loader {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    width: 100%;
    background: rgba(0,0,0,0.75) url(loading.gif) no-repeat center center;
    z-index: 10000;
}


$validator = \Validator::make($request->all(),[
    'name'=>'required',
    'email' => 'required|email',
    'message' => 'required'
]);
if(!$validator->passes())
{
    return response()->json(['code'=>0,'error_message'=>$validator->errors()->toArray()]);
}
else
{
    // Send email
    return response()->json(['code'=>1,'success_message'=>SUCCESS_CONTACT]);
}






09/08/2022 - 11/08/2022

booked_rooms

booking_date    order_id    room_id
10/08/2022      2938492     1
11/08/2022      2938492     1
12/08/2022      2938492     1
13/08/2022      2938492     1
14/08/2022      2938492     1
09/08/2022      4598454     1
10/08/2022      4598454     1