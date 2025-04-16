@extends('admin.layouts.main')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
                <h2 class="mb-1">Location List</h2>
            </div>
            <!-- Button to open create modal -->
            <div class="mb-2">
                <a href="#" data-bs-toggle="modal" data-bs-target="#add_location_modal" class="btn btn-primary"><i class="ti ti-circle-plus me-2"></i>Add New Location</a>
            </div>

            <!-- Locations List Table -->
            <div class="card">
                <div class="card-header">
                    <h5>Location List</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Map Link</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($locations as $location)
                                    <tr>
                                        <td>{{ $location->name }}</td>
                                        <td>{{ $location->map }}</td>
                                        <td>{{ $location->address }}</td>
                                        <td>{{ $location->phone }}</td>
                                        <td>{{ $location->email }}</td>
                                        <td>
                                            <!-- Edit button -->
                                            <a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_location_modal_{{ $location->id }}" data-id="{{ $location->id }}" data-name="{{ $location->name }}" data-lat="{{ $location->lat }}" data-long="{{ $location->long }}" data-address="{{ $location->address }}" data-phone="{{ $location->phone }}" data-email="{{ $location->email }}"><i class="ti ti-edit"></i></a>

                                            <!-- Delete button -->
                                            <a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#delete_location_modal_{{ $location->id }}" data-id="{{ $location->id }}"><i class="ti ti-trash"></i></a>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="edit_location_modal_{{ $location->id }}" tabindex="-1" aria-labelledby="edit_location_modal_{{ $location->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="edit_location_modal_{{ $location->id }}Label">Edit Location</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('locations.update', $location->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="edit-name-{{ $location->id }}" class="form-label">Name</label>
                                                            <input type="text" class="form-control" id="edit-name-{{ $location->id }}" name="name" value="{{ $location->name }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="edit-lat-{{ $location->id }}" class="form-label">Map Link</label>
                                                            <input type="text" class="form-control" id="edit-lat-{{ $location->id }}" name="lat" value="{{ $location->map }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="edit-address-{{ $location->id }}" class="form-label">Address</label>
                                                            <input type="text" class="form-control" id="edit-address-{{ $location->id }}" name="address" value="{{ $location->address }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="edit-phone-{{ $location->id }}" class="form-label">Phone</label>
                                                            <input type="text" class="form-control" id="edit-phone-{{ $location->id }}" name="phone" value="{{ $location->phone }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="edit-email-{{ $location->id }}" class="form-label">Email</label>
                                                            <input type="email" class="form-control" id="edit-email-{{ $location->id }}" name="email" value="{{ $location->email }}" required>
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
                                    <div class="modal fade" id="delete_location_modal_{{ $location->id }}" tabindex="-1" aria-labelledby="delete_location_modal_{{ $location->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                    <span class="avatar avatar-xl bg-transparent-danger text-danger mb-3">
                                                        <i class="ti ti-trash-x fs-36"></i>
                                                    </span>
                                                    <h4 class="mb-1">Confirm Delete</h4>
                                                    <p class="mb-3">Are you sure you want to delete this location? This action can't be undone.</p>
                                                    <div class="d-flex justify-content-center">
                                                        <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('locations.destroy', $location->id) }}" method="POST">
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
    <!-- Create Location Modal -->
<div class="modal fade" id="add_location_modal" tabindex="-1" aria-labelledby="add_location_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_location_modalLabel">Add New Location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('locations.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="lat" class="form-label">Map Link</label>
                        <input type="text" class="form-control" id="map" name="map" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Location</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection


