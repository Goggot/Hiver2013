package model.view;

import java.sql.ResultSet;

import model.view.common.PAuditeurLogIn;

import oracle.jbo.server.ViewObjectImpl;
import oracle.jbo.server.ViewRowImpl;
import oracle.jbo.server.ViewRowSetImpl;
// ---------------------------------------------------------------------
// ---    File generated by Oracle ADF Business Components Design Time.
// ---    Thu Apr 25 13:47:56 EDT 2013
// ---    Custom code may be added to this class.
// ---    Warning: Do not modify method signatures of generated methods.
// ---------------------------------------------------------------------
public class PAuditeurLogInImpl
  extends ViewObjectImpl
  implements PAuditeurLogIn
{
  /**
   * This is the default constructor (do not remove).
   */
  public PAuditeurLogInImpl()
  {
  }

  /**
   * executeQueryForCollection - overridden for custom java data source support.
   */
  protected void executeQueryForCollection(Object qc, Object[] params,
                                           int noUserParams)
  {
    super.executeQueryForCollection(qc, params, noUserParams);
  }

  /**
   * hasNextForCollection - overridden for custom java data source support.
   */
  protected boolean hasNextForCollection(Object qc)
  {
    boolean bRet = super.hasNextForCollection(qc);
    return bRet;
  }

  /**
   * createRowFromResultSet - overridden for custom java data source support.
   */
  protected ViewRowImpl createRowFromResultSet(Object qc,
                                               ResultSet resultSet)
  {
    ViewRowImpl value = super.createRowFromResultSet(qc, resultSet);
    return value;
  }

  /**
   * getQueryHitCount - overridden for custom java data source support.
   */
  public long getQueryHitCount(ViewRowSetImpl viewRowSet)
  {
    long value = super.getQueryHitCount(viewRowSet);
    return value;
  }
  
  

  /**
   * Returns the bind variable value for code.
   * @return bind variable value for code
   */
  public String getcode()
  {
    return (String) getNamedWhereClauseParam("code");
  }

  /**
   * Sets <code>value</code> for bind variable code.
   * @param value value to bind as code
   */
  public void setcode(String value)
  {
    setNamedWhereClauseParam("code", value);
  }

  /**
   * Returns the bind variable value for mdp.
   * @return bind variable value for mdp
   */
  public String getmdp()
  {
    return (String) getNamedWhereClauseParam("mdp");
  }

  /**
   * Sets <code>value</code> for bind variable mdp.
   * @param value value to bind as mdp
   */
  public void setmdp(String value)
  {
    setNamedWhereClauseParam("mdp", value);
  }
  public int auditeurConnecte(String paramCode, String paramMotDePasse)
  {
    int result = 0;
    this.setcode(paramCode);
    this.setmdp(paramMotDePasse);
    this.executeQuery();
    int nbrow = this.getRowCount();
    if (nbrow > 0)
    {
      this.next();
       if( ((PAuditeurLogInRowImpl)this.getCurrentRow()).getAdmin() == 1) 
      {
        result = 2;
      }
      else
      {
        result = 1;
      }
    }
    
    return result;
  }
}
