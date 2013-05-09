package view;

import java.util.Iterator;

import javax.faces.component.UIComponent;
import javax.faces.context.FacesContext;

import model.views.PAuditeurViewImpl;

public class Login extends PAuditeurViewImpl
{
  public Login()
  {
  }

  public void it1_validator(FacesContext facesContext,
                            UIComponent uIComponent, Object object)
  {
    Iterator liste = facesContext.getMessages();
    System.out.println("LOGIN : ");
    while (liste.hasNext()){
      System.out.println(liste);
      liste.next();
    }
    //this.auditeurConnecte(,);
  }
}
