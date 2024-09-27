
<!-- doummar -->
@extends('layout.app')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Teacher</h1>
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
                    <input type="text" class="form-control" name="name" value="{{old('name' , $getRecord->name)}}" required placeholder="  First Name">
                    <div style="color:red;">{{$errors->first('name')}}</div>

                    </div>
                    <div class="form-group col-md-6">

                    <label> Last Name<Span style="color:red">*</Span></label>
                    <input type="text" class="form-control" name="last_name" value="{{old('last_name', $getRecord->last_name)}}" required placeholder="  Last Name">
                    <div style="color:red;">{{$errors->first('last_name')}}</div>

                    </div>

                            <div class="form-group col-md-6">
                          <label> Current Address<Span style="color:red"></Span></label>
                          <input type="text" class="form-control" name="address" value="{{old('address' , $getRecord->address)}}"  placeholder=" Current Address">
                    <div style="color:red;">{{$errors->first('address')}}</div>

                               </div>
                               <div class="form-group col-md-6">
                          <label> Permanent Address<Span style="color:red"></Span></label>
                          <input type="text" class="form-control" name="permanent_address" value="{{old('permanent_address', $getRecord->permanent_address)}}"  placeholder=" Permanent Address">
                    <div style="color:red;">{{$errors->first('permanent_address')}}</div>

                               </div>

                               <div class="form-group col-md-6">
                          <label> Gender<Span style="color:red">*</Span></label>
                          <select class="form-control required " name="gender">
                            <option value="">Select Gender</option>
                            <option value="Male" {{(old('gender' , $getRecord->gender) == 'Male') ? 'selected' : ''}}>Male</option>
                            <option value="Female" {{(old('gender' , $getRecord->gender) == 'Female') ? 'selected' : ''}}>Female</option>
                            <option value="Other"  {{(old('gender' , $getRecord->gender) == 'Other') ? 'selected' : ''}}>Other</option>
                             </select>
                      <div style="color:red;">{{$errors->first('gender')}}</div>

                               </div>

                               <div class="form-group col-md-6">
                          <label>Date Of Birthday<Span style="color:red">*</Span></label>
                          <input type="date" class="form-control" required name="date_of_birth" value="{{old('date_of_birth' , $getRecord->date_of_birth)}}"  placeholder=" Date Of Birthday">
                      <div style="color:red;">{{$errors->first('date_of_birth')}}</div>

                               </div>

                               <div class="form-group col-md-6">
                          <label>Qualification<Span style="color:red">*</Span></label>
                          <input type="text" class="form-control" required name="qualification" value="{{old('qualification', $getRecord->qualification)}}"  placeholder=" Qualification">
                      <div style="color:red;">{{$errors->first('qualification')}}</div>

                               </div>

                               <div class="form-group col-md-6">
                          <label>Note<Span style="color:red"></Span></label>
                          <input type="text" class="form-control" required name="note" value="{{old('note' , $getRecord->note)}}"  placeholder="Note">
                      <div style="color:red;">{{$errors->first('note')}}</div>

                               </div>
                               <div class="form-group col-md-6">
                          <label>Mobile Number<Span style="color:red">*</Span></label>
                          <input type="text" class="form-control" required name="mobile_number" value="{{old('mobile_number' , $getRecord->mobile_number)}}"  placeholder="Mobile Number">
                      <div style="color:red;">{{$errors->first('mobile_number')}}</div>

                               </div>
                               <div class="form-group col-md-6">

                   <label> Date of joining<Span style="color:red">*</Span></label>
                    <input type="date" class="form-control" name="admission_date" value="{{old('admission_date' , $getRecord->admission_date)}}" required placeholder=" Date of joining">
                    <div style="color:red;">{{$errors->first('admission_date')}}</div>

                          </div>
                          <div class="form-group col-md-6">
                          <label>Profile Picture<Span style="color:red">*</Span></label>
                          <input type="file" class="form-control"  name="profile_pic"   placeholder="Profile Picture">
                    <div style="color:red;">{{$errors->first('profile_pic')}}</div>

                               </div>

                               <div class="form-group col-md-6">
                          <label>Work Experience  <Span style="color:red"></Span></label>
                          <input type="text" class="form-control"  name="work_experience" value="{{old('work_experience', $getRecord->work_experience)}}"  placeholder="Work Experience ">
                    <div style="color:red;">{{$errors->first('work_experience')}}</div>
                               </div>

                               <div class="form-group col-md-6">
                          <label> Status<Span style="color:red">*</Span></label>
                          <select class="form-control required " name="status">
                            <option value="">Select Status</option>
                            <option value="0" {{(old('status' , $getRecord->status) == '0') ? 'selected' : ''}}>Active</option>
                            <option value="1" {{(old('status' , $getRecord->status) == '1') ? 'selected' : ''}}>Inactive</option>
                             </select>
                    <div style="color:red;">{{$errors->first('status')}}</div>
                    </div>

                    <div class="form-group col-md-6">
                          <label>Marital Status<Span style="color:red">*</Span></label>
                          <select class="form-control required " name="status">
                            <option value="">Select Status</option>
                            <option value="0" {{(old('marital_status' , $getRecord->marital_status) == '0') ? 'selected' : ''}}>Single</option>
                            <option value="1" {{(old('marital_status' , $getRecord->marital_status) == '1') ? 'selected' : ''}}>Married</option>
                             </select>
                           <div style="color:red;">{{$errors->first('marital_status')}}</div>
                               </div>

</div>

                  <div class="form-group">
                    <label>Email <Span style="color:red">*</Span> </label>
                    <input type="email" class="form-control"  name="email"  value="{{old('email' , $getRecord->email)}}"  required placeholder="  Email">

                    <div style="color:red;">{{$errors->first('email')}}</div>
                  </div>
                  <div class="form-group">
                    <label>Password <Span style="color:red">*</Span></label>
                    <input type="password" class="form-control"  name="password"  required placeholder="Password">
                    <div style="color:red;">{{$errors->first('password')}}</div>
                    <p>Do you want to change password, please add new password</p>

                  </div>


                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @endsection
