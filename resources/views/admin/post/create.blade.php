@extends('adminlte::page')

@section('title', 'Tạo Bài Viết Mới')

@section('content_header')
    <h1>Tạo Bài Viết Mới</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Tiêu đề:</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Nội dung:</label>
                <textarea id="editor" name="content" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>Danh mục:</label>
                <select name="category_id" class="form-control">
                    <option value="">Chọn danh mục</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Hình ảnh:</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Tạo bài viết</button>
        </form>
        <a href="{{ route('post.index') }}" class="btn btn-secondary mt-3">Quay lại</a>

    </div>
</div>

{{-- CKEditor --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.18.0/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor', { 
        height: 300,
        removePlugins: 'elementspath',
        resize_enabled: false
    });
</script>
@endsection
