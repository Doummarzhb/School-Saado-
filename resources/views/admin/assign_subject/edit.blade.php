
<!-- doummar -->
@extends('layout.app')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>EditAssign Subject</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <form method="post" action="">
                {{csrf_field()}}
                <div class="card-body">
                  <div class="form-group">
                    <label>Class Name</label>
                    <select class="form-control" name="class_id" required>
                        <option value="">Select Class</option>
                         @foreach ( $getClass as $class)
                         <option  {{($getRecord->class_id == $class->id) ? 'selected' : ''}} value="{{$class->id}}"> {{$class->name}}</option>
                         @endforeach
                        </select>
                  </div>

                  <div class="form-group">
                    <label>Subject Name</label>
                         @foreach ( $getSubject as $subject )
                         @php
                         $checked = "";
                         @endphp
                         @foreach ($getAssignSubjectID as $subjectAssign )

                         @if($subjectAssign->subject_id == $subject->id )
                         @php
                         $checked = "checked";
                         @endphp

                         @endif
                         @endforeach

                         @endforeach
                         <label  style="font-weight: normal;">
                            <input {{$checked}} type="checkbox" value="{{ $subject->id}}" name="subject_id[]"/> {{$subject->name}}

                        </select>
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="0" {{($getRecord->status == 0) ? 'selected' : ''}}>Active</option>
                        <option value="1" {{($getRecord->status == 1) ? 'selected' : ''}}>Inactive</option>
                        </select>
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
