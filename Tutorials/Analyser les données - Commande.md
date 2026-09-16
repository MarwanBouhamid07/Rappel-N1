# Analyser les données

## Table de départ

```
COMMANDE(
    numero_commande,
    date_commande,
    nom_client,
    email_client,
    nom_produit,
    prix_produit,
    quantite_commandee
)
```

## Observation

| numero_commande | date_commande | nom_client  | email_client    | nom_produit | prix_produit | quantite_commandee |
| ---------------- | -------------- | ----------- | ---------------- | ----------- | ------------- | -------------------- |
| C001              | 10/09/2026     | Madani Ali  | madani@mail.com  | Clavier     | 200           | 2                    |
| C001              | 10/09/2026     | Madani Ali  | madani@mail.com  | Souris      | 100           | 1                    |
| C002              | 11/09/2026     | Sara Amrani | sara@mail.com    | Clavier     | 200           | 3                    |

On remarque que `nom_client` et `email_client` dépendent du client, on peut donc les sortir de la table et leur ajouter un identifiant (`id_client`) :

```
CLIENT(
    id_client,
    nom_client,
    email_client
)
```

Même chose pour le nom et le prix du produit :

```
PRODUIT(
    id_produit,
    nom_produit,
    prix_produit
)
```

Et donc la table `COMMANDE` devient :

```
COMMANDE(
    numero_commande,
    date_commande,
    id_client,
    id_produit,
    quantite_commandee
)
```

## Table Commande

| numero_commande | date_commande | quantite_commandee | id_client | id_produit |
| ---------------- | -------------- | --------------------- | --------- | ---------- |
| C001              | 10/09/2026     | 2                     | 1         | 1          |
| C001              | 10/09/2026     | 1                     | 1         | 2          |
| C002              | 11/09/2026     | 3                     | 2         | 1          |

## Table Client

| id_client | nom_client  | email_client    |
| --------- | ----------- | --------------- |
| 1         | Madani Ali  | madani@mail.com |
| 2         | Sara Amrani | sara@mail.com   |

## Table Produit

| id_produit | nom_produit | prix_produit |
| ---------- | ----------- | ------------- |
| 1          | Clavier     | 200           |
| 2          | Souris      | 100           |
