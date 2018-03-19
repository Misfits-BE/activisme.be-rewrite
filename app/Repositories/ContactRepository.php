<?php 

namespace App\Repositories;

use App\Models\Contact;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;
use Illuminate\Pagination\Paginator;

/**
 * Class ContactRepository
 *
 * @package App\Repositories
 */
class ContactRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model(): string
    {
        return Contact::class;
    }

    /**
     * Get the contacts out of the database storage (Paginated form)
     * 
     * @param  int      $perPage       The amount of results u want to display per page.
     * @param  string   $type       The tpe of contacts in the application
     * @return Paginator
     */
    public function paginateContacts(int $perPage, string $type): Paginator
    {
        $user      = auth()->user();
        $baseModel = $this->model;

        switch ($type) {
            case 'public': // Get all the public from the database.
                return $baseModel->where('is_public', true)->simplePaginate($perPage);
            
            default: // Get all the personal contacts from the database.
                return $baseModel->where(['author_id' => $user->id, 'is_public' => false])->simplePaginate($perPage);
        }
    }
}