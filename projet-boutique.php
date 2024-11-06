<?php


$articles = ["Chaussettes", "T-shirts", "Chaussures", "Pantalons", "Pulls"];
$quantites = [10, 5, 8, 3, 12];


function afficherStock($articles, $quantites)
{
    echo "Liste des articles en stock :\n";
    for ($i = 0; $i < count($articles); $i++) {
        echo "$i. " . $articles[$i] . " - Stock : " . $quantites[$i] . "\n";
    }
    echo "\n";
}

afficherStock($articles, $quantites);

$index = readline("Entrez le numéro de l'article que vous souhaitez vendre : ");
$quantiteVente = readline("Entrez la quantité à vendre : ");

if ($index >= 0 && $index < count($articles)) {
    if ($quantiteVente <= $quantites[$index]) {
        $quantites[$index] -= $quantiteVente;
        echo "Vente réussie de $quantiteVente " . $articles[$index] . "(s). Stock restant : " . $quantites[$index] . "\n";
    } else {
        echo "Stock insuffisant pour effectuer cette vente.\n";
    }
} else {
    echo "Index invalide. Aucun article correspondant.\n";
}

echo "\nÉtat du stock après la vente :\n";
afficherStock($articles, $quantites);

$index = readline("Entrez le numéro de l'article à réapprovisionner : ");
$quantiteReappro = readline("Entrez la quantité à ajouter : ");

if ($index >= 0 && $index < count($articles)) {
    $quantites[$index] += $quantiteReappro;
    echo "Réapprovisionnement réussi. Nouvelle quantité de " . $articles[$index] . " : " . $quantites[$index] . "\n";
} else {
    echo "Index invalide. Aucun article correspondant.\n";
}

echo "\nÉtat du stock après réapprovisionnement :\n";
afficherStock($articles, $quantites);

$index = readline("Entrez le numéro de l'article à supprimer : ");

if ($index >= 0 && $index < count($articles)) {
    array_splice($articles, $index, 1);
    array_splice($quantites, $index, 1);
    echo "L'article a été supprimé du stock.\n";
} else {
    echo "Index invalide. Aucun article correspondant.\n";
}

echo "\nÉtat final du stock :\n";
afficherStock($articles, $quantites);
