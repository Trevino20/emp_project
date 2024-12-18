@extends('layouts.dashboard-layout')

@section('Content')
    <div id="layoutSidenav_nav">
        @include('admin.routes.sidenave')
    </div>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <div class="row">
                <div class="col-8">
                    @if (session('success'))
                        <div class="alert alert-success" style="background-color: green; color: white;">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Student DataTable</h6>
            </div>
            <div class="card-body">
                <a href="
                {{-- {{ route('students.create') }} --}}
                 " 
                 class="btn btn-success btn-sm md-3">Add New</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Gender</th>
                                <th>Date of Birth</th>
                                <th>Phone</th>
                                {{-- <th>Update</th>
                                <th>Delete</th>
                                <th>View</th> --}}
                            </tr>
                        </thead>
                        {{-- <tbody>
                            @foreach ($staff as $val)
                                <tr>
                                    <td>{{$val->id}}</td>
                                    <td>{{$val->name}}</td>
                                    <td>{{$val->support}}</td>
                                    <td>{{$val->gender}}</td>
                                    <td>{{$val->dob}}</td>
                                    <td>{{$val->phone}}</td>
                                    {{-- <td>Update</td>
                                    <td>Update</td>
                                    <td>Update</td> --}}
                                
                                {{-- </tr>
                            @endforeach
                        </tbody> --}}
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTable').DataTable({
                serverSide:true,
                processing: true,
                // pageLength: 5,
                ajax:{
                    url: '{{route("staff.table")}}',
                }
            });
        });
    </script>
@endsection
