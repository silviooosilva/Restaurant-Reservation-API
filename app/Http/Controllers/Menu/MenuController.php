<?php

namespace App\Http\Controllers\Menu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Models\Restaurant;
use App\Utils\Helper;


class MenuController extends Controller
{
    protected $menuService;

    public function __construct()
    {
        if (!Helper::isUserOwner()) {
            return Helper::ResponseAPI('Error! You do not have permission to perform this action', null, 403);
        }
        $this->menuService = app('MenuRepository');
    }
    public function index(int $restaurant)
    {
        $menuData = $this->menuService->index($restaurant);
        if ($menuData) {
            return Helper::ResponseAPI(null, $menuData);
        }
        return Helper::ResponseAPI('Menu does not exists! Verify your entries and try again');
    }

    public function create(MenuRequest $request, int $restaurant)
    {

        if (Helper::isDataExistent('restaurants', ['id' => $restaurant])) {
            $request['restaurant_id'] = $restaurant;
            $menuCreate = $this->menuService->create($request->all());
            if ($menuCreate) {
                return Helper::ResponseAPI('Menu Created Successfully', $menuCreate, 201);
            }
        }
        return Helper::ResponseAPI('Whoops! Restaurant does not exists. Verify your entries and try again.', null, 400);
    }

    public function update(MenuRequest $request, int $restaurant, int $menu)
    {
        $request['restaurant_id'] = $restaurant;
        $menuUpdate = $this->menuService->update($request->all(), $menu);
        if ($menuUpdate) {
            return Helper::ResponseAPI('Menu updated successfully', $menuUpdate);
        }
        return Helper::ResponseAPI('Whoops! Something went wrong. Verify your entries and try again.');
    }

    public function delete(int $restaurant, int $menu)
    {
        $menuDelete = $this->menuService->delete(['restaurant_id' => $restaurant, 'id' => $menu]);
        if ($menuDelete) {
            return Helper::ResponseAPI('Menu deleted successfully');
        }
        return Helper::ResponseAPI("The selected restaurant or menu doesn't exist. Check and try again.", null, 404);
    }
}
