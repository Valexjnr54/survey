@extends('layouts.admin.app')
@section('content')
<section class="content-main">

    <div class="content-header">
        <a href="view-survey.html" class="btn btn-light"><i class="material-icons md-arrow_back"></i> Go back </a>
    </div>
           
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">All Surveys</h5>
            <div class="table-responsive">
                <!-- all user list table// -->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Agent</th>
                            <th>Survey ID</th>
                            <th>Organization</th>
                            <th>CAC Reg.</th>
                            <th>Entry Date</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count =0
                        @endphp
                        @foreach($entries as $entry)
                            <!-- all user list table row// -->
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td width="30%">
                                    <a href="#" class="itemside">
                                        <div class="info pl-3">
                                            <h6 class="mb-0 title">{{ $entry->participant->name }}</h6>
                                            <small class="text-muted">User ID: #{{ $entry->participant->id }}</small>
                                        </div>
                                    </a>
                                </td>
                                <td>{{ $entry->id }}</td>
                                <td>{{ $entry->answers[0]->value }}</td>
                                <td>{{ $entry->answers[1]->value }}</td>
                                <td>{{ $entry->created_at }}</td>
                                <td class="text-end">
                                    <a href="{{ route('admin.survey-detail', ['participant_id' => $entry->participant->id, 'survey_id' => $entry->survey->id, 'entry_id'=>$entry->id]) }}" class="btn btn-light">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> <!-- table-responsive.// -->
            </div>
        </div> <!--  card-body.// -->
    </div> <!--  card.// -->
</section> 
@endsection
@push('scripts')
  <script>
  $(document).ready( function () {
      $('#userTable').DataTable();
  } );
</script>
@endpush