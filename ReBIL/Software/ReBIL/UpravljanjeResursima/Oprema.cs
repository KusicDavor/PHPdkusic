//------------------------------------------------------------------------------
// <auto-generated>
//     This code was generated from a template.
//
//     Manual changes to this file may cause unexpected behavior in your application.
//     Manual changes to this file will be overwritten if the code is regenerated.
// </auto-generated>
//------------------------------------------------------------------------------

namespace UpravljanjeResursima
{
    using System;
    using System.Collections.Generic;
    
    public partial class Oprema
    {
        public int IDOpreme { get; set; }
        public string Oib { get; set; }
        public string NazivOpreme { get; set; }
        public Nullable<System.DateTime> DatumKupnje { get; set; }
        public Nullable<int> KolicinaOpreme { get; set; }
    
        public virtual Zaposlenik Zaposlenik { get; set; }
    }
}
