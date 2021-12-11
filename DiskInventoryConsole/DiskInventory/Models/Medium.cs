using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;

#nullable disable

namespace DiskInventory.Models
{
    public partial class Medium
    {
        public Medium()
        {
            ArtistIntersectionTables = new HashSet<ArtistIntersectionTable>();
            MediaIntersectiontables = new HashSet<MediaIntersectiontable>();
        }

        public int MediaId { get; set; }
        [Required(ErrorMessage = "Please enter the name of the media.")]

        public string MediaName { get; set; }
        [Required(ErrorMessage = "Please enter the date of release.")]

        public DateTime ReleseDate { get; set; }
        [Required(ErrorMessage = "Please select a genre")]

        public int GenreId { get; set; }
        [Required(ErrorMessage = "Please select a Status")]
        public int StatusId { get; set; }
        [Required(ErrorMessage = "Please select a media type")]
        public int MediaTypeId { get; set; }
       
        public virtual Genre Genre { get; set; }
        public virtual MediaType MediaType { get; set; }
        public virtual Status Status { get; set; }
        public virtual ICollection<ArtistIntersectionTable> ArtistIntersectionTables { get; set; }
        public virtual ICollection<MediaIntersectiontable> MediaIntersectiontables { get; set; }
    }
}
