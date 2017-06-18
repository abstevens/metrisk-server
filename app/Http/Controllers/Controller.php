<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Validator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }

    protected function respondCondition(bool $result, $dataReturned, string $errorTranslation): JsonResponse
    {
        if ($result) {
            $output = $this->respondData($dataReturned);
        } else {
            $output = $this->respondError($errorTranslation);
        }

        return $output;
    }

    protected function respondData($data = null): JsonResponse
    {
        return $this->respondJson(1, ['data' => $data]);
    }

    protected function respondError($message): JsonResponse
    {
        return $this->respondJson(0, ['error' => $message]);
    }

    protected function respondErrorOnValidationFail(Validator $validator)
    {
        if ($validator->fails()) {
            return $this->respondError($validator->errors());
        }
    }

    protected function respondJson($status, array $data): JsonResponse
    {
        $data['status'] = $status;
        return response()->json($data);
    }
}
