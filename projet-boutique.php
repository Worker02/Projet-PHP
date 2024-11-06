<?php
// 1. 🏗️ Initialisation du stock
// Crée un tableau indexé pour modéliser les articles de la boutique.
$articles = ["🧦 Chaussettes", "👕 T-shirts", "👟 Chaussures", "👖 Pantalons", "🧢 Casquettes"];
// Crée un tableau indexé pour les quantités en stock de chaque article.
$quantites = [10, 5, 8, 3, 12];
// Initialiser le tableau pour suivre le nombre de ventes pour chaque article.
$ventes = array_fill(0, count($articles), 0); 

// Affichage de la liste des articles disponibles 📃
echo "Liste des articles disponibles (avec boucle for) :\n";
for ($i = 0; $i < count($articles); $i++) {
    echo "$i : $articles[$i]\n"; // Affiche chaque article avec son index.
}

echo "\nListe des articles disponibles (avec boucle foreach) :\n";
foreach ($articles as $index => $article) {
    echo "$index : $article\n"; // Affiche chaque article avec son index.
}

// 2. 📦 Gestion des Stocks
echo "\nListe des articles avec leur quantité en stock (avec boucle for) :\n";
for ($i = 0; $i < count($articles); $i++) {
    echo "$articles[$i] - Stock: $quantites[$i]\n"; // Affiche chaque article avec sa quantité en stock.
}

// 3. 🛍️ Réalisation d'une Vente
// Fonction pour gérer la vente d'un article
function vendreArticle(&$articles, &$quantites, &$ventes) {
    echo "\nChoisissez un article à vendre (index) : ";
    $index = intval(trim(fgets(STDIN))); // Récupère l'index de l'article choisi par l'utilisateur.

    // Vérifie si l'index est valide.
    if ($index < 0 || $index >= count($articles)) {
        echo "Article non valide.\n";
        return; // Quitte la fonction si l'index est invalide.
    }

    echo "Quantité à vendre : ";
    $quantiteVendre = intval(trim(fgets(STDIN))); // Récupère la quantité à vendre.

    // Vérifie si le stock est suffisant.
    if ($quantites[$index] >= $quantiteVendre) {
        $quantites[$index] -= $quantiteVendre; // Déduit la quantité vendue du stock.
        $ventes[$index] += $quantiteVendre; // Incrémente le nombre de ventes.
        echo "Vente de $quantiteVendre $articles[$index] ✅\n";
    } else {
        echo "Stock insuffisant pour $articles[$index] ❌\n"; // Informe l'utilisateur en cas de stock insuffisant.
    }
}

vendreArticle($articles, $quantites, $ventes); // Appelle la fonction pour réaliser une vente.

// 4. 🔄 Réapprovisionnement du Stock 
// Fonction pour gérer le réapprovisionnement d'un article
function reapprovisionnerArticle(&$articles, &$quantites) {
    echo "\nChoisissez un article à réapprovisionner (index) : ";
    $index = intval(trim(fgets(STDIN))); // Récupère l'index de l'article choisi pour réapprovisionnement.

    // Vérifie si l'index est valide.
    if ($index < 0 || $index >= count($articles)) {
        echo "Article non valide.\n";
        return; // Quitte la fonction si l'index est invalide.
    }

    echo "Quantité à ajouter : ";
    $quantiteAjouter = intval(trim(fgets(STDIN))); // Récupère la quantité à ajouter.

    $quantites[$index] += $quantiteAjouter; // Ajoute la quantité au stock.
    echo "Nouvelle quantité en stock de $articles[$index] : $quantites[$index]\n"; // Affiche la nouvelle quantité.
}

reapprovisionnerArticle($articles, $quantites); // Appelle la fonction pour réapprovisionner un article.

// 5. 📊 Synthèse et Affichage du Stock 
echo "\nÉtat actuel du stock :\n";
foreach ($articles as $index => $article) {
    echo "$article - Stock: $quantites[$index]"; // Affiche chaque article avec sa quantité.
    if ($quantites[$index] == 0) {
        echo " (Rupture de stock) 🚫"; // Indique si l'article est en rupture de stock.
    }
    echo "\n";
}

// 6. 📈 Suivi des Ventes Totales par Article 
echo "\nVentes totales par article :\n";
foreach ($articles as $index => $article) {
    echo "$article - Ventes: $ventes[$index]\n"; // Affiche le nombre de ventes pour chaque article.
}

// 7. ❌ Suppression d'un Article 
// Fonction pour supprimer un article
function supprimerArticle(&$articles, &$quantites, &$ventes) {
    echo "\nChoisissez un article à supprimer (index) : ";
    $index = intval(trim(fgets(STDIN))); // Récupère l'index de l'article à supprimer.

    // Vérifie si l'index est valide.
    if ($index < 0 || $index >= count($articles)) {
        echo "Article non valide.\n";
        return; // Quitte la fonction si l'index est invalide.
    }

    unset($articles[$index]); // Supprime l'article du tableau.
    unset($quantites[$index]); // Supprime la quantité correspondante.
    unset($ventes[$index]); // Supprime le nombre de ventes.

    // Ré-indexer les tableaux pour enlever les trous
    $articles = array_values($articles);
    $quantites = array_values($quantites);
    $ventes = array_values($ventes);

    echo "Article supprimé. Liste des articles restants :\n";
    foreach ($articles as $index => $article) {
        echo "$index : $article - Stock: $quantites[$index]\n"; // Affiche la liste des articles restants.
    }
}

supprimerArticle($articles, $quantites, $ventes); // Appelle la fonction pour supprimer un article.

