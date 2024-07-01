@extends ("layouts.app")

@section('content')
<div class="container">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>CEP-UR Nyarugenge Posts Portal</h4>
                </div>

                <form action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" value="{{ $post->title }}" class="form-control" placeholder="Title">
                    </div>

                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea id="editor" name="body" class="ckeditor form-control" placeholder="Body">{{ $post->body }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="cover_image">Featured Image</label>
                        <input type="file" name="cover_image">
                    </div>
                    <div class="form-group">
                        <label for="categories">Categories</label>
                        <select name="categories[]" id="categories" class="form-control" multiple>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{-- {{ $post->Category && $post->categories->contains($category->id) ? 'selected' : '' }} --}}
                                    >
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

