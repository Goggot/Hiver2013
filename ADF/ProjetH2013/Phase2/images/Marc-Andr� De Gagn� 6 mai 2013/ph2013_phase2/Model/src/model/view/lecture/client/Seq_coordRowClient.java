package model.view.lecture.client;

import oracle.jbo.client.remote.RowImpl;
// ---------------------------------------------------------------------
// ---    File generated by Oracle ADF Business Components Design Time.
// ---    Thu Apr 25 14:02:46 EDT 2013
// ---    Custom code may be added to this class.
// ---    Warning: Do not modify method signatures of generated methods.
// ---------------------------------------------------------------------
public class Seq_coordRowClient
  extends RowImpl
{
  /**
   * This is the default constructor (do not remove).
   */
  public Seq_coordRowClient()
  {
  }

  public Integer getSeqNocoord()
  {
    return (Integer) getAttribute("SeqNocoord");
  }

  public void setSeqNocoord(Integer value)
  {
    setAttribute("SeqNocoord", value);
  }
}
