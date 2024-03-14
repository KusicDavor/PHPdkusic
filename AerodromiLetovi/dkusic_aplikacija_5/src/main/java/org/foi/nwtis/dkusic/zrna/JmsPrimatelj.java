package org.foi.nwtis.dkusic.zrna;

import jakarta.ejb.ActivationConfigProperty;
import jakarta.ejb.MessageDriven;
import jakarta.jms.Message;
import jakarta.jms.MessageListener;
import jakarta.jms.TextMessage;

@MessageDriven(mappedName = "jms/NWTiS_dkusic",
    activationConfig = {
        @ActivationConfigProperty(propertyName = "acknowledgeMode",
            propertyValue = "Auto-acknowledge"),
        @ActivationConfigProperty(propertyName = "destinationType",
            propertyValue = "jakarta.jms.Queue")})

public class JmsPrimatelj implements MessageListener {
  public void onMessage(Message message) {
    if (message instanceof TextMessage) {
      try {
        var poruka = (TextMessage) message;
        Sakupljac.dodajPorukuUlistu(poruka.getText());
      } catch (Exception ex) {
        ex.printStackTrace();
      }
    }
  }
}
