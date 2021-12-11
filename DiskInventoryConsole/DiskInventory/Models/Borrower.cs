using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;

#nullable disable

namespace DiskInventory.Models
{
    public partial class Borrower
    {
        public Borrower()
        {
            MediaIntersectiontables = new HashSet<MediaIntersectiontable>();
        }

        public int BorrowerId { get; set; }
        [Required(ErrorMessage = "Please enter a first Name for borrrower.")]
        public string Fname { get; set; }
        [Required(ErrorMessage = "Please enter a last Name for borrrower.")]

        public string Lname { get; set; }
        [Required(ErrorMessage = "Please enter a Phone Number for borrrower.")]

        public string BorrowerPhoneNum { get; set; }

        public virtual ICollection<MediaIntersectiontable> MediaIntersectiontables { get; set; }
    }
}
