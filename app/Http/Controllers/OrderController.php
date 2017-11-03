<?php
/**
 * Created by PhpStorm.
 * User: Back-End
 * Date: 31.10.2017
 * Time: 15:50
 */

namespace App\Http\Controllers;

use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Class OrderController
 * @package App\Http\Controllers
 */
class OrderController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:191',
            'phone' => 'required',
            'email' => 'required',
            //'company' => 'required',
            'text' => 'required',
        ]);
        if ($request->hasFile('file')) {
            $request->validate([
                'file.*' => ['max:20000', 'mimes:x3*,txt,pdf,docx,doc,xls,jp*,png,gif,bpm,psd,cdr,jpeg'],
            ]);
            $fileArr = [];
            foreach ($request->file('file') as $file) {
                $currentDate = Carbon::now()->format('FY');

                $path = public_path('storage/orders/') . $currentDate;

                if (!file_exists($path)) {
                    mkdir($path);
                }

                $newName = $validatedData['name'] . '_' . rand(0, 9999) . '.' . $file->getClientOriginalExtension();
                $file->move($path, $newName);

                $fileArr[] = [
                    'download_link' => 'orders/' . $currentDate . '/' . $newName,
                    "original_name" => $file->getClientOriginalName()
                ];
            }
            $validatedData['file'] = json_encode($fileArr);

        }
        Order::create($validatedData);

        return response('success', 200);
    }
}