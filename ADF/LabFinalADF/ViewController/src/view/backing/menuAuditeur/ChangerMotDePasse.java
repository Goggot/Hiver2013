package view.backing.menuAuditeur;

import oracle.adf.model.BindingContext;
import oracle.adf.view.rich.component.rich.input.RichInputText;
import oracle.adf.view.rich.component.rich.layout.RichPanelFormLayout;
import oracle.adf.view.rich.component.rich.layout.RichPanelGroupLayout;
import oracle.adf.view.rich.component.rich.nav.RichCommandButton;
import oracle.adf.view.rich.component.rich.output.RichOutputText;
import oracle.adf.view.rich.component.rich.output.RichSeparator;

import oracle.binding.BindingContainer;
import oracle.binding.OperationBinding;

public class ChangerMotDePasse
{
  private RichPanelFormLayout pfl1;
  private RichPanelFormLayout pfl2;
  private RichSeparator s1;
  private RichOutputText ot1;
  private RichInputText it1;
  private RichInputText it2;
  private RichInputText it3;
  private RichPanelGroupLayout pgl1;
  private RichCommandButton cb1;
  private RichCommandButton cb2;
  private RichCommandButton cb3;

  public void setPfl1(RichPanelFormLayout pfl1)
  {
    this.pfl1 = pfl1;
  }

  public RichPanelFormLayout getPfl1()
  {
    return pfl1;
  }

  public void setPfl2(RichPanelFormLayout pfl2)
  {
    this.pfl2 = pfl2;
  }

  public RichPanelFormLayout getPfl2()
  {
    return pfl2;
  }

  public void setS1(RichSeparator s1)
  {
    this.s1 = s1;
  }

  public RichSeparator getS1()
  {
    return s1;
  }

  public void setOt1(RichOutputText ot1)
  {
    this.ot1 = ot1;
  }

  public RichOutputText getOt1()
  {
    return ot1;
  }

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

  public void setPgl1(RichPanelGroupLayout pgl1)
  {
    this.pgl1 = pgl1;
  }

  public RichPanelGroupLayout getPgl1()
  {
    return pgl1;
  }

  public void setCb1(RichCommandButton cb1)
  {
    this.cb1 = cb1;
  }

  public RichCommandButton getCb1()
  {
    return cb1;
  }

  public void setCb2(RichCommandButton cb2)
  {
    this.cb2 = cb2;
  }

  public RichCommandButton getCb2()
  {
    return cb2;
  }


  public void setCb3(RichCommandButton cb3)
  {
    this.cb3 = cb3;
  }

  public RichCommandButton getCb3()
  {
    return cb3;
  }

  public BindingContainer getBindings()
  {
    return BindingContext.getCurrent().getCurrentBindingsEntry();
  }

  public String cb3_action()
  {
    String ancienmdp = this.getIt1().getValue().toString();
    String nouveaumdp = this.getIt2().getValue().toString();
    String verifmdp = this.getIt3().getValue().toString();
    if(ancienmdp != null && nouveaumdp != null && verifmdp != null)
    {
      if(ancienmdp.equals(this.getBindings().getAttributeBindings().get(0).toString())){
        if (nouveaumdp.equals(verifmdp))
        {
          this.getBindings().getAttributeBindings().set(0, nouveaumdp);
          
          BindingContainer bindings = getBindings();
          OperationBinding operationBinding = bindings.getOperationBinding("Commit");
          Object result = operationBinding.execute();
          if (!operationBinding.getErrors().isEmpty())
          {
            return null;
          }
        }
      }
    }
    return "versMenuChangerMDP";
  }
}
