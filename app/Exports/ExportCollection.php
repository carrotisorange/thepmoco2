<?php

namespace App\Exports;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Collection;
use Session;

class ExportCollection implements FromCollection, WithHeadings {

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

   public function collection(){

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
          ->leftJoin('deed_of_sales', 'collections.unit_uuid', 'deed_of_sales.unit_uuid')
      ->leftJoin('owners', 'deed_of_sales.owner_uuid', 'owners.uuid')
      ->leftJoin('guests', 'collections.guest_uuid', 'guests.uuid')
      ->leftJoin('units', 'collections.unit_uuid', 'units.uuid')
      ->where('collections.property_uuid', Session::get('property_uuid'))
      ->whereBetween('collections.created_at',[Session::get('export_dcr_start_date'), Session::get('export_dcr_end_date')])
      ->where('collections.is_posted',1)
      ->orderBy('collections.ar_no', 'asc')
      ->get();

       return collect($collections);

   }

  }
