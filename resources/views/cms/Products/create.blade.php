@extends('cms.layout')

@section('name','Categories')
@section('page-large-name','Create')
@section('page-small-name','Categories')

@section('styles')

@endsection

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-name">Create Category</h3>
                    </div>

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{route('products.store')}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" value="{{old('title')}}" name="title" id="title"
                                    placeholder="Enter title">
                            </div>


                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="active" id="active"
                                        checked>
                                    <label class="custom-control-label" for="active">Active</label>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

@section('scripts')

@endsection
