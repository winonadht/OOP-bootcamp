<?php


class Student {
    public $name;
    public $score;

    public function __construct($name, $score) {
        $this->name = $name;
        $this->score = $score;
        
    }
}

class Groupe {
    public $students = [];
   
    public function addStudent($student) {
        $this->students[] = $student;
    }
    public function removeStudent($studentName){
        foreach ($this->students as $key => $student){
            if($student->name === $studentName){
                unset($this->students[$key]);
                return true; 
            }
        }
        return false;
    }
    public function getScore(){
        $totalScore = 0;
        foreach ($this->students as $student) {
            $totalScore += $student->score;
        }
        return count($this->students) > 0 ? $totalScore / count($this->students) : 0;
    }
}

$studentsGroup1 = [
    new Student("Jaqen", 80),
    new Student("Arya", 85),
    new Student("Jon", 90),
    new Student("Sansa", 75),
    new Student("Bran", 88),
    new Student("Cersei", 72),
    new Student("Tyrion", 95),
    new Student("Daenerys", 87),
    new Student("Theon", 78),
    new Student("Jaime", 82)
];

$studentsGroup2 = [
    new Student("Eddard", 84),
    new Student("Robert", 79),
    new Student("Catelyn", 81),
    new Student("Robb", 86),
    new Student("Margaery", 92),
    new Student("Joffrey", 70),
    new Student("Stannis", 89),
    new Student("Melisandre", 91),
    new Student("Samwell", 83),
    new Student("Gendry", 76)
];


$group1 = new Groupe();
$group2 = new Groupe();

foreach ($studentsGroup1 as $student) {
    $group1->addStudent($student);
}

foreach ($studentsGroup2 as $student) {
    $group2->addStudent($student);
}


echo "Score moyen du groupe 1: " . $group1->getScore() . "<br>";
echo "Score moyen du groupe 2: " . $group2->getScore() . "<br>";

$studentMove = $group1->students[0];
$group1->removeStudent($studentMove->name);
$group2->addStudent($studentMove);


echo "\nAprès le déplacement de l'étudiant" . "<br>";
echo "Score moyen du groupe 1: " . $group1->getScore() . "<br>";
echo "Score moyen du groupe 2: " . $group2->getScore() . "<br>";

?>
