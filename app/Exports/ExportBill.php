<?php

namespace App\Exports;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Bill;
use Session;
use Carbon\Carbon;

class ExportBill implements FromCollection, WithHeadings {

   public function headings(): array {

    return [

        "Bill #",

        "Date Posted",

        "Unit",

        "Tenant",

        "Owner",

        "Guest",

        "Particular",

        "Period Covered",

        "Amount Due",

       ];

    }

   public function collection(){

      $bills = Bill::
      select(
        'bill_no',
        DB::raw('CAST(bills.created_at AS DATE)'),
        'unit',
         'tenant',
        'owner',
        'guest',
        'particular',
        DB::raw('concat(start," - ",end)'),
        'bill'
      )
      ->leftJoin('particulars', 'bills.particular_id', 'particulars.id')
      ->leftJoin('tenants', 'bills.tenant_uuid', 'tenants.uuid')
      ->leftJoin('owners', 'bills.owner_uuid', 'owners.uuid')
      ->leftJoin('guests', 'bills.guest_uuid', 'guests.uuid')
      ->leftJoin('units', 'bills.unit_uuid', 'units.uuid')
      ->where('bills.property_uuid', Session::get('property_uuid'))
      ->where('bills.particular_id', Session::get('billParticularId'))
      ->whereMonth('bills.start', Carbon::parse(Session::get('billCreatedAt'))->month)
      ->whereYear('bills.start', Carbon::parse(Session::get('billCreatedAt'))->year)
      ->whereNotNull(Session::get('billType'))
      ->where('bills.is_posted',1)
      ->where('bills.status', 'unpaid')
      ->orderBy('bills.bill_no')
      ->get();

       return collect($bills);

   }

  }
