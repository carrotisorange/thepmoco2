<?php

namespace App\Charts;
use App\Models\UserProperty;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use DB;

class PortfolioChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $setAxis = UserProperty::select(DB::raw("(DATE_FORMAT(created_at,'%M %Y')) as month_year"))
       ->where('user_id', auth()->user()->id)
        ->orderBy('created_at')
        ->whereNotNull('created_at')
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
        ->pluck('month_year')
        ->toArray();

        $propertyData = UserProperty::select(DB::raw("(count(property_uuid)) as property_count"))
       ->where('user_id', auth()->user()->id)
        ->orderBy('created_at')
        ->whereNotNull('created_at')
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
        ->pluck('property_count')
        ->toArray();

    //     $properties = UserProperty::select(DB::raw("(property_uuid)"))
    //    ->where('user_id', auth()->user()->id)
    //     ->orderBy('created_at')
    //     ->whereNotNull('created_at')
    //     ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
    //     ->pluck('property_uuid')
    //     ->toArray();

    //     $userData = UserProperty::select(DB::raw("(count(user_id)) as user_count"))
    //     ->whereIn('property_uuid', $properties)
    //     ->orderBy('created_at')
    //     ->whereNotNull('created_at')
    //     ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
    //     ->pluck('user_count')
    //     ->toArray();

        return $this->chart->barChart()
            ->setTitle('Portfolio')
            ->setSubtitle('Property counts')
            ->addData('Property Count',$propertyData)
            // ->addData('User Count',$userData)
            ->setXAxis($setAxis);
    }
}
