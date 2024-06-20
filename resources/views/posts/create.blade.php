@extends('layouts.app')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h4>CEP-UR Nyarugenge Posts Portal / Add New Post</h4>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- <div class="form-group">
                            <label for="branch_name">Category:</label>
                            <select name="branch_name" class="form-control">
                                <option value="">-- Select category --</option>
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="user_id">user_id</label>
                            <input type="text" name="user_id" class="form-control" placeholder="user_id">
                        </div>
                        <div class="form-group">
                            <label for="category_id">category_id</label>
                            <input type="text" name="category_id" class="form-control" placeholder="category_id">
                        </div> --}}
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea name="body" id="editor" class="ckeditor form-control" placeholder="Body"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="cover_image">Featured Image</label>
                            <input type="file" name="cover_image" class="form-control-file">
                        </div>
                        <input type="submit" name = "submit"value="Upload" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
