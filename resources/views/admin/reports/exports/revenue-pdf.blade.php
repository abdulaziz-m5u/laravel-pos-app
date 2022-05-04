<!DOCTYPE html>
<html>
  	<head>
		<meta charset="utf-8">
		<title>Revenue Reprot</title>
		<style type="text/css">
			table {
				width: 100%;
			}

			table tr td,
			table tr th {
				font-size: 10pt;
				text-align: center;
			}

			table tr:nth-child(even) {
				background-color: #f2f2f2;
			}

			table th, td {
  				border-bottom: 1px solid #ddd;
			}

			table th {
				border-top: 1px solid #ddd;
				height: 40px;
			}

			table td {
				height: 25px;
			}
		</style>
	</head>
  	<body>
		<h2>Revenue Report</h2>
		<hr>
		<p>Period : {{ $endDate }} - {{ $startDate }}</p>
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
 	</body>
</html>