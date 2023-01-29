<?php

namespace App\Repositories\Company;

interface CompanyInterface
{
    public function list();
    public function findById($id);
    public function store($request);
    public function update(int $id, $request);
    public function delete(int $id);
}