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
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Teachers DataTable</h6>
            </div>
            <div class="card-body">
                <a href="{{ route('colleges.create') }}" class= "btn btn-success btn-sm md-3" color="blue"> Add
                    New</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Desig</th>
                                <th>Gender</th>
                                <th>Class</th>
                                <th>DOB</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Update</th>
                                <th>Delete</th>
                                <th>View</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->desig }}</td>
                                    <td>{{ $student->gender }}</td>
                                    <td>{{ $student->class }} <sup>th</sup></td>
                                    <td>{{ $student->dob }}</td>
                                    <td>{{ $student->phone }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td><a href="{{ route('colleges.show', $student->id) }}"
                                            class="btn btn-primary btn-sm">View</a></td>
                                    <td>
                                        <form action="{{ route('colleges.destroy', $student->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                    <td><a href="{{ route('colleges.edit', $student->id) }}"
                                            class="btn btn-warning btn-sm">Update</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No teachers available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    </div>

    <!-- DataTable Initialization Script -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "pageLength": 5
            });
        });
    </script>
@endsection
