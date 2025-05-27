@extends('admin.common.default')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">User List</h3>

                            <div class="card-tools">
                                <a href="{{ route('user_create') }}" class="btn btn-primary">Add</a>
                            </div>

                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        {{-- <th style="width: 1%">No</th> --}}
                                        <th style="width: 5%">Name</th>
                                        <th style="width: 10%">Email</th>

                                        <th style="width: 8%" class="text-center">Status</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['items'] as $item)
                                        <tr>
                                            {{-- <th>{{ $loop->index + 1 }}</th> --}}
                                            <td style="text-align: center;">{{ $item->name }}</td>
                                            <td>
                                               {{ $item->email }}
                                            </td>


                                            <td class="project-state">
                                                @if ($item->status == 1)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Not Active</span>
                                                @endif
                                            </td>
                                            <td class="project-actions">
                                                <a class="btn btn-info btn-sm" href="{{ Route('user_edit', $item->id) }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    Edit
                                                </a>

                                                <button type="submit" class="btn btn-danger btn-sm del-record"
                                                    data-id="{{ $item->id }}" style="display: inline;">
                                                    <i class="fas fa-trash"></i>
                                                    Delete
                                                </button>

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


@section('script_content')
    <script>
        $(document).ready(function() {

            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


            $(document).on('click', '.del-record', function() {

                var data_id = $(this).attr('data-id');

                Swal.fire({
                    title: "Do you want to delete?",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {


                        let url = "{{ route('user_delete') }}";


                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },
                            url: `${url}`,
                            method: "POST",
                            contentType: "application/json; charset=utf-8",
                            traditional: true,
                            data: JSON.stringify({
                                id: data_id
                            }),
                            success: function(response) {
                                console.log(response);
                                window.location.reload();
                            },
                            error: function(error) {
                                console.log("error" + error);
                            }
                        });



                    }
                });


            })

        })
    </script>
@endsection
