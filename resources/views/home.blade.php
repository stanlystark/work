@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">Сообщения</div>

                <div class="panel-body">
                    {!! Form::open(['url' => '#', 'method' => 'post', 'id' => 'sendForm']) !!}
                    <div class="form-group">
                    {!! Form::text('name', null, ['placeholder' => 'ООО Напрасный труд', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::date('mdate', '2012-04-22', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::textarea('comment', null, ['placeholder' => 'Комметарий', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group text-center">
                    {!! Form::button('Добавить', ['id' => 'send', 'class' => 'btn btn-default']) !!}
                    </div>
                    {!! Form::close() !!}

                    <script>
                        $(document).ready(function(){

                            function getMessages() {
                                $.ajax({
                                    url: 'send',
                                    type: "get",
                                    success: function(data){
                                        $('#messageCount').html(data);
                                    }
                                });
                            }
                            getMessages();

                            $('#send').click(function(){
                                $.ajax({
                                    url: 'send',
                                    type: "post",
                                    data: {'name':$('input[name=name]').val(), 'mdate':$('input[name=mdate]').val(), 'comment':$('textarea[name=comment]').val(), '_token': $('input[name=_token]').val()},
                                    success: function(data){
                                        $('#sendForm')[0].reset();
                                        getMessages();
                                    }
                                });
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
