
<!-- doummar -->
@extends('layout.app')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Student</h1>
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

                   <label> Admission Number<Span style="color:red">*</Span></label>
                    <input type="text" class="form-control" name="admission_number" value="{{old('admission_number')}}" required placeholder=" Admission Number">
                    <div style="color:red;">{{$errors->first('admission_number')}}</div>

                          </div>
                            <div class="form-group col-md-6">
                          <label> Roll Number<Span style="color:red"></Span></label>
                          <input type="text" class="form-control" name="roll_number" value="{{old('roll_number')}}"  placeholder=" Roll Number">
                    <div style="color:red;">{{$errors->first('roll_number')}}</div>

                               </div>
                               <div class="form-group col-md-6">
                          <label> Class<Span style="color:red">*</Span></label>
                          <select class="form-control required " name="class_id">
                            <option value="">Select Class</option>
                            @foreach ($getClass as $value )

                            <option value="{{$value->id}}" {{(old('class_id') ==  $value->id) ? 'selected' : ''}}>{{$value->name}}</option>

                            @endforeach
                             </select>
                    <div style="color:red;">{{$errors->first('class_id')}}</div>

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
                          <label>Date Of Birthday<Span style="color:red">*</Span></label>
                          <input type="date" class="form-control" required name="date_of_birth" value="{{old('date_of_birth')}}"  placeholder=" Date Of Birthday">
                      <div style="color:red;">{{$errors->first('date_of_birth')}}</div>

                               </div>

                               <div class="form-group col-md-6">
                          <label>Caste<Span style="color:red">*</Span></label>
                          <input type="text" class="form-control" required name="caste" value="{{old('caste')}}"  placeholder=" Caste">
                      <div style="color:red;">{{$errors->first('caste')}}</div>

                               </div>

                               <div class="form-group col-md-6">
                          <label>Religion<Span style="color:red"></Span></label>
                          <input type="text" class="form-control" required name="religion" value="{{old('religion')}}"  placeholder="Religion">
                      <div style="color:red;">{{$errors->first('religion')}}</div>

                               </div>
                               <div class="form-group col-md-6">
                          <label>Mobile Number<Span style="color:red">*</Span></label>
                          <input type="text" class="form-control" required name="mobile_number" value="{{old('mobile_number')}}"  placeholder="Mobile Number">
                      <div style="color:red;">{{$errors->first('mobile_number')}}</div>

                               </div>
                               <div class="form-group col-md-6">

                   <label> Admission Date<Span style="color:red">*</Span></label>
                    <input type="date" class="form-control" name="admission_date" value="{{old('admission_date')}}" required placeholder=" Admission Date">
                    <div style="color:red;">{{$errors->first('admission_date')}}</div>

                          </div>
                          <div class="form-group col-md-6">
                          <label>Profile Picture<Span style="color:red">*</Span></label>
                          <input type="file" class="form-control"  name="profile_pic"   placeholder="Profile Picture">
                    <div style="color:red;">{{$errors->first('profile_pic')}}</div>

                               </div>
                               <div class="form-group col-md-6">
                          <label>Height<Span style="color:red"></Span></label>
                          <input type="text" class="form-control"  name="height" value="{{old('height')}}"  placeholder="Height">
                    <div style="color:red;">{{$errors->first('height')}}</div>

                               </div>
                               <div class="form-group col-md-6">
                          <label>Weight<Span style="color:red"></Span></label>
                          <input type="text" class="form-control"  name="weight" value="{{old('weight')}}"  placeholder="Weight">
                    <div style="color:red;">{{$errors->first('weight')}}</div>

                               </div>
                               <div class="form-group col-md-6">
                          <label>Blood Group<Span style="color:red"></Span></label>
                          <input type="text" class="form-control"  name="blood_group" value="{{old('blood_group')}}"  placeholder="Blood Group">
                    <div style="color:red;">{{$errors->first('blood_group')}}</div>

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
