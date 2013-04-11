CREATE TRIGGER EA_ECOLES_TRG 
BEFORE INSERT ON EA_ECOLES 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF :NEW.ID_ECOLE IS NULL THEN
      SELECT EA_ECOLES_SEQ.NEXTVAL INTO :NEW.ID_ECOLE FROM DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/
