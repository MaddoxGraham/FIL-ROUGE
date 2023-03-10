# Dictionnaire de données


| CODE  |  LIBELLÉ  |  TYPE  | CONTRAINTE  | 
| :--------------- |:---------------:| :---------------:|:---------------:| 
| idAdresse | Identifiant servant à rendre unique chaque adresse  | INT  |   PRIMARY NOT NULL AUTO_INCREMENT |  
| nominationAdresse  | Définie un nom pour l’adresse  | ENUM(‘maison’,’livraison’,’facturation’)  |NOT NULL  |   
| adresse | Nom de la rue et du numero de voie  | VARCHAR(50) | NOT NULL  |   
| cp | Code postal lié à l’adresse  | VARCHAR(5)  | NOT NULL  |  
| ville |  Ville liée a l’adresse | VARCHAR(50) | NOT NULL |   
| actif | Définie si l’adresse est actuellement utilisée ou non  | BOOLEAN  | NOT NULL |   
| idClient | Identifiant propre au client  | INT | PRIMARY NOT NULL AUTO_INCREMENT |  
| nom  | Nom du client  | VARCHAR(50)  | |   
| prenom | Prénom du client | VARCHAR(50) |      |   
| mail  | Mail du client | VARCHAR(30) | |  
| telephone | Téléphone du client | VARCHAR(15) |  |   
| login | Login lié au compte client | VARCHAR(50) | |   
| pwd | Mot de passe lié au compte client | VARCHAR(30) | |  
| dateInscription  | Date de l’inscription du client  | DATE |DEFAULT CURRENT_DATE  |   
| dateInscription| Date de l’inscription du client| DATE|   DEFAULT CURRENT_DATE|   
| raisonSociale| Raison social d’un professionnel|   VARCHAR(30)|   |   
| IdCommercial| Identifiant lié au commercial de l’entreprise|   INT|   PRIMARY NOT NULL AUTO_INCREMENT|   
| nom | Nom du commercial|   VARCHAR(50)|   |   
| prenom| Prénom du commercial| VARCHAR(50)| | 
| specificite| Indique si le commercial s’occupe de pro ou de particuliers| ENUM('particuliers','professionnels')| NOT NULL| 
| nomHistorique| Nom du client sauvegardé dans les archives| VARCHAR(50)| | 
| prenomHistorique| Prenom du client sauvegardé dans les archives| VARCHAR(50)| | 
| mailHistorique| mail du client sauvegardé dans les archives| VARCHAR(30)| | 
| telephoneHistorique| Telephone du client sauvegardé dans les archives| VARCHAR(15)| | 
| raisonsocialeHistorique| Raison Sociale du client sauvegardé dans les archives| VARCHAR(30)| | 
| idCoeff| Identifiant du coefficient lié au statut du client| INT| PRIMARY NOT NULL AUTO_INCREMENT| 
| nomination| Determine le coefficient lié au professionnel ou au particulier| VARCHAR(50)| | 
| idCom| Identifiant de la commande| INT| PRIMARY NOT NULL AUTO_INCREMENT| 
| dateCom| Date à laquelle la commande est créée| DATETIME| DEFAULT CURRENT_DATE NOT NULL| 
| reduction| Montant de la reduction appliquée| DECIMAL(5,2)| | 
| TotalTTC| Total de la commande TTC| DECIMAL(5,2)| NOT NULL| 
| statut| Statut de la commande | ENUM(en cours, validée)| NOT NULL| 
| numeroFact| Numero identifiant la facture| INT| PRIMARY NOT NULL AUTO_INCREMENT| 
| delaisPayement| Delais de paiement qui dépend du statut du client| DATE| DEFAULT CURRENT_DATE NOT NULL| 
| modePayement| Mode de paiement utilisé par le client| ENUM(virement,cheque,CB)| NOT NULL| 
| datePayement| Date du paiement| DATE| | 
| idLiv| Identifiant de la livraison totale| INT| PRIMARY NOT NULL AUTO_INCREMENT| 
| dateLivraison| Date de livraison| DATE| | 
| quantite| Quantité de produit dans le bon de livraison| INT| NOT NULL | 
| designation| Designation du produit dans le bon de livraison| VARCHAR(255)| NOT NULL| 
| reference| Reference d’une ligne de commande| INT| PRIMARY NOT NULL AUTO_INCREMENT| 
| quantite| Quantité d’un produit dans la ligne de commande| INT| NOT NULL| 
| designation| Désignation du produit dans sa ligne de commande| VARCHAR(255)| NOT NULL| 
| prix| Prix du produit dans la ligne de commande| DECIMAL(5,2)| | 
| RefProduit| Reference d’un produit| INT| PRIMARY NOT NULL AUTO_INCREMENT| 
| shortLibel| Description courte d’un produit| VARCHAR(255)| | 
| LongLibel| Description longue d’un produit| TEXT| | 
| prxHT| Prix du produit HT| DECIMAL(5,2)| | 
| idCat| Identifiant d’une catégorie| INT| PRIMARY NOT NULL AUTO_INCREMENT| 
| nomination| Nom de la catégorie| VARCHAR(255)| | 
| idPhoto| Identifiant de la photo| INT| PRIMARY NOT NULL AUTO INCREMENT| 
| src| Source de la photo| VARCHAR| | 
| majorPicture| Indique si la photo est la photo principale d’un produit| BOOLEAN| | 
| quantite| Indique le nombre de produit dans le stock| INT| | 
| RefFournisseur| Reference d’un fournisseur| VARCHAR| | 
| nomination| Nom du fournisseur| VARCHAR| | 
| IdBonCommande  | Identifiant d’un bon de commande| INT| PRIMARY NOT NULL AUTO INCREMENT| 
