package model.view.client;

import model.view.common.PAuditeurViewRow;

import oracle.jbo.client.remote.RowImpl;
// ---------------------------------------------------------------------
// ---    File generated by Oracle ADF Business Components Design Time.
// ---    Thu May 02 14:38:33 EDT 2013
// ---    Custom code may be added to this class.
// ---    Warning: Do not modify method signatures of generated methods.
// ---------------------------------------------------------------------
public class PAuditeurViewRowClient
  extends RowImpl
  implements PAuditeurViewRow
{
  /**
   * This is the default constructor (do not remove).
   */
  public PAuditeurViewRowClient()
  {
  }

  public void rentrerMDP(String value)
  {
    Object _ret =
      getApplicationModuleProxy().riInvokeExportedMethod(this,"rentrerMDP",new String [] {"java.lang.String"},new Object[] {value});
    return;
  }
}
