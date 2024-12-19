<!doctype html>
<html lang="en">

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
        <div class="row">
        </div>
    </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Phone</th>
                </tr>
            </thead>

            {{-- <tbody>
                @foreach ($support as $val)
                    <tr>
                        <td>{{ $val->id }}</td>
                        <td>{{ $val->name }}</td>
                        <td>{{ $val->support }}</td>
                        <td>{{ $val->gender }}</td>
                        <td>{{ $val->dob }}</td>
                        <td>{{ $val->phone }}</td>

                    </tr>
                @endforeach
            </tbody> --}}



        </table>
    </div>

    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Bootstrap JavaScript Libraries -->


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
                    type: "GET",
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                },

            });

        });
    </script>



</body>

</html>
