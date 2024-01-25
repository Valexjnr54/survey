@extends('layouts.admin.app')
@section('content')
<section class="content-main">
    <div class="content-header">
        <h2 class="content-title"> Dashboard </h2>
        <div>
            <a href="create-user" class="btn btn-primary">Create User</a>
        </div>
    </div>
    <!-- card row start.// -->
    <div class="row">

        <!-- total user card.// -->
        <div class="col-lg-4">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-primary-light"><i class="text-success material-icons md-person"></i></span>
                    <div class="text">
                        <h6 class="mb-1">Total Users</h6>  <span>{{ $user_count }}</span>
                    </div>
                </article> 
            </div> <!-- card  end// -->
        </div> <!-- col end// -->

        <!-- total survey card.// -->
        <div class="col-lg-4">
            <div class="card card-body mb-4">
                <article class="icontext">
                <span class="icon icon-sm rounded-circle bg-success-light"><i class="text-success material-icons md-pie_chart"></i></span>
                <div class="text">
                    <h6 class="mb-1">Total Surveys</h6> <span>{{ $entries_count }}</span>
                </div>
                </article> 
            </div> <!-- card end// -->
        </div> <!-- col end// -->

        <!-- total admin card.// -->
        <div class="col-lg-4">
            <div class="card card-body mb-4">
                <article class="icontext">
                <span class="icon icon-sm rounded-circle bg-warning-light"><i class="text-warning material-icons md-person"></i></span>
                <div class="text">
                    <h6 class="mb-1">Total Admin</h6>  <span>{{ $admin_count }}</span>
                </div>
                </article>
            </div>
        </div> <!-- col end// -->
    </div> <!-- row end// -->

    <!-- all user list// -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <!-- all user list table// -->
                <table id="userTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="text-end"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($entries) > 0)
                            @foreach($entries as $entry)
                                <!-- all user list table row// -->
                                <tr>
                                    <td>1</td>
                                    <td width="30%">
                                        <a href="#" class="itemside">
                                            <div class="info pl-3">
                                                <h6 class="mb-0 title">{{ $entry->participant->name }}</h6>
                                                <small class="text-muted">User ID: #{{ $entry->participant->id }}</small>
                                            </div>
                                        </a>
                                    </td>
                                    <td>{{ $entry->participant->email }}</td>
                                    <td>{{ $entry->participant->role }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.view-user-survey', ['participant_id' => $entry->participant->id]) }}" class="btn btn-light">View Survey</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table> <!-- table-responsive.// -->
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