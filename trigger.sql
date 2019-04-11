 
CREATE TABLE articles
(
  id_article bigserial NOT NULL,
  id_sous_famille bigint NOT NULL,
  article character varying(300) NOT NULL,
  designation character varying(300) NOT NULL,
  code character varying(300) NOT NULL,
  id_fournisseur bigint NOT NULL,
  quantite_stock integer,
  quantite_stock_min integer NOT NULL,
  etat_article character varying(60) NOT NULL,
  type_derniere_mouvement character varying(40),
  utilisateur character varying(50),
  datecreation timestamp with time zone,
  datemaj timestamp with time zone,
  CONSTRAINT pk_article PRIMARY KEY (id_article),
  CONSTRAINT articles_fournisseurs_fk1 FOREIGN KEY (id_fournisseur)
      REFERENCES fournisseurs (id_fournisseur) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE RESTRICT,
  CONSTRAINT articles_sousfamilles_fk1 FOREIGN KEY (id_sous_famille)
      REFERENCES sousfamilles (id_sous_famille) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE RESTRICT,
  CONSTRAINT un_article_code UNIQUE (code),
  CONSTRAINT un_article_nom UNIQUE (article)
)
WITH (
  OIDS=FALSE
);

 
CREATE TABLE mouvements_articles
(
  id_mouvement bigserial NOT NULL,
  id_article bigint NOT NULL,
  type_mouvement character varying(40) NOT NULL,
  numero_bon character varying(40),
  observation character varying(60),
  quantite integer NOT NULL,
  utilisateur character varying(50),
  datecreation timestamp with time zone,
  datemaj timestamp with time zone,
  CONSTRAINT pk_mouvements_articles PRIMARY KEY (id_mouvement),
  CONSTRAINT mouvements_articles_articles_fk1 FOREIGN KEY (id_article)
      REFERENCES articles (id_article) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE RESTRICT
)
WITH (
  OIDS=FALSE
);

 
CREATE OR REPLACE FUNCTION maj_quantite_stock()
  RETURNS trigger AS
$BODY$
 
 DECLARE
 
	int_quantite_stock integer := 0;
        int_id_article_temp integer := 0;
 
    BEGIN
 
IF (TG_OP = 'INSERT') THEN
 
int_id_article_temp = (SELECT id_article FROM mouvements_articles WHERE id_mouvement = NEW.id_mouvement);
int_quantite_stock = (SELECT calcul_quantite_stock (int_id_article_temp));
UPDATE articles SET quantite_stock = int_quantite_stock WHERE articles.id_article = int_id_article_temp;
 
ELSE
int_id_article_temp = (SELECT id_article FROM mouvements_articles WHERE id_mouvement = OLD.id_mouvement);	
int_quantite_stock = (SELECT calcul_quantite_stock(OLD.id_article));
UPDATE articles SET quantite_stock = int_quantite_stock WHERE articles.id_article = int_id_article_temp;
END IF;
 
 
 
        RETURN NEW;
 
    END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;


DELIMITER |
CREATE TRIGGER ajout_historique_produit
AFTER DELETE ON produit
FOR EACH ROW BEGIN
       INSERT INTO historique_produit(
          idProduit,
          PrixProduit,
          StockProduit,
          PoidProduit,
          NomProduit,
          DescriptionProduit,
          CouleurProduit,
          idclient,
          dateDelete)
          VALUES(
          OLD.idProduit,
          OLD.PrixProduit,
          OLD.StockProduit,
          OLD.PoidProduit,
          OLD.NomProduit,
          OLD.DescriptionProduit,
          OLD.CouleurProduit,
          OLD.idclient,
          NOW());
END |


BEGIN
IF OLD.StockProduit = 0 THEN
INSERT INTO historique_produit(
          idProduit,
          PrixProduit,
          PoidProduit,
          NomProduit,
          DescriptionProduit,
          CouleurProduit,
          idclient,
          dateDelete)
          VALUES(
          OLD.idProduit,
          OLD.PrixProduit,
          OLD.PoidProduit,
          OLD.NomProduit,
          OLD.DescriptionProduit,
          OLD.CouleurProduit,
          OLD.idclient,
          NOW());
DELETE FROM produit WHERE idProduit = OLD.idProduit;
END IF;
END



DELIMITER |
CREATE TRIGGER stock_produit_0 AFTER INSERT
ON produit FOR EACH ROW
BEGIN
  IF (NEW.StockProduit >= 0) THEN
    DELETE produit
    WHERE idProduit = OLD.idProduit;
  END IF;
END |



CREATE PROCEDURE transactionCredit
AS
  SELECT



CREATE TRIGGER date_inscription AFTER INSERT
ON  client FOR EACH ROW
BEGIN
    INSERT INTO client (dateAjout) VALUES (NOW());
    END




BEGIN TRANSACTION Achat
UPDATE client set CreditCli = CreditCli - $PrixProduit * $StockProduit
WHERE idclient = $_SESSION['idclient']

UPDATE client set CreditCli = CreditCli + $PrixProduit * $StockProduit
WHERE idclient = produit.idclient AND idProduit = $idProduit


DELIMITER |
CREATE PROCEDURE compter_nombre_produit_vendu_semaine ()
BEGIN
    SELECT COUNT(*) FROM hisstorique_produit
    WHERE dateDelete >= NOW() - 7;
END |
DELIMITER ;