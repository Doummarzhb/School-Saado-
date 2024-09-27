
<!-- doummar -->
@extends('layout.app')
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Teacher List ( Total:{{$getRecord->total()}} )</h1>
          </div>
          <div class="col-sm-6" style="text-align:right; ">
          <a href="{{url('admin/teacher/add')}}" class="btn btn-primary">Add New Teacher</a>

          </div>


        </div>
      </div>
    </section>
    <section class="content">
          @include('_message')

 <div class="col-md-12">
 <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Search Teacher    </h3>
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
                    <label>Qualification </label>
                    <input type="text" class="form-control"  name="qualification"    value="{{Request::get('qualification')}}"    placeholder="  Qualification">
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
                    <label>Current Address </label>
                    <input type="text" class="form-control"  name="current_address"    value="{{Request::get('current_address')}}"    placeholder="  Current Address">
                  </div>
                  <div class="form-group col-md-2">
                   <label>Marital Status</label>
            <select class="form-control" required name="marital_status">
        <option value="">Select Marital Status</option>
        <option value="0" {{ Request::get('marital_status') == '0' ? 'selected' : '' }}>Single</option>
        <option value="1" {{ Request::get('marital_status') == '1' ? 'selected' : '' }}>Married</option>

    </select>
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
                    <label>   Date Of Joining</label>
                    <input type="date" class="form-control"  name="date_of_joining"    value="{{Request::get('date_of_joining')}}"    placeholder="    Date Of Joining">
                  </div>
                  <div class="form-group col-md-2">
                    <label> Created Date </label>
                    <input type="date" class="form-control"  name="date"    value="{{Request::get('date')}}"    placeholder=" Created  date">
                  </div>
                  <div class="form-group col-md-2">
                   <button class="btn btn-primary" type="submit" style="margin-top:30px;">Search</button>
                   <a href="{{url('admin/teacher/list')}}" class="btn btn-success"  style="margin-top:30px;">Reset</a>

                  </div>
                </div>
                </div>
              </form>
            </div>
            <div class="card">
              <div class="card-header">

                <h3 class="card-title">Teacher List  </h3>
              </div>
              <div class="card-body p-0" style="overflow:auto;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th>Profile Pic</th>
                      <th>Teacher Name</th>
                      <th>Email</th>
                      <th>Current Address</th>
                      <th>Permanent Address</th>
                      <th>Date Of Joining</th>
                      <th>Marital Status</th>
                      <th>Qualification</th>
                      <th>Work Experience</th>
                      <th>Note</th>

                      <th>Gender</th>
                      <th>Mobile Number</th>
                      <th>Status</th>
                      <th>Date of Birth</th>
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
                    <td>{{ $value->address}}</td>
                    <td>{{ $value->permanent_address}}</td>
                    <td>{{ date('d-m-y H:i A' , strtotime($value->admission_date))}}</td>
                    <td>{{ ($value->marital_status == 0) ? 'single' : 'married'}}</td>
                    <td>{{ $value->qualification}}</td>
                    <td>{{ $value->work_experience}}</td>
                    <td>{{ $value->note}}</td>

                    <td>{{ $value->gender}}</td>
                    <td>{{ $value->mobile_number}}</td>
                    <td>{{ ($value->status == 0) ? 'Active' : 'Inactive'}}</td>
                    <td>
                        @if(!empty($value->date_of_birth))
                        {{date('d-m-Y' , strtotime($value->date_of_birth))}}
                        @endif

                    </td>
                    <td style="min-width:200px;">
                        <a href="{{url('admin/teacher/edit/'.$value->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{url('admin/teacher/delete/'.$value->id)}}" class="btn btn-danger btn-sm">Delete</a>

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
