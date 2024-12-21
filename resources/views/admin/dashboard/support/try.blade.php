@extends('layouts.dashboard-layout')
@section('Content')
    <!-- Sidebar -->
    <div id="layoutSidenav_nav">
        @include('admin.routes.sidenave')
    </div>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->

    <div id="content-wrapper" class="d-flex flex-column">

        <head>
            <title>Employee Table</title>
            <!-- Required meta tags -->
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

            <!-- Bootstrap CSS v5.2.1 -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
        </head>

        <body>
            <div class="container py-5">
                <div class="table-responsive">
                    <table class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Support</th>
                                <th>Gender</th>
                                <th>Date of Birth</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
            <!-- Bootstrap JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
            <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

            <script type="text/javascript">
                $(document).ready(function() {
                    $('.datatable').DataTable({
                        processing: true,
                        serverSide: true,
                        destroy: true,
                        ajax: {
                            url: '{{ route('emp.index') }}',
                            type: 'GET',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        },
                        columns: [{
                                data: 'id',
                                name: 'id'
                            },
                            {
                                data: 'name',
                                name: 'name'
                            },
                            {
                                data: 'desig',
                                name: 'desig'
                            },
                            {
                                data: 'support',
                                name: 'support'
                            },
                            {
                                data: 'dob',
                                name: 'dob'
                            },
                            {
                                data: 'gender',
                                name: 'gender'
                            },
                            {
                                data: 'phone',
                                name: 'phone'
                            }
                        ]
                    });
                });
            </script>

        </body>

        </html>
    @endsection
