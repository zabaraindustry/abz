<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * @param EmployeeRequest $employeeRequest
     * @return JsonResponse
     */
    public function index(EmployeeRequest $employeeRequest, Employee $employee): JsonResponse
    {
        $page = $employeeRequest->get('page', 1);
        $count = $employeeRequest->get('count', 5);
        $offset = $employeeRequest->get('offset') ?: $count * ($page - 1);
        $total_users = $employee::count();
        $total_pages = round($total_users / $count, 0);
        $prev_url = $page > 1 ? config('appsettings.api_url') . '/users' . '?page=' . $page - 1 : null;
        $next_url = $total_pages > $page ? config('appsettings.api_url') . '/users' . '?page=' . $page : null;

        $employees = $employee::query()
            ->select('employees.id', 'employees.name', 'employees.email', 'employees.phone', 'employees.created_at', 'employees.position_id', 'p.position')
            ->join('positions as p', 'p.id', '=', 'employees.position_id')
            ->orderBy('employees.created_at', 'desc')
            ->limit($count)
            ->offset($offset)
            ->get();

        return response()->json([
            'success' => true,
            'page' => $page,
            'total_pages' => $total_pages,
            'total_users' => $total_users,
            'count' => $count,
            'links' => [
                'next_url' => $next_url,
                'prev_url' => $prev_url,
            ],
            'users' => $employees
        ]);




//        $page = $employeeRequest->input('page', 1);
//        $count = $employeeRequest->input('count', 5);
//
//        $employees = Employee::query()
//            ->orderBy('created_at', 'desc')
//            ->paginate($count);
//
//        return response()->json([
//            'success' => true,
//            'data' => $employees
//        ]);

//        return response()->json([
//            'success' => true,
//            'page' => 1,
//            'total_pages' => 10,
//            'total_users' => 47,
//            'count' => 5,
//            'links' => [
//                'next_url' => 'https://frontend-test-assignment-api.abz.agency/api/v1/users?page=2&count=5',
//                'prev_url' => null
//            ],
//            'users' => [
//                [
//                    'id' => '30',
//                    'name' => 'Angel',
//                    'email' => 'angel.williams@example.com',
//                    'phone' => '+380496540023',
//                    'position' => 'Designer',
//                    'position_id' => '4',
//                    'registration_timestamp' => 1537777441,
//                    'photo' => 'https://frontend-test-assignment-api.abz.agency/images/users/5b977ba13fb3330.jpeg'
//                ]
//            ]
//        ]);
    }
}
