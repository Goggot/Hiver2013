package view.backing.menuauditeur;

import javax.faces.component.UISelectItems;

import oracle.adf.view.rich.component.rich.input.RichSelectOneChoice;
import oracle.adf.view.rich.component.rich.layout.RichPanelGroupLayout;
import oracle.adf.view.rich.component.rich.layout.RichPanelHeader;

public class AjoutAtelier
{
  private RichPanelGroupLayout pgl1;
  private RichSelectOneChoice nl1;
  private UISelectItems si1;
  private RichPanelHeader ph1;

  public void setPgl1(RichPanelGroupLayout pgl1)
  {
    this.pgl1 = pgl1;
  }

  public RichPanelGroupLayout getPgl1()
  {
    return pgl1;
  }

  public void setNl1(RichSelectOneChoice nl1)
  {
    this.nl1 = nl1;
  }

  public RichSelectOneChoice getNl1()
  {
    return nl1;
  }

  public void setSi1(UISelectItems si1)
  {
    this.si1 = si1;
  }

  public UISelectItems getSi1()
  {
    return si1;
  }

  public void setPh1(RichPanelHeader ph1)
  {
    this.ph1 = ph1;
  }

  public RichPanelHeader getPh1()
  {
    return ph1;
  }
}
