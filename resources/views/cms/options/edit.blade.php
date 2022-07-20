@extends('cms.layout')

@section('title','Options')
@section('page-large-name','Options')
@section('page-small-name','Edit')

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
                        <h3 class="card-title">Edit Option</h3>
                    </div>

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{route('options.update',$option->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">


                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" @if(old('name')) value="{{old('name')}}" @else
                                    value="{{$option->name}}" @endif name="name" id="name" placeholder="Enter Name">
                            </div>

                            <br>

                            <label for="price">Price</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" id="price" value="{{$option->price}}" name="price" placeholder="Enter The option Price" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="exampleSelectRounded0">Option's Atribute</label>
                                <select class="custom-select rounded-0" id="exampleSelectRounded0" name="atribute_id">
                                    @foreach ($atributes as $atribute)
                                        <option value="{{$atribute->id}}" @if($atribute->id == $option->atribute_id) selected
                                            @endif>{{$atribute->name}}</option>
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

</script>
@endsection
