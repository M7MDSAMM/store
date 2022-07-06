@extends('cms.layout')

@section('title','DEMO')
@section('page-large-name','DEMO')
@section('page-small-name','Demo')

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
                        <h3 class="card-title">Create Category</h3>
                    </div>

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{route('categories.update',$category->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">


                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" @if(old('title')) value="{{old('title')}}" @else
                                    value="{{$category->title}}" @endif name="title" id="title" placeholder="Enter Title">
                            </div>


                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="active" id="active"
                                        @if($category->active) checked @endif>
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

@section('js')
<script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error('{{ $error }}');
        @endforeach
    @endif

    
</script>
@endsection
