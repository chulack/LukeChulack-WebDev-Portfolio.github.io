using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;

#nullable disable

namespace DiskInventory.Models
{
    public partial class MediaIntersectiontable
    {
        public int MediaIntersectionId { get; set; }
        [Required]
        public int MediaId { get; set; }
        [Required]
        public int BorrowerId { get; set; }
        public DateTime? ReturnedDate { get; set; }
        [Required(ErrorMessage = "Please selecct a date for the borrowed time")]
        public DateTime BorrowedDate { get; set; }

        public virtual Borrower Borrower { get; set; }
        public virtual Medium Media { get; set; }
    }
}
