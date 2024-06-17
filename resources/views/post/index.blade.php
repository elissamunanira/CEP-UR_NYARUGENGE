@extends('layouts.app')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h4>CEP-UR Nyarugenge Posts Potal</h4>
            </div>
            <div class="table-responsive">
                <table class="table" id = "cep">
                    <thead>
                        <tr>
                            <th width="100px">No</th>
                            <th>Title</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $post->title }}</td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{ route('posts.show',$post->id) }}"><i class="fa-solid fa-list"></i> Show</a>
                                @can('post-edit')
                                    <a class="btn btn-primary btn-sm" href="{{ route('posts.edit',$post->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                @endcan
                    
                                @can('post-delete')
                                <form method="POST" action="{{ route('posts.destroy', $post->id) }}" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                    
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection