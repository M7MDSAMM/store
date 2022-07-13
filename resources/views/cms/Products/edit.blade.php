@extends('cms.layout')

@section('title','DEMO')
@section('page-large-name','Products')
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
                        <h3 class="card-title">Create Category</h3>
                    </div>

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{route('products.update',$product->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">


                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" @if(old('title')) value="{{old('title')}}" @else
                                    value="{{$product->title}}" @endif name="title" id="title" placeholder="Enter Title">
                            </div>


                            <label for="exampleInputFile">Product Image</label>
                            <div class="form-group">
                                <!-- <label for="customFile">Custom File</label> -->

                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="customFile">
                                  <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                              </div>
                            <br>

                            <label for="new-price">Price</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" id="new-price" value="{{$product->new_price}}" name="new_price" placeholder="Enter The Product Price" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" value="{{$product->description}}"
                                    name="description" id="description" placeholder="Enter description">
                            </div>

                            <div class="form-group">
                                <label for="skv">SKU</label>
                                <input type="text" class="form-control" value="{{$product->skv}}"
                                    name="skv" id="skv" placeholder="Enter The Product SKU">
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="in_stock" id="in-stock"
                                        @if($product->in_stock) checked @endif>
                                    <label class="custom-control-label" for="in-stock">In Stock</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleSelectRounded0">Product's Category</label>
                                <select class="custom-select rounded-0" id="exampleSelectRounded0" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" @if($category->id == $product->category_id) selected
                                            @endif>{{$category->title}}</option>
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
