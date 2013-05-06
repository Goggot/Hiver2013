CREATE OR REPLACE TRIGGER AE_RESPONSABLE 
BEFORE UPDATE ON AE_ECOLES 
FOR EACH ROW
BEGIN
  UPDATE AE_SUIVI_ECOLE
  SET ANCIEN_NOM = :OLD.RESPONSABLE;
END;
/
