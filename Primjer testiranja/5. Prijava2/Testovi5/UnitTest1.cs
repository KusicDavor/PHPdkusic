using Microsoft.VisualStudio.TestTools.UnitTesting;
using System;
using Prijava;

namespace Testovi
{
    [TestClass]
    public class UnitTest1
    {
        [TestMethod]
        public void Test1()
        {
            Autentifikator autentifikator = new Autentifikator();
            autentifikator.PrijaviKorisnika("pivic", "12345");
            Assert.IsTrue(autentifikator.PrijavljeniKorisnik != null && autentifikator.PrijavljeniKorisnik.KorisnickoIme == "pivic");
        }

        [TestMethod]
        public void Test2()
        {
            Autentifikator autentifikator = new Autentifikator();
            autentifikator.PrijaviKorisnika("", "");
            Assert.IsTrue(autentifikator.PrijavljeniKorisnik != null && autentifikator.PrijavljeniKorisnik.Tip == TipKorisnika.Gost);
        }

        [TestMethod]
        public void Test3()
        {
            Autentifikator autentifikator = new Autentifikator();
            Assert.ThrowsException<FailedAuthenticationException>(() => autentifikator.PrijaviKorisnika("ime", "prezime"));
        }

        [TestMethod]
        public void Test4()
        {
            Autentifikator autentifikator = new Autentifikator();
            autentifikator.PrijaviKorisnika("mmijac", "abcde");
            autentifikator.OdjaviKorisnika();
            Assert.IsNull(autentifikator.PrijavljeniKorisnik);
        }

        [TestMethod]
        public void Test5()
        {
            Autentifikator autentifikator = new Autentifikator();

            autentifikator.PrijaviKorisnika("mmijac", "abcde");
            Assert.ThrowsException<InvalidOperationException>(() => autentifikator.PrijaviKorisnika("pivic", "12345"));
        }

        [TestMethod]
        public void Test6()
        {
            Autentifikator autentifikator = new Autentifikator();

            autentifikator.PrijaviKorisnika();
            Assert.IsTrue(autentifikator.PrijavljeniKorisnik != null && autentifikator.PrijavljeniKorisnik.Tip == TipKorisnika.Gost);
        }

        [TestMethod]
        public void Test7()
        {
            Autentifikator autentifikator = new Autentifikator();
            Assert.ThrowsException<InvalidOperationException>(() => autentifikator.OdjaviKorisnika());
        }

        [TestMethod]
        public void Test8()
        {
            Autentifikator autentifikator = new Autentifikator();
            autentifikator.PrijaviKorisnika("anovak", "qetzs");
            Assert.ThrowsException<InvalidOperationException>(() => autentifikator.DektivirajKorisnika("pivic"));
        }

        [TestMethod]
        public void Test9()
        {
            Autentifikator autentifikator = new Autentifikator();
            autentifikator.PrijaviKorisnika("mmijac", "abcde");
            autentifikator.DektivirajKorisnika("pivic");
            autentifikator.OdjaviKorisnika();
            Assert.ThrowsException<UserDeactivatedException>(() => autentifikator.PrijaviKorisnika("pivic", "12345"));
        }
    }
}