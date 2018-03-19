<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Backend\Categories\{StoreValidator, UpdateValidator};

/**
 * Class CategoriesController 
 * 
 * @author      Tim Joosten <tim@ctivisme.be>
 * @copyright   2018 Tim Joosten
 * @package     App\Http\Controllers\Backend
 */
class CategoriesController extends Controller
{
    /** @var \App\Repositories\CategoryRepository $categoryRepository */
    private $categoryRepository;

    /**
     * CategoriesController Constructor
     * 
     * @param  CategoryRepository $categoryRepository Abstraction layer between controller and database.
     * @return void
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->middleware(['auth']); 
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Get the admin index page for the categories in the storage.
     * 
     * @todo Implement phpunit tests
     * 
     * @return View
     */
    public function index(): View
    {
        return view('backend.categories.index',  ['categories' => $this->categoryRepository->getCategoriesPaginated(15)]);
    }

    /**
     * Edit view for some category in the application. 
     * 
     *! @todo Build up the view -> IN PROGRESS
     * 
     * @param  int $category The unique identifier from the category in the database storage
     * @return View
     */
    public function edit(int $category): View 
    {
        return view('backend.categories.edit', ['category' => $this->categoryRepository->findOrFail($category)]);
    }

    /**
     * Update a category in the database storage. 
     * 
     * @todo Implement PHPunit tests
     *
     * @param  UpdateValidator  $input      The user given input. (Validated)
     * @param  int              $category   The unique identifier from the category in the database.
     * @return RedirectResponse
     */
    public function update(UpdateValidator $input, int $category): RedirectResponse
    {
        $category = $this->categoryRepository->findOrFail($category);

        if ($category->update($input->all())) {
            $this->logActivity('categories', $category, trans('activity.category.update', [
                'user' => auth()->user()->name, 'activity' => $category->name
            ]));

            flash(trans('flash.category.update', ['name' => $category->name]))->success();
        }

        return redirect()->route('admin.categories.index');
    }

    /**
     * Create view for a new catgory in the system. 
     * 
     * @return View
     */
    public function create(): View
    {
        return view('backend.categories.create');
    }

    /**
     * Create a new category in the database storage. 
     * 
     * @param  StoreValidator $input The user given input. (Validated)
     * @return RedirectResponse
     */
    public function store(StoreValidator $input): RedirectResponse 
    {
        $category = $this->categoryRepository->create($input->all());

        if ($category) {
            $this->logActivity('categories', $category, trans('activity.category.store', [
                'user' => auth()->user()->name, 'activity' => $category->name
            ]));

            flash(trans('flash.category.create', ['name' => $category->name]))->success();
        }

        return redirect()->route('admin.categories.index');
    }

    /**
     * Delete a category out of the application. 
     * 
     * @param  int $category The unique identifier from the category in the database storage
     * @return RedirectResponse
     */
    public function destroy(int $category): RedirectResponse
    {
        $category = $this->categoryRepository->findOrFail($category);

        if ($category->delete()) {
            $this->logActivity('categories', $category, trans('activity.category.delete', [
                'user' => auth()->user()->name, 'activity' => $category->name
            ]));

            flash(trans('flash.category.delete', ['name' => $category->name]))->success()->important();
        }

        return redirect()->route('admin.categories.index');
    }
}
