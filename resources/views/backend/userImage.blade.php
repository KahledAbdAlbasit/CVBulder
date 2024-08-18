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
                        <strong class="card-title">Image</strong>
                        <button class="btn btn-primary" type="submit"><a href="{{route('cv')}}">Skip </a></button>

                    </div>
                    <div class="card-body">
                        <form class="needs-validation" method="POSt" enctype="multipart/form-data" action="{{route('save.image')}}" novalidate>
                            @csrf
                            <div class="form-group">
                                <label for="imageInput">Choose Image</label>
                                <input type="file" name="image" class="form-control" id="imageInput" accept="image/*">
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
