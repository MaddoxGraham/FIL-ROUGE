# Fil Rouge – Cas d’utilisation : Passer une commande. 

## I. Identifier les acteurs

 * <span style="background-color: #ec9ba4"> CLIENT </span> ;
 * COMMERCIAUX ;

## II.Différents cas d’usages par acteur

* Le client peut 
    - Commander un produit
    - Mettre un article dans un panier
    - Supprimer un article de son panier
    - Consulter le catalogue
		- Entrer plusieurs adresses 
		- Créer un profil client
		- Modifier son profil client
		- Consulter ses anciennes commandes
* Les commerciaux peuvent : 
    - Créer un profil client pour un professionnel
    - Attribuer une remise 
		- Consulter les commandes de ses clients
		- commander chez un fournisseur 


## III. Scénario nominal et Alternatif du cas d’usage : Passer une commande

FLOT NOMINAL 
Client particulier ajoute un produit → Le produit est en stock → il valide son panier → le client se connecte →Le client sélectionne son adresse de livraison → L’adresse de facturation est la même → le client est un particulier → le moyen de paiement est valide → La commande passe en statut ‘clos’ → une facture est générée 

Client professionnel ajoute un produit → Le produit est en stock → il valide son panier → le client se connecte →Le client sélectionne son adresse de livraison → L’adresse de facturation est la même → le client est un professionnel → 
		le professionnel paye directement  → La commande passe en statut ‘clos’ → une facture est générée.
		le professionnel paye par virement  → La commande passe en statut ‘en attente’ → une facture est générée.
		le professionnel paye par chèque  → La commande passe en statut ‘en attente’ → une facture est générée.


FLOT NOMINAL 
Client particulier ajoute un produit → Le produit n’est pas en stock → la commande est annulée.
	→ il ne valide pas son panier → une modale lui propose  de continuer ses achats ou de valider sa commande.
	→ le client n’as pas de compte client → Il lui est proposé de créer un compte → le client accepte.
	→ Il lui est proposé de créer un compte → le client refuse → annulation de la commande.
	→ Le client sélectionne son adresse de livraison → L’adresse de facturation est différente → l’adresse de facturation est une adresse existante sur le compte client → sélection de l’adresse.
	→ l’adresse de facturation n’est pas une adresse existante sur le compte client → champs d’insertion d’une nouvelle adresse
 	→ le client est un particulier → le moyen de paiement est invalide → commande annulée → retour au panier 




Client professionnel ajoute un produit  → Le produit n’est pas en stock → la commande est annulée.
 	→ il ne valide pas son panier → une modale lui propose  de continuer ses achats ou de valider sa commande.
 	→Le client sélectionne son adresse de livraison → L’adresse de facturation est différente → l’adresse de facturation est une adresse existante sur le compte client → sélection de l’adresse
		le professionnel paye directement  → La commande passe en statut ‘clos’ → une facture est générée.
		le professionnel paye par virement  → La commande passe en statut ‘en attente’ → une facture est générée.
		le professionnel paye par chèque  → La commande passe en statut ‘en attente’ → une facture est générée.


## IV. Diagramme de Séquence du cas d’usage : Passer une commande

annexe DiagrammeActivite_FilRouge.drawio.png

## V. Diagramme d’activité pour le cas : Passer une commande

annexe DiagrammeSequence_FilRouge.drawio.png

## VI. Diagramme de classe pour le cas : Passer une commande

