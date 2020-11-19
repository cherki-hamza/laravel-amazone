@extends('back-end.master.admin-app')

@section('title' , 'Admin Dashboard')

@section('content')

<!-- start section -->
<div class="wrapper">

    <!-- Main top Header -->
     @include('back-end.inc.top-header')
    <!-- /Main top Header -->
      @include('back-end.inc.left-menu')
    <!-- Left menu sidebar -->

    <!--/ Left menu sidebar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- breadcrumb -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Main Admin</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>
        <!-- breadcrumb -->
        <!-- Main content -->
         @if(request()->is('admin/users'))
             @include('back-end.inc.users-content')
         @elseif(request()->is('admin/profile/'.$user->id))
             @include('back-end.inc.profile-content')
         @else
             @include('back-end.inc.dashboard-content')
         @endif
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<!-- end section -->

@endsection

@section('scripts')
    <script>
        console.log('welcome Admin Dashboard :)');
    </script>
@endsection
