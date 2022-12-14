@extends('layouts.master')
@section('title')
    Create New Project
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Create New Project</h4>
                            <form class="needs-validation" method="post" action="{{ route('project.save') }}" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="project_name">Project Name</label>
                                            <input type="text" class="form-control" id="project_name"
                                                   name="project_name"
                                                   placeholder="Project Name" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="validationCustom02">Project Category</label>
                                            <select class="form-control" id="project_cate" name="project_cate">
                                                <option value="UI/UX Design">UI/UX Design</option>
                                                <option value="Website Design">Website Design</option>
                                                <option value="App Development">App Development</option>
                                                <option value="Quality Assurance">Quality Assurance</option>
                                                <option value="Backend Development">Backend Development</option>
                                                <option value="Software Testing">Software Testing</option>
                                                <option value="Backend Testing">Backend Testing</option>
                                                <option value="Marketing">Marketing</option>
                                                <option value="SEO">SEO</option>
                                                <option value="Others">Others</option>
                                            </select>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="start_date">Project Start Date</label>
                                            <input class="form-control" type="date" id="start_date" name="start_date" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="end_date">Project End Date</label>
                                            <input class="form-control" type="date" id="end_date" name="end_date" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="project_doc">Project Document</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="project_doc" name="project_doc">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="budget">Budget</label>
                                            <input type="text" class="form-control" id="budget" name="budget"
                                                   placeholder="Budget" required>
                                            <div class="invalid-feedback">
                                                Please provide project budget.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="priority">Project Priority</label>
                                            <select class="form-control" name="priority" id="priority">
                                                <option value="High">High</option>
                                                <option value="Medium">Medium</option>
                                                <option value="Low">Low</option>
                                            </select>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="description">Project Description</label>
                                            <textarea required="" class="form-control" rows="5" id="description"
                                                      name="description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Create Project</button>
                            </form>
                        </div>
                    </div>
                    <!-- end card -->
                </div> <!-- end col -->
            </div>
        </div>
@endsection
