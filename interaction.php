<?php

require_once("db.php");

class interaction extends  Database
{

    public $id;
    public $title;
    public $body;
    public $author;
    public function read()
    {
        $sql='SELECT title,author,body FROM posts';
        $data=$this->connect()->query($sql);
        return $data->fetchAll();
    }

    public function read_single()
    {
        $sql='SELECT id,title,body,author,created_at FROM posts WHERE id = ? '; 
        $stmt =$this->connect()->prepare($sql);
 
        $stmt->bindParam(1,$this->id);
        $stmt->execute();
        return $stmt->fetchAll();

    }

    public function create()
    {
        $sql='INSERT into posts SET title =:title,body=:body,author =:author ';
        $stmt =$this->connect()->prepare($sql);
        $this->title=htmlspecialchars(strip_tags($this->title));
        $this->body=htmlspecialchars(strip_tags($this->body));
        $this->author=htmlspecialchars(strip_tags($this->author));

        $stmt->bindParam(':title',$this->title);
        $stmt->bindParam(':body',$this->body);
        $stmt->bindParam(':author',$this->author);

        if($stmt->execute())
        {
            return true;
        }
        else{
            echo "Error .Failed to update";
            return false;
        }
    }


    public function update()
    {
        $sql='UPDATE  posts SET title =:title,body=:body,author =:author   WHERE id =:id' ;
        $stmt =$this->connect()->prepare($sql);
        $this->title=htmlspecialchars(strip_tags($this->title));
        $this->body=htmlspecialchars(strip_tags($this->body));
        $this->author=htmlspecialchars(strip_tags($this->author));
        $this->id=htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':title',$this->title);
        $stmt->bindParam(':body',$this->body);
        $stmt->bindParam(':author',$this->author);
        $stmt->bindParam(':id',$this->id);


        if($stmt->execute())
        {
            return true;
        }
        else{
            echo "Error .Failed to update";
            return false;
        }
    }


    public function delete()
    {
        $sql='DELETE FROM  posts WHERE id=:id';
        $stmt=$this->connect()->prepare($sql);
        $this->id=htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(':id',$this->id);
        if($stmt->execute())
        {
            return true;
        }
        else{
            echo "Deletion failed";
            return false;
        }

    }
}