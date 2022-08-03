using Microsoft.VisualStudio.TestTools.UnitTesting;
using System;
using IspitniRokovi;

namespace Testovi4
{
    [TestClass]
    public class UnitTest1
    {
        [TestMethod]
        public void Test1()
        {
            Referada referada = new Referada();
            Assert.IsNull(referada.DohvatiStudenta("123"));
        }

        [TestMethod]
        public void Test2()
        {
            Referada referada = new Referada();
            Assert.IsNotNull(referada.DohvatiStudenta("13"));
        }

        [TestMethod]
        public void Test3()
        {
            Student student = new Student();
            student.JMBAG = "11";
            Assert.ThrowsException<ArgumentException>(() => student.Upisi(0));
        }

        [TestMethod]
        public void Test4()
        {
            Student student = new Student();
            student.JMBAG = "11";
            Assert.ThrowsException<ArgumentException>(() => student.Upisi(3));
        }

        [TestMethod]
        public void Test5()
        {
            Referada referada = new Referada();
            Student student = new Student();

            student = referada.DohvatiStudenta("12");
            Assert.ThrowsException<ConditionsNotMetException>(() => student.Upisi(3));
        }

        [TestMethod]
        public void Test6()
        {
            Referada referada = new Referada();
            Student student = referada.DohvatiStudenta("11");   

            bool b = student.Upisi(2);
            Assert.IsTrue(b == true && student.StudijskaGodina == 2 && student.UvjetiZaUpis == false);
        }
    }
}
