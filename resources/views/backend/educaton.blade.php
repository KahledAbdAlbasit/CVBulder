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
                        <strong class="card-title">Education Details</strong>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" method="POSt" action="{{route('save.eduo')}}" novalidate>
                            @csrf
                        <div class="form-group mb-3">
                            <label for="address-wpalaceholder">University/school</label>
                            <input type="text" name="eduName" id="address-wpalaceholder" class="form-control"
                            placeholder="Enter ...">

                        </div>

                        <div class="form-row">
                            <div class="col-md-8 mb-3">
                            <label for="exampleInputEmail2">Start date</label>
                            <input type="date" name="startDate" class="form-control" id="dateField" name="dateField" required>
                            </div>

                            <div class="col-md-4 mb-3">
                            <label for="custom-phone">End date</label>
                            <input type="date" name="endDate" class="form-control" id="dateField" name="dateField" required>

                            </div>
                        </div> <!-- /.form-row -->
                        <div class="form-group mb-3">
                            <label for="address-wpalaceholder">Select Kind of education</label>
                            <select name="level_id" class="form-control" id="exampleSelect">
                                @foreach ($Kind as $level)
                                    <option value="{{$level->id}}">{{$level->levelName}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="address-wpalaceholder">Filed/Position</label>
                            <input type="text" name="field" id="address-wpalaceholder" class="form-control"
                            placeholder="Enter ...">

                        </div>

                        <div class="form-group">
                                <label for="exampleFormControlTextarea1">Descripe what you have got</label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
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

    </main>@endsection
