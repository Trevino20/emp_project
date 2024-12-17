@extends('layouts.dashboard-layout')
@section('Content')
    <!-- Sidebar -->
    <div id="layoutSidenav_nav">
        @include('admin.routes.sidenave')
    </div>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">



            <table class="table table-striped table-bordered">



                <tr>
                    <th width="80px">Name :</th>
                    <td>{{ $teachers->name }}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{ $teachers->email }}</td>
                </tr>
                <tr>
                    <th>DOB :</th>
                    <td>{{ $teachers->dob }}</td>
                </tr>
                <tr>
                    <th>Desig :</th>
                    <td>{{ $teachers->desig }}</td>
                </tr>
                <tr>
                    <th>Gender:</th>
                    <td>{{ $teachers->gender }}</td>
                </tr>
                <tr>
                    <th>Phone:</th>
                    <td>{{ $teachers->phone }}</td>
                </tr>
            </table>

            <a href="{{ route('student.table') }}" class="btn btn-danger">Back</a>



        </div>
    </div>
@endsection
