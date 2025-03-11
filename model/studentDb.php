<?php

    function getStudents(){
        global $db;

        $query = 'SELECT * FROM student ORDER BY studentID';

        $statement = $db->prepare($query);
        $statement->execute();
        $students = $statement->fetchAll();
        $statement->closeCursor();
        return $students;
    }

    function deleteStudent($studentID) {
        global $db;
        $query = 'DELETE FROM student WHERE studentID =:id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $studentID);
        $statement->execute();
        $statement->closeCursor();
    }

    function addStudent($studentName, $studentEmail) {
        global $db;
        $query = 'INSERT INTO student (studentName, studentEmail) VALUES (:name, :email)';
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $studentName);
        $statement->bindValue(':email', $studentEmail);
        $statement->execute();
        $statement->closeCursor();
    }