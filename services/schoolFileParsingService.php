<?php
require 'models/school.php';

interface IFileParsingService {
    function getObjects();
}

class SchoolFileParsingService implements IFIleParsingService {

    private $fileName;

    public function __construct($fileName) {
        $this->fileName = $fileName;
    }

    public function getObjects() {
        $csvAsArray = array_map('str_getcsv', file($this->fileName));
    
        $schools = new ArrayObject();

        foreach ($csvAsArray as $key => $value){
            $columnCount;
            if ($key == 0) {
                $columnCount = count($value);
                continue;
            }
            if (count($value) != $columnCount) continue;

            $name = $value[0];
            $city = $value[1];
            $state = $value[2];
            $mascot = $value[3];

            $newSchool = new School($name, $city, $state, $mascot);
            $schools[] = $newSchool;
        }

        return $schools;
    }
}
?>