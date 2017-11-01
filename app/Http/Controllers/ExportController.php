<?php
/**
 * Created by PhpStorm.
 * User: Back-End
 * Date: 01.11.2017
 * Time: 16:09
 */

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    private $items;

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param mixed $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    public function export(Request $request)
    {
        $className = '\\' . $request->modelName;
        $object = new $className();
        $this->setItems($object->all());

        Excel::create($className . Carbon::now()->format('d_M_Y'), function($excel) {

            $excel->sheet('Page', function($sheet) {

                $sheet->fromModel($this->getItems());

            });

        })->export('xls');

        return response('success', 200);
    }
}