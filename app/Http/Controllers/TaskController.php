<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * ユーザーの全タスクリストを表示
     * 
     * @params Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('tasks', [
            'tasks' => $tasks
        ]);
    }

    /**
     * 新タスク作成
     * 
     * @params Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request [
            'name' => 'required|max:255',
        ]);

        $task = new Task;
        $task->name = $request->names;
        $task=>save();

        return redirect('/tasks');
    }

    /**
     * 指定タスクの削除
     * 
     * @params Request $request
     * @params Task $task
     * @return  Response
     */
    public function destroy(Request $request, Task $task)
    {
        //タスクの削除処理
        $task->delete();

        return redirect('/tasks');
    }
}
