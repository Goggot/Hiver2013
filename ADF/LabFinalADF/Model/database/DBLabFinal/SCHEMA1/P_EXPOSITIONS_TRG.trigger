CREATE TRIGGER P_EXPOSITIONS_TRG 
BEFORE INSERT ON P_EXPOSITIONS 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF :NEW.NOM_EXPO IS NULL THEN
      SELECT P_EXPOSITIONS_SEQ.NEXTVAL INTO :NEW.NOM_EXPO FROM DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/
