<?php

use Todo\Controller;
use Todo\Database;
use Todo\TodoItem;

class TodoController extends Controller {
    
    public function get()
    {
        $todos = TodoItem::findAll();
        return $this->view('index', ['todos' => $todos]);
    }

    public function add()
    {
        $body = filter_body();
        $result = TodoItem::createTodo($body['title']);

        if ($result) {
          $this->redirect('/');
        } else {
            throw new \Exception("Error occured when trying to add todo-item. Sad panda..");
        }

    }

    public function update($urlParams)
    {
        $body = filter_body();
        $todoId = $urlParams['id'];
        $todoTitle = $body['title'];
        $completed = isset($body['status']) ? 2 : 1; 

        $result = TodoItem::updateTodo($todoId, $todoTitle, $completed);

        if ($result) {
            $this->redirect('/');
        } else {
            throw new \Exception("Error occured when trying to update todo-item. Sad panda..");
        }
    }

    public function delete($urlParams)
    {
        $body = filter_body();
        $todoId = $urlParams['id'];
        $result = TodoItem::deleteTodo($todoId);

        if ($result) {
            $this->redirect('/');
        } else {
            throw new \Exception("Error occured when trying to delete item. Sad Panda..");
        }
    }

    public function toggle()
    {
        $todos = TodoItem::findAll();
        $numberCompleted = count(array_filter($todos, function($body) { return $body['completed'] === "false"; }));
        $result = TodoItem::toggleTodos($numberCompleted);
        
        if ($result) {
            $this->redirect('/');
        } else {
            throw new \Exception("Error occured when trying to update todo-item. Sad panda..");
        }
    }

    public function clear()
    {
        
        $result = TodoItem::clearCompletedTodos();

        if ($result) {
          $this->redirect('/');
        } else {
          throw new \Exception("Error occured when trying to clear all done items. Sad panda..");
        }

    }

}
