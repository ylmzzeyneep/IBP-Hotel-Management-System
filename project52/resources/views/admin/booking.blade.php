@extends('layouts.admin.main')

@section('title', 'Booking List')

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
                        <h3>Booking</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Booking</li>
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
                <a href="{{route('admin_booking_add')}}"  type="button" class="btn btn-block btn-info" style="width: 200px">Add Booking</a>
                </div>
                <div class="card">

                    <!-- /.card-header -->
                    <div class="card-body">


                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Guest</th>
                                <th>Room</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ( $datalist  as $rs)
                                <tr>
                                    <td>{{ $rs->id}}</td>
                                    <td>{{ $rs->guest}}</td>
                                    <td>{{ $rs->room}}</td>
                                    <td>{{ $rs->check_in}}</td>
                                    <td>{{ $rs->check_out}}</td>
                                    <td><a href="{{route('admin_booking_edit', ['id' => $rs->id])}}"> Edit</a></td>
                                    <td><a href="{{route('admin_booking_delete', ['id' => $rs->id])}}" onclick="return confirm('Delete ! Are you sure?')"  >Delete</a></td>
                                </tr>
                            @endforeach

                        </table>    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

 
@endsection

@section('footer')
    <script src="{{ asset('assetsadmin')}}/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="{{ asset('assetsadmin')}}/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assetsadmin')}}/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assetsadmin')}}/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assetsadmin')}}/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection