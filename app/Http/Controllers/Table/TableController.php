<?php

namespace App\Http\Controllers\Table;

use App\Models\Table;
use App\Utils\Helper;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Requests\TableRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TableController extends Controller
{
    protected $tableService;

    public function __construct()
    {
        if (!Helper::isUserOwner()) {
            return Helper::ResponseAPI('Error! You do not have permission to perform this action', null, 403);
        }
        $this->tableService = app('TableRepository');
    }

    public function index(int $restaurant)
    {
        $data = $this->tableService->index($restaurant);
        if ($data) {
            return Helper::ResponseAPI(null, $data);
        }
        return Helper::ResponseAPI('Whoops! Something went wrong. Verify your entries and try again.', null, 404);
    }
    public function create(TableRequest $request, int $id)
    {
        $request['restaurant_id'] = $id;
        $dataCreate = $this->tableService->create($request->all());
        if ($dataCreate) {
            return Helper::ResponseAPI('Table created successfully', $dataCreate, 201);
        }
        return Helper::ResponseAPI('Whoops! Something went wrong. Verify your entries and try again.', null, 400);
    }
    public function update(TableRequest $request, int $restaurant, int $table)
    {
        $request['restaurant_id'] = $restaurant;
        $dataUpdate = $this->tableService->update($request->all(), $table);
        if ($dataUpdate) {
            return Helper::ResponseAPI('Table updated successfully');
        }
        return Helper::ResponseAPI('Whoops! Something went wrong. Verify your entries and try again.', null, 400);
    }
    public function delete(int $restaurant, int $table)
    {
        $dataDelete = $this->tableService->delete(['restaurant_id' => $restaurant, 'id' => $table]);
        if ($dataDelete) {
            return Helper::ResponseAPI('Table deleted successfully');
        }
        return Helper::ResponseAPI('Whoops! Something went wrong. Verify your entries and try again.', null, 400);
    }
}
