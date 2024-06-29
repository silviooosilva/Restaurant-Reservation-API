<?php

namespace App\Http\Controllers\Reservation;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use App\Utils\Helper;

class ReservationController extends Controller
{

    protected $reservationService;

    public function __construct()
    {
        if (!Helper::isUserOwner()) {
            return Helper::ResponseAPI('Error! You do not have permission to perform this action', null, 403);
        }
        $this->reservationService = app('ReservationRepository');
    }

    public function index(int $restaurant)
    {
        $data = $this->reservationService->index($restaurant);
        if ($data) {
            return Helper::ResponseAPI(null, $data);
        }
        return Helper::ResponseAPI('Whoops! Verify your enteries and try again.', null, 404);
    }

    public function create(ReservationRequest $request, int $restaurant)
    {
        $request['restaurant_id'] = $restaurant;
        $dataCreate = $this->reservationService->create($request->all());
        if ($dataCreate) {
            return Helper::ResponseAPI('Reservation created successfully', $dataCreate, 201);
        }
        return Helper::ResponseAPI('Whoops! Verify your enteries and try again.', null, 400);
    }

    public function update(ReservationRequest $request, int $restaurant, int $reservation)
    {
        $request['restaurant_id'] = $restaurant;
        $dataUpdate = $this->reservationService->update($request->all(), $reservation);
        if ($dataUpdate) {
            return Helper::ResponseAPI('Reservation updated successfully');
        }
        return Helper::ResponseAPI('Whoops! Verify your enteries and try again.', null, 400);
    }

    public function delete(int $restaurant, int $reservation)
    {
        $dataDelete = $this->reservationService->delete(['restaurant_id' => $restaurant, 'id' => $reservation]);
        if ($dataDelete) {
            return Helper::ResponseAPI('Reservation deleted successfully');
        }
        return Helper::ResponseAPI('Whoops! Verify your enteries and try again.', null, 400);
    }
}
