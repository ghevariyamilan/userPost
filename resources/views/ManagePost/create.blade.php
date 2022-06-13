@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumb-->
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title">New User Post</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User Post</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-danger" style="display:none"></div>
                    <form method="post" action="" enctype="multipart/form-data" id="frmUserPost">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="input-6">Category</label>
                                        <select class="form-control multiple-select" id="category" name="category[]" multiple="multiple">
                                            @foreach($category as $val)
                                                <option value="{{$val->_id}}">{{$val->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="input-7">Post Title</label>
                                        <input type="text" class="form-control form-control-rounded" id="post_title" name="post_title" placeholder="Post Title">
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-round px-5"><i class="icon-lock"></i> Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!--End Row-->
            <!--start overlay-->
            <div class="overlay toggle-menu"></div>
            <!--end overlay-->
        </div>
        <!-- End container-fluid-->
    </div>
    <!--End content-wrapper-->
@endsection

@section('scripts')
    <script>
        $('.multiple-select').select2();

        $("#frmUserPost").validate({
            rules: {
                "category[]" : "required",
                post_title : {
                    required : true,
                    maxlength : 255
                }
            },
            messages: {
                "category[]" : 'Select Category',
                post_title: {
                    required: 'Enter Post Title',
                    maxlength: 'Post Title Maximum Length 255 Character',
                },
            },
            submitHandler: function() {
                let data = new FormData();
                let form = $("#frmUserPost").serializeArray();

                $.each(form,function (key,val){
                    data.append(val.name,val.value);
                });

                $.ajax({
                    type:'POST',
                    url: '{{url("userPost-store")}}',
                    data:data,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success:function(response){
                        if(response.status){
                            window.location.href = '{{url("userPost")}}';
                        } else  {
                            $(".alert-danger").empty();
                            jQuery.each(response.errors, function(key, value){
                                jQuery('.alert-danger').show();
                                jQuery('.alert-danger').append('<p>'+value+'</p>');
                            });
                        }
                    },
                    error: function(response){
                        console.log("error");
                    }
                });
            }
        });
    </script>
@endsection
