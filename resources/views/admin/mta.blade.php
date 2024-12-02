@extends('layouts.admin')

@section('title', 'Admin MTA')

@section('content')
    <div class="container">
        <h1>MTA Panel</h1>
        <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#addModal">
            Tambah Data MTA
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
                <h2>Data MTA</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead style="background-color: black">
                        <tr class="text-white">
                            <th>MTA Code</th>
                            <th>Event</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td>{{ $item->mta_code }}</td>
                                <td>{{ $item->event }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" onclick="editMta({{ $item }})">Edit</button>
                                    <form action="{{ route('admin.mta.destroy', $item->id) }}" method="POST" style="display:inline;">
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
                        <h5 class="modal-title" id="addModalLabel">Tambah Data MTA</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.mta.store') }}" method="POST" id="addForm">
                            @csrf
                            <div class="mb-3">
                                <label for="mta_code" class="form-label">MTA Code:</label>
                                <input type="text" class="form-control" name="mta_code" required>
                            </div>
                            <div class="mb-3">
                                <label for="event" class="form-label">Event:</label>
                                <input type="text" class="form-control" name="event" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description:</label>
                                <textarea name="description" class="form-control" required></textarea>
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
                            <h5 class="modal-title" id="editModalLabel">Edit Data MTA</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="edit_mta_code" class="form-label">MTA Code:</label>
                                <input type="text" class="form-control" name="mta_code" id="edit_mta_code" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_event" class="form-label">Event:</label>
                                <input type="text" class="form-control" name="event" id="edit_event" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_description" class="form-label">Description:</label>
                                <textarea name="description" class="form-control" id="edit_description" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function editMta(item) {
            $('#editModalLabel').text('Edit Data MTA');

            //action set
            $('#editForm').attr('action', `/admin/mta/${item.id}`);
            //item
            $('#edit_mta_code').val(item.mta_code);
            $('#edit_event').val(item.event);
            $('#edit_description').val(item.description);

            $('#editModal').modal('show');
        }
    </script>
@endsection
