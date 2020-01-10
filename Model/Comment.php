<?php


class Comment implements JsonSerializable {

    private $id;
    private $user;
    private $attractionId;
    private $comments;
    private $content;


    public function __construct(){
        $this->comments = array();
    }

    public static function withAllData(string $content, int $id = null,
                                       User $user= null, array $comments = null,
                                       int $attraction_id = null) : Comment
    {
        $instance = new self();
        $instance->content = $content;
        $instance->id = $id;
        $instance->attractionId = $attraction_id;
        $instance->user = $user;
        $instance->comments = $comments;
        return $instance;
    }

    public static function withoutId(string $content, User $user= null,
                                     Comment $comment = null, int $attraction_id = null) : Comment{
        $instance = new self();
        $instance->content = $content;
        $instance->attractionId = $attraction_id;
        $instance->user = $user;
        if($comment !== null) {
            array_push($instance->comments, $comment);
        }
        return $instance;
    }

    public function getContent() : string { return $this->content;}

    public function addComment(Comment $comment) {array_push($this->comments, $comment); }

    public function getId() : int {return $this->id; }

    public function getAuthor() : user { return $this->user; }

    public function getAttractionId() : int { return  $this->attractionId; }

    public function getAuthorLogin() : string { return $this->user->getLogin(); }

    public function setComments(array $comments) { $this->comments = $comments; }

    public function setId(int $id) { $this->id = $id;}

    public function jsonSerialize()
    {
        return
            [
                'id' => $this->getId(),
                'author' => $this->getAuthorLogin(),
                'content' => $this->getContent(),
            ];
    }
}