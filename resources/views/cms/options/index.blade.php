@extends('cms.layout')

@section('title', 'Options')
@section('page-large-name', 'Options')
@section('page-small-name', 'Index')

@section('styles')

@endsection

@section('content')

    <div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    @foreach ($atributes as $atribute)


                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ $atribute->name }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Settings</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($options as $option)
                                        {{-- {{ dd(Storage::url('products/' . $product->image) ) }} --}}
                                        @if ($atribute->id == $option->atribute_id)

                                            <tr>
                                                <td>{{ $option->id }}</td>
                                                <td>{{ $option->name }}</td>
                                                <td>{{ $option->price }}</td>
                                                <td>{{ $option->created_at->format('y-m-d H:ma') }}</td>
                                                <td>{{ $option->updated_at->format('y-m-d H:ma') }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('options.edit', $option->id) }}"
                                                            class="btn btn-info">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <form method="post"
                                                            action="{{ route('options.destroy', $option->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endif

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>


@endsection

@section('js')

    <script>
        @if (session()->has('message'))
            toastr.success('{{ session()->get('message') }}')
        @endif
    </script>
@endsection
