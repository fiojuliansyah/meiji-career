@extends('admin.layouts.main')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
                <h2 class="mb-1">Career List</h2>
            </div>
            <!-- Button to open create modal -->
            <div class="mb-2">
                <a href="#" data-bs-toggle="modal" data-bs-target="#add_career_modal" class="btn btn-primary"><i class="ti ti-circle-plus me-2"></i>Add New Career</a>
            </div>

            <!-- Career List Table -->
            <div class="card">
                <div class="card-header">
                    <h5>Career List</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Department</th>
                                    <th>Job Level</th>
                                    <th>Deadline Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($careers as $career)
                                    <tr>
                                        <td>{{ $career->name }}</td>
                                        <td>{{ $career->location->name }}</td>
                                        <td>{{ $career->department->name }}</td>
                                        <td>{{ $career->job_level }}</td>
                                        <td>{{ $career->deadline_date }}</td>
                                        <td>
                                            <!-- Edit button -->
                                            <a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#edit_career_modal_{{ $career->id }}" data-id="{{ $career->id }}" data-name="{{ $career->name }}" data-location="{{ $career->location_id }}" data-department="{{ $career->department_id }}" data-joblevel="{{ $career->job_level }}" data-experience="{{ $career->experience }}" data-worktype="{{ $career->work_type }}" data-jobtype="{{ $career->job_type }}" data-deadline="{{ $career->deadline_date }}" data-description="{{ $career->description }}"><i class="ti ti-edit"></i></a>

                                            <!-- Delete button -->
                                            <a href="#" class="me-2" data-bs-toggle="modal" data-bs-target="#delete_career_modal_{{ $career->id }}" data-id="{{ $career->id }}"><i class="ti ti-trash"></i></a>
                                        </td>
                                    </tr>

                                    <!-- Edit Career Modal -->
                                    <div class="modal fade" id="edit_career_modal_{{ $career->id }}" tabindex="-1" aria-labelledby="edit_career_modal_{{ $career->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="edit_career_modal_{{ $career->id }}Label">Edit Career</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('careers.update', $career->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="edit-name" class="form-label">Career Name</label>
                                                                    <input type="text" class="form-control" id="edit-name" name="name" value="{{ $career->name }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="edit-location" class="form-label">Location</label>
                                                                    <select class="form-control" id="edit-location" name="location_id" required>
                                                                        @foreach($locations as $location)
                                                                            <option value="{{ $location->id }}" @if($location->id == $career->location_id) selected @endif>{{ $location->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="edit-department" class="form-label">Department</label>
                                                                    <select class="form-control" id="edit-department" name="department_id" required>
                                                                        @foreach($departments as $department)
                                                                            <option value="{{ $department->id }}" @if($department->id == $career->department_id) selected @endif>{{ $department->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="edit-joblevel" class="form-label">Job Level</label>
                                                                    <select class="form-control" id="edit-joblevel" name="job_level" required>
                                                                        <option value="Internship" @if($career->job_level == 'Internship') selected @endif>Internship</option>
                                                                        <option value="Entry Level" @if($career->job_level == 'Entry Level') selected @endif>Entry Level</option>
                                                                        <option value="Associate" @if($career->job_level == 'Associate') selected @endif>Associate</option>
                                                                        <option value="Mid Level" @if($career->job_level == 'Mid Level') selected @endif>Mid Level</option>
                                                                        <option value="Director" @if($career->job_level == 'Director') selected @endif>Director</option>
                                                                        <option value="Executive" @if($career->job_level == 'Executive') selected @endif>Executive</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="edit-experience" class="form-label">Experience</label>
                                                            <input type="text" class="form-control" id="edit-experience" name="experience" value="{{ $career->experience }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="edit-worktype" class="form-label">Work Type</label>
                                                            <select class="form-control" id="edit-worktype" name="work_type" required>
                                                                <option value="On-site" @if($career->work_type == 'On-site') selected @endif>On-site</option>
                                                                <option value="Remote" @if($career->work_type == 'Remote') selected @endif>Remote</option>
                                                                <option value="Hybrid" @if($career->work_type == 'Hybrid') selected @endif>Hybrid</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="edit-jobtype" class="form-label">Job Type</label>
                                                            <select class="form-control" id="edit-jobtype" name="job_type" required>
                                                                <option value="Full Time" @if($career->job_type == 'Full Time') selected @endif>Full Time</option>
                                                                <option value="Part Time" @if($career->job_type == 'Part Time') selected @endif>Part Time</option>
                                                                <option value="Remote Jobs" @if($career->job_type == 'Remote Jobs') selected @endif>Remote Jobs</option>
                                                                <option value="Freelancer" @if($career->job_type == 'Freelancer') selected @endif>Freelancer</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="edit-deadline_date" class="form-label">Deadline Date</label>
                                                            <input type="date" class="form-control" id="edit-deadline_date" name="deadline_date" value="{{ $career->deadline_date }}" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="edit-qualification" class="form-label">Qualification</label>
                                                                <select class="form-control" id="edit-qualification" name="qualification" required>
                                                                    <option value="Bachelor" @if($career->qualification == 'Bachelor') selected @endif>Bachelor</option>
                                                                    <option value="Master" @if($career->qualification == 'Master') selected @endif>Master</option>
                                                                    <option value="PhD" @if($career->qualification == 'PhD') selected @endif>PhD</option>
                                                                    <option value="Other" @if($career->qualification == 'Other') selected @endif>Other</option>
                                                                </select>
                                                            </div>
                                                        </div>                                                        
                                                        <div class="mb-3">
                                                            <label for="edit-description" class="form-label">Description</label>
                                                            <textarea class="form-control" id="edit-description" name="description" required>{{ $career->description }}</textarea>
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

                                    <!-- Delete Career Modal -->
                                    <div class="modal fade" id="delete_career_modal_{{ $career->id }}" tabindex="-1" aria-labelledby="delete_career_modal_{{ $career->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                    <span class="avatar avatar-xl bg-transparent-danger text-danger mb-3">
                                                        <i class="ti ti-trash-x fs-36"></i>
                                                    </span>
                                                    <h4 class="mb-1">Confirm Delete</h4>
                                                    <p class="mb-3">Are you sure you want to delete this career? This action can't be undone.</p>
                                                    <div class="d-flex justify-content-center">
                                                        <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('careers.destroy', $career->id) }}" method="POST">
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

    <!-- Create Career Modal -->
    <div class="modal fade" id="add_career_modal" tabindex="-1" aria-labelledby="add_career_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add_career_modalLabel">Add New Career</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('careers.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Career Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="location" class="form-label">Location</label>
                                    <select class="form-control" id="location" name="location_id" required>
                                        @foreach($locations as $location)
                                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="department" class="form-label">Department</label>
                                    <select class="form-control" id="department" name="department_id" required>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="joblevel" class="form-label">Job Level</label>
                                    <select class="form-control" id="joblevel" name="job_level" required>
                                        <option value="Internship">Internship</option>
                                        <option value="Entry Level">Entry Level</option>
                                        <option value="Associate">Associate</option>
                                        <option value="Mid Level">Mid Level</option>
                                        <option value="Director">Director</option>
                                        <option value="Executive">Executive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="experience" class="form-label">Experience</label>
                            <input type="text" class="form-control" id="experience" name="experience" required>
                        </div>
                        <div class="mb-3">
                            <label for="worktype" class="form-label">Work Type</label>
                            <select class="form-control" id="worktype" name="work_type" required>
                                <option value="On-site">On-site</option>
                                <option value="Remote">Remote</option>
                                <option value="Hybrid">Hybrid</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jobtype" class="form-label">Job Type</label>
                            <select class="form-control" id="jobtype" name="job_type" required>
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Remote Jobs">Remote Jobs</option>
                                <option value="Freelancer">Freelancer</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="deadline_date" class="form-label">Deadline Date</label>
                            <input type="date" class="form-control" id="deadline_date" name="deadline_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="qualification" class="form-label">Qualification</label>
                            <select class="form-control" id="qualification" name="qualification" required>
                                <option value="Bachelor">Bachelor</option>
                                <option value="Master">Master</option>
                                <option value="PhD">PhD</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Career</button>
                    </div>
                </form>
            </div>
        </div>
    </div>    
@endsection
{{-- 
@push('js')
<script>
    ClassicEditor
        .create(document.querySelector('#description'))
        .catch(error => {
            console.error(error);
        });
</script>
@endpush --}}
