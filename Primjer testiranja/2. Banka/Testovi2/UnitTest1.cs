using Microsoft.VisualStudio.TestTools.UnitTesting;
using System;
using Banka;

namespace BankaTests
{
    [TestClass]
    public class Testovi
    {
        [TestMethod]
        public void Test1()
        {
            UpraviteljTransakcijama ut = new UpraviteljTransakcijama();
            Assert.ThrowsException<InvalidBankAccountException>(() => ut.PrebaciSredstva("HR77", "HR11", 1));
        }

        [TestMethod]
        public void Test2()
        {
            UpraviteljTransakcijama ut = new UpraviteljTransakcijama();
            Assert.ThrowsException<InvalidAmountException>(() => ut.PrebaciSredstva("HR11", "HR22", 0));
        }

        [TestMethod]
        public void Test3()
        {
            UpraviteljTransakcijama ut = new UpraviteljTransakcijama();
            Transakcija t = ut.PrebaciSredstva("HR11", "HR22", 30000);
            Assert.IsTrue(t.Izvor.Stanje == 70000 && t.Odrediste.Stanje == 80000);
        }

        [TestMethod]
        public void Test4()
        {
            UpraviteljTransakcijama ut = new UpraviteljTransakcijama();
            Transakcija t = ut.PrebaciSredstva("HR11", "HR22", 30000);
            Assert.IsTrue(t.Naplaceno == 30000 && t.PreostaloNaplatiti == 0);
        }

        [TestMethod]
        public void Test5()
        {
            UpraviteljTransakcijama ut = new UpraviteljTransakcijama();
            Transakcija t = ut.PrebaciSredstva("HR66", "HR55", 3500);
            Assert.IsTrue(t.Izvor.Stanje == 0 && t.Odrediste.Stanje == 10000);
        }

        [TestMethod]
        public void Test6()
        {
            UpraviteljTransakcijama ut = new UpraviteljTransakcijama();
            Transakcija t = ut.PrebaciSredstva("HR66", "HR55", 3500);
            Assert.IsTrue(t.Naplaceno <= 3500 && t.PreostaloNaplatiti >= 0);
        }
    }
}
