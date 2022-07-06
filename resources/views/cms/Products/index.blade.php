@extends('cms.layout')

@section('title', 'products')
@section('page-large-name', 'products')
@section('page-small-name', 'Index')

@section('styles')

@endsection

@section('content')

    <div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Bordered Table</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Old Price</th>
                                            <th>New Price</th>
                                            <th>Description</th>
                                            <th>SKV</th>
                                            <th>In Stock</th>
                                            <th>Category Name</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Settings</th>
                                        </tr>
                                    </thead>
                                    {{-- <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->title }}</td>
                                                <td>{{ $product->image }}</td>
                                                <td>{{ $product->old_price }}</td>
                                                <td>{{ $product->new_price }}</td>
                                                <td>{{ $product->description }}</td>
                                                <td>{{ $product->SKV }}</td>
                                                <td>
                                                    <span
                                                        class="badge @if ($product->in_stock) bg-success @else  bg-danger @endif ">{{ $category->is_active }}</span>
                                                </td>


                                                <td>{{ $product->created_at->format('y-m-d H:ma') }}</td>
                                                <td>{{ $product->updated_at->format('y-m-d H:ma') }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('products.edit', $product->id) }}"
                                                            class="btn btn-info">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <form method="post"
                                                            action="{{ route('products.destroy',$product->id )}}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody> --}}
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    
@endsection

@section('js')

@endsection
