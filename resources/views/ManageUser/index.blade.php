@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumb-->
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title">Manage User</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body" id="employeeTable">
                            <div class="table-responsive">
                                <table class="table data-table">
                                    <thead>
                                        <tr>
{{--                                            <th scope="col">#</th>--}}
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Contact</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">No. of Post</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--End Row-->
            <!--start overlay-->
            <div class="overlay toggle-menu"></div>
            <!--end overlay-->
        </div>
        <!-- End container-fluid-->
    </div><!--End content-wrapper-->
@endsection

@section('scripts')
    <script type="text/javascript">
        $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.index') }}",
            columns: [
                // {data: '_id', name: '#'},
                {data: 'first_name', name: 'first_name'},
                {data: 'last_name', name: 'last_name'},
                {data: 'contact', name: 'contact'},
                {data: 'email', name: 'email'},
                {data: 'user_post', name: 'user_post'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        $(document).on('click','.sendMail',function (){
            var id = $(this).attr('data-id');
            $.ajax({
                type : 'post',
                url : '{{url("send-welcome-mail")}}',
                data: {id: id, _token: '{{csrf_token()}}'},
                dataType : 'json',
                success : function (response){
                    alert(response.msg);
                }
            })
        });
    </script>
@endsection
