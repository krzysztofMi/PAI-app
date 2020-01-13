<?php

require_once 'Repository.php';

class GradeRepository extends Repository{


    public function getGradeByUserAndAttraction(){
        $stmt = $this->database->connect()->prepare(
            "SELECT * FROM grade g, tourismus_user u, attraction a 
                WHERE u.id = g.user_id and a.id = g.attraction_id"
        );
    }

    public function saveGrade(Grade $grade){
        $stmt = $this->database->connect()->prepare(
          "INSERT INTO grade (user_id, attraction_id, grade) 
                                VALUES (:user_id, :attraction_id, :grade) RETURNING id"
        );
        $stmt->bindParam(":user_id", $grade->getUser()->getId());
        $stmt->bindParam(":attraction_id", $grade->getAttraction()->getId());
        $stmt->bindParam(":grade", $grade->getGrade());
        $stmt->execute();

        $gradeId = $stmt->fetch(PDO::FETCH_ASSOC);
        return $gradeId['id'];
    }
}