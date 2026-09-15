# 8 — Décomposer les données — Théorie (résumé)

> **Tutoriel :** T.201.122 — Décomposer les données
> **UA :** UA.201.12 — Analyser les données et identifier les entités
> **Source :** solicode-web-mobile.github.io/autoformations-structurer/tutos/decomposer-les-donnees/

## Objectif

À partir des dépendances fonctionnelles, décomposer progressivement une relation en plusieurs relations, et identifier les entités obtenues.

## Idée principale

Une dépendance fonctionnelle du type :

```
id_auteur → nom_auteur, email_auteur
```

montre qu'un groupe de données peut être séparé de la relation de départ.

Mais une dépendance peut être **correcte** même si les données restent **répétées** :

```
id_article → nom_categorie
```

| id_article | nom_categorie |
| ---------- | ------------- |
| A01        | PHP           |
| A02        | PHP           |

→ `PHP` apparaît plusieurs fois. C'est le signal qu'il faut séparer ces données.

## Comment séparer

1. Les données qui décrivent une **même réalité** (ex. une catégorie) sont regroupées.
2. Si aucun identifiant n'existe pour ce groupe, on en **crée un** (ex. `id_categorie`).
3. On crée une nouvelle relation avec cet identifiant + les données du groupe :

```
CATEGORIE(
    id_categorie,
    nom_categorie,
    description_categorie
)
```

4. La relation de départ **garde seulement l'identifiant** (pas les données) :

```
ARTICLE(
    id_article, titre_article, contenu_article,
    date_publication, id_auteur, id_categorie
)
```

## Méthode à retenir (9 étapes)

```
1. Rechercher les dépendances fonctionnelles.
2. Repérer les groupes de données.
3. Observer les données qui se répètent.
4. Chercher ou créer un identifiant pour le groupe.
5. Séparer les données du groupe.
6. Conserver l'identifiant dans la relation de départ.
7. Reprendre les données restantes.
8. Recommencer.
9. Interpréter les relations obtenues comme des entités.
```

## Des relations aux entités

Chaque relation obtenue reçoit un sens métier : `AUTEUR`, `ARTICLE`, `CATEGORIE` deviennent des **entités**, leurs colonnes des **propriétés**.

```
Données → Dépendances fonctionnelles → Groupes → Relations → Entités
```

## Glossaire

| Terme | Définition |
| ----- | ---------- |
| **Décomposition** | Séparer une relation en plusieurs relations. |
| **Groupe de données** | Données qui décrivent une même réalité. |
| **Identifiant** | Donnée qui identifie une occurrence de façon unique. |
| **Dépendance fonctionnelle** | Une donnée détermine une seule valeur d'une autre. |
| **Entité** | Élément du système représenté dans le modèle. |
| **Propriété** | Donnée qui décrit une entité. |
