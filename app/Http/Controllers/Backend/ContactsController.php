<?php

namespace App\Http\Controllers\Backend;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Repositories\ContactRepository;

/**
 * Class ContactController
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 * @package     App\Http\Controllers\Backend
 */
class ContactsController extends Controller
{
    /** @var \App\Repositories\ContactRepository $contactRepository */
    private $contactRepository;

    /**
     * ContactsController constructor 
     * 
     * @param  ContactRepository $contactRepository Abstraction layer between database and controller. 
     * @return void
     */
    public function __construct(ContactRepository $contactRepository)
    {
        $this->middleware(['auth']);
        $this->contactRepository = $contactRepository;
    }

    /**
     * Get the index page for the address book in the application. 
     *
     * @todo Register route
     * @todo implement phpunit tests
     *  
     * @return View
     */
    public function index(): View 
    {
        return view('backend.contacts.index', [
            'contactsPublic'    => $this->contactRepository->paginateContacts(20, 'public'),
            'contactsPersonal'  => $this->contactRepository->paginateContacts(20, 'personal')
        ]);
    }
}
