<?php

namespace App\Http\Controllers\Restaurant;

use App\Utils\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantRequest;

class RestaurantController extends Controller
{
    protected $restaurantService;

    public function __construct()
    {
        $this->restaurantService = app('RestaurantRepository');
    }

    public function index()
    {
        $restaurantData = $this->restaurantService->getAll();
        if ($restaurantData) {
            return Helper::ResponseAPI(null, $restaurantData);
        }
        return Helper::ResponseAPI('Does not exists restaurants registred yet', null, 404);
    }

    public function create(RestaurantRequest $request)
    {
        $restaurantCreate = $this->restaurantService->create([
            'owner_id' => Helper::AuthUserId(),
            'name' => $request->name,
            'location' => $request->location,
            'opening_hours' => $request->opening_hours,
            'cuisine_type' => $request->cuisine_type
        ]);

        if ($restaurantCreate) {
            return Helper::ResponseAPI('Restaurant created successfully', $restaurantCreate, 201);
        }
        return Helper::ResponseAPI('Whoops! Verify your enteries and try again.', null, 400);
    }

    public function update(RestaurantRequest $request, int $id)
    {
        $restaurantUpdate = $this->restaurantService->update($request->all(), $id);
        if ($restaurantUpdate) {
            return Helper::ResponseAPI('Restaurant updated successfully');
        }
        return Helper::ResponseAPI('Whoops! Something went wrong. Please, try again, and verify your entries', null, 400);
    }


    public function delete(int $id)
    {
        $restaurantDelete = $this->restaurantService->delete(['id' => $id]);
        if ($restaurantDelete) {
            return Helper::ResponseAPI('Restaurant deleted successfully');
        }
        return Helper::ResponseAPI('Whoops! Something went wrong. Please, try again, and verify your entries', null, 400);
    }
}
