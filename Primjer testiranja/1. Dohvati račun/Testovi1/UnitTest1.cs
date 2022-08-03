using Financije;
using Microsoft.VisualStudio.TestTools.UnitTesting;

namespace Testovi
{
    [TestClass]
    public class Testovi
    {
        [TestMethod]
        public void DohvatiRacun_VratiNULLakoNePostoji()
        {
            Banka banka = new Banka();
            Assert.IsNull(banka.DohvatiRacun("HR12"));
        }

        [TestMethod]
        public void DohvatiRacun_AkoPostoji()
        {
            Banka banka = new Banka();
            Assert.IsTrue(banka.DohvatiRacun("HR11").IBAN == "HR11");
        }

        [TestMethod]
        public void DohvatiRacun_AkoJeBlokiran()
        {
            Banka banka = new Banka();
            Assert.ThrowsException<BankAccountBlockedException>(() => banka.DohvatiRacun("HR44"));
        }

        [TestMethod]
        public void Isplati_NepostojećiRačun()
        {
            Banka banka = new Banka();

            Racun primatelj = new Racun();
            primatelj = banka.DohvatiRacun("HR21");

            Racun platitelj = new Racun();
            platitelj = banka.DohvatiRacun("HR11");

            Assert.ThrowsException<TransactionFailedException>(() => platitelj.Isplati(primatelj, 30000));
        }

        [TestMethod]
        public void Isplati_OdradiTransakciju()
        {
            Banka banka = new Banka();

            Racun primatelj = new Racun();
            primatelj = banka.DohvatiRacun("HR22");

            Racun platitelj = new Racun();
            platitelj = banka.DohvatiRacun("HR11");
            platitelj.Isplati(primatelj, 30000);

            Assert.IsTrue(platitelj.Stanje == 70000 && primatelj.Stanje == 80000);
        }

        [TestMethod]
        public void Test6()
        {
            Banka banka = new Banka();

            Racun primatelj = new Racun();
            primatelj = banka.DohvatiRacun("HR22");

            Racun platitelj = new Racun();
            platitelj = banka.DohvatiRacun("HR11");

            Isplata isplata = platitelj.Isplati(primatelj, 30000);

            Assert.IsTrue(isplata.Platitelj == "HR11" && isplata.Primatelj == "HR22" && isplata.Iznos == 30000);
        }

        [TestMethod]
        public void Test7()
        {
            Banka banka = new Banka();

            Racun primatelj = new Racun();
            primatelj = banka.DohvatiRacun("HR22");

            Racun platitelj = new Racun();
            platitelj = banka.DohvatiRacun("HR11");

            Assert.ThrowsException<TransactionFailedException>(() => platitelj.Isplati(primatelj, 130000));
        }

        [TestMethod]
        public void Test8()
        {
            Banka banka = new Banka();

            Racun primatelj = new Racun();
            primatelj = banka.DohvatiRacun("HR55");

            Racun platitelj = new Racun();
            platitelj = banka.DohvatiRacun("HR66");

            Isplata isplata = new Isplata();
            isplata = platitelj.Isplati(primatelj, 3000);

            Assert.IsTrue(platitelj.Stanje == -1000 && primatelj.Stanje == 11000 && isplata.Iznos == 3000);
        }

        [TestMethod]
        public void Test9()
        {
            Banka banka = new Banka();

            Racun primatelj = new Racun();
            primatelj = banka.DohvatiRacun("HR55");

            Racun platitelj = new Racun();
            platitelj = banka.DohvatiRacun("HR66");

            Assert.ThrowsException<TransactionFailedException>(() => platitelj.Isplati(primatelj, 5500));
        }

        [TestMethod]
        public void Test10()
        {
            Banka banka = new Banka();

            Racun primatelj = new Racun();
            primatelj = banka.DohvatiRacun("HR22");

            Racun platitelj = new Racun();
            platitelj = banka.DohvatiRacun("HR11");

            Assert.ThrowsException<TransactionFailedException>(() => platitelj.Isplati(primatelj, -500));
        }
    }
}