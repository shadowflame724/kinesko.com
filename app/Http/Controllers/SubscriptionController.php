<?php
/**
 * Created by PhpStorm.
 * User: Back-End
 * Date: 31.10.2017
 * Time: 15:32
 */

namespace App\Http\Controllers;

use App\Callback;
use App\Subscribe;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:191',
            'email' => 'required|max:191|unique:subscriptions,email',
        ]);

        $callback = new Subscribe();
        $callback->name = $validatedData['name'];
        $callback->email = $validatedData['email'];
        $callback->save();

        return response('success', 200);

    }
}