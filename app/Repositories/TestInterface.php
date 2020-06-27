<?php 

namespace App\Repositories;

interface TestInterface
{
   
    public function get($id);

   
    public function all();

    public function store(array $data);

    
    public function delete($id);

   
    public function update($id, array $data);
}