@extends('layouts.app')

@section('content')

@session('success')
    <div class="alert alert-success" role="alert"> 
        {{ $value }}
    </div>
@endsession

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h4>CEP-UR Nyarugenge Roles Potal/ Show role</h4>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary pull-right" href="{{ route('roles.index') }}"> Back</a>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $role->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Permissions:</strong>
                        @if(!empty($rolePermissions))
                            @foreach($rolePermissions as $v)
                                <label class="label label-success">{{ $v->name }},</label>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection