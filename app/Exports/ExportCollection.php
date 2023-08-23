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

        // "#",

        "AR #",

        "Bill #",

        "Unit",

        "Bill to",

        "Particular",

        "Period Covered",

        "Amount"

       ];

    }




   public function collection(){

       $collections = Collection::
       join('bills', 'collections.bill_id',' bills.id')
       ->join('units', 'collections.unit_uuid', 'units.uuid')
       ->join('tenants', 'collections.tenant_uuid', 'tenants.uuid')
       ->where('collections.property_uuid', Session::get('property_uuid'))->where('collections.is_posted', 1)
       ->orderBy('ar_no')
       ->get();


       return collect($collections);

   }

}