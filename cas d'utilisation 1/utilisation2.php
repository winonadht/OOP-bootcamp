<?php

declare(strict_types=1);

class course {
    const BANANE = 1;
    const POMME = 1.5;
    const VIN = 10;
    const taxeFruits = 6;
    const taxeVin = 21;
    const reduction = 0.5;  

    public int $quantiteBanane; 
    public int $quantitePomme;
    public int $quantiteVin;
    

   public function __construct($quantiteBanane, $quantitePomme, $quantiteVin)
   {

        $this->quantiteBanane = $quantiteBanane; 
        $this->quantitePomme = $quantitePomme;
        $this->quantiteVin = $quantiteVin;

}

   public function price(){
   $price = (self::BANANE * $this->quantiteBanane) + (self::POMME * $this->quantitePomme) + (self::VIN * $this->quantiteVin);
   return $price;
}

   public function taxe(){
    $taxeFruits = (self::BANANE * $this->quantiteBanane + self::POMME * $this->quantitePomme)/100 * self::taxeFruits;
    $taxeVin = (self::VIN * $this->quantiteVin)/100 * self::taxeVin;

    return $taxeFruits + $taxeVin;
    
   }
  public function Htva(){
    $priceHtva = $this->price() - $this->taxe();
    return $priceHtva;
}

   public function fruit50(){
   $prixFruits = ((self::BANANE * $this->quantiteBanane)* self::reduction) + ((self::POMME * $this->quantitePomme)* self::reduction);
   return $prixFruits;
}
}


$panier1 = new course(6, 3 ,2);
echo  "Total price:" . $panier1 -> price() . "<br>";
echo  "Total taxe:"  . $panier1 -> taxe() . "<br>";
echo  "Total Htva:"  . $panier1 -> Htva() . "<br>";
echo  "Reduction fruits:" . $panier1 -> fruit50();