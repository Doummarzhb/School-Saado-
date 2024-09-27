
<!-- doummar -->
@extends('layout.app')
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Parent Student List ( Total:{{$getRecord->total()}} )</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Search Student    </h3>
              </div>
              <form method="get" action="">

                <div class="card-body">
                    <div class="row">
                  <div class="form-group col-md-2">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name"   value="{{Request::get('name')}}"   placeholder="  Name">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="last_name"   value="{{Request::get('last_name')}}"   placeholder="  Last Name">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Email </label>
                    <input type="text" class="form-control"  name="email"    value="{{Request::get('email')}}"    placeholder="  Email">

                  </div>



                  <div class="form-group col-md-2">
                   <label>Gender</label>
            <select class="form-control" required name="gender">
        <option value="">Select Gender</option>
        <option value="Male" {{ Request::get('gender') == 'Male' ? 'selected' : '' }}>Male</option>
        <option value="Female" {{ Request::get('gender') == 'Female' ? 'selected' : '' }}>Female</option>
        <option value="Other" {{ Request::get('gender') == 'Other' ? 'selected' : '' }}>Other</option>
    </select>
</div>
                  <div class="form-group col-md-2">
                    <label>Occupation </label>
                    <input type="text" class="form-control"  name="occupation"    value="{{Request::get('occupation')}}"    placeholder="  Occupation">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Address </label>
                    <input type="text" class="form-control"  name="address"    value="{{Request::get('address')}}"    placeholder="Address">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Mobile Number </label>
                    <input type="text" class="form-control"  name="mobile_number"    value="{{Request::get('mobile_number')}}"    placeholder="Mobile Number">
                  </div>

                  <div class="form-group col-md-2">
                   <label>Status</label>
            <select class="form-control" required name="status">
        <option value="">Select Status</option>
        <option value="0" {{ Request::get('status') == '0' ? 'selected' : '' }}>Active</option>
        <option value="1" {{ Request::get('status') == '1' ? 'selected' : '' }}>Inactive</option>

    </select>
</div>

                  <div class="form-group col-md-2">
                    <label> Created Date </label>
                    <input type="date" class="form-control"  name="date"    value="{{Request::get('date')}}"    placeholder=" Created  date">
                  </div>
                  <div class="form-group col-md-2">
                   <button class="btn btn-primary" type="submit" style="margin-top:30px;">Search</button>
                   <a href="{{url('admin/parent/list')}}" class="btn btn-success"  style="margin-top:30px;">Reset</a>

                  </div>
                </div>
                </div>
              </form>
            </div>


          @include('_message')



            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Parent Student List  </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th>Profile Pic</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Gender</th>
                      <th>Mobile Number</th>
                      <th>Occupation</th>
                      <th>Status</th>
                      <th>Address</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>


                  </tbody>
                </table>
                <div style="padding:10px; float: right;">

                <!-- paginator   la y3edle 3adad lpages -->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

  </div>


  @endsection
