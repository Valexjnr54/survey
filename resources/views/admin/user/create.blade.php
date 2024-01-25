@extends('layouts.admin.app')
@section('content')
    <section class="content-main" style="max-width: 720px">
        <div class="content-header">
            <h2 class="content-title">Create User </h2>
            <div>
                <!-- toggle discard modal.// -->
                <a class="btn btn-outline-danger" type="button" data-toggle="modal" data-target=".bd-example-modal-lg"> &times; Discard</a>
                <!---- Discard Modal Start----->
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModal" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-danger">
                                <h4 class="modal-title text-white" id="myExtraLargeModal">Are you sure?</h4>
                                <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body dark-modal">
                                <div class="large-modal-header"><i data-feather="chevrons-right"></i>
                                    <h7>All inputed data will be lost.</h7>
                                </div>
                                <br/>
                                <button class="btn btn-danger btn-xl" type="submit" onClick="refreshPage()">Discard</button>
                                <script>
                                    function refreshPage(){
                                        window.location.reload();
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <!--- Discard Modal End-------->
            </div>
        </div>
    
        <div class="card mb-4">
              <div class="card-body">
                <form action="{{ route('admin.store-user') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" name="name" placeholder="Type here" class="form-control">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" placeholder="Type here" class="form-control">
                    </div>
    
                    <div class="row gx-2">
                        <div class="col-sm-6 mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" value="Password" readonly placeholder="Type here" class="form-control">
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label class="form-label">Role</label>
                            <select class="form-select" name="role">
                                <option value="User"> User </option>
                                <option value="Admin"> Admin </option>
                            </select>
                        </div>
                        <span><strong style="color:red;">Note:</strong>password is Password</span><br><br>
                    </div> <!-- row.// -->
    
                    <button class="btn btn-primary" type="submit">Submit </button>
    
                </form>
              </div>
        </div> <!-- card end// -->
    
    
    </section>
@endsection