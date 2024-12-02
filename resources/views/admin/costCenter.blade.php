@extends('layouts.admin')

@section('title', 'Admin Cost Center')

@section('content')
    <div class="container">
        <h1>Cost Center Panel</h1>
        <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#addModal">
            Tambah Data Cost Center
        </button>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h2>Data Cost Center</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead style="background-color: black">
                        <tr class="text-white">
                            <th>Cost Center Code</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td>{{ $item->cc_code }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" onclick="editCC({{ $item }})">Edit</button>
                                    <form action="{{ route('admin.costCenter.destroy', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Modal Add --}}
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Tambah Data Cost Center</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.costCenter.store') }}" method="POST" id="addForm">
                            @csrf
                            <div class="mb-3">
                                <label for="cc_code" class="form-label">Cost Center Code:</label>
                                <input type="text" class="form-control" name="cc_code" required>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Edit --}}
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Data Cost Center</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="edit_cc_code" class="form-label">Cost Center Code:</label>
                                <input type="text" class="form-control" name="cc_code" id="edit_cc_code" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_name" class="form-label">Name:</label>
                                <input type="text" class="form-control" name="name" id="edit_name" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function editCC(item) {
            $('#editModalLabel').text('Edit Data Cost Center');

            //action set
            $('#editForm').attr('action', `/admin/costCenter/${item.id}`);
            //item
            $('#edit_cc_code').val(item.cc_code);
            $('#edit_name').val(item.name);

            $('#editModal').modal('show');
        }
    </script>
@endsection
