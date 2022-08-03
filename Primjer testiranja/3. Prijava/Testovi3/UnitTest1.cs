using Microsoft.VisualStudio.TestTools.UnitTesting;
using System;
using Prijava;

namespace Testovi3
{
    [TestClass]
    public class UnitTest1
    {
        [TestMethod]
        public void Test1()
        {
            Autentifikator autentifikator = new Autentifikator();
            Assert.IsNotNull(autentifikator.DohvatiKorisnika("pivic"));
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
            Assert.IsNull(autentifikator.DohvatiKorisnika("pperic"));
        }

        [TestMethod]
        public void Test4()
        {
            Autentifikator autentifikator = new Autentifikator();
            Assert.ThrowsException<IncorrectAuthenticationData>(() => autentifikator.RegistrirajKorisnika("mmijac", "abc123"));
        }

        [TestMethod]
        public void Test5()
        {
            Autentifikator autentifikator = new Autentifikator();
            Assert.ThrowsException<IncorrectAuthenticationData>(() => autentifikator.RegistrirajKorisnika("m", "abc123"));
        }

        [TestMethod]
        public void Test6()
        {
            Autentifikator autentifikator = new Autentifikator();
            autentifikator.RegistrirajKorisnika("pperic", "123456");
            Korisnik korisnik = autentifikator.DohvatiKorisnika("pperic");
            Assert.IsTrue(korisnik.KorisnickoIme == "pperic" && korisnik.Lozinka == "123456" && korisnik.Tip == TipKorisnika.Obicni);
        }

        [TestMethod]
        public void Test7()
        {
            Autentifikator autentifikator = new Autentifikator();
            autentifikator.RegistrirajKorisnika("pperic", "123456", TipKorisnika.Gost);
            Assert.IsNull(autentifikator.DohvatiKorisnika("pperic"));
        }

        [TestMethod]
        public void Test8()
        {
            Autentifikator autentifikator = new Autentifikator();
            Assert.ThrowsException<UnauthorizedAccessException>(() => autentifikator.RegistrirajKorisnika("pperic", "123456", TipKorisnika.Administrator));
        }

        [TestMethod]
        public void Test9()
        {
            Autentifikator autentifikator = new Autentifikator();
            autentifikator.PrijaviKorisnika("btomas", "kgdrt");
            autentifikator.RegistrirajKorisnika("pperic", "123456", TipKorisnika.Administrator);
            Korisnik korisnik = autentifikator.DohvatiKorisnika("pperic");
            Assert.IsTrue(korisnik != null && korisnik.Tip == TipKorisnika.Administrator);
        }

        [TestMethod]
        public void Test10()
        {
            Autentifikator autentifikator = new Autentifikator();
            autentifikator.RegistrirajKorisnika("thorvat", "hfdrz");
            Korisnik korisnik = autentifikator.DohvatiKorisnika("thorvat");
            Assert.IsTrue(korisnik != null && korisnik.Aktivan == true);
        }
    }
}
