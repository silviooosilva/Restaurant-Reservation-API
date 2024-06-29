<?php

namespace App\Http\Controllers\Table;

use App\Utils\Helper;
use App\Http\Requests\TableRequest;
use App\Http\Controllers\Controller;

class TableController extends Controller
{
    protected $tableService;

    public function __construct()
    {
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
