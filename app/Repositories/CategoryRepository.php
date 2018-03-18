<?php 

namespace App\Repositories;

use App\Models\Category;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;
use Illuminate\Pagination\Paginator;

/**
 * Class CategoryRepository
 *
 * @package App\Repositories
 */
class CategoryRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model(): string
    {
        return Category::class;
    }

    /**
     * Get all the categories from the storage (paginated form). 
     * 
     * @param  int $perPage The amount of results u want to display per page. 
     * @return Paginator
     */
    public function getCategoriesPaginated(int $perPage): Paginator
    {
        return $this->model->simplePaginate($perPage);
    }
}