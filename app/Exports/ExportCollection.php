<?php

  namespace App\Exports;

  use DB;

  use Maatwebsite\Excel\Concerns\FromCollection;

  use Maatwebsite\Excel\Concerns\WithHeadings;

  use App\Models\Collection;

  use Illuminate\Contracts\View\View;

  use Maatwebsite\Excel\Concerns\FromView;
use Nette\Utils\Arrays;
use Session;


class ExportCollection implements FromCollection, WithHeadings {
    // private $date;

    // private $collections;

    // public function __construct(Arrays $collections)
    // {
    //   // $this->date = $date;
    //   $this->collections = $collections;
    // }

   public function headings(): array {


    return [

        "Date",

        "AR #",

        "Bill #",

        "Unit",

        "Tenant",

        "Owner",

        "Guest",

        "Particular",

        "Period Covered",

        "Amount",

       ];

    }

    // public function view(): View
    // {
    //     return view('properties.collections.export_dcr', [
    //         'collections' => Collection::where('property_uuid', Session::get('property_uuid'))->get()
    // ]);

    // }

   public function collection(){

      //  $collections = Collection::
      //  join('bills', 'bills.id',' collections.bill_id')
      //  ->join('units', 'collections.unit_uuid', 'units.uuid')
      //  ->join('tenants', 'collections.tenant_uuid', 'tenants.uuid')
      //  ->where('collections.property_uuid', Session::get('property_uuid'))->where('collections.is_posted', 1)
      //  ->orderBy('ar_no')
      //  ->get();

      $collections = Collection::
      select(
        DB::raw('CAST(collections.created_at AS DATE)'),
        'ar_no', 
        'bill_no', 
        'unit', 
         'tenant',
        'owner',
        'guest',
        'particular',
        DB::raw('concat(start," - ",end)'),
        'collection'
      )
      ->leftJoin('bills', 'collections.bill_id', 'bills.id')
      ->leftJoin('particulars', 'bills.particular_id', 'particulars.id')
      ->leftJoin('tenants', 'collections.tenant_uuid', 'tenants.uuid')
      ->leftJoin('owners', 'collections.owner_uuid', 'owners.uuid')
      ->leftJoin('guests', 'collections.guest_uuid', 'guests.uuid')
      ->leftJoin('units', 'collections.unit_uuid', 'units.uuid')
      ->where('collections.property_uuid', Session::get('property_uuid'))
      ->whereDate('collections.created_at',Session::get('export_dcr_date'))
      ->where('collections.is_posted',1)
      ->get();

       return collect($collections);

   }

  }