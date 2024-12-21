@extends('layouts.dashboard-layout')
@section('Content')
    <!-- Sidebar -->
    <div id="layoutSidenav_nav">
        @include('admin.routes.sidenave') <!-- Assuming this is where the sidebar is included -->
    </div>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <head>
            <title>Student Table</title>
            <!-- Bootstrap CSS v5.2.1 -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
            <style>
                /* Custom styles */
                .table-responsive {
                    margin: 30px 0;
                    border: 2px solid #ddd;
                    border-radius: 10px;
                    padding: 20px;
                    background-color: #f9f9f9;
                }

                table {
                    border-collapse: collapse;
                    width: 100%;
                    font-size: 14px;
                }

                table th,
                table td {
                    padding: 15px;
                    text-align: left;
                    border-bottom: 1px solid #ddd;
                }

                table th {
                    background-color: #007bff;
                    color: white;
                }

                table tr:nth-child(even) {
                    background-color: #f2f2f2;
                }

                table tr:hover {
                    background-color: #c79898;
                }

                .container {
                    margin-top: 0px;
                }

                .hover-box {
                    display: inline-block;
                    padding: 6.5px;
                    background-color: rgb(240, 169, 169);
                    border-radius: 5px;
                    transition: background-color 0.3s ease;
                }

                .hover-box:hover {
                    background-color: rgb(113, 113, 255);
                }

                .custom-link {
                    color: white;
                    /* Default font color */
                    text-decoration: underline;
                    /* Underline text */
                }

                .custom-link:hover {
                    color: yellow;
                    /* Change font color on hover */
                    text-decoration: underline;
                }
            </style>
        </head>

        <body>
            <!-- Dropdowns and Filters Section -->
            <div class="container py-5">
                <!-- Add Student Button -->


                <!-- Data Table Section -->
                <div class="table-responsive">
                    <div class="row">

                        <div class="col-xl-8 d-flex align-items-center gap-3 px-4 py-3">
                            <div class="col-sm-3">
                                <select name="gender" class="form-control" id="gender_dropdown">
                                    <option value=""> Select Gender</option>
                                    @foreach ($student as $val)
                                        <option value="{{ $val->gender }}">{{ $val->gender }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select name="Class" class="form-control" id="Class_dropdown">
                                    <option value="">Select Class</option>
                                    @foreach ($class as $val)
                                        <option value="{{ $val->class }}">{{ $val->class }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="button" name="refresh" id="refresh"
                                class="btn btn-primary ms-4">Refresh</button>

                            <div class="hover-box">
                                <a href={{-- "{{ route('student.create') }}" --}} class="btn btn-success ms-4">Add
                                    Student</a>
                            </div>

                        </div>
                    </div>

                    <table class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Class</th>
                                <th>DOB</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </body>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('.datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('student.view') }}',
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'gender',
                            name: 'gender'
                        },
                        {
                            data: 'class',
                            name: 'class'
                        },
                        {
                            data: 'dob',
                            name: 'dob'
                        },
                        {
                            data: 'phone',
                            name: 'phone'
                        }
                    ]
                });

                // Filter based on gender
                $('#gender_dropdown').change(function() {
                    table.column(2).search(this.value).draw();
                });

                // Filter based on class
                $('#Class_dropdown').change(function() {
                    table.column(3).search(this.value).draw();
                });

                // Refresh button functionality
                $('#refresh').click(function() {
                    $('#gender_dropdown').val('');
                    $('#Class_dropdown').val('');
                    table.search('').columns().search('').draw();
                });
            });
        </script>

    </div>
@endsection
