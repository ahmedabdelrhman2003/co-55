<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\job\Job;
use App\Models\locations\Location;
use App\Models\services\Service;
use Illuminate\Support\Facades\App;

class ActivationController extends Controller
{
    function model(string $model, $id)
    {
        if ($model == 'Service') {
            $modelInstance = App::make("App\\Models\\services\\{$model}");
        } elseif ($model == 'Location') {
            $modelInstance = App::make("App\\Models\\locations\\{$model}");
        }

        // dd($modelInstance);
        $state = $modelInstance->find($id);
        if ($state->activation == 1) {
            $state->activation = '0';
        } else {
            $state->activation = '1';
        }
        $state->save();

        return redirect()->back();
    }
    function table($table, $id)
    {
        $state = DB::table($table)->select('activation')->find($id);
        if ($state->activation == 1) {
            DB::table($table)->where('id', $id)->update(['activation' => '0']);
        } else {
            DB::table($table)->where('id', $id)->update(['activation' => '1']);
        }

        return redirect()->back();
    }
}
