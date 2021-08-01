@extends('layouts.admin')
@section('admin_content')
<div class="container">
    <div class="row" style="margin-top: 45px;">
        <div class="col-md-4 col-md-offset-4">
            <h4>Add new</h4><hr>
            <form action="" method="" id="main_form">
                <div class="form-group">
                    <label for="name">name</label>
                    <input id="name" type="text" name="name" class="form-control" placeholder="Enter your name">
                    <span class="text-danger error-text name-error"></span>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="text" name="email" class="form-control" placeholder="Enter your email">
                    <span class="text-danger error-text emai-error"></span>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" class="form-control" placeholder="Enter password">
                    <span class="text-danger error-text password-error"></span>
                </div>
                <br>
                <button type="submit" class="btn btn-block btn-primary"> Save</button>
            </form>
        </div>

    </div>
</div>
@include('includes.footer')
<script src="{{ asset('js/jQuery.js') }}"></script>

<script>
    $(function () {
        $(#main_form).on('submit',function (e) {
            e.preventDefault();
            $.ajax({
                url:$(this).attr('action'),
                method:$(this).attr('method'),
                data:new FormData(this);
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){
                    $(document).find('span.error-text').text('');
                },
                success:function(data){
                    if(data.status=0){
                        $.each(data.error,function(prefix, val){
                            $('span.'+prefix+'_error').text(val[0]);

                        });
                    }else{
                        $('#main_form')[0].reset();
                        alert(data.msg);

                    }
                }
            });
         });

    });
</script>

@endsection

