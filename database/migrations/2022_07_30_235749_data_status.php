<?php

use App\Models\Utils\Status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpOffice\PhpSpreadsheet\Calculation\Token\Stack;

class DataStatus extends Migration
{
    public function up()
    {
        $data = new Status();
        $data->id = 1;
        $data->module_id = 22;
        $data->name = 'Ag. Confirmação';
        $data->icon = 'square';
        $data->class = 'warning';
        $data->save();

        $data = new Status();
        $data->id = 2;
        $data->module_id = 22;
        $data->name = 'Confirmado';
        $data->icon = 'check-square';
        $data->class = 'success';
        $data->save();
    }

    public function down()
    {
        Status::whereIn('id', [1,2])->delete();
    }
}
