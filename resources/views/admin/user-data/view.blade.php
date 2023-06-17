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
<div class="card">
   <div class="card-header">
      {{-- 
      <h3 class="card-title">Back </h3>
      --}}
   </div>
   <!-- /.card-header -->
   <div class="card-body">
      <div class="card card-primary">
         <div class="card-header">
            <h3 class="card-title">User Data</h3>
         </div>
         @if (!empty($get_data))
         <form action="{{ Url('admin/user-data/'.$get_data->id) }}" method="PUT">
            @else
         <form action="{{ Url('admin/user-data') }}" method="post">
            @endif
            @csrf
            <div class="card-body">
               <div class="form-group">
                  <label for="exampleInputEmail1">Full name</label>
                  <input type="text" name="name" value="{{(!empty($get_data)) ? $get_data->name : old('name')}}" class="form-control @error('name') is-invalid @enderror" id="exampleInputname" placeholder="Enter full name">
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               @if (!empty($get_data))
               <div class="form-group">
                  <label for="exampleInputEmail1">Slug</label>
                  <input type="text" name="slug" value="{{(!empty($get_data)) ? $get_data->slug : old('slug')}}" class="form-control @error('slug') is-invalid @enderror" id="exampleInputslug" placeholder="Enter your slug url">
                  @error('slug')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               @endif               
               <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" value="{{(!empty($get_data)) ? $get_data->email : old('email')}}" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter email">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               <div class="form-group">
                  <label>Phone</label>
                  <div class="input-group"> 
                     <input type="tel" name="phone" value="{{(!empty($get_data)) ? $get_data->phone : old('phone')}}" class="form-control @error('phone') is-invalid @enderror" data-inputmask='"mask": "(999) 999-9999"' data-mask placeholder="Enter phone">
                     @error('phone')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
                  <!-- /.input group -->
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Role</label>
                  <select class="form-control" name="role" id="exampleFormControlSelect1" required autocomplete="role" autofocus>
                     <option value="0">--Select--</option>
                     @foreach ($roles as $role)
                     <option value="{{ $role->id }}" {{ (old('role') == $role->id) ? 'selected' : '' }} {{(!empty($get_data)) ? ($get_data->role_id == $role->id) ? 'selected' : '' : '' }}>{{ $role->name }}</option>
                     @endforeach
                  </select>
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="text" name="password" value="" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Password">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
               </div>
               @php 
               if (!empty($get_data->status)){
               $checked = ($get_data->status == '1') ? 'checked' : '';
               } 
               @endphp
               <div class="form-group">
                  <div class="custom-control custom-switch">
                     <input type="checkbox" {{(!empty($get_data->status)) ? $checked : ''}} class="custom-control-input @error('status') is-invalid @enderror" name="status" id="customSwitch1">
                     <label class="custom-control-label" for="customSwitch1">Status</label>
                     @error('status')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
               </div>
            </div>
            <div class="card-footer">
               <button type="submit" name="submit" class="btn btn-primary">Submit</button>
               <a href={{ route('user-data') }}><button type="button" class="btn btn-default float-right">Cancel</button></a>
            </div>
         </form>
      </div>
   </div>
   <!-- /.card-body -->
</div>
@section('third_party_scripts')
<script>
   $("input[data-bootstrap-switch]").each(function(){
         $(this).bootstrapSwitch('state', $(this).prop('checked'));
   })
</script>
@show
@endsection