<?php

class Contenu {
    public $titre;
    public $texte;

    public function __construct(string $titre, string $texte){
        $this->titre = $titre;
        $this->texte = $texte; 
    }

    public function afficherTitre(){
        return "<h2>".$this->titre."</h2>";
    }

    public function afficherTexte(){
        return "<p>".$this->texte."</p>";
    }
}

class Article extends Contenu {
    const BREAKINGNEWS = "Breaking News";
    const BREAKING = "BREAKING:";

    public function titreArticle($titresSuivants){
        if($this->titre === self::BREAKING) {
            if (isset($titresSuivants[self::BREAKINGNEWS])) {
                return "<h2>".self::BREAKING.$titresSuivants[self::BREAKINGNEWS]."</h2>";
            } else {
                return "<h2>".self::BREAKING."</h2>";
            }
        } else {
            return "<h2>" .$this -> titre. "</h2>";
        }
    }
}

class Annonce extends Contenu {
    public function titreAnnonce(){
        return "<h2>" .mb_strtoupper($this->titre)."</h2>";
    }
}

class PosteVacant extends Contenu {
    public string $offre =" - Postulez maintenant!";

    public function titrePosteVacant(){
        return "<h2>" .$this->titre.$this->offre."</h2>";
    }
}

$contenus = [];

$contenus[] = new Article("Breaking News", "La médecine régénérative ouvre de nouvelles perspectives passionnantes dans le domaine de la santé, avec des techniques innovantes permettant de régénérer et de réparer les tissus endommagés.");

$contenus[] = new Article("Les implications de l'intelligence artificielle dans l'emploi", "Alors que l'intelligence artificielle se développe rapidement, de nombreuses questions se posent sur son impact sur le marché du travail et l'avenir de l'emploi.");

$contenus[] = new Annonce("Nouvelle collection printemps-été disponible maintenant!", "Découvrez notre toute nouvelle collection de vêtements printemps-été, avec des styles élégants et tendance pour toutes les occasions.");

$contenus[] = new PosteVacant("Ingénieur en logiciel senior", "Nous recherchons un ingénieur en logiciel expérimenté pour rejoindre notre équipe dynamique. Postulez dès maintenant et participez à des projets innovants dans un environnement stimulant.");

$titresSuivants = [
    "Breaking News" => "Incroyable!"
];


foreach ($contenus as $contenu) {
    if ($contenu instanceof Article && $contenu->titre === Article::BREAKINGNEWS) {
        echo $contenu->titreArticle($titresSuivants);
    } else {
        echo $contenu->afficherTitre();
    }
    echo $contenu->afficherTexte();
}
?>

