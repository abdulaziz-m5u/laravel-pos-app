<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RevenueExport implements FromView
{

    private $result;
    private $total_revenue;

	/**
	 * Create a new exporter instance.
	 *
	 * @param array $results query result
	 *
	 * @return void
	 */
	public function __construct($results, $total)
	{
        $this->result = $results;
        $this->total_revenue =  $total;
	}

	/**
	 * Load the view.
	 *
	 * @return void
	 */
	public function view(): View
	{
		return view(
			'admin.reports.exports.revenue-excel',
			[
                'reports' => $this->result,
                'total_revenue' => $this->total_revenue,
			]
		);
	}
}