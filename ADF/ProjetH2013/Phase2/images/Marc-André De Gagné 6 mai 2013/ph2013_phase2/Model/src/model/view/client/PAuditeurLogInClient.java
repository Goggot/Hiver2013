package model.view.client;

import model.view.common.PAuditeurLogIn;

import oracle.jbo.client.remote.ViewUsageImpl;
// ---------------------------------------------------------------------
// ---    File generated by Oracle ADF Business Components Design Time.
// ---    Thu May 02 13:11:03 EDT 2013
// ---    Custom code may be added to this class.
// ---    Warning: Do not modify method signatures of generated methods.
// ---------------------------------------------------------------------
public class PAuditeurLogInClient
  extends ViewUsageImpl
  implements PAuditeurLogIn
{
  /**
   * This is the default constructor (do not remove).
   */
  public PAuditeurLogInClient()
  {
  }


  public int auditeurConnecte(String paramCode, String paramMotDePasse)
  {
    Object _ret =
      getApplicationModuleProxy().riInvokeExportedMethod(this,"auditeurConnecte",new String [] {"java.lang.String","java.lang.String"},new Object[] {paramCode, paramMotDePasse});
    return ((Integer)_ret).intValue();
  }
}
