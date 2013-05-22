connect scott/AAAaaa111;
SELECT substr(object_name,0,40) "Objets appartenant a &1", object_type FROM USER_OBJECTS WHERE owner = ('&1');