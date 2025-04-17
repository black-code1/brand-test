<?php
namespace App\Repositories;

use Lab2view\Generator\BaseRepository;
use App\Contracts\UserRepository;
use App\Models\User;

class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model, [
            'filters' => [],
            'includes' => [],
            'sorts' => [],
            'relations' => [],
        ]);
    }
}
