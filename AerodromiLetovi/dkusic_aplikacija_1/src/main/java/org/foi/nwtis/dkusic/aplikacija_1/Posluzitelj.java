package org.foi.nwtis.dkusic.aplikacija_1;

import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.net.ServerSocket;
import java.net.Socket;
import java.nio.charset.Charset;
import java.util.regex.Matcher;
import java.util.regex.Pattern;
import org.foi.nwtis.Konfiguracija;
import org.foi.nwtis.KonfiguracijaApstraktna;
import org.foi.nwtis.NeispravnaKonfiguracija;
import lombok.NoArgsConstructor;

@NoArgsConstructor
public class Posluzitelj {
  private int port = 0;
  private int brojDretvi;
  private ServerSocket serverSocket;
  private Socket veza = null;
  private static Konfiguracija konfig = null;
  private static int status = 0;
  private static boolean prekidac = false;
  private static int brojObradenihZahtjeva = 0;
  private boolean ispis = false;

  public static void main(String[] args) {
    if (args.length != 1) {
      System.out.println("ERROR 05: Upisani parametar treba biti naziv konfiguracijske datoteke.");
      return;
    }

    if (!ucitajKonfiguraciju(args[0]))
      return;
    if (!konfiguracijaSadrzi("port"))
      return;
    if (!konfiguracijaSadrzi("brojDretvi"))
      return;

    int port = Integer.parseInt(konfig.dajPostavku("port"));
    if (!portSlobodan(port)) {
      return;
    }
    int brojDretvi = Integer.parseInt(konfig.dajPostavku("brojDretvi"));

    Posluzitelj su = new Posluzitelj();
    su.port = port;
    su.brojDretvi = brojDretvi;

    System.out.println("Server pokrenut na portu: " + port);
    su.obradaZahtjeva();
  }

  private void obradaZahtjeva() {
    try (ServerSocket ss = new ServerSocket(this.port, this.brojDretvi)) {
      serverSocket = ss;
      while (!prekidac) {
        this.veza = ss.accept();      
        DretvaObrade dretvaObrade = new DretvaObrade(veza);
        dretvaObrade.start();
      }
    } catch (IOException ex) {
      if (!prekidac)
        System.out.println("ERROR 05: Pogreška sa server socketom.");
    }
  }

  private String obradiNaredbu(String zahtjev) {
    Pattern pUdaljenost =
        Pattern.compile(
            "^UDALJENOST \\b\\d{1,2}\\.\\d+ \\d{1,2}\\.\\d+ \\d{1,2}\\.\\d+ \\d{1,2}\\.\\d+"),
        pStatus = Pattern.compile("^STATUS$"), pKraj = Pattern.compile("^KRAJ$"),
        pInit = Pattern.compile("^INIT$"), pPauza = Pattern.compile("^PAUZA$"),
        pInfoDa = Pattern.compile("^INFO\\s+DA$"), pInfoNe = Pattern.compile("^INFO\\s+NE$");

    Matcher mUdaljenost = pUdaljenost.matcher(zahtjev), mStatus = pStatus.matcher(zahtjev),
        mKraj = pKraj.matcher(zahtjev), mInit = pInit.matcher(zahtjev),
        mPauza = pPauza.matcher(zahtjev), mInfoDa = pInfoDa.matcher(zahtjev),
        mInfoNe = pInfoNe.matcher(zahtjev);

    String odgovor = "ERROR 05: Neispravan format naredbe.";

    if (mUdaljenost.matches()) {
      odgovor = izvrsiNaredbuUdaljenost(zahtjev);
    } else if (mStatus.matches()) {
      odgovor = izvrsiNaredbuStatus();
    } else if (mKraj.matches()) {
      odgovor = izvrsiNaredbuKraj();
    } else if (mInit.matches()) {
      odgovor = izvrsiNaredbuInit();
    } else if (mPauza.matches()) {
      odgovor = izvrsiNaredbuPauza();
    } else if (mInfoDa.matches()) {
      odgovor = izvrsiNaredbuInfoDa();
    } else if (mInfoNe.matches()) {
      odgovor = izvrsiNaredbuInfoNe();
    }

    if (ispis == true) {
      System.out.println(zahtjev);
    }

    return odgovor;
  }

  private String izvrsiNaredbuInfoDa() {
    if (status == 0) {
      return "ERROR 01: Poslužitelj pauzira.";
    } else if (ispis == false) {
      ispis = true;
    } else if (ispis == true) {
      return "ERROR 03: Ispis komandi je već aktivan.";
    }
    return "OK";
  }

  private String izvrsiNaredbuInfoNe() {
    if (status == 0) {
      return "ERROR 01: Poslužitelj pauzira.";
    } else if (ispis == false) {
      return "ERROR 04: Ispis komandi već nije aktivan.";
    } else if (ispis == true) {
      ispis = false;
    }
    return "OK";
  }

