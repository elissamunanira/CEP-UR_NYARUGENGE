@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        {{-- <div class="pull-left">
            <h2>Role Management</h2>
        </div> --}}
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success btn-sm mb-2" href="{{ route('roles.create') }}"><i class="fa fa-plus"></i> Create New Role</a>
            @endcan
        </div>
    </div>
</div>

@session('success')
    <div class="alert alert-success" role="alert"> 
        {{ $value }}
    </div>
@endsession

<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h4>CEP-UR Nyarugenge Roles Potal</h4>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="100px">No</th>
                            <th>Name</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{ route('roles.show',$role->id) }}"><i class="fa-solid fa-list"></i> Show</a>
                                @can('role-edit')
                                    <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                @endcan
                    
                                @can('role-delete')
                                <form method="POST" action="{{ route('roles.destroy', $role->id) }}" style="display:inline">
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