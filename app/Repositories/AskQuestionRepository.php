<?php namespace App\Repositories;

use App\Models\AskQuestion;
use App\Repositories\AbstractRepository;
use App\Repositories\Contracts\AskQuestionInterface;

class AskQuestionRepository extends AbstractRepository implements AskQuestionInterface
{
    public function __construct(AskQuestion $askQuestion)
    {
        $this->model = $askQuestion;
    }

    /**
    * Get list with filter and paginate
    *
    * @param array $param
    * @return Object
    */
    public function findWithPaginate(array $param)
    {
        $perpage = $param['perpage'] ?? 20;

        $data = $this->model->orderBy('created_at', 'DESC');

        $data = $data->paginate($perpage);

        return $data;
    }
}
