@extends('backend.dashboard')

@section('main')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card shadow mb-4">
                            <div class="card-header">
                                <strong class="card-title">Edit Information</strong>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" method="POST" action="{{ route('update.info') }}" novalidate>
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $info->id }}">

                                    <div class="form-group mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" value="{{ $info->name }}" name="name" id="name" class="form-control" placeholder="Enter your Name" required>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-8 mb-3">
                                            <label for="email">Email address</label>
                                            <input type="email" value="{{ $info->email }}" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="phone">Phone Number</label>
                                            <input class="form-control input-phoneus" value="{{ $info->phone }}" name="phone" id="phone" maxlength="14" required>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="address">Address</label>
                                        <input type="text" value="{{ $info->address }}" name="address" id="address" class="form-control" placeholder="Enter your address" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="city">City</label>
                                        <input type="text" value="{{ $info->city }}" name="city" id="city" class="form-control" placeholder="Enter your city" required>
                                    </div>

                                    <button class="btn btn-primary" type="submit">Save</button>
                                </form>
                            </div> <!-- /.card-body -->
                        </div> <!-- /.card -->
                    </div> <!-- /.col -->
                </div> <!-- end section -->
            </div> <!-- /.col-12 col-lg-10 col-xl-10 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main>
@endsection
