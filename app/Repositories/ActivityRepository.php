<?php 

namespace App\Repositories;

use Spatie\Activitylog\Models\Activity;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;

/**
 * Class ActivityRepository
 *
 * @package App\Repositories
 */
class ActivityRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model(): string
    {
        return Activity::class;
    }

    /**
     * Get all the logged activities from the database in paginated form. 
     * 
     * @param  int $perPage The amount of results u want to display per page.
     * @return Paginator
     */
    public function paginateActivities(int $perPage = 20): Paginator
    {
    	return $this->model->simplePaginate($perPage);
    }

    public function getCategories(): Collection
    {
        return $this->model->distinct('log_name')->get(['log_name']);
    }
}