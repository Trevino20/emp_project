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

            <!-- Heading -->
            <h1 class="mb-4">Student Details</h1> <!-- This is your heading -->

            <table class="table table-striped table-bordered">

                <tr>
                    <th width="80px">Name :</th>
                    <td>{{ $student->name }}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{ $student->email }}</td>
                </tr>
                <tr>
                    <th>DOB :</th>
                    <td>{{ $student->dob }}</td>
                </tr>
                <tr>
                    <th>Desig :</th>
                    <td>{{ $student->desig }}</td>
                </tr>
                <tr>
                    <th>Gender:</th>
                    <td>{{ $student->gender }}</td>
                </tr>
                <tr>
                    <th>Phone:</th>
                    <td>{{ $student->phone }}</td>
                </tr>
            </table>

            <a href="{{ route('student.table') }}" class="btn btn-danger">Back</a>

        </div>
    </div>
@endsection
