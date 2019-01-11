<?php

namespace Todo;

// use src\Core\Database;

class TodoItem extends Model
{
    const TABLENAME = 'todos'; // This is used by the abstract model, don't touch

    public static function createTodo($title)
    {
        
            $query = "INSERT INTO todos (title, created) VALUES ('$title' , NOW())";
            static::$db->query($query);
            $result = static::$db->execute();
            return $result;
    }

    public static function updateTodo($todoId, $title, $completed = null)
    {
        $query = "UPDATE todos SET title = '$title' , completed = '$completed' WHERE id = $todoId";
        
        self::$db->query($query);
        $result = self::$db->execute();
        return $result;

    }

    public static function deleteTodo($todoId)
    {
        $query = "DELETE FROM todos WHERE id = '$todoId'";
        
        static::$db->query($query);
        $result = self::$db->execute();
        return $result;

    }
    
    // (Optional bonus methods below)
    public static function toggleTodos($completed)
    {
        
    }

    // public static function clearCompletedTodos()
    // {
    //     // TODO: Implement me!
    //     // This is to delete all the completed todos from the database
    // }

}


