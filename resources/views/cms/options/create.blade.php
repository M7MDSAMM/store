@extends('cms.layout')

@section('name', 'Options')
@section('page-large-name', 'Options')
@section('page-small-name', 'Create')

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
                            <h3 class="card-name">Create Option</h3>
                        </div>

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{{ route('options.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" value="{{ old('name') }}" name="name"
                                        id="name" placeholder="Enter Nmae">
                                </div>
                                <label for="price">Price</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="number" id="price" name="price"
                                        placeholder="Enter The Option Price" class="form-control">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">Option's Atribute</label>
                                    <select class="custom-select rounded-0" id="exampleSelectRounded0" name="atribute_id">
                                        @foreach ($atributes as $atribute)
                                            <option value="{{ $atribute->id }}">{{ $atribute->name }}</option>
                                        @endforeach

                                    </select>
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

@section('js')
    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}');
            @endforeach
        @endif

        @if (session()->has('message'))
            toastr.success('{{ session()->get('message') }}')
        @endif
    </script>
@endsection
