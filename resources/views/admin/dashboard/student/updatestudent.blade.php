@extends('layouts.dashboard-layout')
@section('Content')
    <!-- Sidebar -->
    <div id="layoutSidenav_nav">
        @include('admin.routes.sidenave')
    </div>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column" style="padding: 20px; margin: 20px;">

        <!-- Main Content -->
        <div id="content">

            <!-- Form Heading -->
            <h2 class="mb-4" style="text-align: center; color: #28a745;"> Update Student Information</h2>

            <form action="{{ route('update.student', $student->id) }}"
                 method="POST"
                style="padding: 30px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;">

                @csrf
                @method('PUT')
                <!-- Name Field -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" value="{{ $student->name }}" class="form-control" name="name" id="name"
                        required style="padding: 10px;">
                </div>

                <!-- Designation Field -->
                <div class="mb-3">
                    <label for="designation" class="form-label">Designation</label>
                    <input type="text" class="form-control" value="{{ $student->desig }}" name="desig" id="desig"
                        required style="padding: 10px;">
                </div>

                <!-- Gender Field -->
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" name="gender" value="{{ $student->gender }}" id="gender" required
                        style="padding: 10px;">
                        <option value="{{ $student->gender }}">{{ $student->gender }}</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <!-- Date of Birth Field -->
                <div class="mb-3">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" value="{{ $student->dob }}" name="dob" id="dob"
                        required style="padding: 10px;">
                </div>

                <!-- Phone Field -->
                <div class="mb-3">
                    <label for="phone" class="form-label" value="{{ $student->phone }}">Phone</label>
                    <input type="text" class="form-control" value="{{ $student->phone }}" name="phone" id="phone"
                        required style="padding: 10px;">
                </div>

                <!-- Email Field -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" value="{{ $student->email }}" name="email" id="email"
                        required style="padding: 10px;">
                </div>

                <!-- Submit Button -->
                <div class="mb-3" style="text-align: center;">
                    <input type="submit" value="Save" class="btn btn-success"
                        style="padding: 10px 20px; margin-top: 20px;">
                </div>

            </form>
        </div>
    </div>
@endsection
