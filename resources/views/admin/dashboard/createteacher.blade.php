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

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Teachers DataTable</h6>
                </div>
            </div>

            <!-- Main Content -->
            <form action="{{ route('colleges.store') }}" method="POST" style="padding: 20px; box-sizing: border-box;">
                @csrf
                <!-- Name Field -->
                <div class="mb-3" style="margin-bottom: 15px; padding: 10px; box-sizing: border-box;">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" required
                        style="padding: 10px; box-sizing: border-box;">
                </div>

                <!-- Designation Field -->
                <div class="mb-3" style="margin-bottom: 15px; padding: 10px; box-sizing: border-box;">
                    <label for="designation" class="form-label">Designation</label>
                    <input type="text" class="form-control" name="desig" id="designation" required
                        style="padding: 10px; box-sizing: border-box;">
                </div>

                <!-- Gender Field -->
                <div class="mb-3" style="margin-bottom: 15px; padding: 10px; box-sizing: border-box;">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" name="gender" id="gender" required
                        style="padding: 10px; box-sizing: border-box;">
                        <option value="" disabled selected>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <!-- Date of Birth Field -->
                <div class="mb-3" style="margin-bottom: 15px; padding: 10px; box-sizing: border-box;">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" name="dob" id="dob" required
                        style="padding: 10px; box-sizing: border-box;">
                </div>

                <!-- Phone Field -->
                <div class="mb-3" style="margin-bottom: 15px; padding: 10px; box-sizing: border-box;">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" required
                        style="padding: 10px; box-sizing: border-box;">
                </div>

                <!-- Email Field -->
                <div class="mb-3" style="margin-bottom: 15px; padding: 10px; box-sizing: border-box;">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" required
                        style="padding: 10px; box-sizing: border-box;">
                </div>

                <!-- Submit Button -->
                <div class="mb-3" style="padding: 10px; box-sizing: border-box;">
                    <input type="submit" value="Save" class="btn btn-success"
                        style="padding: 10px 20px; margin-top: 20px;">
                </div>

            </form>


        </div>
    </div>
@endsection
