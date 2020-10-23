<?php

namespace App\Imports;

use App\Stores;
use App\Models\Store;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class StoresImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        unset($rows[0]);
        $all_records =  $rows->toArray();

        foreach ($all_records as $row)
        {
            $inventory =  Store::where(['address' => $row[0]])->first();
            if($inventory){
                $inventory->sales = intval($inventory->sales + $row[2]);
                $inventory->save();
            }else {
                Store::create(['address' => $row[0],'city' => $row[1], 'sales' => $row[2]]);
            }
        }

    }

}
