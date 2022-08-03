using Microsoft.VisualStudio.TestTools.UnitTesting;
using System;
using Prijava;

namespace Testovi6
{
    [TestClass]
    public class UnitTest1
    {
        [TestMethod]
        public void Test1()
        {
            Autentifikator autentifikator = new Autentifikator();
            Assert.IsNull(autentifikator.DohvatiKorisnika("pperic"));
        }

        [TestMethod]
        public void Test2()
        {
            Autentifikator autentifikator = new Autentifikator();
            Assert.IsNull(autentifikator.DohvatiKorisnika("thorvat"));
        }

        [TestMethod]
        public void Test3()
        {
            Autentifikator autentifikator = new Autentifikator();
            Korisnik vraćeni = autentifikator.DohvatiKorisnika("anovak");
            Assert.IsTrue(vraćeni != null && vraćeni.KorisnickoIme == "anovak");
        }

        [TestMethod]
        public void Test4()
        {
            Autentifikator autentifikator = new Autentifikator();
            Assert.ThrowsException<IncorrectAuthenticationData>(() => autentifikator.RegistrirajKorisnika("novikorisnik", "abc"));
        }

        [TestMethod]
        public void Test5()
        {
            Autentifikator autentifikator = new Autentifikator();
            autentifikator.RegistrirajKorisnika("pperic", "123456");
            Korisnik dohvaćeni = autentifikator.DohvatiKorisnika("pperic");
            Assert.IsTrue(dohvaćeni.KorisnickoIme == "pperic" && dohvaćeni.Lozinka == "123456" && dohvaćeni.Tip == TipKorisnika.Obicni);
        }

        [TestMethod]
        public void Test6()
        {
            Autentifikator autentifikator = new Autentifikator();
            Assert.ThrowsException<IncorrectAuthenticationData>(() => autentifikator.RegistrirajKorisnika("btomas", "abc123"));
        }

        [TestMethod]
        public void Test7()
        {
            Autentifikator autentifikator = new Autentifikator();
            autentifikator.PrijaviKorisnika("anovak", "getzs");
            Assert.ThrowsException<UnauthorizedRegistrationException>(() => autentifikator.RegistrirajKorisnika("pperic", "123456", TipKorisnika.Administrator));
        }

        [TestMethod]
        public void Test8()
        {
            Autentifikator autentifikator = new Autentifikator();
            autentifikator.PrijaviKorisnika("mmijac", "abcde");
            autentifikator.RegistrirajKorisnika("pperic", "123456", TipKorisnika.Administrator);
            Korisnik k = autentifikator.DohvatiKorisnika("pperic");
        
            Assert.IsTrue(k != null && k.Tip == TipKorisnika.Administrator);
        }

        [TestMethod]
        public void Test9()
        {
            Autentifikator autentifikator = new Autentifikator();
            autentifikator.RegistrirajKorisnika("pperic", "123456", TipKorisnika.Gost);
            Assert.IsNull(autentifikator.DohvatiKorisnika("pperic"));
        }

        [TestMethod]
        public void Test10()
        {
            Autentifikator autentifikator = new Autentifikator();
            autentifikator.RegistrirajKorisnika("thorvat", "hfdrz");
            Korisnik k = autentifikator.DohvatiKorisnika("thorvat");
            Assert.IsTrue(k != null && k.Aktivan == true);
        }
    }
}
