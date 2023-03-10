
# bdd filRouge _ requettes annexes. 

Chiffre d'affaires mois par mois pour une année sélectionnée

```
select sum(c.TotalTTC),DATE_FORMAT(h.dateCom, '%m'), DATE_FORMAT(h.dateCom, '%Y') 
from historique as h 
join commande as c on c.idCom = h.idCom
where DATE_FORMAT(h.dateCom, '%Y')  = '2023'
GROUP by DATE_FORMAT(h.dateCom, '%m')
```   



Chiffre d'affaires généré pour un fournisseur
```
SELECT sum(lc.prix), fournisseurproduit.nomination 
FROM `fournisseurproduit`
join lignecommande as lc on fournisseurproduit.RefProduit = lc.RefProduit
GROUP BY nomination
```

TOP 10 des produits les plus commandés pour une année sélectionnée (référence et nom du produit, quantité commandée, fournisseur)

```
select DATE_FORMAT(lignecommande.dateCom,'%Y'), fournisseurproduit.RefProduit, fournisseurproduit.shortLibel, lignecommande.quantite, fournisseurproduit.nomination 
from fournisseurproduit
JOIN lignecommande on lignecommande.RefProduit = fournisseurproduit.RefProduit
where DATE_FORMAT(lignecommande.dateCom,'%Y') = '2023'
GROUP BY fournisseurproduit.RefProduit limit 10 
```

TOP 10 des produits les plus rémunérateurs pour une année sélectionnée (référence et nom du produit, marge, fournisseur)
```
select DATE_FORMAT(lignecommande.dateCom,'%Y'),sum(lignecommande.prix), fournisseurproduit.RefProduit, fournisseurproduit.shortLibel, lignecommande.quantite, fournisseurproduit.nomination from fournisseurproduit
JOIN lignecommande on lignecommande.RefProduit = fournisseurproduit.RefProduit
where DATE_FORMAT(lignecommande.dateCom,'%Y') = '2023'
group BY fournisseurproduit.RefProduit
ORDER by sum(lignecommande.prix) desc limit 10
```

Top 10 des clients en nombre chiffre d'affaires

```
select client.idClient, client.nom, sum(commande.TotalTTC)
from historique 
JOIN client on client.idClient = historique.idClient
JOIN commande on historique.idCom = commande.idCom
GROUP BY client.idClient
ORDER by sum(commande.TotalTTC)desc LIMIT 10;
```

Top 10 des clients en nombre de commandes 

```
select client.idClient, client.nom,COUNT(historique.idCom)
from historique 
JOIN client on client.idClient = historique.idClient
JOIN commande on historique.idCom = commande.idCom
GROUP BY client.idClient
ORDER by COUNT(historique.idCom) desc LIMIT 10
```
