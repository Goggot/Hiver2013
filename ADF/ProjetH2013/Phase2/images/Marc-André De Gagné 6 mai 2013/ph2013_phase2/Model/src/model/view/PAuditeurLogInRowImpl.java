package model.view;

import model.entity.PAuditeurImpl;

import model.view.common.PAuditeurLogInRow;

import oracle.jbo.RowIterator;
import oracle.jbo.server.AttributeDefImpl;
import oracle.jbo.server.EntityImpl;
import oracle.jbo.server.ViewRowImpl;
// ---------------------------------------------------------------------
// ---    File generated by Oracle ADF Business Components Design Time.
// ---    Thu Apr 25 13:55:22 EDT 2013
// ---    Custom code may be added to this class.
// ---    Warning: Do not modify method signatures of generated methods.
// ---------------------------------------------------------------------
public class PAuditeurLogInRowImpl
  extends ViewRowImpl
  implements PAuditeurLogInRow
{


  public static final int ENTITY_PAUDITEUR = 0;

  /**
   * AttributesEnum: generated enum for identifying attributes and accessors. Do not modify.
   */
  public enum AttributesEnum
  {
    Motdepasse
    {
      public Object get(PAuditeurLogInRowImpl obj)
      {
        return obj.getMotdepasse();
      }

      public void put(PAuditeurLogInRowImpl obj, Object value)
      {
        obj.setMotdepasse((String)value);
      }
    }
    ,
    Noauditeur
    {
      public Object get(PAuditeurLogInRowImpl obj)
      {
        return obj.getNoauditeur();
      }

      public void put(PAuditeurLogInRowImpl obj, Object value)
      {
        obj.setNoauditeur((Integer)value);
      }
    }
    ,
    Codeauditeur
    {
      public Object get(PAuditeurLogInRowImpl obj)
      {
        return obj.getCodeauditeur();
      }

      public void put(PAuditeurLogInRowImpl obj, Object value)
      {
        obj.setCodeauditeur((String)value);
      }
    }
    ,
    Admin
    {
      public Object get(PAuditeurLogInRowImpl obj)
      {
        return obj.getAdmin();
      }

      public void put(PAuditeurLogInRowImpl obj, Object value)
      {
        obj.setAdmin((Integer)value);
      }
    }
    ,
    PInscriptionView
    {
      public Object get(PAuditeurLogInRowImpl obj)
      {
        return obj.getPInscriptionView();
      }

      public void put(PAuditeurLogInRowImpl obj, Object value)
      {
        obj.setAttributeInternal(index(), value);
      }
    }
    ;
    private static AttributesEnum[] vals = null;
    private static int firstIndex = 0;

    public abstract Object get(PAuditeurLogInRowImpl object);

    public abstract void put(PAuditeurLogInRowImpl object, Object value);

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


  public static final int MOTDEPASSE = AttributesEnum.Motdepasse.index();
  public static final int NOAUDITEUR = AttributesEnum.Noauditeur.index();
  public static final int CODEAUDITEUR = AttributesEnum.Codeauditeur.index();
  public static final int ADMIN = AttributesEnum.Admin.index();
  public static final int PINSCRIPTIONVIEW = AttributesEnum.PInscriptionView.index();

  /**
   * This is the default constructor (do not remove).
   */
  public PAuditeurLogInRowImpl()
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
  
  public void nouveauMDP(String value)
  {
    
    System.out.println(value+ "nouveauMDP");
    this.setMotdepasse(value);
    this.getDBTransaction().commit();
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
  
  public boolean verifierMDP(String mdp)
  {
    System.out.println(mdp+" param mot: de passe");
    System.out.println(getMotdepasse()+" getMotdePasse");
    boolean values = false;
    if((this.getMotdepasse().compareTo(mdp))==0)
    {
      values=true;
    }
    return values;
  }
}
