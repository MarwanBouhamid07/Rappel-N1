# 2.1. Identifier les associations

## Les entités

```
CLIENT
COMMANDE
PRODUIT
```

## Les attributs

```
CLIENT(
    id_client,
    name_client,
    email
)

COMMANDE(
    order_num,
    date_comande,
    id_client
)

PRODUIT(
    id_product,
    name_product,
    price
)
```

> L'attribut `quantity_ordered` ne appartient pas à une entité : il dépend à la fois de la commande **et** du produit. Il sera porté par l'association `CONTENIR` (c'est lui qui, dans le MLD, donnera la table `Order line`).

## Lire les règles

```
CLIENT ------(1,N)----- PASSER -----(1,1)------- COMMANDE
COMMANDE -----(1,N)----- CONTENIR -----(0,N)----- PRODUIT
```

## Lecture des cardinalités

### Association PASSER (CLIENT — COMMANDE)

| Entité | Cardinalité | Lecture |
| ------ | ----------- | ------- |
| CLIENT | (1,N) | Un client passe **une (1)** à **plusieurs (N)** commandes. |
| COMMANDE | (1,1) | Une commande est passée par **un et un seul** client. |

### Association CONTENIR (COMMANDE — PRODUIT)

| Entité | Cardinalité | Lecture |
| ------ | ----------- | ------- |
| COMMANDE | (1,N) | Une commande contient **un (1)** à **plusieurs (N)** produits. |
| PRODUIT | (0,N) | Un produit peut être contenu dans **zéro (0)** à **plusieurs (N)** commandes. |

## Schéma du MCD

![les associations et cartidnalites](./images/10_Identify%20the%20associations%20and%20cardinalities(MCD).png)

