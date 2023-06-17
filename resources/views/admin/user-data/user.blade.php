@extends('layouts.app')
@section('content')
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>User Data</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item"><a href="{{ route('user-data') }}">User-data</a></li>
            </ol>
         </div>
      </div>
   </div>
</section>
{{-- @if($errors->any())
<button type="button" class="btn btn-success swalDefaultSuccess">{{$errors->first()}}</button>
@endif --}}

<div class="flash-message">
    @if (\Session::has('destroy'))
      <div class="alert alert-danger">
        <strong  data-dismiss="alert">Destroy! </strong>{!! \Session::get('destroy') !!}.
      </div>
    @endif
    @if (\Session::has('success'))
      <div class="alert alert-success alert-block" role="alert">
        <strong  data-dismiss="alert">Success! </strong>{!! \Session::get('success') !!}.
      </div>
    @endif
</div>


<div class="card">
  <div class="card-header">
    <h3 class="card-title"></h3>
    <a href="{{ route('user-data.create') }}"><button type="button" class="btn btn-block bg-gradient-primary btn-flat">Add Registration</button></a>
    {{-- <button type="button" class="btn btn-block bg-gradient-primary btn-flat" data-toggle="modal" data-target="#modal-xl">Add Registration</button> --}}
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Id</th>
        <th>Slug</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Role</th>
        <th>Add Details</th>
        <th>Status</th>
        <th colspan="2">Action</th>
      </tr>
      </thead>
      <tbody>
      @foreach ($user_data as $user)
        <tr>
          <td>{{$user->id}}</td>
          <td><a href="{{ request()->getSchemeAndHttpHost()."/".$user->slug }}" target="_blank">{{$user->slug}}</a></td>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->phone}}</td>
          <td>{{$user->role->name}}</td>
          <td align="center"><a href="{{ route('Add-Details', ['id' => $user->id]) }}"><i class="fa fa-plus" aria-hidden="true"></i></a></td>
          <td align="center">
            <label class="switch">
              <input data-id="{{$user->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $user->status ? 'checked' : '' }}>
              <span class="slider"></span>
            </label>
          </td>
          <td align="center">
            <a href="{{ url('admin/user-data/'.$user->id.'/edit') }}"><i class="fas fa-edit"></i></a>
          </td>
          <td>
            <form id="deleteForm" action="{{ route('user-data.destroy', ['user_datum' => $user->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-confirmr"><i class="fas fa-trash" style="color:red"></i></button>
            </form>
          </td>
          
          {{-- <td>
            <a class="delete-confirm" href="{{ route('user-data.destroy', ['user_datum' => $user->id]) }}" data-info="{{$user->id }}"><i class="fa fa-trash"></i></a>
          </td> --}}


          {{-- <a class="btn btn-danger delete-confirm" href="{{ URL('/dashboard/Users/delete/'.$user->id) }}" data-info="{{$user->id }}"><i class="fa fa-trash"></i></a> --}}


        </tr>
      @endforeach
        
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>

<div class="modal fade" id="modal-xl">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Extra Large Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

@section('third_party_scripts')

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  {{-- <script>
    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 0; 
          var user_id = $(this).data('id');
          var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');  
          $.ajax({
              url: "{{url('/admin/changeStatus')}}",
              type: "GET",
              data: {
                  status: status,
                  user_id: user_id,
                  _token: '{{csrf_token()}}'
              },
              dataType: 'json',
              success: function (result) {
                 console.log(data);
              }
          });
      })
    })
  </script> --}}
@show
@endsection