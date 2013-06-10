package view;

import oracle.adf.model.BindingContext;

import oracle.adf.view.rich.component.rich.input.RichInputText;

import oracle.binding.BindingContainer;
import oracle.binding.OperationBinding;

public class bean
{ private RichInputText abc;
  private RichInputText mdpactuel;
  private RichInputText newmdp;
  private RichInputText confirmmdp;

  public bean()
  {
  }

  public BindingContainer getBindings()
  {
    return BindingContext.getCurrent().getCurrentBindingsEntry();
  }

  public String cb1_action()
  {
    System.out.println(mdpactuel.getValue().toString());
    BindingContainer bindings = getBindings();
    OperationBinding operationBinding = bindings.getOperationBinding("verifierMDP");
    Boolean result = (Boolean)operationBinding.execute();
    if (!operationBinding.getErrors().isEmpty())
    {
      return null;
    }
    else if(!result)
    {
      return "Le mot de passe est invalide";
    }
    else if(mdpactuel.getValue() == "" || newmdp.getValue() == "" || confirmmdp.getValue()=="")
    {
      return "Tout les champs doivent être rempli";
    }
    else if(newmdp != confirmmdp)
    {
      return "les champs nouveau mot de passe doivent être identiques";
    }
    else
    {
      return "Nouveau mot de passe enregistré";
    }
  }

  public void setMdpactuel(RichInputText mdpactuel)
  {
    this.mdpactuel = mdpactuel;
  }

  public RichInputText getMdpactuel()
  {
    return mdpactuel;
  }

  public void setNewmdp(RichInputText newmdp)
  {
    this.newmdp = newmdp;
  }

  public RichInputText getNewmdp()
  {
    return newmdp;
  }

  public void setConfirmmdp(RichInputText confirmmdp)
  {
    this.confirmmdp = confirmmdp;
  }

  public RichInputText getConfirmmdp()
  {
    return confirmmdp;
  }
}
