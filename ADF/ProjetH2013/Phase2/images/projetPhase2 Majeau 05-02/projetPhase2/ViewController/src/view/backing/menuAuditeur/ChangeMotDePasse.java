package view.backing.menuAuditeur;

import oracle.adf.model.BindingContext;
import oracle.adf.view.rich.component.rich.input.RichInputText;
import oracle.adf.view.rich.component.rich.layout.RichPanelFormLayout;
import oracle.adf.view.rich.component.rich.layout.RichPanelGroupLayout;
import oracle.adf.view.rich.component.rich.nav.RichCommandButton;
import oracle.adf.view.rich.component.rich.output.RichOutputText;

import oracle.binding.BindingContainer;
import oracle.binding.OperationBinding;


public class ChangeMotDePasse
{


  private RichInputText champActuel;
  private RichPanelGroupLayout pgl1;
  private RichOutputText ot1;
  private RichOutputText ot2;
  private RichPanelFormLayout pfl1;
  private RichCommandButton cb1;
  private RichPanelGroupLayout pgl2;
  private RichCommandButton cb2;
  private RichInputText champNouveau;
  private RichInputText champConfirme;
  private RichOutputText ot3;


  public void setChampActuel(RichInputText it1)
  {
    this.champActuel = it1;
  }

  public RichInputText getChampActuel()
  {
    return champActuel;
  }

  public void setPgl1(RichPanelGroupLayout pgl1)
  {
    this.pgl1 = pgl1;
  }

  public RichPanelGroupLayout getPgl1()
  {
    return pgl1;
  }

  public void setOt1(RichOutputText ot1)
  {
    this.ot1 = ot1;
  }

  public RichOutputText getOt1()
  {
    return ot1;
  }

  public void setOt2(RichOutputText ot2)
  {
    this.ot2 = ot2;
  }

  public RichOutputText getOt2()
  {
    return ot2;
  }


  public void setPfl1(RichPanelFormLayout pfl1)
  {
    this.pfl1 = pfl1;
  }

  public RichPanelFormLayout getPfl1()
  {
    return pfl1;
  }


  public void setCb1(RichCommandButton cb1)
  {
    this.cb1 = cb1;
  }

  public RichCommandButton getCb1()
  {
    return cb1;
  }

  public void setPgl2(RichPanelGroupLayout pgl2)
  {
    this.pgl2 = pgl2;
  }

  public RichPanelGroupLayout getPgl2()
  {
    return pgl2;
  }

  public void setCb2(RichCommandButton cb2)
  {
    this.cb2 = cb2;
  }

  public RichCommandButton getCb2()
  {
    return cb2;
  }

  public void setChampNouveau(RichInputText it2)
  {
    this.champNouveau = it2;
  }

  public RichInputText getChampNouveau()
  {
    return champNouveau;
  }

  public void setChampConfirme(RichInputText it3)
  {
    this.champConfirme = it3;
  }

  public RichInputText getChampConfirme()
  {
    return champConfirme;
  }

  public void setOt3(RichOutputText ot3)
  {
    this.ot3 = ot3;
  }

  public RichOutputText getOt3()
  {
    return ot3;
  }

  public void cb1_action()
  {
      Boolean reussi=false;
      System.out.println(champNouveau.getValue().toString());
      if(champNouveau.getValue().toString()!=null && champConfirme.getValue().toString()!=null)
      {
        if(!(champNouveau.getValue().toString().equals(champActuel.getValue().toString())))
        {
          if(champNouveau.getValue().toString().equals(champConfirme.getValue().toString()))
          {
            BindingContainer bindings = getBindings();
            OperationBinding operationBinding = bindings.getOperationBinding("rentrerMDP");
            operationBinding.execute();
            ot3.setValue("Mot de passe enregistré");
          }
          else
          {
            ot3.setValue("Les deux champs ne sont pas pareils");
          }
        }
        else
        {
          ot3.setValue("Mot de passe déjà existant");
        }
      }
      else
      {
        ot3.setValue("Vos champs sotn vides");
      }
      champNouveau.setValue("");
      champConfirme.setValue("");
      ot3.setRendered(true);
}


  public BindingContainer getBindings()
  {
    return BindingContext.getCurrent().getCurrentBindingsEntry();
  }


}
