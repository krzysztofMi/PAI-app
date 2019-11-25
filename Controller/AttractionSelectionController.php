<?php

require_once 'ApplicationController.php';
require_once 'Model/Attraction.php';

class AttractionSelectionController extends ApplicationController{

    public function showAttractions(){
        $attraction1 = new Attraction("wawel", "Wawel", "Zamek królewski na wawelu.");
        $attraction2 = new Attraction("barbakan", "Barbakan", "Barbakan");
        $attraction3 = new Attraction("kopalnia", "Kopalnia soli", "Kopalnia soli w wieliczce");
        $attraction4 = new Attraction("kopiec", "Kopiec Kościuszki", "Kopiec Kościuszki");
        $attraction5 = new Attraction("mariacka", "Kościół Mariacki", "Kościół Mariacki na rynku");
        $attraction6 = new Attraction("planty", "Planty", "Planty wokół rynku");
        $attraction7 = new Attraction("rynek", "Rynek", "Rynek główny w Krakowie");
        $attraction8 = new Attraction("smok", "Smok wawelski", "Smok wawelski obok Wawelu");
        $attraction9 = new Attraction("sukiennice", "Sukiennice", "Sukiennice na rynku");

        $attractions = [$attraction1, $attraction2, $attraction3, $attraction4, $attraction5, $attraction6, $attraction7, $attraction8, $attraction9];
        $this->render("attractionSelect", ['attractions' => $attractions]);
    }
}
