package view.backing.loginAuditeur;

import javax.faces.component.html.HtmlCommandLink;

import oracle.adf.view.rich.component.rich.input.RichInputText;
import oracle.adf.view.rich.component.rich.layout.RichPanelFormLayout;
import oracle.adf.view.rich.component.rich.layout.RichPanelGroupLayout;
import oracle.adf.view.rich.component.rich.nav.RichCommandButton;
import oracle.adf.view.rich.component.rich.output.RichOutputText;

public class Login
{
  private RichPanelFormLayout pfl1;
  private RichInputText codeUsage;
  private RichInputText mdp;
  private RichPanelGroupLayout pgl1;
  private RichCommandButton boutonLogin;
  private RichPanelGroupLayout pgl2;
  private RichOutputText messageErreur;
  private HtmlCommandLink enregistrer;

  public void setPfl1(RichPanelFormLayout pfl1)
  {
    this.pfl1 = pfl1;
  }

  public RichPanelFormLayout getPfl1()
  {
    return pfl1;
  }

  public void setCodeUsage(RichInputText it1)
  {
    this.codeUsage = it1;
  }

  public RichInputText getCodeUsage()
  {
    return codeUsage;
  }

  public void setMdp(RichInputText it2)
  {
    this.mdp = it2;
  }

  public RichInputText getMdp()
  {
    return mdp;
  }

  public void setPgl1(RichPanelGroupLayout pgl1)
  {
    this.pgl1 = pgl1;
  }

  public RichPanelGroupLayout getPgl1()
  {
    return pgl1;
  }

  public void setBoutonLogin(RichCommandButton cb1)
  {
    this.boutonLogin = cb1;
  }

  public RichCommandButton getBoutonLogin()
  {
    return boutonLogin;
  }

  public void setPgl2(RichPanelGroupLayout pgl2)
  {
    this.pgl2 = pgl2;
  }

  public RichPanelGroupLayout getPgl2()
  {
    return pgl2;
  }

  public void setMessageErreur(RichOutputText ot1)
  {
    this.messageErreur = ot1;
  }

  public RichOutputText getMessageErreur()
  {
    return messageErreur;
  }

  public void setEnregistrer(HtmlCommandLink cl1)
  {
    this.enregistrer = cl1;
  }

  public HtmlCommandLink getEnregistrer()
  {
    return enregistrer;
  }
}
