@extends('landlord.layout.wrapper') @section('content')
<!-- main content -->
<div class="container-fluid">

    <!--page heading-->
    <div class="row page-titles">

        <!-- bread crumbs -->
        @include('landlord.misc.crumbs')
        <!-- bread crumbs -->

    </div>
    <!--page heading-->


    <!-- page content -->
    <div class="row">
        <div class="col-12">
            <!--clients table-->
            @include('landlord.offlinepayments.table.table')
            <!--clients table-->
        </div>
    </div>
    <!--page content -->

</div>
<!--main content -->
@endsection