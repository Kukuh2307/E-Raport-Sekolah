@extends('dashboard.layout.main')
@section('content')
<div class="row">
    <!-- Column -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block">
                    <div>
                        <h5 class="card-title mb-0">Sales Chart</h5>
                    </div>
                    <div class="ms-auto">
                        <ul class="list-inline text-center font-12">
                            <li><i class="fa fa-circle text-success"></i> SITE A</li>
                            <li><i class="fa fa-circle text-info"></i> SITE B</li>
                            <li><i class="fa fa-circle text-primary"></i> SITE C</li>
                        </ul>
                    </div>
                </div>
                <div class="" id="sales-chart" style="height: 355px;"></div>
            </div>
        </div>
    </div>
</div>
@endsection