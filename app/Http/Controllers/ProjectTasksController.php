<?php

namespace Prego\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Prego\Http\Requests;
use Prego\Http\Controllers\Controller;
use Prego\Task;

class ProjectTasksController extends Controller{

    public function postNewTask(Request $request, $id, Task $task){
        $this->validate($request, [
            'task_name' => 'required|min:5',
        ]);

        $task->task_name = $request->input('task_name');
        $task->project_id = $id;

        $task->save();

        return redirect()->back()->with('info', 'Task created successfully');
    }

    /*
     *  Get just one task for a particular Project
     * @param  [type] $projectId [description]
     * @param  [type] $taskId    [description]
     * @return [type]            [description]
     */
    public function getOneProjectTask($projectId, $taskId){
        $task = Task::where('project_id', $projectId)->where('id', $taskId)->first();
        return view('tasks.edit')->with('task', $task)->with('projectId', $projectId);
    }

    public function updateOneProjectTask(Request $request, $projectId, $taskId){
        $this->validate($request, [
            'task_name' => 'required|min:5',
        ]);

        DB::table('prego_tasks')
            ->where('project_id', $projectId)
            ->where('id', $taskId)
            ->update(['task_name' => $request->input('task_name')]);

        return redirect()->back()->with('info', 'Your Task has been updated successfully');
    }

    public function deleteOneProjectTask($projectId, $taskId){
        DB::table('prego_tasks')
            ->where('project_id', $projectId)
            ->where('id', $taskId)
            ->delete();

        //return redirect()->route('project.show')->with('info', 'Task deleted successfully');
    }
}
