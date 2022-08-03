using Microsoft.VisualStudio.TestTools.UnitTesting;
using System;
using Prijava;

namespace Testovi7
{
    [TestClass]
    public class UnitTest1
    {
        [TestMethod]
        public void Test1()
        {
            Autentifikator autentifikator = new Autentifikator();
            Korisnik k = autentifikator.DohvatiKorisnika("valic");
            Assert.IsTrue(k != null && k.KorisnickoIme == "valic");
        }

        [TestMethod]
        public void Test2()
        {
            Autentifikator autentifikator = new Autentifikator();
            Korisnik k = autentifikator.DohvatiKorisnika("mmarkic");
            Assert.IsNull(k);
        }

        [TestMethod]
        public void Test3()
        {
            Autentifikator autentifikator = new Autentifikator();
            Assert.ThrowsException<InactiveUserException>(() => autentifikator.DohvatiKorisnika("gtudor"));
        }

        [TestMethod]
        public void Test4()
        {
            Autentifikator autentifikator = new Autentifikator();
            autentifikator.RegistrirajKorisnika("gtudor", "nrtgs");
            Korisnik k = autentifikator.DohvatiKorisnika("gtudor");
            Assert.IsTrue(k != null && k.Aktivan == true);
        }

        [TestMethod]
        public void Test5()
        {
            Autentifikator autentifikator = new Autentifikator();
            autentifikator.RegistrirajKorisnika("mmarkic", "101010");
            Korisnik k = autentifikator.DohvatiKorisnika("mmarkic");
            Assert.IsTrue(k.KorisnickoIme == "mmarkic" && k.Lozinka == "101010" && k.Tip == TipKorisnika.Obicni);
        }

        [TestMethod]
        public void Test6()
        {
            Autentifikator autentifikator = new Autentifikator();
            Assert.ThrowsException<IncorrectAuthenticationData>(() => autentifikator.RegistrirajKorisnika("thorvat", "121212"));
        }

        [TestMethod]
        public void Test7()
        {
            Autentifikator autentifikator = new Autentifikator();
            autentifikator.PrijaviKorisnika("pivic", "12345");      
            Assert.ThrowsException<UnauthorizedRegistrationException>(() => autentifikator.RegistrirajKorisnika("mmarkic", "101010", TipKorisnika.Administrator));
        }

        [TestMethod]
        public void Test8()
        {
            Autentifikator autentifikator = new Autentifikator();
            autentifikator.PrijaviKorisnika("btomas", "kgdrt");
            autentifikator.RegistrirajKorisnika("mmarkic", "101010", TipKorisnika.Administrator);
            Korisnik k = autentifikator.DohvatiKorisnika("mmarkic");
            Assert.IsTrue(k != null && k.Tip == TipKorisnika.Administrator);
        }

        [TestMethod]
        public void Test9()
        {
            Autentifikator autentifikator = new Autentifikator();
            autentifikator.PrijaviKorisnika("btomas", "kgdrt");
            autentifikator.RegistrirajKorisnika("mmarkic", "101010", TipKorisnika.Gost);
            Korisnik k = autentifikator.DohvatiKorisnika("mmarkic");
            Assert.IsNull(k);
        }

        [TestMethod]
        public void Test10()
        {
            Autentifikator autentifikator = new Autentifikator();
            Assert.ThrowsException<IncorrectAuthenticationData>(() => autentifikator.RegistrirajKorisnika("test", "101010", TipKorisnika.Administrator));
        }
    }
}
