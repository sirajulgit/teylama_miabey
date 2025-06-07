@extends('admin.common.default')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">Contact Query List</h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 1%">No</th>
                                        <th style="width: 10%">Name</th>
                                        <th style="width: 10%">Email</th>
                                        <th style="width: 10%">Phone</th>
                                        <th style="width: 30%">Message</th>
                                        <th style="width: 10%" class="text-center">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['items'] as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                {{ $item->name }}
                                            </td>
                                            <td>
                                                {{ $item->email }}
                                            </td>
                                            <td>
                                                {{ $item->phone }}
                                            </td>
                                            <td>
                                                {{ $item->message }}
                                            </td>
                                            <td>
                                                {{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection



