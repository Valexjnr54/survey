@extends('layouts.admin.app')
@section('content')
<section class="content-main">

        <div class="content-header">
          <h2 class="content-title">Survey Detail</h2>
        </div>
    
    
        <div class="card">
            <header class="card-header">
                <div class="row align-items-center">
                  <div class="col-lg-6 col-md-6">
                    <span>
                      <b>Created On</b> <i class="material-icons md-calendar_today"></i> <b>{{ \Carbon\Carbon::parse($entry->created_at)->format('D, M d, Y, h:ia') }}</b>  
                    </span> <br>
                    <small class="text-muted">Survey ID: 23456789678i9o0987609hg</small>
                  </div>
                  <div class="col-lg-6 col-md-6 ms-auto text-md-end">
                    <a class="btn btn-secondary ms-2" href="#"><i class="icon material-icons md-print"></i></a>
                  </div>
                </div>
            </header> <!-- card-header end// -->

            <div class="card-body">
    
                <div class="row mb-5 order-info-wrap">
                    <div class="col-md-4">
                        <article class="icontext align-items-start">
                            <span class="icon icon-sm rounded-circle bg-primary-light">
                                <i class="text-primary material-icons md-home"></i>
                            </span>
                            <div class="text">
                                <h6 class="mb-1">Organization</h6> 
                                <p> {{ $entry->answers[0]->value }}</p>

                                <h6 class="mb-1">CAC No.</h6> 
                                <p>{{ $entry->answers[1]->value }}</p>

                                <h6 class="mb-1">Organization Type</h6> 
                                <p>{{ $entry->answers[2]->value }}</p>

                                <h6 class="mb-1">Organization Email</h6> 
                                <p>{{ $entry->answers[3]->value }}</p>

                                <h6 class="mb-1">Organization Website</h6> 
                                <p>{{ $entry->answers[4]->value }}</p>

                            </div>
                        </article> 
                    </div> <!-- col// -->

                    <div class="col-md-4">
                        <article class="icontext align-items-start">
                            <span class="icon icon-sm rounded-circle bg-primary-light">
                                <i class="text-primary material-icons md-person"></i>
                            </span>
                            <div class="text">
                                <h6 class="mb-1">Ownership Detail</h6> 
                                <p> {{ $entry->answers[12]->value }}</p>

                                <h6 class="mb-1">NIN</h6> 
                                <p>{{ $entry->answers[13]->value }}</p>

                                <h6 class="mb-1">Email</h6> 
                                <p>{{ $entry->answers[14]->value }}</p>

                                <h6 class="mb-1">Phone</h6> 
                                <p>{{ $entry->answers[15]->value }}</p>

                                <h6 class="mb-1">BVN</h6> 
                                <p>{{ $entry->answers[16]->value }}</p>

                            </div>
                        </article> 
                    </div> <!-- col// -->

                    <div class="col-md-4 mb-4">
                        <article class="icontext align-items-start">
                            <span class="icon icon-sm rounded-circle bg-primary-light">
                                <i class="text-primary material-icons md-place"></i>
                            </span>
                            <div class="text">
                                <h6 class="mb-1">Facility Name</h6> 
                                <p> {{ $entry->answers[5]->value }}</p>

                                <h6 class="mb-1">Facility Type</h6> 
                                <p>{{ $entry->answers[6]->value }}</p>

                                <h6 class="mb-1">Facility Address</h6> 
                                <p>{{ $entry->answers[7]->value }}</p>

                                <h6 class="mb-1">Facility Reg. No.</h6> 
                                <p>{{ $entry->answers[8]->value }}</p>

                                <h6 class="mb-1">Start Date of Certification</h6> 
                                <p>{{ $entry->answers[9]->value }}</p>

                                <h6 class="mb-1">Type of Facility</h6> 
                                <p>{{ $entry->answers[10]->value }}</p>

                                <h6 class="mb-1">Service offered</h6> 
                                <p>{{ $entry->answers[11]->value }}</p>
                            </div>
                        </article> 
                    </div> <!-- col// -->
    
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table border table-hover table-lg">
                                <h5>Registerer Details</h5>
                                <thead>
                                    <tr>
                                    <th width="30%">Full Name</th>
                                    <th width="20%">ID</th>
                                    <th width="20%">Email</th>
                                    <th width="20%" class="text-end">Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>{{$entry->participant->name}}</td>
                                    <td>#{{$entry->participant->id}}</td>
                                    <td> {{$entry->participant->email}}</td>
                                    <td class="text-end">{{$entry->participant->role}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> <!-- table-responsive// -->
                    </div>  <!-- col// -->
                </div>
            </div> <!-- card-body end// -->
        </div> <!-- card end// -->
    
    </section> 
@endsection
@push('scripts')
  <script>
  $(document).ready( function () {
      $('#userTable').DataTable();
  } );
</script>
@endpush