<?php

namespace App\Controllers;

use App\Helpers\User\Auth;
use App\Models\Task;
use App\Models\TestModel;
use Smarty;

class TaskController extends AbstractController
{
    /**
     * @var int
     */
    private int $itemsPerPage = 3;

    /**
     * @return void
     */
    public function prepareData()
    {
        $isAdmin = Auth::isAdmin();

        $columns = [
            'ID' => 'id',
            'Username' => 'username',
            'Email' => 'email',
            'Text' => 'text',
            'Done' => 'done',
            'Edited by admin' => 'edited_by_admin',
        ];

        $sortableColumns = ['username', 'email', 'done'];

        $sortColumn = $_GET['column'] ?? 'id';
        $desc = $_GET['desc'] ?? true;
        $active = $_GET['active'] ?? 'false';
        $page = $_GET['page'] ?? 1;

        if ($active == 'false' || !in_array($sortColumn, $sortableColumns)) {
            $sortColumn = 'id';
        }

        $desc = $desc == 'true';

        $baseQuery = Task::query();

        if ($sortColumn) {
            $baseQuery->orderBy($sortColumn, $desc);
        }

        $elements = $baseQuery->paginate($this->itemsPerPage, $page);

        $this->renderer->setVariables(compact(
            'elements', 'isAdmin', 'columns', 'sortColumn', 'desc', 'sortableColumns', 'page',
        ));
    }

    /**
     * @return void
     */
    protected function setPaginationVariables()
    {
        $page = $_GET['page'] ?? 1;

        $maxpage = Task::query()->countPages($this->itemsPerPage);
        $shift = 5;
        if ($maxpage < $shift * 2) {
            $firstPage = 1;
            $lastPage = $maxpage;
        } else {
            if ($page - $shift < 0) {
                $lastPage = min($maxpage, $shift * 2);
                $firstPage = 1;
            } else {
                if ($maxpage - $page < $shift) {
                    $firstPage = max(1, $maxpage - $shift * 2);
                    $lastPage = $maxpage;
                } else {
                    $firstPage = max(1, $page - $shift);
                    $lastPage = min($maxpage, $page + $shift);
                }
            }
        }

        $this->renderer->setVariables(compact('maxpage', 'firstPage', 'lastPage'));

        $this->renderer->setVariables('pages', $maxpage);
        $paginationUrlBase = $_SERVER['REQUEST_URI'];

        $paginationUrlBase = preg_replace('#(&?)*page=' . $page . '#', '', $paginationUrlBase);
        $paginationUrlBase = str_replace('/api', '', $paginationUrlBase);
        if (str_contains($paginationUrlBase, '?')) {
            $paginationUrlBase .= '&';
        } else {
            $paginationUrlBase .= '?';
        }

        $paginationUrlBase .= 'page=#BLOCKPAGE#';
        $this->renderer->setVariables('paginationUrlBase', $paginationUrlBase);
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $this->prepareData();
        $this->setPaginationVariables();

        return $this->renderer->display('tasks/tasks');
    }

    /**
     * @return mixed
     */
    public function list()
    {
        $this->prepareData();
        return $this->renderer->display('tasks/tasks_table');
    }

    /**
     * @return mixed
     */
    public function store()
    {
        $_POST = json_decode(file_get_contents("php://input"), true);

        $task = new Task();

        $task->fillAndSave([
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'text' => $_POST['text'],
        ]);

        $this->prepareData();
        $this->setPaginationVariables();

        return $this->renderer->display('tasks/tasks_table_with_paginator');
    }

    /**
     * @param $id
     * @return false[]
     */
    public function update($id)
    {
        $_POST = json_decode(file_get_contents("php://input"), true);

        $newValues = [];

        $success = true;
        $needLogin = false;

        if (!Auth::isAdmin() ||
            !isset($_GET['token']) ||
            !Auth::confirmSessionData($_GET['token'])) {
            $success = false;
            $needLogin = true;
        } else {
            if (!isset($_POST['text']) && !isset($_POST['done'])) {
                $success = false;
            }
        }

        if (!$success) {
            return ['success' => $success, 'need_login' => $needLogin];
        }

        if (isset($_POST['text'])) {
            $newValues['text'] = $_POST['text'];
            $newValues['edited_by_admin'] = 1;
        }
        if (isset($_POST['done'])) {
            $newValues['done'] = $_POST['done'];
        }

        if (empty($newValues)) {
            $success = false;
        } else {
            $success = Task::query()->where([['id', $id]])->update($newValues);
        }

       $result = ['success' => $success];
       return $result;
    }
}