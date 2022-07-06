@extends('cms.layout')

@section('title', 'Categories')
@section('page-large-name', 'Categories')
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
                                            <th style="width: 10px" >#</th>
                                            <th>Name</th>

                                            <th>Active</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Settings</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->title }}</td>

                                                <td>
                                                    <span
                                                        class="badge @if ($category->active) bg-success @else  bg-danger @endif ">{{ $category->is_active }}</span>
                                                </td>
                                                <td>{{ $category->created_at->format('y-m-d H:ma') }}</td>
                                                <td>{{ $category->updated_at->format('y-m-d H:ma') }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('categories.edit', $category->id) }}"
                                                            class="btn btn-info">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <form method="post"
                                                            action="{{ route('categories.destroy',$category->id )}}">
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
                                    </tbody>
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
<script>

    @if (session()->has('message'))
        toastr.success('{{session()->get('message') }}')
    @endif
</script>
@endsection
