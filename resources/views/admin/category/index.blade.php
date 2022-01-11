@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header mb-2">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Category Listing</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                  <a href="{{route('admin.category.create')}}" class="btn btn-success mb-3" id="cat">Create New</a>
                  @if (Session::get('msg'))
                    <div class="alert fade alert-simple alert-primary alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show div" role="alert" id="msg" data-brk-library="component__alert">
                      <button type="button" class="close font__size-18" data-dismiss="alert">
                              <span  aria-hidden="true"><i class="fa fa-times alertprimary"></i></span>
                              <span class="sr-only">Close</span>
                            </button>
                      <i class="start-icon fa fa-thumbs-up faa-bounce animated"></i>
                      {{Session::get('msg')}}
                    </div>
                  @endif
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <td>No</td>
                        <td>Name</td>
                        <td>Date</td>
                        <td>Action</td>
                      </tr>
                    </thead>
                     @php
                      $i = 1;
                     @endphp
                     <tbody>
                     @foreach ($categories as $cat)
                     <tr>
                      <td>{{$i++}}</td>
                      <td>{{$cat->name}}</td>
                      <td>{{ $cat->created_at->format('d/m/Y')}}</td>
                      <td>
                        <a href="{{route('admin.category.edit', $cat->id)}}" class="btn"><i class="fas fa-2x fa-edit text-warning"></i></a>
                       <form action="{{route('admin.category.destroy', $cat->id)}}" class="d-inline" method="POST">
                        @csrf {{method_field('DELETE')}}
                        <button class="btn"><i class="fas fa-2x fa-trash-alt text-danger"></i></button>
                       </form>
                      </td>
                    </tr>
                     @endforeach
                    </tbody>
                   </table>
                </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection
@section('js')
  <script>
    let msg = document.querySelector("#msg");
    setInterval(() => {
      msg.style.display="none";
    }, 1000);

  </script>
@endsection