  private String izvrsiNaredbuPauza() {
    if (status == 0) {
      return "ERROR 01: Poslužitelj već pauzira.";
    }
    status = 0;
    return "OK " + brojObradenihZahtjeva;
  }

  private String izvrsiNaredbuInit() {
    if (status == 1) {
      return "ERROR 02: Poslužitelj je već aktivan.";
    }
    brojObradenihZahtjeva = 0;
    status = 1;
    return "OK";
  }

  private String izvrsiNaredbuKraj() {
    prekidac = true;
    try {
      serverSocket.close();
    } catch (IOException e) {
    }
    return "OK";
  }

  private String izvrsiNaredbuStatus() {
    return "OK " + status;
  }

  private String izvrsiNaredbuUdaljenost(String zahtjev) {
    if (status == 0) {
      return "ERROR 01: Poslužitelj pauzira.";
    } else if (zahtjev.equals("INIT") && status == 1) {
      return "ERROR 02: Poslužitelj je već aktivan.";
    }

    String koordinate[] = zahtjev.split(" ");
    brojObradenihZahtjeva++;
    return "OK " + udaljenostDvijeTockeNaSferi(Double.parseDouble(koordinate[1]),
        Double.parseDouble(koordinate[2]), Double.parseDouble(koordinate[3]),
        Double.parseDouble(koordinate[4]));
  }

  private static boolean portSlobodan(int port) {
    ServerSocket skt;
    try {
      skt = new ServerSocket(port);
      skt.close();
    } catch (IOException e) {
      System.out.println("ERROR 05: Port je zauzet.");
      return false;
    }
    return true;
  }

  private static boolean konfiguracijaSadrzi(String kljuc) {
    if (konfig.dajPostavku(kljuc) == null || konfig.dajPostavku(kljuc).isEmpty()) {
      System.out.println(
          "ERROR 05: Postavka " + kljuc + " nije ispravno definirana u konfiguracijskoj datoteci.");
      return false;
    }
    return true;
  }

  private static boolean ucitajKonfiguraciju(String nazivDatoteke) {
    try {
      konfig = KonfiguracijaApstraktna.preuzmiKonfiguraciju(nazivDatoteke);
    } catch (NeispravnaKonfiguracija e) {
      System.out.println("ERROR 05: Pogreška pri učitavanju konfiguracijske datoteke.");
      return false;
    }
    return true;
  }

  public class DretvaObrade extends Thread {
    private Socket vezaD = null;

    public DretvaObrade(Socket veza) {
      super();
      this.vezaD = veza;
    }

    @Override
    public synchronized void start() {
      super.start();
    }

    @Override
    public void run() {
      super.run();
      try (
          InputStreamReader isr =
              new InputStreamReader(this.vezaD.getInputStream(), Charset.forName("UTF-8"));
          OutputStreamWriter osw =
              new OutputStreamWriter(this.vezaD.getOutputStream(), Charset.forName("UTF-8"));) {
        StringBuilder tekst = new StringBuilder();
        while (true) {
          int i = isr.read();
          if (i == -1) {
            break;
          }
          tekst.append((char) i);
        }
        this.vezaD.shutdownInput();
        String odgovor = obradiNaredbu(tekst.toString());
        osw.write(odgovor);
        osw.flush();
        this.vezaD.shutdownOutput();
      } catch (IOException e) {
        System.out.println("ERROR 05: Pogreška kod čitanja poruke.");
      }
    }

    @Override
    public void interrupt() {
      prekidac = true;
      super.interrupt();
    }
  }

  static double udaljenostDvijeTockeNaSferi(double gpsSirina1, double gosDuzina1, double gpsSirina2,
      double gosDuzina2) {

    double earthRadius = 6371;

    double sirina1Radijani = Math.toRadians(gpsSirina1);
    double duzina1Radijani = Math.toRadians(gosDuzina1);
    double sirina2Radijani = Math.toRadians(gpsSirina2);
    double duzina2Radijani = Math.toRadians(gosDuzina2);

    double sirinaUdaljenost = sirina2Radijani - sirina1Radijani;
    double duzinaUdaljenost = duzina2Radijani - duzina1Radijani;

    // Haversinova formula
    double formula = Math.sin(sirinaUdaljenost / 2) * Math.sin(sirinaUdaljenost / 2)
        + Math.cos(sirina1Radijani) * Math.cos(sirina2Radijani) * Math.sin(duzinaUdaljenost / 2) * Math.sin(duzinaUdaljenost / 2);

    double c = 2 * Math.atan2(Math.sqrt(formula), Math.sqrt(1 - formula));
    double udaljenost = earthRadius * c;
    udaljenost = Math.round(udaljenost * 10) / 10.0;
    return udaljenost;
  }
}