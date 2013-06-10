package model.view;

import model.entity.PAuditeurImpl;

import model.view.common.PAuditeurViewRow;

import oracle.jbo.RowIterator;
import oracle.jbo.domain.Date;
import oracle.jbo.domain.Timestamp;
import oracle.jbo.server.AttributeDefImpl;
import oracle.jbo.server.EntityImpl;
import oracle.jbo.server.ViewRowImpl;
// ---------------------------------------------------------------------
// ---    File generated by Oracle ADF Business Components Design Time.
// ---    Tue Apr 16 17:25:08 EDT 2013
// ---    Custom code may be added to this class.
// ---    Warning: Do not modify method signatures of generated methods.
// ---------------------------------------------------------------------
public class PAuditeurViewRowImpl
  extends ViewRowImpl
  implements PAuditeurViewRow
{


  public static final int ENTITY_PAUDITEUR = 0;

  /**
   * AttributesEnum: generated enum for identifying attributes and accessors. Do not modify.
   */
  public enum AttributesEnum
  {
    Noauditeur
    {
      public Object get(PAuditeurViewRowImpl obj)
      {
        return obj.getNoauditeur();
      }

      public void put(PAuditeurViewRowImpl obj, Object value)
      {
        obj.setNoauditeur((Integer)value);
      }
    }
    ,
    Codeauditeur
    {
      public Object get(PAuditeurViewRowImpl obj)
      {
        return obj.getCodeauditeur();
      }

      public void put(PAuditeurViewRowImpl obj, Object value)
      {
        obj.setCodeauditeur((String)value);
      }
    }
    ,
    Motdepasse
    {
      public Object get(PAuditeurViewRowImpl obj)
      {
        return obj.getMotdepasse();
      }

      public void put(PAuditeurViewRowImpl obj, Object value)
      {
        obj.setMotdepasse((String)value);
      }
    }
    ,
    Nom
    {
      public Object get(PAuditeurViewRowImpl obj)
      {
        return obj.getNom();
      }

      public void put(PAuditeurViewRowImpl obj, Object value)
      {
        obj.setNom((String)value);
      }
    }
    ,
    Prenom
    {
      public Object get(PAuditeurViewRowImpl obj)
      {
        return obj.getPrenom();
      }

      public void put(PAuditeurViewRowImpl obj, Object value)
      {
        obj.setPrenom((String)value);
      }
    }
    ,
    Nocoord
    {
      public Object get(PAuditeurViewRowImpl obj)
      {
        return obj.getNocoord();
      }

      public void put(PAuditeurViewRowImpl obj, Object value)
      {
        obj.setNocoord((Integer)value);
      }
    }
    ,
    Juge
    {
      public Object get(PAuditeurViewRowImpl obj)
      {
        return obj.getJuge();
      }

      public void put(PAuditeurViewRowImpl obj, Object value)
      {
        obj.setJuge((Date)value);
      }
    }
    ,
    Statut
    {
      public Object get(PAuditeurViewRowImpl obj)
      {
        return obj.getStatut();
      }

      public void put(PAuditeurViewRowImpl obj, Object value)
      {
        obj.setStatut((String)value);
      }
    }
    ,
    Candidatjuge
    {
      public Object get(PAuditeurViewRowImpl obj)
      {
        return obj.getCandidatjuge();
      }

      public void put(PAuditeurViewRowImpl obj, Object value)
      {
        obj.setCandidatjuge((Date)value);
      }
    }
    ,
    Admin
    {
      public Object get(PAuditeurViewRowImpl obj)
      {
        return obj.getAdmin();
      }

      public void put(PAuditeurViewRowImpl obj, Object value)
      {
        obj.setAdmin((Integer)value);
      }
    }
    ,
    PEvaluationView
    {
      public Object get(PAuditeurViewRowImpl obj)
      {
        return obj.getPEvaluationView();
      }

      public void put(PAuditeurViewRowImpl obj, Object value)
      {
        obj.setAttributeInternal(index(), value);
      }
    }
    ,
    PInscriptionView
    {
      public Object get(PAuditeurViewRowImpl obj)
      {
        return obj.getPInscriptionView();
      }

      public void put(PAuditeurViewRowImpl obj, Object value)
      {
        obj.setAttributeInternal(index(), value);
      }
    }
    ;
    private static AttributesEnum[] vals = null;
    private static int firstIndex = 0;

    public abstract Object get(PAuditeurViewRowImpl object);

    public abstract void put(PAuditeurViewRowImpl object, Object value);

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
  public static final int PEVALUATIONVIEW = AttributesEnum.PEvaluationView.index();
  public static final int PINSCRIPTIONVIEW = AttributesEnum.PInscriptionView.index();

  /**
   * This is the default constructor (do not remove).
   */
  public PAuditeurViewRowImpl()
  {
  }
  

  
  /**
   * Gets PAuditeur entity object.
   * @return the PAuditeur
   */
  public PAuditeurImpl getPAuditeur()
  {
    return (PAuditeurImpl) getEntity(ENTITY_PAUDITEUR);
  }

  /**
   * Gets the attribute value for NOAUDITEUR using the alias name Noauditeur.
   * @return the NOAUDITEUR
   */
  public Integer getNoauditeur()
  {
    return (Integer) getAttributeInternal(NOAUDITEUR);
  }

  /**
   * Sets <code>value</code> as attribute value for NOAUDITEUR using the alias name Noauditeur.
   * @param value value to set the NOAUDITEUR
   */
  public void setNoauditeur(Integer value)
  {
    setAttributeInternal(NOAUDITEUR, value);
  }

  /**
   * Gets the attribute value for CODEAUDITEUR using the alias name Codeauditeur.
   * @return the CODEAUDITEUR
   */
  public String getCodeauditeur()
  {
    return (String) getAttributeInternal(CODEAUDITEUR);
  }

  /**
   * Sets <code>value</code> as attribute value for CODEAUDITEUR using the alias name Codeauditeur.
   * @param value value to set the CODEAUDITEUR
   */
  public void setCodeauditeur(String value)
  {
    setAttributeInternal(CODEAUDITEUR, value);
  }

  /**
   * Gets the attribute value for MOTDEPASSE using the alias name Motdepasse.
   * @return the MOTDEPASSE
   */
  public String getMotdepasse()
  {
    return (String) getAttributeInternal(MOTDEPASSE);
  }

  /**
   * Sets <code>value</code> as attribute value for MOTDEPASSE using the alias name Motdepasse.
   * @param value value to set the MOTDEPASSE
   */
  public void setMotdepasse(String value)
  {
    setAttributeInternal(MOTDEPASSE, value);
  }

  public void rentrerMDP(String value)
  {
    System.out.println(value);
    setMotdepasse(value);
    this.getDBTransaction().commit();
  }
  /**
   * Gets the attribute value for NOM using the alias name Nom.
   * @return the NOM
   */
  public String getNom()
  {
    return (String) getAttributeInternal(NOM);
  }

  /**
   * Sets <code>value</code> as attribute value for NOM using the alias name Nom.
   * @param value value to set the NOM
   */
  public void setNom(String value)
  {
    setAttributeInternal(NOM, value);
  }

  /**
   * Gets the attribute value for PRENOM using the alias name Prenom.
   * @return the PRENOM
   */
  public String getPrenom()
  {
    return (String) getAttributeInternal(PRENOM);
  }

  /**
   * Sets <code>value</code> as attribute value for PRENOM using the alias name Prenom.
   * @param value value to set the PRENOM
   */
  public void setPrenom(String value)
  {
    setAttributeInternal(PRENOM, value);
  }

  /**
   * Gets the attribute value for NOCOORD using the alias name Nocoord.
   * @return the NOCOORD
   */
  public Integer getNocoord()
  {
    return (Integer) getAttributeInternal(NOCOORD);
  }

  /**
   * Sets <code>value</code> as attribute value for NOCOORD using the alias name Nocoord.
   * @param value value to set the NOCOORD
   */
  public void setNocoord(Integer value)
  {
    setAttributeInternal(NOCOORD, value);
  }

  /**
   * Gets the attribute value for JUGE using the alias name Juge.
   * @return the JUGE
   */
  public Date getJuge()
  {
    return (Date) getAttributeInternal(JUGE);
  }

  /**
   * Sets <code>value</code> as attribute value for JUGE using the alias name Juge.
   * @param value value to set the JUGE
   */
  public void setJuge(Date value)
  {
    setAttributeInternal(JUGE, value);
  }

  /**
   * Gets the attribute value for STATUT using the alias name Statut.
   * @return the STATUT
   */
  public String getStatut()
  {
    return (String) getAttributeInternal(STATUT);
  }

  /**
   * Sets <code>value</code> as attribute value for STATUT using the alias name Statut.
   * @param value value to set the STATUT
   */
  public void setStatut(String value)
  {
    setAttributeInternal(STATUT, value);
  }

  /**
   * Gets the attribute value for CANDIDATJUGE using the alias name Candidatjuge.
   * @return the CANDIDATJUGE
   */
  public Date getCandidatjuge()
  {
    return (Date) getAttributeInternal(CANDIDATJUGE);
  }

  /**
   * Sets <code>value</code> as attribute value for CANDIDATJUGE using the alias name Candidatjuge.
   * @param value value to set the CANDIDATJUGE
   */
  public void setCandidatjuge(Date value)
  {
    setAttributeInternal(CANDIDATJUGE, value);
  }

  /**
   * Gets the attribute value for ADMIN using the alias name Admin.
   * @return the ADMIN
   */
  public Integer getAdmin()
  {
    return (Integer) getAttributeInternal(ADMIN);
  }

  /**
   * Sets <code>value</code> as attribute value for ADMIN using the alias name Admin.
   * @param value value to set the ADMIN
   */
  public void setAdmin(Integer value)
  {
    setAttributeInternal(ADMIN, value);
  }


  /**
   * Gets the associated <code>RowIterator</code> using master-detail link PEvaluationView.
   */
  public RowIterator getPEvaluationView()
  {
    return (RowIterator) getAttributeInternal(PEVALUATIONVIEW);
  }

  /**
   * Gets the associated <code>RowIterator</code> using master-detail link PInscriptionView.
   */
  public RowIterator getPInscriptionView()
  {
    return (RowIterator) getAttributeInternal(PINSCRIPTIONVIEW);
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
}
