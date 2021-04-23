@extends('layouts.app')
@push('top-scripts')
<!-- datatale -->

<link rel="stylesheet" href="{{asset('assets/DataTables/css/dataTables.bootstrap.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/DataTables/css/buttons.dataTables.min.css')}}" >
<link rel="stylesheet" href="{{asset('assets/DataTables/css/jquery.dataTables.min.css')}}" >
<!--  datepicker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.min.css" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >


@endpush

@section('content')
<style type="text/css">
   .dataTables_filter {

    padding-right: 100px
}
</style>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Student</h2>
    </header>
    @if(Session::has('success_message'))
    <div class="alert alert-success text-success" style="text-align: center;">
        {{Session::get('success_message')}}
    </div>
    @endif

    @if(Session::has('error_message'))
    <div class="alert alert-success text-success" style="text-align: center;">
        {{Session::get('error_message')}}
    </div>
    @endif


    <section class="panel">
        <header class="panel-heading">
            <a  class="modal-with-form  btn btn-success pull-right" href="#studentModalForm" style="font-size: 12px"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Student</a>
            <h2 class="panel-title">Student List</h2>
        </header>
        <div class="panel-body">
            <div class="table-responsive">

                <table id="example" class="display nowrap table table-bordered table-striped table-condensed mb-none" >
                    <thead>
                     <tr>
                        <th>#</th>
                        <th>Student ID</th>
                        <th>Session</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date of Birth</th> 
                        <th>Mobile</th>
                        <th>Class</th>
                        <th>Section</th>
                        <th>Group</th>
                        <th>Status</th>
                        <th >Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($students->isNotEmpty())
                    @foreach($students as $key=> $student) 
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$student->student_id}}</td>
                        <td>{{date('M-y', strtotime($student->session_start))}} to {{date('M-y', strtotime($student->session_end))}}</td>
                        <td>{{$student->first_name}}</td>
                        <td>{{$student->last_name}}</td>
                        <td>{{$student->dob}}</td>
                        <td>{{$student->sms_no}}</td>

                        <td>{{$student->class_name}}</td>
                        <td>{{$student->section_name}}</td>
                        <td>{{$student->groups_name}}</td>

                        <td>{{$student->status == 1 ? 'Active' : 'Inactive'}}</td>
                        <td>
                        
                            <a class="mb-xs  modal-basic btn-xs btn  btn-info openeditModal" href="#editstudentModalForm" data-id="{{$student->id}}" ><i class="fa fa-edit"></i></a>

                        </td>
                    </tr>
                   
                    @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    </div>
</section>
</section>


