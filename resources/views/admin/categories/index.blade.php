@extends('basic.admin')
@section('title', 'Welcome to categories')
@section('subtitle')
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')

  <!-- /.row -->
  <span style="display: none" id="url_to_delete" >{{route('admin.category.index')}}</span>
    <div id="confirmdelete" class="row">
        @include('custom.deleteModal')
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Categories Section</h3>
                    <div class="card-tools">
                        <form>
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="name" class="form-control float-right" placeholder="Search"
                                value="{{request()->get('name')}}">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table class="table table-head-fixed">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Created on</th>
                            <th>Last update</th>
                            <th colspan="3"> <a class="mr-4 btn btn-outline-primary float-right" href="{{route('admin.category.create')}}">New</a></th>
                        </tr>
                        </thead>
                        <tbody>
                         @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->slug}}</td>
                            <td><span class="tag tag-warning">{{$category->description}}</span></td>
                            <td>{{$category->created_at}}</td>
                            <td>{{$category->updated_at}}</td>
                            <td><a class="btn btn-default" href="{{route('admin.category.show',$category->slug)}}"><i class="far fa-eye"></i></a></td>
                            <td><a class="btn btn-info" href="{{route('admin.category.edit',$category->slug)}}"><i class="fas fa-edit"></i></a></td>
                            <td>
                                <a class="btn btn-danger" href="{{route('admin.category.destroy',$category->id)}}"
                                   data-toggle="modal" data-target="#deleteModal"
                                v-on:click.prevent="toConfirmDelete({{$category->id}})">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="container ml-2">
                        {{$categories->appends($_GET)->links()}}
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
