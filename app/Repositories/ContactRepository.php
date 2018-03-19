<?php 

namespace App\Repositories;

use App\Contact;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;

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
}