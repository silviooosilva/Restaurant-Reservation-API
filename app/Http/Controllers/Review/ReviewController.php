<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Utils\Helper;

class ReviewController extends Controller
{
    protected $reviewService;

    public function __construct()
    {
        $this->reviewService = app('ReviewRepository');
    }

    public function index(int $restaurant)
    {
        $data = $this->reviewService->index($restaurant);
        if ($data) {
            return Helper::ResponseAPI(null, $data);
        }
        return Helper::ResponseAPI('The selected restaurant has not yet been evaluated', null, 404);
    }

    public function create(ReviewRequest $request, int $restaurant)
    {
        $request['restaurant_id'] = $restaurant;
        $dataCreate = $this->reviewService->create($request->all());
        if ($dataCreate) {
            return Helper::ResponseAPI('Review Created Successfully', $dataCreate, 201);
        }
        return Helper::ResponseAPI('Whoops! Something went wrong. Verify your entries and try again.', null, 400);
    }
}
