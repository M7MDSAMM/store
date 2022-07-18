@extends('cms.layout')

@section('title', 'Atributes')
@section('page-large-name', 'Atributes')
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
                                        @foreach ($atributes as $atribute)
                                            <tr>
                                                <td>{{ $atribute->id }}</td>
                                                <td>{{ $atribute->name }}</td>

                                                <td>
                                                    <span
                                                        class="badge @if ($atribute->active) bg-success @else  bg-danger @endif ">{{ $atribute->is_active }}</span>
                                                </td>
                                                <td>{{ $atribute->created_at->format('y-m-d H:ma') }}</td>
                                                <td>{{ $atribute->updated_at->format('y-m-d H:ma') }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('atributes.edit', $atribute->id) }}"
                                                            class="btn btn-info">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <form method="post"
                                                            action="{{ route('atributes.destroy',$atribute->id )}}">
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
