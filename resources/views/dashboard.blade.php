@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h2 class="card-title">Dashborad</h2>
                        </div>
                        <div class="col-sm-6">
                          
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Total No. Of Users</h5>
                <h3 class="card-title"><i class="tim-icons icon-single-02 text-primary"></i> {{$total_users ?? ''}}</h3>
              </div>
              <div class="card-body">
              
              </div>
            </div>
          </div>
            <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Total Dishes</h5>
                <h3 class="card-title"><i class="icon-atom text-primary"></i> {{$total_menus ?? ''}}</h3>
              </div>
              <div class="card-body">
               
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Total Orders</h5>
                <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> {{$total_orders ?? ''}}</h3>
              </div>
              <div class="card-body">
              
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Total No. Of Delivered Orders</h5>
                <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> {{$delivered_orders ?? ''}}</h3>
              </div>
              <div class="card-body">
               
              </div>
            </div>
          </div>
            <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Total No. Of Pending Orders</h5>
                <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> {{$pending_orders ??''}}</h3>
              </div>
              <div class="card-body">
               
              </div>
            </div>
          </div>
           <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Total Revenue</h5>
                <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i>CHF {{$total_revenue ?? ''}}</h3>
              </div>
              <div class="card-body">
               
              </div>
            </div>
          </div>
         
      </div>
   
@endsection

@push('js')
    <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
    </script>
@endpush
