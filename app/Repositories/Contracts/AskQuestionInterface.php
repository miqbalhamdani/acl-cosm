<?php namespace App\Repositories\Contracts;

interface AskQuestionInterface
{
    public function get();

    public function create(array $param);

    public function find($id);

    public function where($column, $id);

    public function update($id, array $param);

    public function destroy($id);
}
