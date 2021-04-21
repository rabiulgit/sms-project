@extends('layouts.app')
@push('top-scripts')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
    <style>
        .select2-container {
            width: 100% !important;
        }

        .select2-container .select2-selection--single {
            height: 34px !important;
            padding-top: 3px;
        }
    </style>
@endpush
@section('content')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Fees Book</h2>
        </header>
        @if(Session::has('success_message'))
            <div class="alert alert-success text-success" style="text-align: center;">
                {{Session::get('success_message')}}
            </div>
        @endif

        @if(Session::has('error_message'))
            <div class="alert alert-danger text-danger" style="text-align: center;">
                {{Session::get('error_message')}}
            </div>
        @endif


        <section class="panel">
            <header class="panel-heading">
                <a  class="modal-with-form  btn btn-success pull-right" href="#studentModalForm" style="font-size: 12px"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Fees Book</a>
                
                <h2 class="panel-title">Fees Book List</h2>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-condensed mb-none">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Session</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Roll</th>
                            <th>Class</th>
                            <th>Section</th>
                            <th>Group</th>
                            <th>Particular</th>
                            <th>Amount</th>
                            <th>Month</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($fees->isNotEmpty())
                            @foreach($fees as $key=> $fee)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{date('M-y', strtotime($fee->session_start))}} to {{date('M-y', strtotime($fee->session_end))}}</td>
                                    <td>{{$fee->student_unique_id}}</td>
                                    <td>{{$fee->student_name}}</td>
                                    <td>{{$fee->roll}}</td>
                                    <td>{{$fee->class}}</td>
                                    <td>{{$fee->section}}</td>
                                    <td>{{$fee->group}}</td>
                                    <td>{{$fee->cat_name}}</td>
                                    <td>{{$fee->value}}</td>
                                    <td>{{$fee->month}}</td>

                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    {{ $fees->render() }}
                </div>
            </div>
        </section>
    </section>


    <!-- Create Book Modal Form -->
    <div id="studentModalForm" class="modal-block modal-block-primary mfp-hide">
        <section class="panel">
            <header class="panel-heading">
                <button type="button"  style="color: black; float: right;padding: 0px 7px;font-size: 16px;" class="btn btn-default modal-dismiss">&times;</button>
                <h2 class="panel-title">Create Fees Book</h2>
            </header>
            <div class="panel-body">
                <form  id="demo-form" method="post" action="{{route('feesBook.store')}}" class="form-horizontal mb-lg" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group mt-lg">
                        <label class="col-md-3 control-label" for="inputSuccess">Session*</label>
                        <div class="col-md-9">
                            <select class="form-control" name="session_id" id="session_id" required="">
                                @foreach($session as $session)
                                    <option value="{{$session->id}}">{{date('M-y', strtotime($session->session_start))}} to {{date('M-y', strtotime($session->session_end))}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group mt-lg">
                        <label class="col-md-3 control-label" for="inputSuccess">Student ID*</label>
                        <div class="col-md-9">
                            <select class="form-control select2" name="student_id" id="student_id" required="">
                                @foreach($students as $student)
                                    <option value="{{$student->id}}">{{$student->student_id}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group mt-lg">
                        <label class="col-md-3 control-label" for="inputSuccess">Fee Name*</label>
                        <div class="col-md-9">
                            <select class="form-control " name="cat_id" id="cat_id" required="">
                                <option value="">Select One</option>
                                @foreach($feesCategory as $feesCategory)
                                    <option value="{{$feesCategory->id}}">{{$feesCategory->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group mt-lg">
                        <label class="col-sm-3 control-label">Value*</label>
                        <div class="col-sm-9">
                            <input type="text" name="value" id="value" class="form-control" placeholder="" required="" readonly/>
                        </div>
                    </div>

                    <div class="form-group mt-lg" id="month" style="display: none">
                        <label class="col-sm-3 control-label">Month*</label>
                        <div class="col-sm-9">
                            <input type="text" class="datetimepicker3" name="month" class="form-control" placeholder="" />
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
@endsection


@push('bottom-scripts')
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js" ></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js" type="text/javascript" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

    <script type="text/javascript">
        $(function () {
            $('.select2').select2({
                theme: 'bootstrap'
            })

            $('.datetimepicker3').datetimepicker({
                format: 'MMM'
            });

            $('#cat_id').on('change', function() {
                var session_id = $('#session_id').find(":selected").val();
                var cat_id = $('#cat_id').find(":selected").val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    type: "post",
                    url: '{{route("feesBook.valueByCategory")}}',
                    data: {
                        _token: _token,
                        session_id: session_id,
                        cat_id: cat_id
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.responseCode == 1) {
                            $("#value").val(response.data);
                        } else {
                            alert("Sorry! Value not found");
                        }
                    }
                });

                if(cat_id == 2){
                    $('#month').show();
                }else{
                    $('#month').hide();
                }
            });
        });
    </script>

@endpush
