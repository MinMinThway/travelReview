@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User Listing</h1>
          </div><!-- /.col -->
          {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="nav-item">
                @auth
                    <a href="{{ route('logout') }}" class="btn btn-success">Logout</a>
                @endauth
                </li>
            </ol>
          </div><!-- /.col --> --}}
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
                  <a href="{{ route('admin.user.create') }}" class="btn btn-success mb-3">Add User+</a>
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
                            <td>Email</td>
                            <td>Role</td>
                            <td>Action</td>
                        </tr>
                      </thead>
                      <tbody>
                          @php
                              $i = 1;
                          @endphp
                       @foreach ($users as $user)
                           <tr>
                               <td>{{ $i++ }}</td>
                               <td>{{ $user->name }}</td>
                               <td>{{ $user->email }}</td>
                               <td>{{ $user->role == 1 ? "admin" : "user" }}</td>
                               <td>
                                   <a href="{{ route('admin.user.edit', $user->id) }}"><i class="fas fa fa-edit text-warning"></i></a>
                                   <form action="{{url('admin/user/'.$user->id)}}" class="d-inline" method="POST">
                                        @csrf {{method_field('DELETE')}}
                                        <button class="btn"><i class="fas  fa-trash-alt text-danger"></i></button>
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
