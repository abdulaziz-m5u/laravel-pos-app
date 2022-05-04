@extends('layouts.admin')

@section('content')
	<div class="container">
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Revenue Report</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.reports.revenue') }}" method="get" class="mb-5">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group mb-2">
                                            <input type="text" class="form-control datepicker" readonly="" value="{{ !empty(request()->input('start')) ? request()->input('start') : '' }}" name="start" placeholder="from">
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group mx-sm-3 mb-2">
                                            <input type="text" class="form-control datepicker" readonly="" value="{{ !empty(request()->input('end')) ? request()->input('end') : '' }}" name="end" placeholder="to">
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group mx-sm-3 mb-2">
                                            <select name="export" class="form-control">
                                                <option value="xlsx">excel</option>
                                                <option value="pdf">pdf</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group mx-sm-3 mb-2">
                                            <button type="submit" class="btn btn-primary btn-default">Go</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                           <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                    <thead>
                                        <th>No</th>
                                        <th>Date</th>
                                        <th>Total Revenue</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($reports as $report)
                                            <tr>    
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $report['date'] }}</td>
                                                <td>${{ $report['revenue'] }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6">No records found</td>
                                            </tr>
                                        @endforelse

                                        @if ($reports)
                                            <tr>
                                                <td>Total</td>
                                                <td></td>
                                                <td><strong>${{ number_format($total_revenue,2) }}</strong></td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script-alt')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.datepicker').datepicker({
			format: 'yyyy-mm-dd'
		});
    </script>
@endpush