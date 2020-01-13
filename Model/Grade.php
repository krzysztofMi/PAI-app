<?php


class Grade{
    private $id;
    private $user;
    private $attraction;
    private $grade;

    public function __construct(User $user, Attraction $attraction, int $grade, int $id = null){
        $this->user = $user;
        $this->attraction = $attraction;
        $this->grade = $grade;
        $this->id = $id;
    }

    public function getId() : int { return $this->getId(); }
    public function getAttraction(): Attraction { return $this->attraction; }
    public function getUser() : User { return $this->user; }
    public function getGrade() : int { return $this->grade; }

    public function setId(int $id) { $this->id = $id; }
}