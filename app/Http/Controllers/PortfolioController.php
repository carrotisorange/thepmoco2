<?php
namespace App\Http\Controllers;
use App\Charts\PortfolioChart;

class PortfolioController extends Controller
{
    public function index(PortfolioChart $chart)
    {
        return view('charts.portfolio', ['chart' => $chart->build()]);
    }
}
