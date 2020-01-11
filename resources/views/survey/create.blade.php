@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Survey</div>
                    <div class="card-body">
                        <form>
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" placeholder="Enter Title" name="title" id="title" value="">
                                <small id="titlehelp" class="form-text text-muted">Give your survey a title to grab attrtion.</small>
                            </div>
                            <div class="form-group">
                                <label for="title">Purpose</label>
                                <input type="text" class="form-control" placeholder="Enter Purpose" name="purpose" id="purpose" value="">
                                <small id="purposehelp" class="form-text text-muted">Providing purpose will increase responses.</small>
                            </div>
                            <input type="button" class="btn btn-primary" value="Create" id="crete_survey">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#crete_survey').click(function () {
                $('.text-danger').remove();
                $('.form-control').removeClass('is-invalid');
                let title= $('#title').val();
                let purpose = $('#purpose').val();
                $.ajax({
                    type:'POST',
                    url:"{{route('questionare.store')}}",
                    data:{title:title,purpose:purpose},
                    success:function(res){
                        console.log(res.errors);
                    },error:function (res) {
                        $.each(res.responseJSON.parameters,function (i,value) {
                            if(i != null){
                                $('#'+i).addClass('is-valid');
                            }
                            console.log(i+":"+value);
                        });
                        $.each(res.responseJSON.errors,function (i,value) {
                           $('#'+i).removeClass('is-valid');
                           $('#'+i).closest('.form-group').append('<p class="text-danger">'+value+'</p>');
                           $('#'+i).addClass('is-invalid');
                            console.log(i+ "  "+value);
                        });
                    }
                });
            });
        });
    </script>
@endsection