<!-- Create Category Modal Form -->
<div id="studentModalForm" class="modal-block modal-block-primary mfp-hide">
    <section class="panel">
        <header class="panel-heading">
            <button type="button"  style="color: black; float: right;padding: 0px 7px;font-size: 16px;" class="btn btn-default modal-dismiss">&times;</button>
            <h2 class="panel-title">Create Student</h2>
        </header>
        <div class="panel-body">
            <form  id="demo-form" method="post" action="{{route('student.store')}}" class="form-horizontal mb-lg" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group mt-lg">
                    <label class="col-md-3 control-label" for="inputSuccess">Session*</label>
                    <div class="col-md-9">
                        <select class="form-control" name="session_id" required="">
                            @foreach($session as $session)
                            <option value="{{$session->id}}">{{date('M-y', strtotime($session->session_start))}} to {{date('M-y', strtotime($session->session_end))}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">First Name*</label>
                    <div class="col-sm-9">
                        <input type="text" name="first_name" id="first_name" class="form-control" placeholder="" required="" />
                    </div>
                </div>

                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Last Name*</label>
                    <div class="col-sm-9">
                        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="" required="" />
                    </div>
                </div>

                <div class="form-group mt-lg">
                    <label class="col-md-3 control-label" for="inputSuccess">Gender*</label>
                    <div class="col-md-9">
                        <select class="form-control " name="gender" required="">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>

                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Date of Birth*</label>
                    <div class="col-sm-9 ">
                        <input type="text" class="form-control datepicker" name="dob" id="dob" class="form-control" placeholder="" required="" />

                    </div>
                </div>

                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Present Address*</label>
                    <div class="col-sm-9">
                        <textarea name="present_address" id="present_address" class="form-control" placeholder="" required=""></textarea>
                    </div>
                </div>

                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Mobile No*</label>
                    <div class="col-sm-9">
                        <input type="text" name="sms_no" id="sms_no" class="form-control" placeholder="" required="" />
                    </div>
                </div>

                <div class="form-group mt-lg">
                    <label class="col-md-3 control-label" for="inputSuccess">Class*</label>
                    <div class="col-md-9">
                        <select class="form-control" name="class_id" required="">
                            @foreach($classes as $class)
                            <option value="{{$class->id}}">{{$class->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group mt-lg">
                    <label class="col-md-3 control-label" for="inputSuccess">Section*</label>
                    <div class="col-md-9">
                        <select class="form-control" name="section_id" required="">
                            @foreach($sections as $section)
                            <option value="{{$section->id}}">{{$section->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group mt-lg">
                    <label class="col-md-3 control-label" for="inputSuccess">Group*</label>
                    <div class="col-md-9">
                        <select class="form-control" name="group_id" required="">
                            @foreach($groups as $group)
                            <option value="{{$group->id}}">{{$group->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Roll*</label>
                    <div class="col-sm-9">
                        <input type="number" name="roll" id="roll" class="form-control" placeholder="" required="" />
                    </div>
                </div>

                <div class="form-group mt-lg">
                    <label class="col-md-3 control-label" for="inputSuccess">Status*</label>
                    <div class="col-md-9">
                        <select class="form-control " name="status" required="">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>

                <footer class="panel-footer" style="margin-top: 10px">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-success ">Create</button>
                            <button class="btn btn-default modal-dismiss">Cancel</button>
                        </div>
                    </div>
                </footer>
            </form>
        </div>
    </section>
</div>
<!-- Edit student Modal Form -->
<div id="editstudentModalForm" class="modal-block modal-block-primary mfp-hide">
    <section class="panel">

        <header class="panel-heading">
            <button type="button"  style="color: black; float: right;padding: 0px 7px;font-size: 16px;" class="btn btn-default modal-dismiss">&times;</button>
            <h2 class="panel-title">Edit Student</h2>
        </header>
        <div class="panel-body">
            <form  method="post" action="{{url('student/update/')}}" class="form-horizontal mb-lg" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" id="id" name="id">

                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">First Name*</label>
                    <div class="col-sm-9">
                        <input type="text" name="first_name" id="firstNname" class="form-control" placeholder="" required="" />
                    </div>
                </div>

                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Last Name*</label>
                    <div class="col-sm-9">
                        <input type="text" name="last_name" id="lastName" class="form-control" placeholder="" required="" />
                    </div>
                </div>

                <div class="form-group mt-lg">
                    <label class="col-md-3 control-label" for="inputSuccess">Gender*</label>
                    <div class="col-md-9">
                        <select class="form-control " name="gender" id="Gender" required="">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>

                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Date of Birth*</label>
                    <div class="col-sm-9 ">
                        <input type="text" class="form-control datepicker" name="dob" id="Dob" class="form-control" placeholder="" required="" />

                    </div>
                </div>

                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Present Address*</label>
                    <div class="col-sm-9">
                        <textarea name="present_address" id="presentAddress" class="form-control" placeholder="" required=""></textarea>
                    </div>
                </div>

                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Mobile No*</label>
                    <div class="col-sm-9">
                        <input type="text" name="sms_no" id="smsNo" class="form-control" placeholder="" required="" />
                    </div>
                </div>

                <div class="form-group mt-lg">
                    <label class="col-md-3 control-label" for="inputSuccess">Class*</label>
                    <div class="col-md-9">
                       
                        <select class="form-control" id="classId"  name="class_id">
                          
                            @foreach($classes as $classe)
                            <option value="{{$classe->id}}">{{$classe->name}}</option>
                            @endforeach
                     
                        </select>
                    </div>
                </div>

                <div class="form-group mt-lg">
                    <label class="col-md-3 control-label" for="inputSuccess">Section*</label>
                    <div class="col-md-9">
                        <select class="form-control" name="section_id" id="sectionId" required="">
                            @foreach($sections as $section)
                            <option value="{{$section->id}}">{{$section->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group mt-lg">
                    <label class="col-md-3 control-label" for="inputSuccess">Group*</label>
                    <div class="col-md-9">
                        <select class="form-control" name="group_id" id="groupId" required="">
                            @foreach($groups as $group)
                            <option value="{{$group->id}}">{{$group->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label">Roll*</label>
                    <div class="col-sm-9">
                        <input type="number" name="roll" id="Roll" class="form-control" placeholder="" required="" />
                    </div>
                </div>

                <div class="form-group mt-lg">
                    <label class="col-md-3 control-label" for="inputSuccess">Status*</label>
                    <div class="col-md-9">
                        <select class="form-control " name="status" id="Status" required="">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>

                <footer class="panel-footer" style="margin-top: 10px">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-success ">Update</button>
                            <button class="btn btn-default modal-dismiss">Cancel</button>
                        </div>
                    </div>
                </footer>
            </form>
        </div>
    </section>
</div>
@endsection


@push('bottom-scripts')
<!-- datatale -->
<script src="{{asset('assets/DataTables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/DataTables/js/dataTables.bootstrap.min.js')}}"></script>

<script src="{{asset('assets/DataTables/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/DataTables/js/jszip.min.js')}}"></script>
<script src="{{asset('assets/DataTables/js/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/DataTables/js/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/DataTables/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/DataTables/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/DataTables/js/buttons.colVis.min.js')}}"></script>


<!-- DATEPIKER -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.en-GB.min.js" charset="UTF-8"></script>

<script type="text/javascript">
    $(".openeditModal").click(function(){
        var id = $(this).data('id');
        var site_url = jQuery('.site_url').val();
        var request_url = site_url+'/student/edit/'+id;
        $.ajax({
            url: request_url,
            method: "GET",
      
            success:function(data){
              console.log(data);
          $('.panel-body #id').val(data.id);
     
        $('.panel-body #firstNname').val(data.first_name);
        $('.panel-body #lastName').val(data.last_name);
        $('.panel-body #Dob').val(data.dob);
        $('.panel-body #presentAddress').val(data.present_address);
        $('.panel-body #classId').val(data.class_id);
        $('.panel-body #sectionId').val(data.section_id);
        $('.panel-body #groupsId').val(data.groups_id);
        $('.panel-body #smsNo').val(data.sms_no);
         $('.panel-body #Roll').val(data.roll);
        $('.panel-body #Status').val(data.status);
}
});
    });
</script>




<script>
    $( document ).ready(function() {
      $('.datepicker').datepicker();

  });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable( {
            dom: 'Bfrtip', 
            buttons: [
            'pdf', 'csv'
            ]
        } );
    } );
</script>


@endpush
