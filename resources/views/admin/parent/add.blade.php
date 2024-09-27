
<!-- doummar -->
@extends('layout.app')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Parent</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <form method="post" action="" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-6">

                    <label>First Name <Span style="color:red">*</Span></label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}" required placeholder="  First Name">
                    <div style="color:red;">{{$errors->first('name')}}</div>

                    </div>
                    <div class="form-group col-md-6">

                    <label> Last Name<Span style="color:red">*</Span></label>
                    <input type="text" class="form-control" name="last_name" value="{{old('last_name')}}" required placeholder="  Last Name">
                    <div style="color:red;">{{$errors->first('last_name')}}</div>

                    </div>

                               <div class="form-group col-md-6">
                          <label> Gender<Span style="color:red">*</Span></label>
                          <select class="form-control required " name="gender">
                            <option value="">Select Gender</option>
                            <option value="Male" {{(old('gender') == 'Male') ? 'selected' : ''}}>Male</option>
                            <option value="Female" {{(old('gender') == 'Female') ? 'selected' : ''}}>Female</option>
                            <option value="Other"  {{(old('gender') == 'Other') ? 'selected' : ''}}>Other</option>
                             </select>
                             <div style="color:red;">{{$errors->first('gender')}}</div>
                               </div>



                               <div class="form-group col-md-6">
                          <label>Occupation<Span style="color:red">*</Span></label>
                          <input type="text" class="form-control" required name="occupation" value="{{old('occupation')}}"  placeholder=" Occupation">
                      <div style="color:red;">{{$errors->first('occupation')}}</div>

                               </div>
                               <div class="form-group col-md-6">
                          <label>Address<Span style="color:red">*</Span></label>
                          <input type="text" class="form-control" required name="address" value="{{old('address')}}"  placeholder="Address">
                      <div style="color:red;">{{$errors->first('address')}}</div>
                               </div>


                               <div class="form-group col-md-6">
                          <label>Mobile Number<Span style="color:red">*</Span></label>
                          <input type="text" class="form-control" required name="mobile_number" value="{{old('mobile_number')}}"  placeholder="Mobile Number">
                      <div style="color:red;">{{$errors->first('mobile_number')}}</div>
                               </div>

                          <div class="form-group col-md-6">
                          <label>Profile Picture<Span style="color:red">*</Span></label>
                          <input type="file" class="form-control"  name="profile_pic"   placeholder="Profile Picture">
                    <div style="color:red;">{{$errors->first('profile_pic')}}</div>

                               </div>



                               <div class="form-group col-md-6">
                          <label> Status<Span style="color:red">*</Span></label>
                          <select class="form-control required " name="status">
                            <option value="">Select Status</option>
                            <option value="0" {{(old('status') == '0') ? 'selected' : ''}}>Active</option>
                            <option value="1" {{(old('status') == '1') ? 'selected' : ''}}>Inactive</option>
                             </select>
                    <div style="color:red;">{{$errors->first('status')}}</div>

                               </div>


                               </div>
                  <div class="form-group">
                    <label>Email <Span style="color:red">*</Span> </label>
                    <input type="email" class="form-control"  name="email"  value="{{old('email')}}"  required placeholder="  Email">

                    <div style="color:red;">{{$errors->first('email')}}</div>
                  </div>
                  <div class="form-group">
                    <label>Password <Span style="color:red">*</Span></label>
                    <input type="password" class="form-control"  name="password"  required placeholder="Password">
                    <div style="color:red;">{{$errors->first('password')}}</div>

                  </div>


                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @endsection
