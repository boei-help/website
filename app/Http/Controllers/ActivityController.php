<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Visitor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ActivityController extends Controller
{
    /**
     * Save new activity
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|alpha_dash|max:255',
            'name' => 'nullable|string|max:1000',
            'query' => 'nullable|json|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json(['ko'], Response::HTTP_BAD_REQUEST);
        }

        $visitor = Visitor::getOrCreate();

        $activity = new Activity;
        $activity->type = $request->type;
        $activity->name = $request->name;
        $activity->query = $request->get('query'); // https://stackoverflow.com/questions/48007222/parameterbag-could-not-be-converted-to-string-laravel-5-5/51198085
        $visitor->activities()->save($activity);

        return response()->json(['ok'], Response::HTTP_ACCEPTED);
    }
}
