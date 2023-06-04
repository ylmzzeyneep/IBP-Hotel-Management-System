@extends('layouts.admin.main')

@section('title', 'Add Booking')

@include('admin._header')
@include('admin._sidebar')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Add Booking</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Booking</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Booking</h3>

                </div>
                <div class="card-body">


                    <!-- form start -->
                    <form role="form" action="{{route('admin_booking_create')}}" method="post">
                        @csrf
                    

                            <div class="form-group">
                                <label >Guest</label>
                                <select class="form-control select2" name="guest" style="width: 100%;">
                                    <option value="adult">Adults</option>
                                    <option value="child">Childs</option>
                                 
                                </select>
                            </div>
                            <div class="form-group">
                                <label >Room</label>
                                <select class="form-control select2" name="room" style="width: 100%;">
                                    <option value="single">Single Room</option>
                                    <option value="double">Double Room</option>
                                    <option value="suite">Suits Room</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label >Check In</label>
                                <input type="date" name="check_in" class="form-control"   >
                            </div>
                            <div class="form-group">
                                <label  >Check Out</label>
                                <input type="date" name="check_out" class="form-control"   >
                            </div>
                            

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Add Booking</button>
                        </div>
                    </form>




                    <!-- /.card-body -->
                    <div class="card-footer">
                        ..
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection