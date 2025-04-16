@extends('admin.layouts.main')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <!-- Breadcrumb -->
            <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
                <h2 class="mb-1">Departments</h2>
            </div>

            <!-- Button to open create modal -->
            <div class="mb-2">
                <a href="#" data-bs-toggle="modal" data-bs-target="#add_plans" class="btn btn-primary"><i class="ti ti-circle-plus me-2"></i>Add New Department</a>
            </div>

            <!-- Departments List Table -->
            <div class="card">
                <div class="card-header">
                    <h5>Department List</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($departments as $department)
                                    <tr>
                                        <td>{{ $department->name }}</td>
                                        <td>{{ $department->slug }}</td>
                                        <td>
                                            <!-- Edit button -->
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#edit_plans_{{ $department->id }}"><i class="ti ti-edit"></i></a>

                                            <!-- Delete button -->
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#delete_modal_{{ $department->id }}"><i class="ti ti-trash"></i></a>
                                        </td>
                                    </tr>

                                    <!-- Edit Plan Modal -->
                                    <div class="modal fade" id="edit_plans_{{ $department->id }}" tabindex="-1" aria-labelledby="edit_plans_{{ $department->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="edit_plans_{{ $department->id }}Label">Edit Department</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('departments.update', $department->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="edit-name-{{ $department->id }}" class="form-label">Department Name</label>
                                                            <input type="text" class="form-control" id="edit-name-{{ $department->id }}" name="name" value="{{ $department->name }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="edit-slug-{{ $department->id }}" class="form-label">Slug</label>
                                                            <input type="text" class="form-control" id="edit-slug-{{ $department->id }}" name="slug" value="{{ $department->slug }}" required readonly>
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

                                    <!-- Delete Confirmation Modal -->
                                    <div class="modal fade" id="delete_modal_{{ $department->id }}" tabindex="-1" aria-labelledby="delete_modal_{{ $department->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                    <span class="avatar avatar-xl bg-transparent-danger text-danger mb-3">
                                                        <i class="ti ti-trash-x fs-36"></i>
                                                    </span>
                                                    <h4 class="mb-1">Confirm Delete</h4>
                                                    <p class="mb-3">You want to delete this department. This can't be undone.</p>
                                                    <div class="d-flex justify-content-center">
                                                        <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('departments.destroy', $department->id) }}" method="POST">
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
    <!-- Add Plan Modal -->
<div class="modal fade" id="add_plans">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Department</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('departments.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Department Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Department</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

