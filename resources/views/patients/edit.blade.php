@extends('dashboard.dashboard')

@section('custom-css')

@endsection

@section('main')

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">

            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Patient</h4>

                        {{-- Display validation errors if any --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('patients.update', $patient) }}">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name"
                                               value="{{ $patient->first_name }}" required>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                               value="{{ $patient->last_name }}" required>
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="date_of_birth">Date of Birth</label>
                                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                                               value="{{ $patient->date_of_birth }}" required>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="gender">Gender</label>
                                        <select class="form-control" id="gender" name="gender" required>
                                            <option value="Male" @if($patient->gender == 'Male') selected @endif>Male
                                            </option>
                                            <option value="Female" @if($patient->gender == 'Female') selected @endif>
                                                Female
                                            </option>
                                            <option value="Other" @if($patient->gender == 'Other') selected @endif>
                                                Other
                                            </option>
                                        </select>
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                               value="{{ $patient->email }}" required>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                               value="{{ $patient->phone }}" required>
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label for="address">Address</label>
                                        <textarea class="form-control" id="address" name="address" rows="4"
                                                  required>{{ $patient->address }}</textarea>
                                    </div>
                                </div><!-- Col -->

                            </div><!-- Row -->


                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" id="city" name="city"
                                               value="{{ $patient->city }}" required>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label for="state">State</label>
                                        <input type="text" class="form-control" id="state" name="state"
                                               value="{{ $patient->state }}" required>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label for="zip_code">Zip Code</label>
                                        <input type="text" class="form-control" id="zip_code" name="zip_code"
                                               value="{{ $patient->zip_code }}" required>
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <button type="submit" class="btn btn-primary">Update Patient</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection



@section('libraries')

@endsection


@section('scripts')
    <script>

    </script>
@endsection
