@extends('layouts.dashboard-layout')
@section('Content')
    <div id="layoutSidenav_nav">
        @include('admin.routes.sidenave')
    </div>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <div class="card shadow mb-4" style="border: 1px solid #ddd;">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">User Data Entry</h6>
                </div>
            </div>

            <form action=
            "{{ route('record.store') }}" method="POST" id="user-form"
                style="padding: 20px; box-sizing: border-box; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;">
                @csrf

                <!-- Name Field -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" required
                        style="border: 1px solid #ccc; padding: 8px;">
                </div>

                <!-- Gender Field -->
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" name="gender" id="gender" required
                        style="border: 1px solid #ccc; padding: 8px;">
                        <option value="" disabled selected>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <!-- Role Selection -->
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select" name="role" id="role" required
                        style="border: 1px solid #ccc; padding: 8px;">
                        <option value="" disabled selected>Select Role</option>
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                        <option value="support">Support Staff</option>
                    </select>
                </div>

                <!-- Conditional Fields -->

                <!-- Student Fields -->
                <div id="student-fields" class="conditional-fields" style="display: none;">
                    <div class="mb-3">
                        <label for="class" class="form-label">Class</label>
                        <select class="form-select" name="class_id" id="class"
                            style="border: 1px solid #ccc; padding: 8px;">
                            <option value="" disabled selected>Select Class</option>
                            @foreach ($class as $val)
                                <option value="{{ $val->id }}">{{ $val->class }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Support Staff Fields -->
                <div id="support-fields" class="conditional-fields" style="display: none;">
                    <div class="mb-3">
                        <label for="support" class="form-label">Support Role</label>
                        <select class="form-select" name="support" id="support"
                            style="border: 1px solid #ccc; padding: 8px;">
                            <option value="" disabled selected>Select Support Role</option>
                            @foreach ($staff as $val)
                                <option value="{{ $val->support }}">{{ $val->support }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <!-- Phone and Email Fields -->
                <div class="mb-3">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" name="dob" id="dob" required
                        style="border: 1px solid #ccc; padding: 8px;">
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" required
                        style="border: 1px solid #ccc; padding: 8px;">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" required
                        style="border: 1px solid #ccc; padding: 8px;">
                </div>

                <!-- Submit Button -->
                <div class="mb-3">
                    <input type="submit" value="Save" class="btn btn-success"
                        style="padding: 10px 20px; border-radius: 4px;">
                </div>
            </form>
        </div>
    </div>

    <!-- jQuery Integration -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#role').change(function() {
                // Hide all conditional fields initially
                $('.conditional-fields').hide();

                // Get the selected role
                const role = $(this).val();

                // Show fields based on the selected role
                if (role === 'student') {
                    $('#student-fields').show();
                } else if (role === 'support') {
                    $('#support-fields').show();
                }
            });

            // Optional: Add validation to ensure the required fields for each role are filled before submission
            $('#user-form').submit(function(e) {
                const role = $('#role').val();
                let isValid = true;

                if (role === 'student' && !$('#class').val()) {
                    alert('Class field is required for students.');
                    isValid = false;
                }

                if (role === 'support' && !$('#support').val()) {
                    alert('Support Role field is required for support staff.');
                    isValid = false;
                }

                if (!isValid) e.preventDefault();
            });
        });
    </script>
@endsection
