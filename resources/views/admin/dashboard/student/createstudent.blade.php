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
                    <h6 class="m-0 font-weight-bold text-primary">Student Registration</h6>
                </div>
            </div>

            <!-- Main Content -->
            <form action="{{ route('store.student') }}" method="POST" style="padding: 20px; box-sizing: border-box;">
                @csrf
                <!-- Name Field -->
                <div class="mb-3" style="margin-bottom: 15px; padding: 10px; box-sizing: border-box;">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" required style="padding: 10px; box-sizing: border-box;">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Designation Field (Fixed as Student) -->
                <input type="hidden" name="desig" value="Student">

                <!-- Gender Field -->
                <div class="mb-3" style="margin-bottom: 15px; padding: 10px; box-sizing: border-box;">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select @error('gender') is-invalid @enderror" name="gender" id="gender" required style="padding: 10px; box-sizing: border-box;">
                        <option value="" disabled selected>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    @error('gender')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Class Dropdown -->
                <div class="mb-3" style="margin-bottom: 15px; padding: 10px; box-sizing: border-box;">
                    <label for="class" class="form-label">Class</label>
                    <select class="form-select @error('class') is-invalid @enderror" name="class" id="class" required style="padding: 10px; box-sizing: border-box;">
                        <option value="" disabled selected>Select Class</option>
                        @foreach(range(1, 10) as $class)
                            <option value="{{ $class }}">{{ $class }}</option>
                        @endforeach
                    </select>
                    @error('class')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Date of Birth Field -->
                <div class="mb-3" style="margin-bottom: 15px; padding: 10px; box-sizing: border-box;">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" id="dob" required style="padding: 10px; box-sizing: border-box;">
                    @error('dob')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Phone Field -->
                <div class="mb-3" style="margin-bottom: 15px; padding: 10px; box-sizing: border-box;">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" required style="padding: 10px; box-sizing: border-box;">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="mb-3" style="margin-bottom: 15px; padding: 10px; box-sizing: border-box;">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" required style="padding: 10px; box-sizing: border-box;">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="mb-3" style="padding: 10px; box-sizing: border-box;">
                    <input type="submit" value="Save" class="btn btn-success" style="padding: 10px 20px; margin-top: 20px;">
                </div>

            </form>

        </div>
    </div>
@endsection
