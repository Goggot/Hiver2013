package model.entities;

import oracle.jbo.AttributeList;
import oracle.jbo.Key;
import oracle.jbo.RowIterator;
import oracle.jbo.domain.Timestamp;
import oracle.jbo.server.AttributeDefImpl;
import oracle.jbo.server.EntityDefImpl;
import oracle.jbo.server.EntityImpl;
import oracle.jbo.server.SequenceImpl;
import oracle.jbo.server.TransactionEvent;
// ---------------------------------------------------------------------
// ---    File generated by Oracle ADF Business Components Design Time.
// ---    Tue Apr 30 16:09:09 EDT 2013
// ---    Custom code may be added to this class.
// ---    Warning: Do not modify method signatures of generated methods.
// ---------------------------------------------------------------------
public class PAuditeurImpl
  extends EntityImpl
{
  /**
   * AttributesEnum: generated enum for identifying attributes and accessors. Do not modify.
   */
  public enum AttributesEnum
  {
    Noauditeur
    {
      public Object get(PAuditeurImpl obj)
      {
        return obj.getNoauditeur();
      }

      public void put(PAuditeurImpl obj, Object value)
      {
        obj.setNoauditeur((Integer)value);
      }
    }
    ,
    Codeauditeur
    {
      public Object get(PAuditeurImpl obj)
      {
        return obj.getCodeauditeur();
      }

      public void put(PAuditeurImpl obj, Object value)
      {
        obj.setCodeauditeur((String)value);
      }
    }
    ,
    Motdepasse
    {
      public Object get(PAuditeurImpl obj)
      {
        return obj.getMotdepasse();
      }

      public void put(PAuditeurImpl obj, Object value)
      {
        obj.setMotdepasse((String)value);
      }
    }
    ,
    Nom
    {
      public Object get(PAuditeurImpl obj)
      {
        return obj.getNom();
      }

      public void put(PAuditeurImpl obj, Object value)
      {
        obj.setNom((String)value);
      }
    }
    ,
    Prenom
    {
      public Object get(PAuditeurImpl obj)
      {
        return obj.getPrenom();
      }

      public void put(PAuditeurImpl obj, Object value)
      {
        obj.setPrenom((String)value);
      }
    }
    ,
    Nocoord
    {
      public Object get(PAuditeurImpl obj)
      {
        return obj.getNocoord();
      }

      public void put(PAuditeurImpl obj, Object value)
      {
        obj.setNocoord((Integer)value);
      }
    }
    ,
    Juge
    {
      public Object get(PAuditeurImpl obj)
      {
        return obj.getJuge();
      }

      public void put(PAuditeurImpl obj, Object value)
      {
        obj.setJuge((Timestamp)value);
      }
    }
    ,
    Statut
    {
      public Object get(PAuditeurImpl obj)
      {
        return obj.getStatut();
      }

      public void put(PAuditeurImpl obj, Object value)
      {
        obj.setStatut((String)value);
      }
    }
    ,
    Candidatjuge
    {
      public Object get(PAuditeurImpl obj)
      {
        return obj.getCandidatjuge();
      }

      public void put(PAuditeurImpl obj, Object value)
      {
        obj.setCandidatjuge((Timestamp)value);
      }
    }
    ,
    Admin
    {
      public Object get(PAuditeurImpl obj)
      {
        return obj.getAdmin();
      }

      public void put(PAuditeurImpl obj, Object value)
      {
        obj.setAdmin((Integer)value);
      }
    }
    ,
    PCoordonnees
    {
      public Object get(PAuditeurImpl obj)
      {
        return obj.getPCoordonnees();
      }

      public void put(PAuditeurImpl obj, Object value)
      {
        obj.setPCoordonnees((EntityImpl) value);
      }
    }
    ,
    PEvaluation
    {
      public Object get(PAuditeurImpl obj)
      {
        return obj.getPEvaluation();
      }

      public void put(PAuditeurImpl obj, Object value)
      {
        obj.setAttributeInternal(index(), value);
      }
    }
    ,
    PInscription
    {
      public Object get(PAuditeurImpl obj)
      {
        return obj.getPInscription();
      }

      public void put(PAuditeurImpl obj, Object value)
      {
        obj.setAttributeInternal(index(), value);
      }
    }
    ;
    private static AttributesEnum[] vals = null;
    private static int firstIndex = 0;

    public abstract Object get(PAuditeurImpl object);

    public abstract void put(PAuditeurImpl object, Object value);

    public int index()
    {
      return AttributesEnum.firstIndex() + ordinal();
    }

    public static int firstIndex()
    {
      return firstIndex;
    }

    public static int count()
    {
      return AttributesEnum.firstIndex() + AttributesEnum.staticValues().length;
    }

    public static AttributesEnum[] staticValues()
    {
      if (vals == null)
      {
        vals = AttributesEnum.values();
      }
      return vals;
    }
  }
  public static final int NOAUDITEUR = AttributesEnum.Noauditeur.index();
  public static final int CODEAUDITEUR = AttributesEnum.Codeauditeur.index();
  public static final int MOTDEPASSE = AttributesEnum.Motdepasse.index();
  public static final int NOM = AttributesEnum.Nom.index();
  public static final int PRENOM = AttributesEnum.Prenom.index();
  public static final int NOCOORD = AttributesEnum.Nocoord.index();
  public static final int JUGE = AttributesEnum.Juge.index();
  public static final int STATUT = AttributesEnum.Statut.index();
  public static final int CANDIDATJUGE = AttributesEnum.Candidatjuge.index();
  public static final int ADMIN = AttributesEnum.Admin.index();
  public static final int PCOORDONNEES = AttributesEnum.PCoordonnees.index();
  public static final int PEVALUATION = AttributesEnum.PEvaluation.index();
  public static final int PINSCRIPTION = AttributesEnum.PInscription.index();

  /**
   * This is the default constructor (do not remove).
   */
  public PAuditeurImpl()
  {
  }

  /**
   * Gets the attribute value for Noauditeur, using the alias name Noauditeur.
   * @return the value of Noauditeur
   */
  public Integer getNoauditeur()
  {
    return (Integer)getAttributeInternal(NOAUDITEUR);
  }

  /**
   * Sets <code>value</code> as the attribute value for Noauditeur.
   * @param value value to set the Noauditeur
   */
  public void setNoauditeur(Integer value)
  {
    setAttributeInternal(NOAUDITEUR, value);
  }

  /**
   * Gets the attribute value for Codeauditeur, using the alias name Codeauditeur.
   * @return the value of Codeauditeur
   */
  public String getCodeauditeur()
  {
    return (String)getAttributeInternal(CODEAUDITEUR);
  }

  /**
   * Sets <code>value</code> as the attribute value for Codeauditeur.
   * @param value value to set the Codeauditeur
   */
  public void setCodeauditeur(String value)
  {
    setAttributeInternal(CODEAUDITEUR, value);
  }

  /**
   * Gets the attribute value for Motdepasse, using the alias name Motdepasse.
   * @return the value of Motdepasse
   */
  public String getMotdepasse()
  {
    return (String)getAttributeInternal(MOTDEPASSE);
  }

  /**
   * Sets <code>value</code> as the attribute value for Motdepasse.
   * @param value value to set the Motdepasse
   */
  public void setMotdepasse(String value)
  {
    setAttributeInternal(MOTDEPASSE, value);
  }

  /**
   * Gets the attribute value for Nom, using the alias name Nom.
   * @return the value of Nom
   */
  public String getNom()
  {
    return (String)getAttributeInternal(NOM);
  }

  /**
   * Sets <code>value</code> as the attribute value for Nom.
   * @param value value to set the Nom
   */
  public void setNom(String value)
  {
    setAttributeInternal(NOM, value);
  }

  /**
   * Gets the attribute value for Prenom, using the alias name Prenom.
   * @return the value of Prenom
   */
  public String getPrenom()
  {
    return (String)getAttributeInternal(PRENOM);
  }

  /**
   * Sets <code>value</code> as the attribute value for Prenom.
   * @param value value to set the Prenom
   */
  public void setPrenom(String value)
  {
    setAttributeInternal(PRENOM, value);
  }

  /**
   * Gets the attribute value for Nocoord, using the alias name Nocoord.
   * @return the value of Nocoord
   */
  public Integer getNocoord()
  {
    return (Integer)getAttributeInternal(NOCOORD);
  }

  /**
   * Sets <code>value</code> as the attribute value for Nocoord.
   * @param value value to set the Nocoord
   */
  public void setNocoord(Integer value)
  {
    setAttributeInternal(NOCOORD, value);
  }

  /**
   * Gets the attribute value for Juge, using the alias name Juge.
   * @return the value of Juge
   */
  public Timestamp getJuge()
  {
    return (Timestamp)getAttributeInternal(JUGE);
  }

  /**
   * Sets <code>value</code> as the attribute value for Juge.
   * @param value value to set the Juge
   */
  public void setJuge(Timestamp value)
  {
    setAttributeInternal(JUGE, value);
  }

  /**
   * Gets the attribute value for Statut, using the alias name Statut.
   * @return the value of Statut
   */
  public String getStatut()
  {
    return (String)getAttributeInternal(STATUT);
  }

  /**
   * Sets <code>value</code> as the attribute value for Statut.
   * @param value value to set the Statut
   */
  public void setStatut(String value)
  {
    setAttributeInternal(STATUT, value);
  }

  /**
   * Gets the attribute value for Candidatjuge, using the alias name Candidatjuge.
   * @return the value of Candidatjuge
   */
  public Timestamp getCandidatjuge()
  {
    return (Timestamp)getAttributeInternal(CANDIDATJUGE);
  }

  /**
   * Sets <code>value</code> as the attribute value for Candidatjuge.
   * @param value value to set the Candidatjuge
   */
  public void setCandidatjuge(Timestamp value)
  {
    setAttributeInternal(CANDIDATJUGE, value);
  }

  /**
   * Gets the attribute value for Admin, using the alias name Admin.
   * @return the value of Admin
   */
  public Integer getAdmin()
  {
    return (Integer)getAttributeInternal(ADMIN);
  }

  /**
   * Sets <code>value</code> as the attribute value for Admin.
   * @param value value to set the Admin
   */
  public void setAdmin(Integer value)
  {
    setAttributeInternal(ADMIN, value);
  }

  /**
   * getAttrInvokeAccessor: generated method. Do not modify.
   * @param index the index identifying the attribute
   * @param attrDef the attribute

   * @return the attribute value
   * @throws Exception
   */
  protected Object getAttrInvokeAccessor(int index,
                                         AttributeDefImpl attrDef)
    throws Exception
  {
    if ((index >= AttributesEnum.firstIndex()) && (index < AttributesEnum.count()))
    {
      return AttributesEnum.staticValues()[index - AttributesEnum.firstIndex()].get(this);
    }
    return super.getAttrInvokeAccessor(index, attrDef);
  }

  /**
   * setAttrInvokeAccessor: generated method. Do not modify.
   * @param index the index identifying the attribute
   * @param value the value to assign to the attribute
   * @param attrDef the attribute

   * @throws Exception
   */
  protected void setAttrInvokeAccessor(int index, Object value,
                                       AttributeDefImpl attrDef)
    throws Exception
  {
    if ((index >= AttributesEnum.firstIndex()) && (index < AttributesEnum.count()))
    {
      AttributesEnum.staticValues()[index - AttributesEnum.firstIndex()].put(this, value);
      return;
    }
    super.setAttrInvokeAccessor(index, value, attrDef);
  }

  /**
   * @return the associated entity oracle.jbo.server.EntityImpl.
   */
  public EntityImpl getPCoordonnees()
  {
    return (EntityImpl) getAttributeInternal(PCOORDONNEES);
  }

  /**
   * Sets <code>value</code> as the associated entity oracle.jbo.server.EntityImpl.
   */
  public void setPCoordonnees(EntityImpl value)
  {
    setAttributeInternal(PCOORDONNEES, value);
  }

  /**
   * @return the associated entity oracle.jbo.RowIterator.
   */
  public RowIterator getPEvaluation()
  {
    return (RowIterator) getAttributeInternal(PEVALUATION);
  }

  /**
   * @return the associated entity oracle.jbo.RowIterator.
   */
  public RowIterator getPInscription()
  {
    return (RowIterator) getAttributeInternal(PINSCRIPTION);
  }

  /**
   * @param noauditeur key constituent

   * @return a Key object based on given key constituents.
   */
  public static Key createPrimaryKey(Integer noauditeur)
  {
    return new Key(new Object[]{noauditeur});
  }

  /**
   * @return the definition object for this instance class.
   */
  public static synchronized EntityDefImpl getDefinitionObject()
  {
    return EntityDefImpl.findDefObject("model.entities.PAuditeur");
  }

  /**
   * Add attribute defaulting logic in this method.
   * @param attributeList list of attribute names/values to initialize the row
   */
  protected void create(AttributeList attributeList)
  {
    super.create(attributeList);
  }

  /**
   * Add locking logic here.
   */
  public void lock()
  {
    super.lock();
  }

  /**
   * Custom DML update/insert/delete logic here.
   * @param operation the operation type
   * @param e the transaction event
   */
  protected void doDML(int operation, TransactionEvent e){
    if(operation==DML_INSERT){
      SequenceImpl empSeq=new SequenceImpl("p_seq_coord", getDBTransaction());
      System.out.println(empSeq);
      int NEXT_ID = empSeq.getSequenceNumber().add(1).intValue();
      System.out.println(NEXT_ID);
      setNocoord(NEXT_ID);
    }
    super.doDML(operation, e);
  }
}
