<?php

require_once "Repository.php";
require_once "Model/Comment.php";

class CommentRepository extends Repository {

    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function getCommentById(int $id) : ?Comment{
        $stmt = $this->database->connect()->prepare(
            "SELECT * FROM comment WHERE id=:id"
        );
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $comment = $stmt->fetch(PDO::FETCH_ASSOC);
        if($comment == false) return null;
        $user = $this->userRepository->getUserById($comment['user_id']);

        $comment = Comment::withAllData(
            $comment['content'],
            $comment['id'],
            $this->userRepository->getUserById($comment['user_id']),
            null,
            $comment['attraction_id']);
        $comment->setComments($this->getAllAttachedComment($id));

        return $comment;

    }

    public function getAllAttachedComment(int $id): array{
        $stmt = $this->database->connect()->prepare(
            "SELECT * FROM comment WHERE comment_id = :id"
        );
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($comments as $comment){
            $result[] = Comment::withAllData(
                $comment['content'],
                $comment['id'],
                $this->userRepository->getUserById($comment['user_id']),
                null,
                $comment['attraction_id']);
        }
        return $result;
    }


    public function getAllCommentFromAttraction(int $attractionId) : array
    {
        $stmt = $this->database->connect()->prepare(
            "SELECT * FROM comment
                        WHERE attraction_id = :attractionId"
        );
        $stmt->bindParam(":attractionId", $attractionId);
        $stmt->execute();
        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($comments as $comment){
                $result[] = Comment::withAllData(
                    $comment['content'],
                    $comment['id'],
                    $this->userRepository->getUserById($comment['user_id']));
            }
        if(empty($result)){ return array();}
        foreach ($result as $comment){
            foreach ($comments as $comm){
                if($comment->getId() == $comm['comment_id']){
                    $comment->addComment($comm);
                }
            }
        }
        return $result;
    }


    public function saveComment(Comment $comment, int $attachmentCommentId = null) : int
    {
        $stmt = $this->database->connect()->prepare(
            'INSERT INTO comment(user_id, content, attraction_id, comment_id) 
                                VALUES (:userId, :content, :attractionId, :commentId) RETURNING id'
        );
        $stmt->bindValue(":userId", $comment->getAuthor()->getId());
        $stmt->bindValue(":content", $comment->getContent());
        $stmt->bindValue(":attractionId", $comment->getAttractionId());
        $stmt->bindValue(":commentId", $attachmentCommentId);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['id'];
    }

    public function deleteComment($id){
        $stmt = $this->database->connect()->prepare(
            "DELETE FROM comment WHERE id = :id"
        );
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }
}