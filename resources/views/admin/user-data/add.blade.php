@extends('layouts.app')
@section('content')
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>User data</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item"><a href="{{ url('user-data') }}">User-data</a></li>
            </ol>
         </div>
      </div>
   </div>
</section>
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">General Elements</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Business name</label>
                        <input type="text" class="form-control" placeholder="Enter business name">
                      </div>
                      <div class="form-group">
                        <label>Types of Business</label>
                        <select class="form-control">
                            <option value=''>Select Type</option>
                            <option>Sole Proprietorship</option>
                            <option>Partnership</option>
                            <option>Limited Liability Partnership</option>
                            <option>Private Limited Companies</option>
                            <option>Public Limited Companies</option>
                            <option>One-Person Companies</option>
                            <option>Section 8 Company</option>
                            <option>Joint-Venture Company</option>
                            <option>Non-Government Organization (NGO)</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Enter email address">
                        </div>
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="tel" class="form-control" placeholder="Enter mobile">
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter Description"></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row prop">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">  
                        <label>Proprietor name</label>
                        <input type="text" class="form-control" placeholder="Enter proprietor name">
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" placeholder="Enter phone number">
                      </div>
                    </div>
                    <a><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                  </div>

                  <div class="row pro_data"></div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Address 1</label>
                        <input type="text" class="form-control" placeholder="Enter address">
                      </div>
                      <div class="form-group">
                        <label>PostCode</label>
                        <input type="text" id="pin_code" class="form-control" placeholder="Enter pincode">
                      </div>
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" value="" id="city"  disabled>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Address 2</label>
                        <input type="text" class="form-control" placeholder="Enter address">
                      </div>
                      <div class="form-group">
                        <label>Location</label>
                        <select class="form-control" id="location">
                        </select>
                      </div>
                      <div class="form-group">
                        <label>State</label>
                        <input type="text" class="form-control" value="" id="state"  disabled>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- Select multiple-->
                      <div class="form-group">
                        <label>Select Multiple</label>
                        <select multiple class="form-control">
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Select Multiple Disabled</label>
                        <select multiple class="form-control" disabled>
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>

@section('third_party_scripts')

@show
@endsection