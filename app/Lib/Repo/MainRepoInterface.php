<?php
namespace App\Lib\Repo;

interface MainRepoInterface
{
    public function find($id);
    public function get();
    public function create($data);
    public function update($id, $data);
    public function delete($id);
}