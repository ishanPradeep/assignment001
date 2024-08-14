<?php

namespace App\Repository\AssignmentRepository\Interface;

use Illuminate\Http\Request;

interface DocumentRepositoryInterface
{
    public function all();
    public function create();
    public function store($request);


}
