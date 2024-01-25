@extends('layouts.admin.app')
@section('content')
  <section class="content-main">
    <div class="content-header">
        <h2 class="content-title"> Users </h2>
        <div>
            <a href="dashboard" class="btn btn-primary"><< Dashboard</a>
        </div>
    </div>

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
                            <th>Registered</th>
                            <th class="text-end"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($users))
                        @php
                            $count = 1;
                        @endphp
                        @foreach($users as $user)
                            <!-- all user list table row// -->
                            <tr>
                                <td>{{$count++}}</td>
                                <td width="30%">
                                    <a href="#" class="itemside">
                                        <div class="info pl-3">
                                            <h6 class="mb-0 title">{{ $user->name }}</h6>
                                            <small class="text-muted">User ID: #{{ $user->id }}</small>
                                        </div>
                                    </a>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{  $user->created_at }}</td>
                                <td class="text-end">
                                    <a href="{{ route('admin.edit-user', ['user_id' => $user->id]) }}" class="btn btn-light">Edit User</a>
                                    <a class="btn btn-danger" href="{{ route('admin.delete-user', ['id' => $user->id]) }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('delete-form').submit();">
                                            <i class="icon material-icons md-delete"></i>
                                        </a>
                                    <form id="delete-form" action="{{ route('admin.delete-user', ['id' => $user->id]) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
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
