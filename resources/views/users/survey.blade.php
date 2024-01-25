@extends('layouts.user.app')
@section('content')
    <!-- Main Wrapper -->
    <div class="main-wrapper">
    
        
        
        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">
            
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Healthcare Facility Enrolment Questionnaire</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Survey</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data to be collected</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('entries.store') }}" method="POST">
                                    @csrf
                                    @include('survey::standard', ['survey' => $survey])
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>			
        </div>
        <!-- /Main Wrapper -->
    
    </div>
    <!-- /Main Wrapper -->		
@endsection