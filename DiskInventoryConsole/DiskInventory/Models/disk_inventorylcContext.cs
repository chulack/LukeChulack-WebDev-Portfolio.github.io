using System;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Metadata;

#nullable disable

namespace DiskInventory.Models
{
    public partial class disk_inventorylcContext : DbContext
    {
        public disk_inventorylcContext()
        {
        }

        public disk_inventorylcContext(DbContextOptions<disk_inventorylcContext> options)
            : base(options)
        {
        }

        public virtual DbSet<Artist> Artists { get; set; }
        public virtual DbSet<ArtistIntersectionTable> ArtistIntersectionTables { get; set; }
        public virtual DbSet<ArtistType> ArtistTypes { get; set; }
        public virtual DbSet<Borrower> Borrowers { get; set; }
        public virtual DbSet<Genre> Genres { get; set; }
        public virtual DbSet<MediaIntersectiontable> MediaIntersectiontables { get; set; }
        public virtual DbSet<MediaType> MediaTypes { get; set; }
        public virtual DbSet<Medium> Media { get; set; }
        public virtual DbSet<Status> Statuses { get; set; }
        public virtual DbSet<ViewIndividualArtist> ViewIndividualArtists { get; set; }

        protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
        {
//            if (!optionsBuilder.IsConfigured)
//            {
//#warning To protect potentially sensitive information in your connection string, you should move it out of source code. You can avoid scaffolding the connection string by using the Name= syntax to read it from configuration - see https://go.microsoft.com/fwlink/?linkid=2131148. For more guidance on storing connection strings, see http://go.microsoft.com/fwlink/?LinkId=723263.
//                optionsBuilder.UseSqlServer("Server=.\\SQLDEV01;Database=disk_inventorylc;Trusted_Connection=True;");
//            }
        }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            modelBuilder.HasAnnotation("Relational:Collation", "SQL_Latin1_General_CP1_CI_AS");

            modelBuilder.Entity<Artist>(entity =>
            {
                entity.ToTable("artist");

                entity.Property(e => e.ArtistId).HasColumnName("artistID");

                entity.Property(e => e.ArtistFname)
                    .IsRequired()
                    .HasMaxLength(60)
                    .HasColumnName("artistFname")
                    .IsFixedLength(true);

                entity.Property(e => e.ArtistLname)
                    .HasMaxLength(60)
                    .HasColumnName("artistLname")
                    .IsFixedLength(true);

                entity.Property(e => e.ArtistTypeId).HasColumnName("artistTypeID");

                entity.HasOne(d => d.ArtistType)
                    .WithMany(p => p.Artists)
                    .HasForeignKey(d => d.ArtistTypeId)
                    .OnDelete(DeleteBehavior.ClientSetNull)
                    .HasConstraintName("FK__artist__artistTy__32E0915F");
            });

            modelBuilder.Entity<ArtistIntersectionTable>(entity =>
            {
                entity.HasKey(e => e.ArtistIntersectionId)
                    .HasName("PK__artistIn__3306D4BBE6FCB40E");

                entity.ToTable("artistIntersectionTable");

                entity.Property(e => e.ArtistIntersectionId).HasColumnName("artistIntersectionID");

                entity.Property(e => e.ArtistId).HasColumnName("artistID");

                entity.Property(e => e.MediaId).HasColumnName("mediaID");

                entity.HasOne(d => d.Artist)
                    .WithMany(p => p.ArtistIntersectionTables)
                    .HasForeignKey(d => d.ArtistId)
                    .OnDelete(DeleteBehavior.ClientSetNull)
                    .HasConstraintName("FK__artistInt__artis__3A81B327");

                entity.HasOne(d => d.Media)
                    .WithMany(p => p.ArtistIntersectionTables)
                    .HasForeignKey(d => d.MediaId)
                    .OnDelete(DeleteBehavior.ClientSetNull)
                    .HasConstraintName("FK__artistInt__media__398D8EEE");
            });

            modelBuilder.Entity<ArtistType>(entity =>
            {
                entity.ToTable("artistType");

                entity.Property(e => e.ArtistTypeId).HasColumnName("artistTypeID");

                entity.Property(e => e.Description)
                    .IsRequired()
                    .HasMaxLength(16)
                    .IsUnicode(false)
                    .HasColumnName("description")
                    .IsFixedLength(true);
            });

            modelBuilder.Entity<Borrower>(entity =>
            {
                entity.ToTable("borrower");

                entity.Property(e => e.BorrowerId).HasColumnName("borrowerID");

                entity.Property(e => e.BorrowerPhoneNum)
                    .IsRequired()
                    .HasMaxLength(16)
                    .IsUnicode(false)
                    .HasColumnName("borrowerPhoneNum")
                    .IsFixedLength(true);

                entity.Property(e => e.Fname)
                    .IsRequired()
                    .HasMaxLength(60)
                    .IsUnicode(false)
                    .HasColumnName("fname")
                    .IsFixedLength(true);

                entity.Property(e => e.Lname)
                    .IsRequired()
                    .HasMaxLength(60)
                    .IsUnicode(false)
                    .HasColumnName("lname")
                    .IsFixedLength(true);
            });

