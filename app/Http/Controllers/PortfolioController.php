<?php
namespace App\Http\Controllers;
use App\Charts\PortfolioChart;
class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PortfolioChart $chart)
    {
        return view('charts.portfolio', ['chart' => $chart->build()]);
    }
}
