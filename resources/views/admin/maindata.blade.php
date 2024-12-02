@extends('layouts.admin')

@section('title', 'Main Data')

@section('content')
<div class="container">
    <h1>Main Data Panel</h1>
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#addModal">
        Tambah Data Main
    </button>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
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

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead style="background-color: black">
                <tr class="text-white">
                    <th>Date</th>
                    <th>Nomor Proposal</th>
                    <th>Deskripsi Pekerjaan</th>
                    <th>Amount SC</th>
                    <th>Amount PO</th>
                    <th>Budget</th>
                    <th>Cost Center</th>
                    <th>MTA</th>
                    <th>Vendor</th>
                    <th>SC No</th>
                    <th>PO No</th>
                    <th>Status GR</th>
                    <th>Periode</th>
                    <th>GR No</th>
                    <th>Note</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{ $item->date }}</td>
                        <td>{{ $item->nomor_proposal }}</td>
                        <td>{{ $item->deskripsi_pekerjaan }}</td>
                        <td>{{ $item->amount_sc }}</td>
                        <td>{{ $item->amount_po }}</td>
                        <td>{{ $item->budget }}</td>
                        <td>{{ $item->costCenter->cc_code }}</td>
                        <td>{{ $item->mta->mta_code }}</td>
                        <td>{{ $item->vendor }}</td>
                        <td>{{ $item->sc_no }}</td>
                        <td>{{ $item->po_no }}</td>
                        <td>{{ $item->status_gr }}</td>
                        <td>{{ $item->periode }}</td>
                        <td>{{ $item->gr_no }}</td>
                        <td>{{ $item->note }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" onclick="editMainData({{ $item }})">Edit</button>
                            <form action="{{ route('user.maindata.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- Add Modal --}}
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Data Main</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.maindata.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" name="date" required>
                            </div>
                            <div class="mb-3">
                                <label for="nomor_proposal" class="form-label">Nomor Proposal</label>
                                <input type="text" class="form-control" name="nomor_proposal" >
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi_pekerjaan" class="form-label">Deskripsi Pekerjaan</label>
                                <input type="text" class="form-control" name="deskripsi_pekerjaan" required>
                            </div>
                            <div class="mb-3">
                                <label for="amount_sc" class="form-label">Amount SC</label>
                                <input type="number" class="form-control" name="amount_sc" step="0.01" required>
                            </div>
                            <div class="mb-3">
                                <label for="amount_po" class="form-label">Amount PO</label>
                                <input type="number" class="form-control" name="amount_po" step="0.01" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="budget" class="form-label">Budget</label>
                                <input type="text" class="form-control" name="budget">
                            </div>
                            <div class="mb-3">
                                <label for="cost_center_id" class="form-label">Cost Center</label>
                                <select class="form-control" name="cost_center_id" required>
                                    <option value="">Pilih Opsi</option>
                                    @foreach ($costCenters as $costCenter)
                                        <option value="{{ $costCenter->id }}">{{ $costCenter->cc_code }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="mta_id" class="form-label">MTA</label>
                                <select class="form-control" name="mta_id" required>
                                    <option value="">Pilih Opsi</option>
                                    @foreach ($mtas as $mta)
                                        <option value="{{ $mta->id }}">{{ $mta->mta_code }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="vendor" class="form-label">Vendor</label>
                                <input type="text" class="form-control" name="vendor" required>
                            </div>
                            <div class="mb-3">
                                <label for="sc_no" class="form-label">SC No</label>
                                <input type="text" class="form-control" name="sc_no" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="po_no" class="form-label">PO No</label>
                                <input type="text" class="form-control" name="po_no" required>
                            </div>
                            <div class="mb-3">
                                <label for="status_gr" class="form-label">Status GR</label>
                                <input type="text" class="form-control" name="status_gr" required>
                            </div>
                            <div class="mb-3">
                                <label for="periode" class="form-label">Periode</label>
                                <input type="text" class="form-control" name="periode" required>
                            </div>
                            <div class="mb-3">
                                <label for="gr_no" class="form-label">GR No</label>
                                <input type="text" class="form-control" name="gr_no">
                            </div>
                            <div class="mb-3">
                                <label for="note" class="form-label">Note</label>
                                <textarea class="form-control" name="note"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary w-100">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Edit Modal --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data Main</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="edit_date" class="form-label">Date</label>
                                <input type="date" class="form-control" name="date" id="edit_date" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_nomor_proposal" class="form-label">Nomor Proposal</label>
                                <input type="text" class="form-control" name="nomor_proposal" id="edit_nomor_proposal" >
                            </div>
                            <div class="mb-3">
                                <label for="edit_deskripsi_pekerjaan" class="form-label">Deskripsi Pekerjaan</label>
                                <input type="text" class="form-control" name="deskripsi_pekerjaan" id="edit_deskripsi_pekerjaan" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_amount_sc" class="form-label">Amount SC</label>
                                <input type="number" class="form-control" name="amount_sc" id="edit_amount_sc" step="0.01" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_amount_po" class="form-label">Amount PO</label>
                                <input type="number" class="form-control" name="amount_po" id="edit_amount_po" step="0.01" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="edit_budget" class="form-label">Budget</label>
                                <input type="text" class="form-control" name="budget" id="edit_budget" >
                            </div>
                            <div class="mb-3">
                                <label for="edit_cost_center_id" class="form-label">Cost Center</label>
                                <select class="form-control" name="cost_center_id" id="edit_cost_center_id" required>
                                    @foreach ($costCenters as $costCenter)
                                        <option value="{{ $costCenter->id }}">{{ $costCenter->cc_code }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="edit_mta_id" class="form-label">MTA</label>
                                <select class="form-control" name="mta_id" id="edit_mta_id" required>
                                    @foreach ($mtas as $mta)
                                        <option value="{{ $mta->id }}">{{ $mta->mta_code }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="edit_vendor" class="form-label">Vendor</label>
                                <input type="text" class="form-control" name="vendor" id="edit_vendor" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_sc_no" class="form-label">SC No</label>
                                <input type="text" class="form-control" name="sc_no" id="edit_sc_no" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="edit_po_no" class="form-label">PO No</label>
                                <input type="text" class="form-control" name="po_no" id="edit_po_no" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_status_gr" class="form-label">Status GR</label>
                                <input type="text" class="form-control" name="status_gr" id="edit_status_gr" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_periode" class="form-label">Periode</label>
                                <input type="text" class="form-control" name="periode" id="edit_periode" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_gr_no" class="form-label">GR No</label>
                                <input type="text" class="form-control" name="gr_no" id="edit_gr_no">
                            </div>
                            <div class="mb-3">
                                <label for="edit_note" class="form-label">Note</label>
                                <textarea class="form-control" name="note" id="edit_note"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function editMainData(item) {
        $('#editModalLabel').text('Edit Data Main');

        //action set
        $('#editForm').attr('action', `/maindata/${item.id}`);

        //item
        $('#edit_date').val(item.date);
        $('#edit_nomor_proposal').val(item.nomor_proposal);
        $('#edit_deskripsi_pekerjaan').val(item.deskripsi_pekerjaan);
        $('#edit_amount_sc').val(item.amount_sc);
        $('#edit_amount_po').val(item.amount_po);
        $('#edit_budget').val(item.budget);
        $('#edit_cost_center_id').val(item.cost_center_id);
        $('#edit_mta_id').val(item.mta_id);
        $('#edit_vendor').val(item.vendor);
        $('#edit_sc_no').val(item.sc_no);
        $('#edit_po_no').val(item.po_no);
        $('#edit_status_gr').val(item.status_gr);
        $('#edit_periode').val(item.periode);
        $('#edit_gr_no').val(item.gr_no);
        $('#edit_note').val(item.note);

        // Show the edit modal
        $('#editModal').modal('show');
    }
</script>
@endsection
