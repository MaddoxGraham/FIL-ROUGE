
# BDD filRouge  : Vues  SQL . 


Créez une vue correspondant à la jointure Produits - Catégorie/Sous catégorie

```
CREATE VIEW PRODUITSCATEGORIES AS
SELECT PRODUIT.shortLibel , CAT1.nomination as NomCategorie , CAT2.nomination as NomSousCategorie from CATEGORIE as CAT1 
 JOIN CATEGORIE as CAT2 on CAT1.idCat = CAT2.sousCat
 JOIN PRODUIT on CAT2.idCat = PRODUIT.idCat
 ORDER BY CAT1.nomination 
 ```


Créez une vue correspondant à la jointure Produits - Fournisseurs

```
CREATE VIEW FOURNISSEURPRODUIT AS 
SELECT PRODUIT.RefProduit, PRODUIT.shortLibel, PRODUIT.prxHT, FOURNISSEUR.RefFournisseur,FOURNISSEUR.nomination FROM PRODUIT
JOIN STOCKER ON PRODUIT.RefProduit = STOCKER.RefProduit
JOIN FOURNISSEUR ON STOCKER.RefFournisseur = FOURNISSEUR.RefFournisseur
```

# BDD filRouge  : Requettes SQL . 

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


# BDD filRouge  : Trigger  SQL . 

Si le statut de la commande passe en 'clos' → créer entrée dans historique 

```
DROP TRIGGER IF EXISTS CreerHistorique ;
DELIMITER |
CREATE TRIGGER CreerHistorique AFTER UPDATE ON COMMANDE
FOR EACH ROW
    BEGIN
        DECLARE CurrentCom INT;
        DECLARE CurrentIdCli INT;
        DECLARE CurrentDateCom DATETIME;
        DECLARE CurrentNom VARCHAR(50); 
        DECLARE CurrentPrenom VARCHAR(50); 
        DECLARE CurrentMail VARCHAR(50); 
        DECLARE CurrentTel VARCHAR(50); 
        DECLARE CurrentRaisonSociale VARCHAR(50);  
		DECLARE CurrentStatut VARCHAR(50);

        SET CurrentCom = OLD.idCom;
        SET CurrentIdCli = OLD.idClient;
        SET CurrentDateCom = OLD.dateCom;
        SET CurrentNom = (SELECT C.nom from COMMANDE as CO JOIN CLIENT AS C ON CO.idClient = C.idClient where idCom = CurrentCom);
        SET CurrentPrenom = (SELECT C.prenom from COMMANDE as CO JOIN CLIENT AS C ON CO.idClient = C.idClient where idCom = CurrentCom);
        SET CurrentMail = (SELECT C.mail from COMMANDE as CO JOIN CLIENT AS C ON CO.idClient = C.idClient where idCom = CurrentCom);
        SET CurrentTel = (SELECT C.telephone from COMMANDE as CO JOIN CLIENT AS C ON CO.idClient = C.idClient where idCom = CurrentCom);
        SET CurrentRaisonSociale = (SELECT C.raisonSociale from COMMANDE as CO JOIN CLIENT AS C ON CO.idClient = C.idClient where idCom = CurrentCom);
		SET CurrentStatut = NEW.statut ;
        
    IF CurrentStatut = 'clos' 
    THEN
    INSERT INTO HISTORIQUE (
        HISTORIQUE.idClient,
        HISTORIQUE.idCom,
        HISTORIQUE.dateCom,
        HISTORIQUE.nomHistorique,
        HISTORIQUE.prenomHistorique,
        HISTORIQUE.mailHistorique,
        HISTORIQUE.telephoneHistorique,
        HISTORIQUE.raisonsocialeHistorique) VALUES(CurrentIdCli,CurrentCom,CurrentDateCom,CurrentNom,CurrentPrenom,CurrentMail,CurrentTel,CurrentRaisonSociale);
        END IF;
    END |
DELIMITER ;

```

Si commande a statut terminé alors interdiction de update  

```
DROP TRIGGER IF EXISTS CreerHistorique ;
DELIMITER |
CREATE TRIGGER CreerHistorique AFTER UPDATE ON COMMANDE
FOR EACH ROW
    BEGIN
        DECLARE CurrentCom INT;
        DECLARE CurrentIdCli INT;
        DECLARE CurrentDateCom DATETIME;
        DECLARE CurrentNom VARCHAR(50); 
        DECLARE CurrentPrenom VARCHAR(50); 
        DECLARE CurrentMail VARCHAR(50); 
        DECLARE CurrentTel VARCHAR(50); 
        DECLARE CurrentRaisonSociale VARCHAR(50);  
		DECLARE CurrentStatut VARCHAR(50);
        DECLARE OldStat VARCHAR(255);
        DECLARE NewStat VARCHAR(255);

        SET CurrentCom = OLD.idCom;
        SET CurrentIdCli = OLD.idClient;
        SET CurrentDateCom = OLD.dateCom;
        SET CurrentNom = (SELECT C.nom from COMMANDE as CO JOIN CLIENT AS C ON CO.idClient = C.idClient where idCom = CurrentCom);
        SET CurrentPrenom = (SELECT C.prenom from COMMANDE as CO JOIN CLIENT AS C ON CO.idClient = C.idClient where idCom = CurrentCom);
        SET CurrentMail = (SELECT C.mail from COMMANDE as CO JOIN CLIENT AS C ON CO.idClient = C.idClient where idCom = CurrentCom);
        SET CurrentTel = (SELECT C.telephone from COMMANDE as CO JOIN CLIENT AS C ON CO.idClient = C.idClient where idCom = CurrentCom);
        SET CurrentRaisonSociale = (SELECT C.raisonSociale from COMMANDE as CO JOIN CLIENT AS C ON CO.idClient = C.idClient where idCom = CurrentCom);
		SET CurrentStatut = NEW.statut ;
        SET OldStat = OLD.statut;        
        
    IF CurrentStatut = 'clos' AND OldStat != 'clos'
    THEN
    INSERT INTO HISTORIQUE (
        HISTORIQUE.idClient,
        HISTORIQUE.idCom,
        HISTORIQUE.dateCom,
        HISTORIQUE.nomHistorique,
        HISTORIQUE.prenomHistorique,
        HISTORIQUE.mailHistorique,
        HISTORIQUE.telephoneHistorique,
        HISTORIQUE.raisonsocialeHistorique) VALUES(CurrentIdCli,CurrentCom,CurrentDateCom,CurrentNom,CurrentPrenom,CurrentMail,CurrentTel,CurrentRaisonSociale);
        END IF;
        IF OldStat = 'clos'
        THEN
        SIGNAL SQLSTATE '40000' SET MESSAGE_TEXT = 'Aucun accès aux valeurs archivées. ';
        END IF;
    END |
DELIMITER ;
```


# BDD filRouge  : Procedures  SQL . 

historique peut etre supprimé au bout d e 10 ans 
la suppression de historique supprime aussi la commande liée

```
DROP PROCEDURE IF EXISTS SupprimerArchive;

DELIMITER | 
CREATE PROCEDURE SupprimerArchive()
BEGIN
       DELETE FROM HISTORIQUE WHERE DATEDIFF(current_date, dateCom)>3652;	
       DELETE FROM COMMANDE WHERE DATEDIFF(current_date, dateCom)>3652;	
       
    END|
DELIMITER 


