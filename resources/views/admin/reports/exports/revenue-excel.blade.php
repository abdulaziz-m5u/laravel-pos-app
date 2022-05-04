<table>
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
                <td>No records found</td>
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