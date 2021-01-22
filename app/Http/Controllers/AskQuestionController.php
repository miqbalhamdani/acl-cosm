<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AskQuestionRepository;

class AskQuestionController extends Controller
{
    public function __construct(
        AskQuestionRepository $askQuestion
    )
    {
        $this->model = $askQuestion;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $param = [
            'perpage' => 20,
        ];

        $data = [
            'title' => 'Pesan',
            'collection' => $this->model->findWithPaginate($param),
        ];

        return view('admin.ask-question.indexAskQuestion', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'title' => 'Pesan',
            'collection' => $this->model->find($id),
        ];

        return view('admin.ask-question.showAskQuestion', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function read($id)
    {
        $data = [
            'status' => 1,
        ];

        $insert = $this->model->update($id, $data);
        $message = 'pesan ditandai sebagai sudah dibaca';

        return redirect('/admin/ask-questions/')->with('success_message', $message);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function unread($id)
    {
        $data = [
            'status' => 0,
        ];

        $insert = $this->model->update($id, $data);
        $message = 'pesan ditandai sebagai belum dibaca';

        return redirect('/admin/ask-questions/')->with('success_message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->model->destroy($id);
        return \Response::json();
    }
}
