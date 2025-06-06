@extends('admin.common.default')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">Blog List</h3>

                            <div class="card-tools">
                                <a href="{{ route('blog_create') }}" class="btn btn-primary">Add</a>
                            </div>

                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 1%">No</th>
                                        <th style="width: 10%">Image</th>
                                        <th style="width: 20%">Blog Title</th>
                                        <th style="width: 20%">Blog Slug</th>
                                        <th style="width: 10%">Date</th>
                                        <th style="width: 8%" class="text-center">Blog Status</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['items'] as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                <img src="{{ $item->image }}" alt="" width="80px"
                                                    height="50px" />
                                            </td>
                                            <td>
                                                {{ $item->title }}
                                            </td>
                                            <td>
                                                {{ $item->slug }}
                                            </td>
                                            <td>
                                                {{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}
                                            </td>
                                            <td class="project-state">
                                                @if ($item->status == "active")
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td class="project-actions">
                                                <a class="btn btn-info btn-sm" href="{{ Route('blog_edit', $item->id) }}">
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


                        let url = "{{ route('blog_delete') }}";


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
