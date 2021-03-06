@extends('users.students.layout.app')
@section('title', 'Student Dashboard')
@section('style')
<link rel="stylesheet" href="{{ asset('scanner/css/qrcode-reader.css') }}">

@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-address-book"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total attendance</h4>
                    </div>
                    <div class="card-body">
                        {{ count($tattendances) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total attended</h4>
                    </div>
                    <div class="card-body">
                        {{ count($attended) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total missed</h4>
                    </div>
                    <div class="card-body">
                        {{ count($tattendances)- count($attended) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Today's class</h4>
                    </div>
                    <div class="card-body">
                        {{ count($attendances) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Hi, {{ ucwords(Auth::user()->name) }}</h2>
        {{--  <p class="section-lead">Change information about yourself on this page.</p>  --}}

        <div class="row mt-sm-4">
            {{--  <div class="col-12 col-md-12 col-lg-5">  --}}
            <div class="col-7 col-md-7 col-lg-7">
                <div class="card">
                        <div class="card-header">
                            <h4>
                                <span class="fa fa-user p-1 mx-2" style="font-size: 60px"></span> Profile Details
                                <a href="#" id="openreader-single2"
                                data-qrr-target="#single2"
                                data-qrr-line-color="#00FF00"
                                data-qrr-repeat-timeout="0"
                                data-qrr-audio-feedback="true" class="mr-auto"> <span class="fa fa-qrcode p-1 mx-2" style="font-size: 60px"></span>Take attendance</a>
                            </h4>
                        </div>
                        {{--  <form >  --}}
                            <input id="single2"   type="hidden" size="50">
                          {{--  </form>  --}}
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label class="fa fa-user"></label>
                                   <h6>{{ ucwords(Auth::user()->name) }}</h6>
                                </div>
                                                                <div class="form-group col-md-6 col-12">
                                    <label class="fa fa-envelope"></label>
                                   <h6>{{ Auth::user()->email }}</h6>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 col-12">
                                    <label class="fa fa-phone"></label>
                                   <h6>{{ Auth::user()->phone }}</h6>
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label class="fa fa-calendar"></label>
                                   <h6>{{ Auth::user()->dob }}</h6>
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label class="fa fa-address-book"></label>
                                   <h6>{{ Auth::user()->matric_no }}</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 col-4">
                                    <label class="fa fa-map"></label>
                                   <h5>{{ Auth::user()->country }}</h5>
                                </div>
                                <div class="form-group col-md-4 col-4">
                                    <label class="fa fa-map-pin"></label>
                                   <h5>{{ Auth::user()->state }}</h5>
                                </div>
                                <div class="form-group col-md-4 col-4">
                                    <label class="fa fa-map-marker"></label>
                                   <h5>{{ Auth::user()->city }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 col-4">
                                    <label class="far  fa-chart-bar"></label>
                                   <h5>{{ Auth::user()->level }}</h5>
                                </div>
                                <div class="form-group col-md-4 col-4">
                                    <label class="fa fa-map-pin"></label>
                                   <h5>{{ ucwords(Auth::user()->faculty->faculty) }}</h5>
                                </div>
                                <div class="form-group col-md-4 col-4">
                                    <label class="fa fa-map-marker"></label>
                                   <h5>{{ ucwords(Auth::user()->department->dept) }}</h5>
                                </div>
                            </div>


                        </div>
                        <div class="card-footer text-right">
                            <a href="#" class="btn btn-primary">Changes</a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-5 col-md-5 col-lg-5">
                <div class="card">
                        <div class="card-header">
                            <h4><span class="fa fa-clock p-1 mx-2" style="font-size: 60px"></span> Today attendance</h4>
                        </div>
                        <div class="card-body">
                            {{-- <div class=""> --}}
                                @if ($attendances)
                                    @foreach ($attendances as $attendance)
                                        <a href="#scanqrcode" data-toggle="modal">
                                        <div class="card">
                                            <div class="card-body">
                                            <h6>{{ strtoupper($attendance->course->code) }}</h6>
                                            <p>{{ ucwords($attendance->course->title) }}</</p>
                                        </div>
                                    </div>
                                    </a>
                                    @endforeach
                                @endif

                            {{-- </div> --}}
                        </div>
                </div>
            </div>
        </div>



    </div>

</section>
 <div class="modal" id="scanqrcode">
    <div class="modal-dialog">
        <div id="scannedContent">

        </div>

    </div>
</div>


<div class="modal fade" id="notsmartcode">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header bg-danger text-white">
          <h4 class="modal-title">OOPS!!! <br> This is not QR code from smart attendance</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <h5 id="notsmartqrcontent"></h5>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

@endsection

@section('script')
<script src="{{ asset('scanner/js/qrcode-reader.min.js') }}"></script>

<script>

  $(function(){

    // overriding path of JS script and audio
    $.qrCodeReader.jsQRpath = "{{ asset('scanner/js/jsQR/jsQR.min.js') }}"; //"../dist/js/jsQR/jsQR.min.js";
    $.qrCodeReader.beepPath = "{{ asset('scanner/audio/beep.mp3') }}"; //"../dist/audio/beep.mp3";


    $("#openreader-single2").qrCodeReader({callback: function(code) {
      if (code) {
        // window.location.href = code;
        var a = code.indexOf("Smartcode:smartme");
        // alert(code);
        if(a != -1){
        // alert(code);
        // alert(a);
        var b = code.slice(a);
        // alert(b);
        var c =b.split("_");
        var d = c[1];
              $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                type: 'POST',
                url: '{{ route('scanningqrcode') }}',
                data: 'id='+d,
                success: function(data) {
                    $("#scannedContent").html(data)
                    $("#scanqrcode").modal("show");
                }
              })
      }else{
        //   alert("not discover");
        $("#notsmartqrcontent").text(code)
        $("#notsmartcode").modal("show");
      }
      }
    }})
    // .off("click.qrCodeReader").on("click", function(){
    //     var qrcode = $("#single2").val();
    //   if (qrcode) {
    //       alert(qrcode);
    //     window.location.href = qrcode;
    //   } else {
    //     $.qrCodeReader.instance.open.call(this);
    //   }
    // }
    // );


  });

</script>



@endsection

