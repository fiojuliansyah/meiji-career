@extends('admin.layouts.main')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
                <h2 class="mb-1">Applicant List</h2>
            </div>

            <!-- Applicants List Table -->
            <div class="card">
                <div class="card-header">
                    <h5>Applicant List</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Resume</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($applicants as $applicant)
                                    <tr>
                                        <td>{{ $applicant->name }}</td>
                                        <td>{{ $applicant->email }}</td>
                                        <td>{{ $applicant->phone }}</td>
                                        <td>{{ $applicant->description }}</td>
                                        <td>
                                            {{ $applicant->status }}
                                        </td>
                                        
                                        
                                        <td><a class="btn btn-primary" href="{{ asset('storage/' . $applicant->resume) }}" target="_blank">View Resume</a></td>
                                        <td>
                                            <!-- Edit button -->
                                            <a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_applicant_modal_{{ $applicant->id }}" data-id="{{ $applicant->id }}" data-name="{{ $applicant->name }}" data-email="{{ $applicant->email }}" data-phone="{{ $applicant->phone }}" data-description="{{ $applicant->description }}"><i class="ti ti-edit"></i></a>

                                            <!-- Delete button -->
                                            <a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#delete_applicant_modal_{{ $applicant->id }}" data-id="{{ $applicant->id }}"><i class="ti ti-trash"></i></a>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="edit_applicant_modal_{{ $applicant->id }}" tabindex="-1" aria-labelledby="edit_applicant_modal_{{ $applicant->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="edit_applicant_modal_{{ $applicant->id }}Label">Edit Applicant</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('applicants.update', $applicant->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="edit-status-{{ $applicant->id }}" class="form-label">Status</label>
                                                            <select name="status" class="form-select" name="status">
                                                                <option value="applicant" {{ $applicant->status == 'applicant' ? 'selected' : '' }}>Applicant</option>
                                                                <option value="candidate" {{ $applicant->status == 'candidate' ? 'selected' : '' }}>Candidate</option>
                                                                <option value="interview" {{ $applicant->status == 'interview' ? 'selected' : '' }}>Interview</option>
                                                                <option value="training" {{ $applicant->status == 'training' ? 'selected' : '' }}>Training</option>
                                                                <option value="probation" {{ $applicant->status == 'probation' ? 'selected' : '' }}>Probation</option>
                                                                <option value="employee" {{ $applicant->status == 'employee' ? 'selected' : '' }}>Employee</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="edit-name-{{ $applicant->id }}" class="form-label">Name</label>
                                                            <input type="text" class="form-control" id="edit-name-{{ $applicant->id }}" name="name" value="{{ $applicant->name }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="edit-email-{{ $applicant->id }}" class="form-label">Email</label>
                                                            <input type="email" class="form-control" id="edit-email-{{ $applicant->id }}" name="email" value="{{ $applicant->email }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="edit-phone-{{ $applicant->id }}" class="form-label">Phone</label>
                                                            <input type="text" class="form-control" id="edit-phone-{{ $applicant->id }}" name="phone" value="{{ $applicant->phone }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="edit-description-{{ $applicant->id }}" class="form-label">Description</label>
                                                            <input type="text" class="form-control" id="edit-description-{{ $applicant->id }}" name="description" value="{{ $applicant->description }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="delete_applicant_modal_{{ $applicant->id }}" tabindex="-1" aria-labelledby="delete_applicant_modal_{{ $applicant->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                    <span class="avatar avatar-xl bg-transparent-danger text-danger mb-3">
                                                        <i class="ti ti-trash-x fs-36"></i>
                                                    </span>
                                                    <h4 class="mb-1">Confirm Delete</h4>
                                                    <p class="mb-3">Are you sure you want to delete this applicant? This action can't be undone.</p>
                                                    <div class="d-flex justify-content-center">
                                                        <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('applicants.destroy', $applicant->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
