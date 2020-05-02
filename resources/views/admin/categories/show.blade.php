@extends('basic.admin')
@section('title', 'Category details')
@section('subtitle')
    <li class="breadcrumb-item"><a href="{{route('admin.category.index')}}">Categories</a></li>
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
<!-- Default box -->
<div id="apicategory">
    <span style="display: none" id="edit">{{$edit}}</span>
    <span style="display: none" id="auxName">{{$category->name}}</span>
    <span></span>
    <form>
        @csrf
        @method('put')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Category Management</h3>
                 <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
            </div>

            <div class="card-body">
                 <div class="form-group">
                    <label for="name">Nombre</label>
                    <input readonly v-model="name"
                            value="{{$category->name}}"
                            @blur="getCategory"
                            @focus="div_visibility = true"
                            class="form-control" type="text" name="name" id="name" >
                    <label for="slug">Slug</label>
                    <input readonly v-model="generateSlug"  class="form-control" type="text" name="slug" id="slug" value="{{$category->slug}}" >

                    <label for="description">Slug</label>
                    <textarea readonly class="form-control" type="text" name="description" id="description" cols="30" rows="5">{{$category->description}}</textarea>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a class="btn btn-outline-info float-left" href="{{route('admin.category.index')}}">Back</a>
                <a class="btn btn-outline-success float-right" href="{{route('admin.category.edit', $category->slug)}}">Edit</a>

            </div>
            <!-- /.card-footer-->
        </div>
    </form>
</div>
@endsection
