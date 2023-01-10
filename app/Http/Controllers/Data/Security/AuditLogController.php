<?php

namespace App\Http\Controllers\Data\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Security\Audit;
use Exception;

class AuditLogController extends Controller
{
    protected $model = Audit::class;
    public function index($user_id)
    {
        $items = $this->model::where('user_id', $user_id)
        ->orderBy('created_at', 'DESC');
        return datatables()->of($items)->make(true);
    }
}
