package view.backing.menuauditeur;

import java.util.Map;

import oracle.adf.model.BindingContext;
import oracle.adf.view.rich.component.rich.input.RichInputText;
import oracle.adf.view.rich.component.rich.layout.RichPanelFormLayout;
import oracle.adf.view.rich.component.rich.nav.RichCommandButton;

import oracle.adf.view.rich.component.rich.output.RichOutputLabel;

import oracle.binding.BindingContainer;
import oracle.binding.OperationBinding;


public class ChangerMDP
{


  private RichInputText it1;
  private RichInputText it2;
  private RichInputText it3;
  private RichCommandButton cb1;
  private RichOutputLabel ol1;
  private RichCommandButton cb2;
  private RichPanelFormLayout pfl1;

  public void setIt1(RichInputText it1)
  {
    this.it1 = it1;
  }

  public RichInputText getIt1()
  {
    return it1;
  }

  public void setIt2(RichInputText it2)
  {
    this.it2 = it2;
  }

  public RichInputText getIt2()
  {
    return it2;
  }

  public void setIt3(RichInputText it3)
  {
    this.it3 = it3;
  }

  public RichInputText getIt3()
  {
    return it3;
  }


  public void setCb1(RichCommandButton cb1)
  {
    this.cb1 = cb1;
  }

  public RichCommandButton getCb1()
  {
    return cb1;
  }

  public BindingContainer getBindings()
  {
    return BindingContext.getCurrent().getCurrentBindingsEntry();
  }

  public String cb1_action()
  {
    System.out.println("Entree ds cb1-action");
    
    String mdpActuel = this.getIt1().getValue().toString();
    System.out.println(mdpActuel+ "mdpActuel");
    String newMDP = this.getIt2().getValue().toString();
    String confirmMDP = this.getIt3().getValue().toString();
    BindingContainer bindings = getBindings();
    if(mdpActuel==null || newMDP==null || confirmMDP==null)
        {
          this.getOl1().setValue("Tout les champs doivent être rempli");
          this.getOl1().setVisible(true);
          this.getIt1().setValue(null);
          this.getIt2().setValue(null);
          this.getIt3().setValue(null);
        }
    else
    {
      
      OperationBinding operationBinding = bindings.getOperationBinding("verifierMDP");
      Map param = operationBinding.getParamsMap();
      param.put("mdp",this.getIt1().getValue().toString());
      Boolean result = (Boolean)operationBinding.execute();
      if (!operationBinding.getErrors().isEmpty())
      {
        return null;
      }
      else if(!result)
      {
        this.getOl1().setValue("le mot de passe actuel n'est pas valide");
        this.getOl1().setVisible(true);
        this.getIt1().setValue(null);
        this.getIt2().setValue(null);
        this.getIt3().setValue(null);
      }
      else if(!newMDP.equals(confirmMDP))
      {
        this.getOl1().setValue("le nouveau mot de passe et la confirmation ne sont pas identique");
        this.getOl1().setVisible(true);
        this.getIt1().setValue(null);
        this.getIt2().setValue(null);
        this.getIt3().setValue(null);
      }
      else
      {
        this.getOl1().setValue("le mot de passe à été changé corectement");
        this.getOl1().setVisible(true);
        this.getIt1().setValue(null);
        this.getIt2().setValue(null);
        this.getIt3().setValue(null);
      operationBinding = bindings.getOperationBinding("nouveauMDP");
        param = operationBinding.getParamsMap();
        param.put("value",this.getIt3().getValue().toString());
        
      String result2 = (String)operationBinding.execute();
        return null;
      }
    }
    return null;
  }

  public void setOl1(RichOutputLabel ol1)
  {
    this.ol1 = ol1;
  }

  public RichOutputLabel getOl1()
  {
    return ol1;
  }


  public String cb2_action()
  {
    BindingContainer bindings = getBindings();
    OperationBinding operationBinding = bindings.getOperationBinding("Rollback");
    Object result = operationBinding.execute();
    if (!operationBinding.getErrors().isEmpty())
    {
      return null;
    }
    this.getOl1().setVisible(false);
    return "retour";
  }

  public void setCb2(RichCommandButton cb2)
  {
    this.cb2 = cb2;
  }

  public RichCommandButton getCb2()
  {
    return cb2;
  }

  public void setPfl1(RichPanelFormLayout pfl1)
  {
    this.pfl1 = pfl1;
  }

  public RichPanelFormLayout getPfl1()
  {
    return pfl1;
  }


}
