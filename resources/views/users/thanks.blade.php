@extends('layouts.user.app')
@section('content')
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">
                
                <div class="row">
                    <div class="col-lg-12">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                    </div>
                </div>
            
            </div>			
        </div>
        <!-- /Main Wrapper -->
    
    </div>
    <!-- /Main Wrapper -->		
@endsection