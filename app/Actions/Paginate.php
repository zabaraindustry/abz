<?php

namespace App\Actions;

use App\Models\Employee;

class Paginate
{
    public function __invoke()
    {


        return [
            'success' => true,
            'page' => 1,
            'total_pages' => 10,
            'total_users' => 47,
            'count' => 5,
            'links' => [
                'next_url' => 'https://frontend-test-assignment-api.abz.agency/api/v1/users?page=2&count=5',
                'prev_url' => null
            ],
            'users' => [
                [
                    'id' => '30',
                    'name' => 'Angel',
                    'email' => 'angel.williams@example.com',
                    'phone' => '+380496540023',
                    'position' => 'Designer',
                    'position_id' => '4',
                    'registration_timestamp' => 1537777441,
                    'photo' => 'https://frontend-test-assignment-api.abz.agency/images/users/5b977ba13fb3330.jpeg'
                ]
            ]
        ];


    }
}
