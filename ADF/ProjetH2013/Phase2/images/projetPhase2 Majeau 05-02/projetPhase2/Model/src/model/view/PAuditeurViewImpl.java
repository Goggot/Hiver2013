package model.view;

import model.view.common.PAuditeurView;


import oracle.jbo.Row;
import oracle.jbo.server.ViewObjectImpl;

// ---------------------------------------------------------------------
// ---    File generated by Oracle ADF Business Components Design Time.
// ---    Tue Apr 16 16:28:32 EDT 2013
// ---    Custom code may be added to this class.
// ---    Warning: Do not modify method signatures of generated methods.
// ---------------------------------------------------------------------
public class PAuditeurViewImpl
  extends ViewObjectImpl
{
  /**
   * This is the default constructor (do not remove).
   */
  public PAuditeurViewImpl()
  {
  }
  
  public Integer auditeurConnecte(String paramCode, String paramMotDePasse)
  {
    System.out.println(" "+paramCode);
    System.out.println(" "+paramMotDePasse);
    this.setnomUsager(paramCode);
    this.setmotPasse(paramMotDePasse);
    this.executeQuery();
    if(this.getRowCount()>0)
    {
      this.next();
      //Transtypage pour avoir acces au l'autre table
      PAuditeurViewRowImpl rangee= (PAuditeurViewRowImpl)this.getCurrentRow();
      
      System.out.println("on la trouver");

      if(rangee.getAdmin()==1)
      {
      System.out.println("retourne 1");
      return 1;
      }
      else
      {
        System.out.println("retourne 2");
        return 2;
      }
    }
    else
    {
      System.out.println("retourne 3");
      return 3;
    }
  }

  /**
   * Returns the bind variable value for nomUsager.
   * @return bind variable value for nomUsager
   */
  public String getnomUsager()
  {
    return (String) getNamedWhereClauseParam("nomUsager");
  }

  /**
   * Sets <code>value</code> for bind variable nomUsager.
   * @param value value to bind as nomUsager
   */
  public void setnomUsager(String value)
  {
    setNamedWhereClauseParam("nomUsager", value);
  }

  /**
   * Returns the bind variable value for motPasse.
   * @return bind variable value for motPasse
   */
  public String getmotPasse()
  {
    return (String) getNamedWhereClauseParam("motPasse");
  }

  /**
   * Sets <code>value</code> for bind variable motPasse.
   * @param value value to bind as motPasse
   */
  public void setmotPasse(String value)
  {
    setNamedWhereClauseParam("motPasse", value);
  }
}
