<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Venue;
use App\Models\User;
use App\Models\Event;

class ReportController extends Controller
{
    public function index()
    {
      
        $monthlyBookings = Booking::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->pluck('count', 'month');
      
   
        $monthlyVenues = Venue::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->pluck('count', 'month');

  
        $monthlyUsers = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->pluck('count', 'month');

  
        $monthlyEvents = Event::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->pluck('count', 'month');

      
        $months = range(1, 12);

      
        $finalMonthlyBookings = $this->prepareMonthlyData($monthlyBookings, $months);
        $finalMonthlyVenues = $this->prepareMonthlyData($monthlyVenues, $months);
        $finalMonthlyUsers = $this->prepareMonthlyData($monthlyUsers, $months);
        $finalMonthlyEvents = $this->prepareMonthlyData($monthlyEvents, $months);

        return view('reports.index', compact(
            'finalMonthlyBookings',
            'finalMonthlyVenues',
            'finalMonthlyUsers',
            'finalMonthlyEvents'
        ));
    }

    private function prepareMonthlyData($monthlyData, $months)
    {
        $data = [];

        foreach ($months as $month) {
            $data[$month] = $monthlyData->has($month) ? $monthlyData[$month] : 0;
        }

        return $data;
    }
}
