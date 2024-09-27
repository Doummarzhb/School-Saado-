
<!-- doummar -->
@extends('layout.app')
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Parent List ( Total:{{$getRecord->total()}} )</h1>
          </div>
          <div class="col-sm-6" style="text-align:right; ">
          <a href="{{url('admin/parent/add')}}" class="btn btn-primary">Add New Parent</a>

          </div>


        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Search Parent    </h3>
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
                <h3 class="card-title">Parent List  </h3>
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
                    @foreach ($getRecord as $value )

                  <tr>
                    <td>{{ $value->id}}</td>
                    <td>  @if(!empty($value->getProfile()))
                        <img src="{{$value->getProfile()}}" style="height:50px; width:50px; border-radius:50px;">
                        @endif
                    </td>
                    <td>{{ $value->name}} {{ $value->last_name}}</td>
                    <td>{{ $value->email}}</td>
                    <td>{{ $value->gender}}</td>
                    <td>{{ $value->mobile_number}}</td>
                    <td>{{ $value->occupation}}</td>
                    <td>{{ ($value->status == 0) ? 'Active' : 'Inactive'}}</td>
                    <td>{{ $value->address}}</td>
                    <td>{{ date('d-m-y H:i A' , strtotime($value->created_at))}}</td>
                    <td>
                        <a href="{{url('admin/parent/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{url('admin/parent/delete/'.$value->id)}}" class="btn btn-danger">Delete</a>
                        <a href="{{url('admin/parent/my_student/'.$value->id)}}" class="btn btn-primary">My Student</a>


                    </td>


                  </tr>

                    @endforeach

                  </tbody>
                </table>
                <div style="padding:10px; float: right;">
                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
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
