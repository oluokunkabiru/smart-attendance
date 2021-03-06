<td>21</td>
@extends('users.staffs.layout.app')
@section('title', 'Student management')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Create new attendance</h1>
        </div>
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success! </strong> {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())

                <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong style="font-size:20px;">Oops!
                        {{ 'Kindly rectify below errors' }}</strong><br />
                    @foreach ($errors->all() as $error)
                        {{ $error }} <br />
                    @endforeach
                </div>
            @endif

                <div class="card">
                    <div class="card-body">

                        <form id="newcategory" action="" method="POST">
                             <div class="row">

                            <div class="form-group col-md-6">
                                <label for="sel1">Select faculty:</label>
                                <select class="form-control" id="sel1">
                                  <option>Male</option>
                                  <option>Female</option>

                                </select>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="sel1">Select Department:</label>
                                <select class="form-control" id="sel1">
                                  <option>Male</option>
                                  <option>Female</option>

                                </select>
                              </div>


                              <div class="form-group col-md-6">
                                <label for="sel1">Select level:</label>
                                <select class="form-control" id="sel1">
                                  <option>100</option>
                                  <option>200</option>
                                  <option>300</option>
                                  <option>400</option>
                                  <option>500</option>
                                </select>
                              </div>

                              <div class="form-group col-md-6">
                                <label for="sel1">Select course code:</label>
                                <select class="form-control" id="sel1">
                                  <option>100</option>
                                  <option>200</option>
                                  <option>300</option>
                                  <option>400</option>
                                  <option>500</option>
                                </select>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="email">Choose date:</label>
                                <input type="date" class="form-control" name="category" id="category">
                            </div>

                            {{ csrf_field() }}
                    </div>

                    <!-- Modal footer -->
                        <button id="addcategorybtn" type="submit" class="btn btn-primary text-uppercase">add new attendance</button>
                    </form>

                {{--  </div>  --}}
                    </div>
                </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $("#table-1").dataTable({
                "columnDefs": [{
                    "sortable": false,
                    "targets": [2, 3]
                }]
            });
            $("#table-2").dataTable({
                "columnDefs": [{
                    "sortable": false,
                    "targets": [2, 3]
                }]
            });

        })

    </script>
@endsection