            modelBuilder.Entity<Genre>(entity =>
            {
                entity.ToTable("genre");

                entity.Property(e => e.GenreId).HasColumnName("genreID");

                entity.Property(e => e.Description)
                    .IsRequired()
                    .HasMaxLength(16)
                    .IsUnicode(false)
                    .HasColumnName("description")
                    .IsFixedLength(true);
            });

            modelBuilder.Entity<MediaIntersectiontable>(entity =>
            {
                entity.HasKey(e => e.MediaIntersectionId)
                    .HasName("PK__mediaInt__3DC985ACC0B5D292");

                entity.ToTable("mediaIntersectiontable");

                entity.Property(e => e.MediaIntersectionId).HasColumnName("mediaIntersectionID");

                entity.Property(e => e.BorrowedDate)
                    .HasColumnType("date")
                    .HasColumnName("borrowedDate");

                entity.Property(e => e.BorrowerId).HasColumnName("borrowerID");

                entity.Property(e => e.MediaId).HasColumnName("mediaID");

                entity.Property(e => e.ReturnedDate)
                    .HasColumnType("date")
                    .HasColumnName("returnedDate");

                entity.HasOne(d => d.Borrower)
                    .WithMany(p => p.MediaIntersectiontables)
                    .HasForeignKey(d => d.BorrowerId)
                    .OnDelete(DeleteBehavior.ClientSetNull)
                    .HasConstraintName("FK__mediaInte__borro__36B12243");

                entity.HasOne(d => d.Media)
                    .WithMany(p => p.MediaIntersectiontables)
                    .HasForeignKey(d => d.MediaId)
                    .OnDelete(DeleteBehavior.ClientSetNull)
                    .HasConstraintName("FK__mediaInte__media__35BCFE0A");
            });

            modelBuilder.Entity<MediaType>(entity =>
            {
                entity.ToTable("mediaType");

                entity.Property(e => e.MediaTypeId).HasColumnName("mediaTypeID");

                entity.Property(e => e.Description)
                    .IsRequired()
                    .HasMaxLength(16)
                    .IsUnicode(false)
                    .HasColumnName("description")
                    .IsFixedLength(true);
            });

            modelBuilder.Entity<Medium>(entity =>
            {
                entity.HasKey(e => e.MediaId)
                    .HasName("PK__media__D271B44221B4C5E5");

                entity.ToTable("media");

                entity.Property(e => e.MediaId).HasColumnName("mediaID");

                entity.Property(e => e.GenreId).HasColumnName("genreID");

                entity.Property(e => e.MediaName)
                    .IsRequired()
                    .HasMaxLength(60)
                    .IsUnicode(false)
                    .HasColumnName("mediaName");

                entity.Property(e => e.MediaTypeId).HasColumnName("mediaTypeID");

                entity.Property(e => e.ReleseDate)
                    .HasColumnType("date")
                    .HasColumnName("releseDate");

                entity.Property(e => e.StatusId).HasColumnName("statusID");

                entity.HasOne(d => d.Genre)
                    .WithMany(p => p.Media)
                    .HasForeignKey(d => d.GenreId)
                    .OnDelete(DeleteBehavior.ClientSetNull)
                    .HasConstraintName("FK__media__genreID__2C3393D0");

                entity.HasOne(d => d.MediaType)
                    .WithMany(p => p.Media)
                    .HasForeignKey(d => d.MediaTypeId)
                    .OnDelete(DeleteBehavior.ClientSetNull)
                    .HasConstraintName("FK__media__mediaType__2E1BDC42");

                entity.HasOne(d => d.Status)
                    .WithMany(p => p.Media)
                    .HasForeignKey(d => d.StatusId)
                    .OnDelete(DeleteBehavior.ClientSetNull)
                    .HasConstraintName("FK__media__statusID__2D27B809");
            });

            modelBuilder.Entity<Status>(entity =>
            {
                entity.ToTable("status");

                entity.Property(e => e.StatusId).HasColumnName("statusID");

                entity.Property(e => e.Description)
                    .IsRequired()
                    .HasMaxLength(16)
                    .IsUnicode(false)
                    .HasColumnName("description")
                    .IsFixedLength(true);
            });

            modelBuilder.Entity<ViewIndividualArtist>(entity =>
            {
                entity.HasNoKey();

                entity.ToView("View_Individual_Artist");

                entity.Property(e => e.ArtistFname)
                    .IsRequired()
                    .HasMaxLength(60)
                    .HasColumnName("artistFName")
                    .IsFixedLength(true);

                entity.Property(e => e.ArtistId)
                    .ValueGeneratedOnAdd()
                    .HasColumnName("artistID");

                entity.Property(e => e.ArtistlName)
                    .HasMaxLength(60)
                    .HasColumnName("artistlName")
                    .IsFixedLength(true);
            });

            OnModelCreatingPartial(modelBuilder);
        }

        partial void OnModelCreatingPartial(ModelBuilder modelBuilder);
    }
}
