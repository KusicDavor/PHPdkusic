package org.foi.nwtis.dkusic.aplikacija_3.zrna;

import jakarta.annotation.Resource;
import jakarta.ejb.Stateless;
import jakarta.jms.Connection;
import jakarta.jms.ConnectionFactory;
import jakarta.jms.JMSException;
import jakarta.jms.MessageProducer;
import jakarta.jms.Queue;
import jakarta.jms.Session;
import jakarta.jms.TextMessage;

@Stateless
public class JmsPosiljatelj {
  @Resource(mappedName = "jms/NWTiS_qf_dkusic")
  private ConnectionFactory connectionFactory;
  @Resource(mappedName = "jms/NWTiS_dkusic")
  private Queue queue;
  
  public boolean posaljiPoruku(String tekstPoruke) {
    boolean status = true;
    try {
      Connection connection = connectionFactory.createConnection();
      Session session = connection.createSession(false, Session.AUTO_ACKNOWLEDGE);
      MessageProducer messageProducer = session.createProducer(queue);
      TextMessage message = session.createTextMessage();
      
      String poruka = tekstPoruke;
      
      message.setText(poruka);
      messageProducer.send(message);
      
      System.out.println("PORUKA POSLANA ---------- " + poruka);
      
      messageProducer.close();
    } catch (JMSException ex) {
      ex.printStackTrace();
      status = false;
    }
    return status;
  }
}
