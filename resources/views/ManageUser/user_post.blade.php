@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumb-->
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title">User Posts</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body" id="postTable">
                            <div class="table-responsive">
                                <table class="table data-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Post Title</th>
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
            <div class="overlay toggle-menu"></div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax : {
                type: 'get',
                url: "{{ url('user-posts') }}",
                data: { 'userId' : '62a5ef61f870000017000982'}
            },
            columns: [
                {data: '_id', name: '#'},
                {data: 'title', name: 'title'},
            ]
        });
    </script>
@endsection
