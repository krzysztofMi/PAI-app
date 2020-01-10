<?php


class CommentController extends ApplicationController
{
    private $userRepository;
    private $commentRepository;

    public function __construct()
    {
        parent::__construct();
        $this->commentRepository = new CommentRepository();
        $this->userRepository = new UserRepository();
    }

    public function add()
    {
        if(!isset($_POST['attraction_id'])){
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=error&errorCode=404");
            return;
        }
        header("Content-type: application-json");
        http_response_code(200);
        $id = $_POST['attraction_id'];
        $user = $this->userRepository->getUserById($_POST['user_id']);
        if(isset($_POST['comment_id'])){
            $comment = $this->addCommentWithAttachment($user, $id);
        }else{
            $comment = $this->addSingleComment($user, $id);
        }
        echo json_encode($comment ? $comment : "");
    }

    private function addCommentWithAttachment(User $user, int $id) : ?Comment{
        $attachedComment = $this->commentRepository->getCommentById($_POST['comment_id']);
        $comment = Comment::withoutId($_POST['content'], $user, $attachedComment, $id);
        $comment->setId($this->commentRepository->saveComment($comment, $attachedComment->getId()));
        return $this->commentRepository->getCommentById();
    }

    private function addSingleComment(User $user, int $id) : ?Comment{
        $comment = Comment::withoutId($_POST['content'], $user, null, $id);
        $comment->setId($this->commentRepository->saveComment($comment));
        return $comment;
    }

    public function delete(){
        $this->commentRepository->deleteComment($_GET['id']);
    }
}